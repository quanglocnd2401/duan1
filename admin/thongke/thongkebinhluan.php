<script src="https://www.gstatic.com/charts/loader.js"></script>


<div
id="myChart" style="width:100%; max-width:1000px; height:800px;">
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
        ["'.$name.'",'.$countbl.'],
    ';
    }
    ?>

]);

// Set Options
const options = {
  title:'Thống kê số bình luận theo danh mục'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>