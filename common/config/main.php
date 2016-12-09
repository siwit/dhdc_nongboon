<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'angular' => [
            'class' => 'frontend\modules\angular\Angular',
        ],
        'hdc' => [
            'class' => 'frontend\modules\hdc\Hdc',
        ],
        'maps' => [
            'class' => 'frontend\modules\maps\Maps',
        ],
        'gis' => [
            'class' => 'frontend\modules\gis\Gis',
        ],
        'gis2' => [
            'class' => 'frontend\modules\gis2\Gis2',
        ],
        'hdcex' => [
            'class' => 'frontend\modules\hdcex\Hdcex',
        ],
        'utehn' => [
            'class' => 'frontend\modules\utehn\Utehn',
        ],
        'homegis' => [
            'class' => 'frontend\modules\homegis\Homegis',
        ],
        'phr' => [
            'class' => 'frontend\modules\phr\Phr',
        ],
         'mymod' => [
            'class' => 'frontend\modules\mymod\Mymod',
        ],
    ],
];
