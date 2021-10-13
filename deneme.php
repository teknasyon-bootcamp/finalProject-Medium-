<?php
    require_once("includes/db.class.php");
    include("includes/functions.php");
?>
<?php 

$allPosts=allPosts(); 
?>

<?php foreach ($allPosts as $post): ?>
	<div class="post" style="margin-left: 0px;">
		<img src="https://picsum.photos/id/237/200/300"  alt="">
		<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
			<div>
				<h3><?php echo $post['title'] ?></h3>
				<div class="info">
					<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
					<span class="read_more">Read more...</span>
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>