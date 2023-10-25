document.addEventListener('DOMContentLoaded', function() {
fetch('get_parking_data.php')
    .then(response => response.json())
    .then(data => {
        const carNumbers = data.map(entry => entry.car_num);
        const parkingCounts = {};

        carNumbers.forEach(carNum => {
            if (parkingCounts[carNum]) {
                parkingCounts[carNum]++;
            } else {
                parkingCounts[carNum] = 1;
            }
        });

        const labels = Object.keys(parkingCounts);
        const values = Object.values(parkingCounts);

        const ctx = document.getElementById('parkingChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Parkings',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    });
});