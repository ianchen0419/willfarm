<!doctype html>
<html><head>
<?php get_template_part('inc/header-meta'); ?>
<!--各ページ毎CSS-->
<link href="<?php echo get_theme_file_uri( '/assets/css/home.css' ); ?>" rel="stylesheet" type="text/css" media="all">
</head>

<body id="home">
<div id="loading">
  <div class="loader"></div>
</div>


<?php get_header(); ?>
<!--main-->
<div id="contents">

<div class="top-mainvisual">
	<video autoplay muted playsinline webkit-playsinline loop poster="<?php echo get_theme_file_uri( '/assets/img/bg-img01.jpg' ); ?>" id="bg-video">
		<source src="<?php echo get_theme_file_uri( '/assets/video/wf-bgmovie3.mp4' ); ?>" type="video/mp4">
		<p>動画を再生するには、videoタグをサポートしたブラウザが必要です。</p>
	</video>
	<a href="#main" class="scrollarrow"><span></span>Scroll</a>
</div>
<script>
	window.addEventListener('click', function(){
		document.querySelector('#bg-video').muted=false;
	})
</script>

<div id="main" class="home">
<?php get_template_part('top-page'); ?>
</div><!--//main-->
</div><!--//contents-->

<?php get_footer(); ?>

<?php get_template_part('inc/footer-scripts'); ?>

<?php wp_footer(); ?>
</body>
</html>