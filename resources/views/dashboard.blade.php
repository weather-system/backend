<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Data Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .card-info {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .chart-container {
            height: 400px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center text-light">Weather Dashboard</h4>
        <a href="#">Home</a>
        <a href="#">Analytics</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h1 class="mb-4">Weather Data Dashboard</h1>

        <!-- Info Panels -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card-info text-center">
                    <h5>Kecepatan Angin</h5>
                    <h3>12 m/s</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-info text-center">
                    <h5>Suhu</h5>
                    <h3>28 °C</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-info text-center">
                    <h5>Kelembapan</h5>
                    <h3>65%</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-info text-center">
                    <h5>Curah Hujan</h5>
                    <h3>20 mm</h3>
                </div>
            </div>
        </div>

        <!-- Chart and Table -->
        <div class="row">
            <div class="col-lg-8">
                <h5 class="text-center">Grafik Tren Cuaca</h5>
                <div class="chart-container">
                    <canvas id="weatherChart"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="text-center">Tabel Data Cuaca</h5>
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Waktu</th>
                            <th>Suhu (°C)</th>
                            <th>Kelembapan (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>05 Des 12:00</td>
                            <td>28</td>
                            <td>65</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>05 Des 13:00</td>
                            <td>30</td>
                            <td>70</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>05 Des 14:00</td>
                            <td>27</td>
                            <td>60</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Data dummy
        const labels = ['05 Des 12:00', '05 Des 13:00', '05 Des 14:00'];
        const suhu = [28, 30, 27];
        const kelembapan = [65, 70, 60];
        const curahHujan = [20, 15, 10];

        // Konfigurasi chart
        const ctx = document.getElementById('weatherChart').getContext('2d');
        const weatherChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Suhu (°C)',
                        data: suhu,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        tension: 0.4,
                    },
                    {
                        label: 'Kelembapan (%)',
                        data: kelembapan,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        tension: 0.4,
                    },
                    {
                        label: 'Curah Hujan (mm)',
                        data: curahHujan,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.4,
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Tren Data Cuaca'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Waktu'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nilai'
                        }
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
