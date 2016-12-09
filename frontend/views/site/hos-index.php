<?php

use miloschuman\highcharts\Highcharts;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use frontend\models\Cbyear;

$this->title = "District Health Data Checker";
$this->params['breadcrumbs'][] = 'คุณภาพข้อมูลรายหน่วยบริการ';
?>

<div class="well">
    <?php
    ActiveForm::begin([
        'method' => 'get',
        'action' => Url::to(['site/hos-index']),
    ]);
    ?>

    <?php
    $items = ArrayHelper::map(Cbyear::find()->orderBy(['BYEAR' => SORT_DESC])->all(), 'BYEAR', 'BYEAR');

    echo Html::dropDownList('byear', $byear, $items, ['prompt' => '--- ปีงบประมาณ ---']);
    ?>

    <?php
    echo Html::submitButton(' ตกลง ', ['class' => 'btn btn-danger']);
    ActiveForm::end();
    ?>
</div>

<div>
    <?php
    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'hover' => true,
        //'pjax' => true,
        'containerOptions' => ['style' => 'overflow: auto'],
        'responsive' => FALSE,
        //'floatHeader' => true,
        'panel' => [
            'before' => '',
            'type' => \kartik\grid\GridView::TYPE_DANGER,
        ],
        'columns' => [
            [
                'attribute' => 'HOSPCODE',
                'format' => 'raw',
                'label' => 'รหัส',
                'value' => function($data) use ($byear) {
                    return Html::a($data['HOSPCODE'], ['site/hos-file'
                                , 'hospcode' => $data['HOSPCODE']
                                , 'byear' => !empty($byear) ? $byear : NULL
                    ]);
                }
                    ],
                    ['attribute' => 'HOSPNAME', 'label' => 'หน่วยบริการ'],
                    ['attribute' => 'TOTAL'],
                    ['attribute' => 'ERR'],
                    ['attribute' => 'QC', 'label' => 'คุณภาพ'],
                ]
            ]);
            ?>
</div>