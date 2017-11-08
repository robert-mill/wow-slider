"# wow-slider" This is a test file for 'Yii2 advanced'
/* This is and will be upadated broken and fixed on a regular basis I don't want to misslead anyone */

add a php file to the frontend assets dir VendorAsset.php

<?php
/**
 * Created by PhpStorm.
 * User: rmill_000
 * Date: 08/11/2017
 * Time: 11:04
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class VendorAsset extends AssetBundle
{
    public $sourcePath = '@vendor/robert-mill/wow-slider';

    public $css = [
        'src/assets/css/wow.css',
    ];
    public $js = [

    ];
}

In the views Layout/main.php file
Add:
use frontend\assets\VendorAsset; // to the top of the page
Below this add:
	VendorAsset::register($this);

add the line 
    $this->render('@vendor/robert-mill/wow-slider/src/pages/slidr.php')
where you need to add the slider


