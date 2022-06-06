<?php 
$term       = get_queried_object();
$term_id    = $term->term_id;
$taxonomy   = 'category';
$field_name = 'en_catnotation';
?>

<!doctype html>
<html><head>
<?php get_template_part('inc/header-meta'); ?>
<!--各ページ毎CSS-->
<link href="<?php echo get_theme_file_uri( '/assets/css/page.css' ); ?>" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_theme_file_uri( '/assets/css/archive.css' ); ?>" rel="stylesheet" type="text/css" media="all">
</head>

<body id="archive">
<div class="bg-bk"></div>
<div class="mainvisual"><img src="<?php echo get_theme_file_uri( '/assets/img/bg-img10.jpg' ); ?>" alt=""/></div>

<?php get_header(); ?>
<article id="contents">

<!--main-->
<div id="main" class="page">

	<div class="content-header">
<?php if( is_category() ) { ?>
	<h1 class="content-tit" data-text="<?php echo esc_html( SCF::get_term_meta( $term_id, $taxonomy, $field_name )); ?>"><?php single_cat_title(); ?></h1>
<?php } elseif( is_tag() ) { ?>
	<h1 class="content-tit" data-text="<?php echo esc_html( SCF::get_term_meta( $term_id, $taxonomy, $field_name )); ?>"><?php single_tag_title(); ?></h1>
<?php } elseif( is_tax() ) { ?>
	<h1 class="content-tit" data-text="<?php echo esc_html( SCF::get_term_meta( $term_id, $taxonomy, $field_name )); ?>"><?php single_term_title(); ?></h1>
<?php } elseif (is_day()) { ?>
	<h1 class="content-tit" data-text="Archive by day：<?php echo get_the_time('Y.m.d'); ?>">日付別アーカイブ：<?php echo get_the_time('Y.m.d'); ?></h1>
<?php } elseif (is_month()) { ?>
	<h1 class="content-tit" data-text="Archive by month：<?php echo get_the_time('Y.m'); ?>">月別アーカイブ：<?php echo get_the_time('Y.m'); ?></h1>
<?php } elseif (is_year()) { ?>
	<h1 class="content-tit" data-text="Archive by year：<?php echo get_the_time('Y'); ?>">年別アーカイブ：<?php echo get_the_time('Y'); ?></h1>
<?php } elseif (is_author()) { ?>
	<h1 class="content-tit" data-text="Author Archive：<?php echo esc_html(get_queried_object()->display_name); ?>">著者別 Archive：<?php echo esc_html(get_queried_object()->display_name); ?></h1>
<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1 class="content-tit" data-text="Archive">アーカイブ</h1>
<?php } ?>
	</div>

<div class="contents-body">
<div class="inner">

	<div class="section-in gray">
	
	<?php get_template_part('inc/post-list'); ?>

	<div class="section-footer">
	<?php my_pagination(); ?>
	</div>

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