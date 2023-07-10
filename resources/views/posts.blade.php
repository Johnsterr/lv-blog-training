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
        <h2>
            <a href="/posts/<?= $post->slug ?>">
                {{ $post->title }}
            </a>
        </h2>
        <div>
            <?= $post->excerpt ?>
        </div>
    </article>
    <?php endforeach; ?>
</body>

</html>
