<html>
<head>
    <title>List of Parameters</title>
</head>
<body>
<?php foreach ($params as $key => $val): ?>
    <p>
        Parameter No. <?php echo $key; ?>:
        <?php echo $val; ?>
    </p>
<?php endforeach; ?>
</body>
</html>