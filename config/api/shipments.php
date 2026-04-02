<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/response.php';

class ShipmentsAPI {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll($page = 1, $perPage = 20) {
        $page = max(1, (int)$page);
        $perPage = min((int)$perPage, 100);
        $offset = ($page - 1) * $perPage;
        $total = $this->db->count('shipments');
        $shipments = $this->db->select('shipments', '*', [], [], "$offset, $perPage", 'created_at DESC');
        return APIResponse::paginated($shipments, $total, $page, $perPage);
    }

    public function getById($id) {
        $shipment = $this->db->selectOne('shipments', '*', ['id = ?'], [$id]);
        if (!$shipment) return APIResponse::error('Shipment not found', 404);
        $tracking = $this->db->select('tracking_history', '*', ['shipment_id = ?'], [$id], '', 'timestamp DESC');
        $shipment['tracking_history'] = $tracking;
        return APIResponse::success($shipment, 'Shipment retrieved');
    }

    public function create($data) {
        $required = ['customer_id', 'origin_address', 'destination_address', 'weight_kg'];
        $errors = [];
        foreach ($required as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                $errors[$field] = "$field is required";
            }
        }
        if (!empty($errors)) return APIResponse::error('Validation failed', 422, $errors);

        $shipmentData = [
            'customer_id' => (int)$data['customer_id'],
            'tracking_number' => 'SHIP-' . strtoupper(uniqid()),
            'origin_address' => $data['origin_address'],
            'destination_address' => $data['destination_address'],
            'weight_kg' => (float)$data['weight_kg'],
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $id = $this->db->insert('shipments', $shipmentData);
        $shipment = $this->db->selectOne('shipments', '*', ['id = ?'], [$id]);
        return APIResponse::success($shipment, 'Shipment created', 201);
    }
}
?>
