<p> Here is the list of all the posts </p>

<?php foreach ($posts as $post) {
	?>
	<p> <?php echo $post->author; ?>
		<a href='?controller=post&action=show&id=<?php echo $post->id; ?>'> See post </a>
	</p> <?php
} ?>