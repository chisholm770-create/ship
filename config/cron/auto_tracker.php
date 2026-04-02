<?php
require_once __DIR__ . '/../config/database.php';

$db = Database::getInstance();

// Get all in-transit shipments
$shipments = $db->select('shipments', '*', ['status = ?'], ['in_transit']);

foreach ($shipments as $shipment) {
    // Simulate GPS tracking update
    $lat = 40.7128 + (rand(-50, 50) / 1000);
    $lon = -74.0060 + (rand(-50, 50) / 1000);
    
    $trackingData = [
        'shipment_id' => $shipment['id'],
        'status' => 'in_transit',
        'location' => 'Route Update',
        'latitude' => $lat,
        'longitude' => $lon,
        'timestamp' => date('Y-m-d H:i:s'),
        'notes' => 'Auto-tracking update'
    ];
    
    $db->insert('tracking_history', $trackingData);
}

echo "Auto-tracking completed at " . date('Y-m-d H:i:s') . "\n";
?>
