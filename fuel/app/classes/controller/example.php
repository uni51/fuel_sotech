<?php

// テンプレートコントローラのサンプル
class Controller_Example extends Controller_Template
{

    public function action_index()
    {
        $this->template->title = 'FuelPHPの特徴';
        $this->template->content = View::forge('example/index');
    }

}
