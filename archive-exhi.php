<!doctype html>
<html><head>
<?php get_template_part('inc/header-meta'); ?>
<!--各ページ毎CSS-->
<link href="<?php echo get_theme_file_uri( '/assets/css/page.css' ); ?>" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_theme_file_uri( '/assets/css/archive.css' ); ?>" rel="stylesheet" type="text/css" media="all">
</head>

<body id="archive">
<div class="bg-bk"></div>
<div class="mainvisual"><img src="<?php echo get_theme_file_uri( '/assets/img/bg-img12.jpg' ); ?>" alt=""/></div>

<?php get_header(); ?>
<article id="contents">

<!--main-->
<div id="main" class="page">

	<div class="content-header">
		<h1 class="content-tit" data-text="EVENT">出展イベント</h1>
	</div>

<div class="contents-body">
<div class="inner">

	<div class="section-in gray">
	
<ul class="list-box-row exhi">
<?php
 global $post;
 $args = array(
     'posts_per_page' => 20,
     'post_type'=> 'exhi',
 );
 $myposts = get_posts( $args );
 foreach ( $myposts as $post ) : setup_postdata( $post ); $loopcount++;?>
<?php if ($loopcount <= 1): ?>
			<li class="fast"><a href="<?php the_permalink() ?>">
				<div class="thumb">
					 <?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail(); ?>
					 <?php else: ?>
						<img src="<?php echo get_theme_file_uri( '/assets/img/no-img.jpg' ); ?>">
					 <?php endif; ?>
				</div>
				<div class="txt-block">
				<ul class="post-data">
						<li class="data"><time><?php the_time('Y.m.d'); ?></time></li>
						<li class="whet-date">開催期間：<?php $datastart = SCF::get('data_start'); echo $datastart; ?>～<?php $dataend = SCF::get('data_end'); echo $dataend; ?></li>
				</ul>
				<h2 class="post-tit"><?php the_title(); ?></h2>

				</div>
			</a></li>
	<?php else: ?>
				<li><a href="<?php the_permalink() ?>">
				<div class="thumb">
					 <?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail(); ?>
					 <?php else: ?>
						<img src="<?php echo get_theme_file_uri( '/assets/img/no-img.jpg' ); ?>">
					 <?php endif; ?>
				</div>
				<div class="txt-block">
					<ul class="post-data">
						<li class="data"><time><?php the_time('Y.m.d'); ?></time></li>
						<li class="whet-date">開催期間：<?php $datastart = SCF::get('data_start'); echo $datastart; ?>～<?php $dataend = SCF::get('data_end'); echo $dataend; ?></li>
					</ul>
				<h2 class="post-tit"><?php the_title(); ?></h2>
				</div>
			</a></li>
	
	
	<?php endif; ?>
	<?php endforeach;wp_reset_postdata(); ?>
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