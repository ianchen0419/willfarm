<?php
 	$datastart = SCF::get('data_start');
	$dataend = SCF::get('data_end');
?>
	<div class="box"><a href="<?php the_permalink() ?>">
		<div class="thumb">
			<?php if ( has_post_thumbnail() ): ?>
				<?php the_post_thumbnail(); ?>
			<?php else: ?>
				<img src="<?php echo get_theme_file_uri( '/assets/img/no-img.jpg' ); ?>">
			<?php endif; ?>
		</div>
		<div class="box-bottom">
				<ul class="post-data">
				<li class="data"><time><?php the_time('Y.m.d'); ?></time></li>
				<li class="whet-date">開催期間：<?php echo $datastart; ?>～<?php echo $dataend; ?></li>
				</ul>
				<h3 class="post-tit"><?php the_title(); ?></h3>
		</div>
	</a></div><!--//box-->