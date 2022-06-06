<!doctype html>
<html><head>
<?php get_template_part('inc/header-meta'); ?>
<!--各ページ毎CSS-->
<link href="<?php echo get_theme_file_uri( '/assets/css/page.css' ); ?>" rel="stylesheet" type="text/css" media="all">
</head>

<body id="material">
<div class="bg-bk"></div>
<div class="mainvisual"><img src="<?php echo get_theme_file_uri( '/assets/img/bg-img04.jpg' ); ?>" alt=""/></div>

<?php get_header(); ?>
<article id="contents">

<!--main-->
<div id="main" class="page">
	<div class="content-header">
		<h1 class="content-tit" data-text="MATERIAL"></h1>
	</div>

<div class="contents-body">
<div class="inner">

	<div class="section-in gray">
		<div class="gradation-txt pxlarge">ウィルファームは、世界で実績のある厳選された<br class="pc-only">原料素材を総合的にプロデュースしています。</div>
	
<ul class="list-box-row">
<?php
 global $post;
 $args = array(
     'posts_per_page' => -1,
     'post_type'=> 'material',
 );
 $myposts = get_posts( $args );
 foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<li><a href="<?php the_permalink() ?>">
				<div class="thumb">
					 <?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail(); ?>
					 <?php else: ?>
						<img src="<?php echo get_theme_file_uri( '/assets/img/no-img.jpg' ); ?>">
					 <?php endif; ?>
				</div>
				<div class="txt-block">
					<?php $brandlogo = get_post_meta($post->ID, 'brand_logo', true); ?>
					<img src="<?php echo wp_get_attachment_url($brandlogo) ?>">
					<h3 class="catch"><?php $myexcerpt = get_the_excerpt($post->ID); echo nl2br($myexcerpt); ?></h3>
				</div>
			</a></li>
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