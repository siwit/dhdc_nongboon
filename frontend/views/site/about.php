<?php

use yii\helpers\Html;
use backend\models\Sysconfigmain;

/* @var $this yii\web\View */
$this->title = 'เกียวกับ';
$this->params['breadcrumbs'][] = $this->title;
$sys = Sysconfigmain::find()->one();
?>
<div class="site-about">
    <h1>ผู้ดูแลระบบ</h1>
    <h3>- <?= $sys->note1 ?></h3>
</div>
<hr>
<div class="site-about">
    <h3>โปรแกรม DHDC (District Health Data Checker)</h3>    
    <p>-Project Manager : <a href="https://www.facebook.com/tehnn" target="_blank">UTEHN PHNU</a></p>
    <p>-&copy; สงวนลิขสิทธิ์ SOURCECODE ส่วนการทำงานนำเข้าไฟล์ 43 แฟ้ม</p>  
</div>
<div>
    <h2> 
        <?= Html::a('กลุ่ม Facebook DHDC', 'https://www.facebook.com/groups/1533692120236074/', ['target' => '_blank']) ?>
    </h2>
</div>



