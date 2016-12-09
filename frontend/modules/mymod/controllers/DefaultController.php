<?php

namespace frontend\modules\mymod\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
     public function actionReport1()
    {
       
       $sql = " select name as 'ชื่อ',lname from person limit 100";
       $raw = \Yii::$app->db->createCommand($sql)->queryAll();
       
       $dataProvider = new \yii\data\ArrayDataProvider([
           'allModels'=>$raw
       ]);
       
       
        return $this->render('report1',[
            'dataProvider'=>$dataProvider
        ]);
    }
    
    public function actionReport2($date1='0001-01-01',$date2='3000-12-31'){
        $sql = " 
SELECT 
h.hoscode ,h.hosname 
,COUNT(DISTINCT t.HOSPCODE,t.SEQ ) visit

from chospital_amp h

LEFT JOIN  service t on h.hoscode = t.HOSPCODE

AND t.DATE_SERV BETWEEN '$date1'  AND '$date2'

GROUP BY h.hoscode ";
        
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
       
       $dataProvider = new \yii\data\ArrayDataProvider([
           'allModels'=>$raw
       ]);
       
       
        return $this->render('report2',[
            'dataProvider'=>$dataProvider,
            'date1'=>$date1,
            'date2'=>$date2,
            'raw'=>$raw
        ]);
        
        
        
        
    }
    
    
    
}
