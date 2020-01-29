<?php echo Html::doctype('html5');?>
<html>
    <head>
        <?php echo Html::meta('charset', 'utf-8');?>
        <title><?php echo $title; ?></title>
    </head>

    <body>
        <?php //echo $content; ?>
        <?php echo View::forge('content'); ?>
        <hr>
        &COPY; 2012 Seiji Hayakawa
    </body>
</html>
