<?php
$page = get_post( get_the_ID() );
$slug = $page->post_name;
$img = get_post_meta($post->ID, 'bg-img', true);
$ennotation = SCF::get('en-notation');
?>

<!doctype html>
<html><head>
<?php get_template_part('inc/header-meta'); ?>
<!--各ページ毎CSS-->
<link href="<?php echo get_theme_file_uri( '/assets/css/page.css' ); ?>" rel="stylesheet" type="text/css" media="all">
</head>

<body id="pages">
<div class="bg-bk"></div>

<div class="mainvisual">
		<?php if($img){ ?>
		<img src="<?php echo wp_get_attachment_url($img) ?>">
		<?php }else{ ?>
		<img src="<?php echo get_theme_file_uri( '/assets/img/bg-img01.jpg' ); ?>" alt=""/>
		<?php } ?>
</div>

<?php get_header(); ?>

<article id="contents">

<!--main-->
<div id="main" <?php post_class(); ?>>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="content-header">
		<h1 class="content-tit" data-text="<?php echo $ennotation; ?>"><?php the_title(); ?></h1>
	</div>

<div class="contents-body">
<div class="inner">

	<div class="section-in gray">
	<?php the_content(); ?>
	</div><!--//section-in-->

</div><!--//inner-->
</div><!--//contents-body-->

<?php endwhile; ?>
</div><!--//main-->

<?php get_template_part('inc/pankuzu'); ?>
</article><!--//contents-->

<?php get_footer(); ?>

<?php get_template_part('inc/footer-scripts'); ?>

<?php wp_footer(); ?>
</body>
</html>