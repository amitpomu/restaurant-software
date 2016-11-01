<?php include ('inc/header.php'); ?>

<div class="text-center">
	<h1 class="cursive intro">Welcome To <?php the_title(); ?></h1>

	<img src="uploads/<?php the_image(); ?>" class="img-thumbnail" width="500">

	<h1 class="cursive"><?php echo $_SESSION['username']; ?></h1>
	<h3 class="cursive">Till No. <?php echo $_SESSION['till']; ?></h3>
</div>

<?php include ('inc/footer.php'); ?>
<?php query_close(); ?>	