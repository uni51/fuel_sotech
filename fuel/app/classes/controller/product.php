<?php

class Controller_Product extends Controller
{

    public function action_index($code)
    {
        //商品トップページの処理
    }

    public function action_detail($code)
    {
        //商品詳細ページの処理
    }

    public function action_photo()
    {
        //商品写真一覧ページの処理
    }

    public function router($method_name, $uri_params)
    {
        $code = $method_name;
        $action = array_shift($uri_params);
        if (method_exists($this, 'action_' . $action)) {
            $method = 'action_' . $action;
            $this->$method($code);
        } else {
            $this->action_index($code);
        }
    }

}
