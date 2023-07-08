<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Post</title>

    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <article>
        <h1><?= $post->title ?></h1>
        <div>
            <?= $post->body ?>
        </div>
    </article>

    <a href="/">Go back</a>
</body>

</html>
