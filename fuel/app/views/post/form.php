<!DOCTYPE HTML>
<html>
<meta charset="UTF-8">
<body>
<form action="/post/save" accept-charset="utf-8" method="post">
    <p>
        <label for="form_title">件名</label>
        <input name="title" value="" type="text" id="form_title">
    </p>
    <p>
        <label for="form_summary">概要</label>
        <input name="summary" value="" type="text" id="form_summary">
    </p>
    <p>
        <label for="form_body">本文</label>
        <textarea cols="60" rows="8" name="body" id="form_body"></textarea>
    </p>
    <div class="actions">
        <input name="submit" value="投稿" type="submit" id="form_submit">
    </div>
</form>
</body>
</html>