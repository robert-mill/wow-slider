<?php
/**
 * Created by PhpStorm.
 * User: rmill_000
 * Date: 02/11/2017
 * Time: 13:01
 */
class Slider
{
    public function __construct()
    {

    }

    public function displaySlides(){
        $slides = ['1.jpg','2.jpg','3.jpg'];

        //$tableSchema = Yii::$app->db->schema->getTableSchema('tableName');



        return $slides;
    }
}