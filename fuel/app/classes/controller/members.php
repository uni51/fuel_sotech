<?php

class Controller_Members extends Controller
{

    public function action_top()
    {
        $data = array();
        $data['name'] = '早川';
        return View::forge('members/top', $data);
    }

    public function action_top2()
    {
        $view = View::forge('members/top');
        $view->name = '木村';
        return $view;
    }

    public function action_top3()
    {
        $view = View::forge('members/top');
        $view->set('name', '山田');
        return $view;
    }

    public function action_list()
    {
        $view = View::forge('members/list');
        $members = array();
        $members[] = array('id' => 1, 'name' => '早川');
        $members[] = array('id' => 2, 'name' => '寺田');
        $members[] = array('id' => 3, 'name' => '澤田');
        $view->set('members', $members);
        return $view;
    }

}