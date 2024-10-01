const client_names = <?php echo json_encode($loaded_client_names); ?>;
const revenue = <?php echo json_encode($loaded_clients); ?>;
//setup block
const chart_data = {
    
};

//config block
const config = {
    type: 'bar',
    options: {
        scales: {
            y: {beginAtZero: true}
        }
    },
    data: {
        labels: client_names,
        datasets: [{
            label: 'Clients by Revenue',
            data: revenue,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'

            ],
            borderColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'

            ],
            borderWidth: 1
        }]
    }
};

//render block
const myChart = new Chart(
    document.getElementById('myChart').getContext('2d'),
    config
);