<!doctype html>
<html><head>
<?php get_template_part('inc/header-meta'); ?>
<!--各ページ毎CSS-->
<link href="<?php echo get_theme_file_uri( '/assets/css/page.css' ); ?>" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_theme_file_uri( '/assets/css/archive.css' ); ?>" rel="stylesheet" type="text/css" media="all">
</head>

<body id="archive">
<div class="bg-bk"></div>
<div class="mainvisual"><img src="<?php echo get_theme_file_uri( '/assets/img/bg-img05.jpg' ); ?>" alt=""/></div>

<?php get_header(); ?>
<article id="contents">

<!--main-->
<div id="main" class="page">

	<div class="content-header">
		<h1 class="content-tit" data-text="MOVIE">動画一覧</h1>
	</div>

<div class="contents-body">
<div class="inner">

	<div class="section-in gray">
		<div class="description">プロモーションビデオ、ウィルファームの取扱原料の商品説明の動画を紹介します。</div>
		
		<ul class="movie-list fast">
<?php
   $newslist = get_posts( array(
    'category_name' => 'movie',
    'posts_per_page' => 2,
		));
    foreach( $newslist as $post ): setup_postdata( $post );
?>
			<li><a href="<?php the_permalink(); ?>" class="movie_card">
				<?php if ( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail(); ?>
				<?php else: ?>
					<img src="<?php echo get_theme_file_uri( '/assets/img/no-img.jpg' ); ?>">
				<?php endif; ?>
				<div class="card-bottom">
				<h2 class="post-tit"><?php $movie_tit = SCF::get('movie_tit'); echo $movie_tit; ?></h2>
				<p class="lede"><?php $myexcerpt = get_the_excerpt($post->ID); echo nl2br($myexcerpt); ?></p>
				</div>
			</a></li>
		<?php endforeach; wp_reset_postdata(); ?>
		</ul>
		
		<ul class="movie-list">
	<?php
   $newslist = get_posts( array(
    'category_name' => 'movie',
    'posts_per_page' => 12,
		'offset' => 2
		));
    foreach( $newslist as $post ): setup_postdata( $post );
?>
			<li><a href="<?php the_permalink(); ?>" class="movie_card">
				<?php if ( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail(); ?>
				<?php else: ?>
					<img src="<?php echo get_theme_file_uri( '/assets/img/no-img.jpg' ); ?>">
				<?php endif; ?>
				<div class="card-bottom">
				<h2 class="post-tit"><?php $movie_tit = SCF::get('movie_tit'); echo $movie_tit; ?></h2>
				<p class="lede"><?php $myexcerpt = get_the_excerpt($post->ID); echo nl2br($myexcerpt); ?></p>
				</div>
			</a></li>
	<?php endforeach; wp_reset_postdata(); ?>
		</ul>	
		
	</div><!--//section-in-->

</div><!--//inner-->
</div><!--//contents-body-->

</div><!--//main-->

<?php get_template_part('inc/pankuzu'); ?>
</article><!--//contents-->

<?php get_footer(); ?>

<?php get_template_part('inc/footer-scripts'); ?>

<?php wp_footer(); ?>
</body>
</html>