<?php

class Controller_Book extends Controller
{
    public function action_top()
    {
        $view = View::forge('book/top');
        return $view;
    }
}