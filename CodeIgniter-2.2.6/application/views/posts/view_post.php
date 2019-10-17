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
<body>
<div class="view-content d-flex justify-content-center">
           <div class="jumbotron view">
           <h1 class="try">Chapters</h1>
            <?php
                if (!isset($posts)) 
                {
		            echo "<p>There are currently no posts on my blog.</p>";
                }else 
                {
                    foreach($posts as $row) 
                    {
                        echo "<div class='posts'>";
			            echo "<h2><a href='".base_url()."posts/post/".$row['postID']."'>".$row['title']."</a></h2>";
                        echo "<p>".strip_tags($row['post'], '0, 200')."</p>";
                        echo "<a href=' ".base_url()."posts/deletePost/".$row['postID']."' class='float-right pt-2'><button class='btn btn-primary'>Delete</button></a>";
                        echo "<a href=' ".base_url()."posts/edit_post/" .$row['postID']."' class='float-right pt-2'><button class='btn btn-primary mr-2'>Edit</button></a>";    
                        echo "<p><a href='".base_url()."posts/post/".$row['postID']."'>Read More</a></p>";        
                        echo "</div>";
                    }
                    
	            }
            ?>   
            <?=$pages?>     
                <a href="<?=base_url()?>posts/new_post" class="float-right pt-2"><button class="btn btn-primary">New Post</button></a>
            </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>