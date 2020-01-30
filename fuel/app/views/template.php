<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <style>
        body { margin: 50px; }
        .page-links a{margin:0 10px}
        .page-links .active{margin:0 10px; text-decoration: underline}
        label{float:none;}
    </style>
</head>
<body>
<div class="topbar">
    <div class="fill">
        <div class="container">
            <h3><?php echo Html::anchor('article', 'FuelPHP入門ブログ');?></h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="span16">
            <h1><?php echo $title; ?></h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="span16">
            <?php echo $content; ?>
        </div>
    </div>
</div>
</body>
</html>