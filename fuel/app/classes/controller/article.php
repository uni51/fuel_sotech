<?php

class Controller_Article extends Controller_Template
{

    private $per_page = 3;

    public function action_index()
    {
        // ビューに渡す配列の初期化
        $data = array();

        //ページネーションの設定
        $count = Model_Article::count();
        $config = array(
            'pagination_url' => 'article',
            'uri_segment' => 2,
            'num_links' => 4,
            'per_page' => $this->per_page,
            'total_items' => $count,
        );
        $pagination = Pagination::forge('article_pagination', $config);

        //モデルから記事を取得
        $data['articles'] = Model_Article::query()
            ->order_by('id', 'desc')
            ->limit($this->per_page)
            ->offset($pagination->offset)
            ->get();

        //ビューの読み込み
        $this->template->title = '記事一覧';
        $this->template->content = View::forge('article/list', $data);
        $this->template->content->set_safe('pagination',$pagination);
    }

    public function action_view($id = 0)
    {
        //ビューに渡す配列の初期化
        $data = array();

        //IDが指定されていない場合や、指定されたIDの記事が見つからない場合は一覧にリダイレクト
        $id and $data['article'] = Model_Article::find($id);
        if (!$data['article']) {
            Response::redirect('articles');
        }

        //ビューの読み込み
        $this->template->title = $data['article']->title;
        $this->template->content = View::forge('article/view', $data);
    }
}