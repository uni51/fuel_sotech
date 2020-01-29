<?php

class Controller_Nest extends Controller
{
    function action_index()
    {
        $view = View::forge('layout');
        $view->set('content', View::forge('content'));
        $view->set_global('username', 'Seiji Hayakawa');
        $view->set_global('title', 'Home');
        return $view;
    }
}