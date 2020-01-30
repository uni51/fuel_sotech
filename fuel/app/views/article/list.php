<?php foreach ($articles as $article): ?>
    <h2>
        <a href="<?php echo Uri::create('article/view/' . $article->id); ?>">
            <?php echo $article->title; ?>
        </a>
    </h2>
    <span style="font-weight: bold">投稿者：</span>
    <?php echo $article->user->name; ?>
    （<?php echo date("Y-m-d H:i:s", $article->created_at); ?>）<br>
    <?php if ($article->categories): ?>
        <span style="font-weight: bold">カテゴリー：</span>
        <?php foreach ($article->categories as $category): ?>
            <?php echo $category->name; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if ($article->comments): ?>
        <br>
        <span style="font-weight: bold">コメント：</span>
        <?php echo count($article->comments) ?>件
    <?php endif; ?>
    <hr>
<?php endforeach; ?>
<?php echo $pagination ?>