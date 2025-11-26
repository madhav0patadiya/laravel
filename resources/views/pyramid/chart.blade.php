<!DOCTYPE html>
<html>
<head>
    <title>All Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-box {
            width: 45%;
            float: left;
            margin: 2%;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Dashboard — All Charts</h2>

<div class="chart-box">
    <canvas id="barChart"></canvas>
</div>

<div class="chart-box">
    <canvas id="lineChart"></canvas>
</div>

<div class="chart-box">
    <canvas id="pieChart"></canvas>
</div>

<div class="chart-box">
    <canvas id="doughnutChart"></canvas>
</div>

<script>
    const months = @json($months);
    const sales = @json($sales);
    const categories = @json($categories);
    const revenue = @json($revenue);

    // Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{ label: 'Sales', data: sales, borderWidth: 1 }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

    // Line Chart
    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: months,
            datasets: [{ label: 'Sales', data: sales, borderWidth: 1 }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

    // Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: categories,
            datasets: [{ data: revenue }]
        }
    });

    // Doughnut Chart
    new Chart(document.getElementById('doughnutChart'), {
        type: 'doughnut',
        data: {
            labels: categories,
            datasets: [{ data: revenue }]
        }
    });
</script>

</body>
</html>
