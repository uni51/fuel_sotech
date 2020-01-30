<?php

class Controller_Article extends Controller_Template
{
    public function action_index()
    {
        // ビューに渡す配列の初期化
        $data = array();
        //モデルから記事を取得
        $data['articles'] = Model_Article::query()
            ->order_by('id', 'desc')
            ->get();

        //ビューの読み込み
        $this->template->title = '記事一覧';
        $this->template->content = View::forge('article/list', $data);
    }
}