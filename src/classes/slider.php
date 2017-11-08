<?php
/**
 * Created by PhpStorm.
 * User: rmill_000
 * Date: 02/11/2017
 * Time: 13:01
 */
class Slider
{
    private $data = [];
    private $imagePath;

    private $css;


    private function setCss($css)
    {
        $this->css = $css;
    }

    public function getCss()
    {
        return $this->css;
    }

    /**
     * @param $data
     */
    private function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
    public function __construct($slides)
    {
        $this->setData($slides);

    }

    /**
     * @param $imgpath
     */
    public function setImagePath($imgpath)
    {
        $this->imagePath = $imgpath;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * @return array
     */
    public function displaySlides(){


        //$tableSchema = Yii::$app->db->schema->getTableSchema('tableName');
        $i = 0;
        foreach ($this->getData() as $slide){
            $this->data[$i] = $slide;
            //echo $this->data[$i];
            $i++;
        }

        return $this->data;

    }


    /**
     * @param $imageName
     * @return string
     */
    public function getImage($imageName)
    {
        $basepath = Yii::$app->getHomeUrl();
        $this->setImagePath('http://localhost'.$basepath.'slides/' . $imageName);



        return $this->getImagePath();
    }
}