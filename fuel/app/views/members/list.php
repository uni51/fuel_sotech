<html>
<head>
    <title>メンバー一覧</title>
</head>
<body>
<table>
    <?php foreach ($members as $member): ?>
        <tr>
            <td><?php echo sprintf("%05d", $member['id']); ?></td>
            <td><?php echo $member['name']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>