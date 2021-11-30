<?php

namespace app\widgets;

use yii\base\Widget;

// Виджеты – это некая логика, которую мы можем использовать в видах для реализации каких - то повторяющихся вещей.
class MyWidget extends Widget
{
    public $name;

    //Нормализация свойств
    public function init()
    {
        parent::init();

        // if (!$this->name) $this->name = "Гость";
        //буферизация
        \ob_start();
    }

    //Вывод
    public function run()
    {
        //берем информацию из блока
        $content = ob_get_clean();
        //приводим к верхнему регистру
        $content = mb_strtoupper($content, 'utf-8');
        return $this->render('my', ['content' => $content]);
        // return $this->render('my', ['name' => $this->name]);
    }
}
