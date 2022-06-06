<?php if ( have_posts() ) :  ?>
	<dl class="info-list cl">
		<?php while ( have_posts() ) : the_post(); ?>
		  <?php 
				$cat = get_the_category();
				$cat_slug = $cat[0]->slug;
				$cat_name = $cat[0]->name;
			?>
			<dt><time><?php the_time('Y.m.d'); ?></time><span class="cat-<?php echo $cat_slug; ?>"><?php echo $cat_name; ?></span></dt>
			<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
		<?php endwhile; ?>
	</dl>
<?php endif; ?>