<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My blog</title>

    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <?php foreach($posts as $post): ?>
    <article>
        <?= $post ?>
    </article>
    <?php endforeach; ?>
</body>

</html>
