<style>

    .wrap{
        height: 100%;
    }
    .container{
        height: 100%;
    }
    .site-index{
        height: 100%;
    }
    .jumbotron{
        height: 50%;
    }

    #slideshow{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        min-height: 200px;
        display: block;
        position: relative;
        background-color: #fff;
    }
    .slideshow{
        position: relative;
        height: 100%;
    }
    .placeholder{
        width: 100%;

        visibility: hidden;
    }
    .slideshowpan{
        height: 100%;
        width: 100%;
        min-height: 100px;
        top:0;
        left: 0;
        position: absolute;
        border: 1px solid #fff;
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
        background-color: #fff;
    }

</style>
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
    $slideOb = $data->displaySlides();

    ?>
    <style>
        #slideshow{
            background-image: url("http://localhost/YA-template-1/slides/1.jpg");
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
        }
    </style>
    <section id="slideshow">
        <div class="slideshow">
            <?php
            echo '<img src="http://localhost/YA-template-1/slides/1.jpg" class="slideshowpan placeholder">';
            $i =1;

            $slideCount = count($slideOb)-2;
            $gradient  = 100/$slideCount;
            foreach (  $slideOb as $k=>$v){
                if($v!=='.'&&$v!=='..'){
                    $curpercent  = (int)$gradient*$i;
                    echo '<style>  
                    @keyframes slideimg'.$i.' {
                        0%{
                            opacity:0;
                        }
                         '.$curpercent / 2 .'%{
                            opacity:0;
                        }
                        '.$curpercent .'%{
                            opacity:1;
                        }
                        
                         '.$curpercent * 2 .'%{
                            opacity:1;
                        }
                        
                        100%{
                            opacity:0;
                        }                     
                        
                    } 
                .slideimg'.$i.'{background-image: url('.$data->getImage($v).' ); animation: slideimg'.$i.' 10s infinite; }  </style>';

                    echo '<div class="slideshowpan slideimg'.$i.'"></div>';
                    $i++;
                }
            }
            ?>
        </div>
    </section>
    <?php
}



