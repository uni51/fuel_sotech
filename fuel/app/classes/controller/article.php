<?php

class Controller_Article extends Controller_Template
{

    private $per_page = 3;

    public function before()
    {
        parent::before();
        if (!Auth::check() and !in_array(Request::active()->action, array('login', 'index', 'view'))) {
            Response::redirect('article/login');
        }
    }

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
        $this->template->content->set_safe('pagination', $pagination);
    }


    public function action_create()
    {
        // Model_Articleオブジェクトを新規作成
        $article = Model_Article::forge();
        $article->user_id = Arr::get(Auth::get_user_id(), 1);

        //Fieldsetオブジェクトにモデルを登録
        $fieldset = Fieldset::forge()->add_model('Model_Article')->populate($article, true);

        //カテゴリのチェックボックス用のオプション配列の作成
        $categories = Model_Category::find('all');
        $category_options = array();
        foreach ($categories as $category) {
            $category_options[$category->id] = $category->name;
        }
        //フォーム要素の追加
        $form = $fieldset->form();

        //カテゴリチェックボックスの追加
        $form->add('category_id', 'カテゴリ', array('type' => 'checkbox', 'options' => $category_options));

        //投稿ボタンの追加
        $form->add('submit', '', array('type' => 'submit', 'value' => '投稿', 'class' => 'btn medium primary'));

        //Validationの実行
        if ($fieldset->validation()->run()) {
            //Validationに成功したフィールドの読み込み
            $fields = $fieldset->validated();

            //Model_Articleオブジェクトの生成
            $article = Model_Article::forge();

            //Model_Articleオブジェクトのプロパティの設定
            $article->title = $fields['title'];
            $article->body = $fields['body'];
            $article->user_id = $fields['user_id'];

            //カテゴリIDからカテゴリオブジェクトを生成して$categoriesプロパティに設定
            if ($fields['category_id']) {
                foreach ($fields['category_id'] as $category_id) {
                    $category = Model_Category::find($category_id);
                    if ($category) {
                        $article->categories[] = $category;
                    }
                }
            }
            if ($article->save()) {
                Response::redirect('article/view/' . $article->id);
            }
        }
        $this->template->title = '新規投稿';
        $this->template->set('content', $fieldset->build(), false);
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

    public function action_login()
    {
        // 既にログイン済みであればブログトップページにリダイレクト
        Auth::check() and Response::redirect('artciles');

        // ビューに渡す配列の初期化
        $data = array();
        $data['error'] = false;

        // username と password がPOSTされている場合は、認証を試みる
        if (Input::post('username') and Input::post('password')) {
            $username = Input::post('username');
            $password = Input::post('password');
            $auth = Auth::instance();

            // 認証
            if ($auth->login($username, $password)) {
                // ブログトップにリダレイクト
                Response::redirect('article');
            } else {
                $data['error'] = true;
            }
        }

        //usernameとpasswordのいずれか一方でも送信されていない場合
        //および認証に失敗した場合はログインフォームを表示
        //ビューの読み込み
        $this->template->title = 'ログイン';
        $this->template->content = View::forge('article/login');
    }

    public function action_logout()
    {
        //ログアウト
        $auth = Auth::instance();
        $auth->logout();

        //'member'にリダイレクト
        Response::redirect('article');
    }

}