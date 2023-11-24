<script src="https://www.gstatic.com/charts/loader.js"></script>


<div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
<?php 
    foreach ($listthongke as $tk) {
        extract($tk);
        echo '
        ["'.$tensach.'",'.$countbl.'],
    ';
    }
    ?>

]);

// Set Options
const options = {
  title:'World Wide Wine Production'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>