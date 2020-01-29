<?php

// RESTコントローラのサンプル
class Controller_Fruit extends Controller_Rest
{

    public function get_list()
    {
        $data = array(
            0 => array(
                'name' => 'orange',
                'color' => 'orange'
            ),
            1 => array(
                'name' => 'apple',
                'color' => 'red'
            )
        );
        return $this->response($data);
    }

    public function post_list()
    {
        // 処理
    }

}