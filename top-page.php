<section id="ourbusiness" class="section-block">
	<div class="inner">
	<h2 title="事業内容">OUR BUSINESS</h2>
	
	<div class="section-in">
	
		<ul class="list-box">
<!-- 			<li class="tit"><h3 title="機能性原料の総合プロデュース">Products</h3><a href="<?php echo home_url('/material/'); ?>" class="more-link"></a></li> -->
			<li><a href="<?php echo home_url('/material/material-nutroxsun/'); ?>"><img src="<?php echo get_theme_file_uri( '/assets/img/top-nutroxsun-img.jpg' ); ?>" alt="NutroxSun"/>
			<span><img src="<?php echo get_theme_file_uri( '/assets/img/material-logo_nutroxsun.png' ); ?>" alt="NutroxSun"/></span>
			</a></li>
			<li><a href="<?php echo home_url('/material/material-zeropollution/'); ?>"><img src="<?php echo get_theme_file_uri( '/assets/img/top-zerop.jpg' ); ?>" alt="Zeropollution"/>
			<span><img src="<?php echo get_theme_file_uri( '/assets/img/logo-zerop.png' ); ?>" alt="Zeropollution"/></span>
			</a></li>
			<li><a href="<?php echo home_url('/material/material-beaulixir/'); ?>"><img src="<?php echo get_theme_file_uri( '/assets/img/top-beaulixir.jpg' ); ?>" alt="beaulixir"/>
			<span><img src="<?php echo get_theme_file_uri( '/assets/img/material-logo_beaulixir.png' ); ?>" alt="beaulixir"/></span>
			</a></li>
			</a></li>
			<li><a href="<?php echo home_url('/material/material-tetrasod/'); ?>"><img src="<?php echo get_theme_file_uri( '/assets/img/top-tetrasod-img.jpg' ); ?>" alt="TestraSOD"/>
			<span><img src="<?php echo get_theme_file_uri( '/assets/img/material-logo_tetrasod.png' ); ?>" alt="TestraSOD"/></span>
			</a></li>
			<li><a href="<?php echo home_url('/material/material-metabolaid/'); ?>"><img src="<?php echo get_theme_file_uri( '/assets/img/top-metabolaid-img.jpg' ); ?>" alt="metabolaid"/>
			<span><img src="<?php echo get_theme_file_uri( '/assets/img/material-logo_metabolaid.png' ); ?>" alt="metabolaid"/></span>
			</a></li>
		</ul>
		
		<ul class="list-box">
		<li class="willc"><h3 title="オリシジナルブランドWILLCOSME">Personal care<span>Willcosme</span></h3><a href="<?php echo home_url('/our-business/#willcosme'); ?>" class="more-link"></a></li>
			<li><a href="https://willcosme.co.jp/brand/#cogao" target="new"><img src="<?php echo get_theme_file_uri( '/assets/img/top-brand_01.jpg' ); ?>" alt="cogao"/>
			<span><img src="<?php echo get_theme_file_uri( '/assets/img/logo-cogao.png' ); ?>" alt="cogao"/></span>
			</a></li>
			<li><a href="https://willcosme.co.jp/brand/#nutroxsun" target="new"><img src="<?php echo get_theme_file_uri( '/assets/img/top-brand_02.jpg' ); ?>" alt="nutroxsun"/>
			<span><img src="<?php echo get_theme_file_uri( '/assets/img/logo_bl-sun.png' ); ?>" alt="nutroxsun"/></span>
			</a></li>
	</ul>
	
	</div><!--//section-in-->
	
</div><!--//inner-->
</section><!--//ourbusiness-->

<section id="news" class="section-block">
	<div class="no-inner">
		<h2 title="更新情報＆お知らせ">NEWS<span>＆INFORMATION</span></h2>
	
	<div class="section-in gray">
	<?php
		$args = array( 
			'category_name' => 'info',
			'posts_per_page' => 4
			);
			$customPosts = get_posts($args);
	?>
	<?php if( $customPosts ): ?>
	<dl class="info-list cl">
		<?php foreach( $customPosts as $post) : setup_postdata( $post ); ?>
		  <?php 
				$cat = get_the_category();
				$cat_slug = $cat[0]->slug;
				$cat_name = $cat[0]->name;
			?>
			<dt><time><?php the_time('Y.m.d'); ?></time><span class="cat-<?php echo $cat_slug; ?>"><?php echo $cat_name; ?></span></dt>
			<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
		<?php endforeach; ?>
	</dl>
	<?php endif; wp_reset_postdata(); ?>
	<div class="btn-right">
		<a href="<?php echo home_url('/info/'); ?>" class="btn btn-s">一覧へ</a>
	</div>
		
	</div><!--//section-in-->
	
	</div><!--//inner-->
</section><!--//news-->

<section id="event" class="section-block">
	<div class="inner">
	<h2 title="イベント＆展示会">EVENT</h2>
	
	<div class="section-in">
	
	<div class="col-list shadowbox">
	<?php
 global $post;
 $args = array(
     'posts_per_page' => 4,
     'post_type'=> 'exhi',
 );
 $myposts = get_posts( $args );
 foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<?php get_template_part('inc/post-event'); ?>
<?php endforeach;wp_reset_postdata(); ?>
	</div><!--//col-list-->
	
	<div class="btn-center">
		<a href="<?php echo home_url('/exhi/'); ?>" class="btn btn-m">イベント一覧を見る</a>
	</div>
	
	</div><!--//section-in-->
	
	</div><!--//inner-->
</section><!--//event-->