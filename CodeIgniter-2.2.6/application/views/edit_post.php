<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="<?php base_url()?>/css/style.css">
<title>Title</title>
</head>
<body class="d-flex flex-wrap justify-content-center align-content-center">
    <div class="new-post">
        <h1>New Post</h1>
        <form method="post" action="<?=base_url()?>posts/edit_post/<?=$post['postID']?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" class="form-control" type="text" name="title" required value="<?=$post['title']?>">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="post" rows="2" required><?=$post['post']?></textarea>
            </div>

            <button class="btn btn-primary float-right" type="submit">Submit</button>
        </form>
    <div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>