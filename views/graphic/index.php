<?php
/* @var $this yii\web\View */

$this->registerJsFile('@web/js/Chart.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerCssFile('@web/css/Chart.css');

?>
<h1>Графики и диаграммы</h1>
<p>Обновите страницу, если нужно поменять цвет диаграммы</p>
<div class ="chart-container" style="position: relative; height:40vh; width:80vw;">
    <canvas id="myChart">
        Your browser does not support the canvas element.
    </canvas>
</div>

<?php
$myTestJs = "new Chart(document.getElementById(\"myChart\"), {
    type: 'pie',
    data: {
      labels: [
      ";
foreach ($categories as $category)
{
    $myTestJs .= "\"".$category->category."\",";
}
$myTestJs.="],
      datasets: [{
        label: \"Population (millions)\",
        backgroundColor: [";
foreach ($colors as $color)
{
    $myTestJs .= "\"#".$color."\",";
}
$myTestJs.= "],
        data: [";
foreach ($summ as $amount)
{
    $myTestJs .= $amount->amount.",";
}
$myTestJs .="]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Круговая диаграмма расходов по категориям'
      }
    }
});";

$this->registerJs($myTestJs, \yii\web\View::POS_READY);
?>