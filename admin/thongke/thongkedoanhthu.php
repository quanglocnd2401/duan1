<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<span>Thống kê theo <b> <?= $time ?></b> </span>
<form action="index.php?act=thongkedt" method="post">
    <select name="timeRange">
        <option value="month" <?= (isset($selected) && $selectTime == "month") ? $selected : '' ?>>Tháng</option>
        <option value="years" <?= (isset($selected) && $selectTime == "years") ? $selected : '' ?>>Năm</option>

        <option value="365day" <?= (isset($selected) && $selectTime == "365day") ? $selected : '' ?>>365 ngày</option>
        <option value="28day" <?= (isset($selected) && $selectTime == "28day") ? $selected : '' ?>>28 ngày</option>
        <option value="7day" <?= (isset($selected) && $selectTime == "7day") ? $selected : '' ?>>7 ngày</option>
    </select>
    <input type="submit" name="submittk" value="change">
</form>
<canvas id="myChart" width="800px" height="200px"></canvas>
<?php

$doanhthu = [];
$time = [];
foreach ($thongke as $tk) {
    extract($tk);
    array_push($doanhthu, $total_amount);
    array_push($time, $month_year);
}

echo '<script>';
echo 'const phpData = ' . json_encode($doanhthu) . ';';
echo 'const phpLabels = ' . json_encode($time) . ';';
echo '</script>';
?>
<script>
    // Move data definition above the config object
    const labels = phpLabels;
    const data = {
        labels: labels,
        datasets: [{
            label: 'Tiền',
            data: phpData,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };
    // Global Options
    const config = {
        type: 'line',
        data: data,
    };

    let myChart = document.getElementById('myChart').getContext('2d');
    new Chart(myChart, config);
</script>