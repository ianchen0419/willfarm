<?php
$page = get_post( get_the_ID() );
$slug = $page->post_name;
$jpnotation = SCF::get('jp-notation');
?>
<!doctype html>
<html><head>
<?php get_template_part('inc/header-meta'); ?>
<!--各ページ毎CSS-->
<link href="<?php echo get_theme_file_uri( '/assets/css/page.css' ); ?>" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_theme_file_uri( '/assets/css/post.css' ); ?>" rel="stylesheet" type="text/css" media="all">
</head>

<body id="single">
<div class="bg-bk"></div>

<div class="mainvisual">
	<?php if(get_the_post_thumbnail_url()): ?>
	<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">
	<?php else: ?>
	<img src="<?php echo get_theme_file_uri( '/assets/img/bg-img10.jpg' ); ?>">
	<?php endif; ?>
</div>

<?php get_header(); ?>

<article id="contents">

<!--main-->
<div id="main" <?php post_class(); ?>>
<?php while ( have_posts() ) : the_post(); ?>

<div class="contents-body">
<div class="inner">

	<div class="section-in gray">
		<div class="post-header">
			<h1 class="content-tit"><?php the_title(); ?></h1>
					<ul class="post-meta">
					<li class="date"><?php the_time('Y.m.d');?></li>
					<?php if(get_the_time( 'U' ) !== get_the_modified_time( 'U' )):?><li class="update">更新日：<?php the_modified_date('Y.m.d') ?></li><?php endif;?>
					<?php if ( is_singular( 'exhi' ) ): ?><?php else: ?><li class="cat"><?php the_category(','); ?></li><?php endif; ?>
				</ul>
		</div>
	
		<div class="post-body">
		<?php the_content(); ?>
		</div>
		
		<div class="post-footer">
				<div class="page-nav">
				<?php
				$next_post = get_next_post();
				$prev_post = get_previous_post();
				if( $next_post || $prev_post ):
				?>
				<?php if( $prev_post ) : ?>
						<div class="page-prev">
							<a href="<?php echo get_permalink( $prev_post->ID ); ?>" data-text="前の記事"><?php echo $prev_post->post_title; ?></a>
						</div>
				<?php endif; ?>
				<?php if( $next_post ) : ?>
					<div class="page-next">
					 <a href="<?php echo get_permalink( $next_post->ID ); ?>" data-text="後の記事"><?php echo $next_title; ?><?php echo $next_post->post_title; ?></a>
					</div>
				<?php endif; ?>
						<div class="page-back">
						<a href="<?php echo home_url('/info/'); ?>">新着一覧へ戻る</a>
						</div>
				<?php endif; ?>
				</div>
		</div>
		
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