<?php
use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;

?>

<?php
$this->params['breadcrumbs'][] = ['label' => 'module หนองบุญมาก', 'url' => ['/mymod/default/index']];
$this->params['breadcrumbs'][] ='รายงาน 2';
?>




<div class="well">
    
      <?php
      use yii\widgets\ActiveForm;
      use yii\helpers\Url;
      use yii\helpers\Html;
    ActiveForm::begin([
        'method' => 'get',
        'action' => Url::to(['/mymod/default/report2']),
    ]);
    ?>
    
     ให้บริการระหว่าง:
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ]
        ]);
        ?>
        ถึง:
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ]
        ]);
        ?>
        <?php
    echo Html::submitButton(' ตกลง ', ['class' => 'btn btn-danger']);
    ActiveForm::end();
    ?>
    
</div>

<div style="display: none">
    <?php
    echo Highcharts::widget([
        'scripts' => [
            'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
            //'modules/exporting', // adds Exporting button/menu to chart
            //'themes/grid',       // applies global 'grid' theme to all charts
            //'highcharts-3d',
            'modules/drilldown'
        ]
    ]);
    ?>
</div>

<div id="chart1">
    
    
</div>

<?php
use kartik\grid\GridView;

echo GridView::widget([
    
    'dataProvider'=>$dataProvider,
    'panel'=>[
        'before'=>'รายงานของฉัน 2'
    ]
    
]);

//print_r($raw);
// code chart
$data = [];


foreach ($raw as $value) {
   $data[]=['name'=>$value['hosname'],'y'=>$value['visit']*1];
}


$data = json_encode($data);




$this->registerJs("$(function () {
    $('#chart1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'แผนภูมิแท่งแสดงจำนวนมารับบริการ'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: '<b>ครั้ง</b>'
            },
        },
        legend: {
            enabled: true
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [
        {
            name: 'บริการ',
            colorByPoint: true,
            data:$data
            
        }
        ]
    });
});", yii\web\View::POS_END);


