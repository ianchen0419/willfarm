<header id="header">
	<h1 class="logo"><a href="<?php echo home_url('/'); ?>" title="Willfarm Co.,Ltd">ウィルファーム</a></h1>

	<div class="head-right">
	<div class="menubtn"><a href="#" id="jq-open-btn"><span class="open-btn-icon"></span></a></div>
	<nav class="gnav">
		<ul>
			<li><a href="<?php echo home_url('/about-us/'); ?>">会社概要</a></li>
			<li><a href="<?php echo home_url('/story/'); ?>">ストーリー</a></li>
			<li><a href="<?php echo home_url('/our-business/'); ?>">事業内容</a></li>
			<li><a href="<?php echo home_url('/material/'); ?>">原料紹介</a></li>
			<?php if(is_mobile()){ ?>
			<li><a href="<?php echo home_url('/info/'); ?>">新着情報</a></li>
			<li><a href="<?php echo home_url('/exhi/'); ?>">イベント</a></li>
			<?php } ?>
			<li class="mail"><a href="<?php echo home_url('/contact/'); ?>">資料請求・お問い合わせ</a></li>
		</ul>
	</nav>
	</div><!--//head-right-->
</header>