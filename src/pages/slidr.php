<?php

use yii\helpers\Html;
use yii\helpers\Url;


$baseurl =  Url::base();

$this->registerCssFile("");

$vp = Yii::$app->getVendorPath() ;

$dir2 = 'C:/xampp/htdocs'.$baseurl.'/slides/';
$slides = [];


if(is_dir($dir2)){
    if($dr = opendir($dir2)){
        while(($file = readdir($dr))!==false){
            array_push($slides, $file);
        }
        closedir($dr);
    }


    $data = new Slider($slides);

    foreach ($data->displaySlides() as $k=>$v){
        if($v!=='.'&&$v!=='..'){
            echo '<img src="'.$data->getImage($v).'" style="width:50px; height:30px; border:1px solid #fff;"/>';

        }

    }
}



