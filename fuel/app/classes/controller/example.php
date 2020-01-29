<?php

class Controller_Example extends Controller
{
    //ビューへの変数の受け渡し（配列で渡す）
    public function action_test()
    {
        //View::forge()の引数として配列を指定
        $data = array();
        $data['title'] = 'Test Page';
        $data['username'] = 'John Doe';
        return View::forge('test', $data);
    }

    //ビューへの変数の受け渡し（Viewオブジェクトのset()を使う）
    /* public function action_test()
      {
      //Viewオブジェクトのset()メソッドとして指定
      $view = View::forge('test');
      $view->set('title', 'Test Page');
      $view->set('username', 'John Doe');
      return $view;
      } */

    //パラメータの受け取り
    /* public function action_test($param_1 = null, $param_2 = null)
      {
      //何らかの処理
      } */

    //method_paramsによるパラメータの受け取り
    public function action_params()
    {
        $data = array();
        $data['params'] = $this->request->route->method_params;
        return View::forge('params', $data);
    }
}