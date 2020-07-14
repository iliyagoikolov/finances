<?php
namespace app\components;
use yii\base\Widget;

class MyWidget extends Widget
{
    public $name;
    public $content;

    public function init()
    {
        parent::init();
        //if ($this->name === null) $this->name = "Guest";
        ob_start();
    }

    public function run()
    {
        //return $this->render("my", ["name" => $this->name]);
        $this->content = ob_get_clean();
        $this->content = mb_strtoupper($this->content, "utf-8");
        return $this->render("my", ["content" => $this->content]);
    }
}