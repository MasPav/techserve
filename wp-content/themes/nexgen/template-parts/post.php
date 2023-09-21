<?php
/**
 * @package Nexgen
 */
?>
<div id="post-<?php the_ID(); ?>" class="col-12 item <?php echo ( has_post_thumbnail() ) ? 'with-image' : 'no-image' ?> <?php echo ( is_sticky() ) ? 'sticky' : '' ?>">
	<div class="row card p-0 text-center">
		<a href="<?php the_permalink(); ?>" class="full-link"></a>
		<div class="image-over">
			<?php if ( has_post_thumbnail() ) {
				echo get_the_post_thumbnail( $post->ID );
			} ?>
		</div>
		<div class="card-footer d-lg-flex align-items-center justify-content-center">
			<div class="post-metadata author-name d-lg-flex align-items-center mr-3">
				<i class="post-metadata-icon icon-user"></i>
				<?php echo nxg_author_display_name(); ?>
			</div>
			<div class="post-metadata publish-date d-lg-flex align-items-center">
				<i class="post-metadata-icon icon-clock"></i>
				<?php echo nxg_time_ago(); ?>
			</div>
		</div>
		<div class="card-caption col-12 p-0">
			<div class="card-body <?php echo ( get_the_excerpt() ? 'with-excerpt' : 'no-excerpt' ) ?>">
				<div class="text">
					<h4 class="post-title"><?php the_title(); ?></h4>
					<div class="post-excerpt excerpt-holder">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php if ( is_sticky() ) : ?>
			<i class="btn-icon sticky-icon icon-pin"></i>
		<?php endif; ?>
	</div>
</div>