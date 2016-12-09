<?php

//use yii;
use yii\helpers\Html;

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SqlscriptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คลัง Script';
$this->params['breadcrumbs'][] = $this->title;
$role = Yii::$app->user->identity->role;
?>
<div class="sqlscript-index">

    
    <?php
    //echo $role;
    ?>
    <?php if ($role==1 or $role==2): ?>
    <h4><?= Html::encode($this->title) ?></h4>
        <p>
            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> เพิ่ม SQL', ['create'], ['class' => 'btn btn-success']) ?>
            <a href="<?= \yii\helpers\Url::to(['upload']) ?>" class="btn btn-info">
                <i class="glyphicon glyphicon-file"></i> นำเข้า
            </a>
        </p>
    <?php endif; ?>
    <?php
//echo GridView::widget([
    echo \kartik\grid\GridView::widget([
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        //'panel' => ['before' => ''],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'topic',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = Html::a($model->topic, ['view', 'id' => $model->id]);
                    return $content;
                }
                    ],
                    //'sql_script:ntext',
                    //'sql_script',
                    //'user',
                    'd_update',
                    //['class' => 'yii\grid\ActionColumn'],
                    [
                        'label' => 'ประมวลผล',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $route_run = \yii\helpers\Url::to(['runquery/index']);
                            $html = "<form method=\"post\" action='$route_run'>
                                <input type='hidden' name ='script_name' value=\"$model->topic\">
                                <input type='hidden' name='sql_code' value=\"$model->sql_script\">
                                <button class='btn btn-success'>
                                    <i class=\"glyphicon glyphicon-play\"></i>
                                </button>
                            </form>";
                            return $html;
                        }
                            ]
                        ],
                    ]);
                    ?>

</div>
