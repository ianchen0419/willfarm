<!doctype html>
<html><head>
<?php get_template_part('inc/header-meta'); ?>
<!--各ページ毎CSS-->
<link href="<?php echo get_theme_file_uri( '/assets/css/page.css' ); ?>" rel="stylesheet" type="text/css" media="all">
</head>

<body id="pages">
<div class="bg-bk"></div>
<div class="mainvisual"><img src="<?php echo get_theme_file_uri( '/assets/img/bg-img01.jpg' ); ?>" alt=""/></div>

<?php get_header(); ?>
<article id="contents">

<!--main-->
<div id="main" class="page">
	<div class="content-header">
		<h1 class="content-tit" data-text="404 Not Found">お探しのページが見つかりませんでした</h1>
	</div>

<div class="contents-body">
<div class="inner">

	<div class="section-in wt">
	
	<p class="txt-center">お探しのページは見つかりませんでした。</p>
	<p class="txt-center">あなたがアクセスしようとしたページは削除されたかURLが変更されているため、見つけることができません。</p>
	
	<div class="btn-center">
		<a href="<?php echo home_url('/'); ?>" class="btn btn-m">トップページへ戻る</a>
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