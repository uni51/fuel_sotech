<div>
    <span style="font-weight: bold">投稿者：</span>
    <?php echo $article->user->name; ?>
    （<?php echo date("Y-m-d H:i:s", $article->created_at); ?>）<br>
    <?php if ($article->categories): ?>
        <span style="font-weight: bold">カテゴリー：</span>
        <?php foreach ($article->categories as $category): ?>
            <?php echo $category->name; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <hr>
</div>
<?php echo nl2br($article->body); ?>
<hr>
<?php if ($article->comments): ?>
    <div class="offset1">
        <?php foreach ($article->comments as $comment): ?>
            <div>
                <div style="font-weight: bold">
                    <?php echo $comment->user->name; ?>さんのコメント
                </div>
                <div>
                    <?php echo nl2br($comment->body); ?>
                </div>
                <div>
                    （<?php echo date("Y-m-d H:i:s", $comment->created_at); ?>）
                </div>
                <hr>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>