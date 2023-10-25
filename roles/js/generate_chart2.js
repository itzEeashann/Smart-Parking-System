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

            const ctx = document.getElementById('parkingChart2').getContext('2d');
            new Chart(ctx, {
                type: 'pie', 
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Number of Parkings',
                        data: values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
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
