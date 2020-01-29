<?php

class Controller_Top extends Controller
{
    public function action_index()
    {
        $user_page = Request::forge('user/hello')->execute();
        echo $user_page;
    }
}