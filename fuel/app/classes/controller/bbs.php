<?php

class Controller_Bbs extends Controller
{

    public function before()
    {
        if (!Auth::check()) {
            Response::redirect('welcome');
        }
    }

    public function action_index()
    {
        //掲示板トップページの表示処理
    }

    public function action_list()
    {
        //投稿一覧の取得／表示処理
    }

    public function action_form()
    {
        //投稿フォームの表示処理
    }

}