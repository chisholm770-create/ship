const API_URL = '/ship/api';

function loadDashboard() {
    fetch(`${API_URL}/shipments?perPage=100`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const shipments = data.data;
                document.getElementById('total-shipments').textContent = data.pagination.total;
                document.getElementById('in-transit').textContent = shipments.filter(s => s.status === 'in_transit').length;
                document.getElementById('delivered').textContent = shipments.filter(s => s.status === 'delivered').length;
                document.getElementById('pending').textContent = shipments.filter(s => s.status === 'pending').length;
                
                const tbody = document.getElementById('shipments-body');
                tbody.innerHTML = shipments.slice(0, 10).map(s => `
                    <tr>
                        <td>${s.tracking_number}</td>
                        <td>${s.origin_address}</td>
                        <td>${s.destination_address}</td>
                        <td>${s.status}</td>
                        <td>${s.weight_kg}</td>
                    </tr>
                `).join('');
            }
        })
        .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', loadDashboard);
setInterval(loadDashboard, 30000);
