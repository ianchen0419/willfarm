<?php
$page = get_post( get_the_ID() );
$slug = $page->post_name;
$img = get_post_meta($post->ID, 'bg-img', true);
$ennotation = SCF::get('en-notation');
$brandlogo = SCF::get('brand_logo');
?>

<!doctype html>
<html><head>
<?php get_template_part('inc/header-meta'); ?>
<!--各ページ毎CSS-->
<link href="<?php echo get_theme_file_uri( '/assets/css/page.css' ); ?>" rel="stylesheet" type="text/css" media="all">
</head>

<body id="material">
<div class="bg-bk"></div>

<div class="mainvisual">
		<?php if($img){ ?>
		<img src="<?php echo wp_get_attachment_url($img) ?>">
		<?php }else{ ?>
		<img src="<?php echo get_theme_file_uri( '/assets/img/bg-img04.jpg' ); ?>" alt=""/>
		<?php } ?>
</div>

<?php get_header(); ?>

<article id="contents">

<!--main-->
<div id="main" class="page">
<?php while ( have_posts() ) : the_post(); ?>
	<div class="content-header">
		<h1 class="content-tit" data-text="<?php echo $ennotation; ?>"><?php the_title(); ?></h1>
	</div>
	
	<div class="material-link">
		<div class="material-warp">		
		<ul>
      			<li><a href="/material/material-nutroxsun/"><img src="<?php echo get_theme_file_uri( '/assets/img/material-logo_nutroxsun.png' ); ?>" alt="ニュートロックスサン"></a></li>
			<li><a href="/material/material-zeropollution/"><img src="<?php echo get_theme_file_uri( '/assets/img/logo-zerop@2x.png' ); ?>" alt="ゼロポリューション"/></a></li>
			<li><a href="/material/material-beaulixir/"><img src="<?php echo get_theme_file_uri( '/assets/img/material-logo_beaulixir.png' ); ?>" alt="ナトゥールシン・ビュリクシール"></a></li>
			<li><a href="/material/material-tetrasod/"><img src="<?php echo get_theme_file_uri( '/assets/img/material-logo_tetrasod.png' ); ?>" alt="テトラSOD"></a></li>
			<li><a href="/material/material-metabolaid/"><img src="<?php echo get_theme_file_uri( '/assets/img/material-logo_metabolaid.png' ); ?>" alt="メタボレイド"></a></li>
		</ul>
		</div>
		<div class="next-btn">＞</div>
	</div>

<div class="contents-body" id="<?php echo $slug; ?>">
<div class="inner">

	<div class="section-in wt">
	
		<?php if(!empty($brandlogo)):?>
			<div title="<?php echo $jpnotation; ?>"><span class="brand-logo"><img src="<?php echo wp_get_attachment_url($brandlogo) ?>" alt="<?php the_title(); ?>"></span></div>
		<?php endif; ?>
		<?php remove_filter('the_content', 'wpautop'); ?>
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