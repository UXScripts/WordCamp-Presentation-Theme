<?php get_header();
					global $query_string; query_posts( $query_string . '&order=ASC' );
					if ( have_posts() ) : while ( have_posts() ) : the_post(); global $wp_query; ?>
					<div id="slide-count">
						<span class="current">1</span>
						<span class="sep">/</span>
						<span class="total"><?php echo absint( $wp_query->found_posts ); ?></span>
					</div>
					<div id="slide-link">
						<a href="<?php the_permalink(); ?>" title="Click to copy a link of this slide to your clipboard">&#8734;</a>
					</div>
					<div id="copy-notice"><span>Click to copy a link of this slide to your clipboard.</span></div>
					<div id="loading"></div>
					<article id="slide" <?php post_class(); ?>>
						<hgroup>
							<h1><?php the_title(); ?></h1>
						</hgroup>
						<?php if ( has_post_thumbnail() ) : ?>
						<div id="featured-image"><?php the_post_thumbnail( 'featured-image' ); ?></div>
						<?php endif; ?>
						<?php the_content(); ?>
						<?php previous_post_link( '<div id="previous-slide">%link</div>' ); ?>
						<?php next_post_link( '<div id="next-slide">%link</div>' ); ?>
					</article>
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>
			</section>
<?php get_footer(); ?>