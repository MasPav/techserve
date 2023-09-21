<?php
/**
 * @package Nexgen
 */

// Single
$cat_list = get_the_category();
$tag_list = get_the_tags();

while ( have_posts() ) : the_post();
?>
<div class="navbar-holder"></div>
<section id="post-<?php the_ID(); ?>" <?php post_class( 'content-area content-section single single-post' ); ?>>
	<div class="container main"> 
		<div class="row content">
			<div class="main-area col-12 <?php echo is_active_sidebar( 'sidebar-1' ) && ! nxg_is_woocommerce_page() ? 'col-lg-8 ' : 'col-lg-12' ?>">
        <nav class="intro-item intro-breadcrumb" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <?php get_breadcrumb(); ?>
          </ol>
        </nav>

				<?php if ( ! nxg_is_woocommerce_page() ) : ?>

					<h1 class="intro-item intro-title entry-title"><?php the_title(); ?></h1>					
					<div class="intro-item intro-meta post-meta row mx-auto ml-lg-0">
						<div class="col-12 p-0 align-self-center">
							<?php echo nxg_posted_by(); ?>
							<?php echo nxg_posted_on(); ?>

							<?php if ( comments_open() ) : ?>
								<span class="comment">
									<a href="#comments" class="smooth-anchor"><i class="fas fa-comment-dots"></i><?php echo nxg_comment_count(); ?></a>
								</span>
							<?php endif; ?>

						</div>
					</div>
					<div class="intro-item intro-image">
						<?php the_post_thumbnail(); ?>
					</div>

				<?php endif; ?>

				<div class="row block-content">
					<div class="col-12 p-0">
						<?php the_content(); ?>
					</div>
				</div>	
			</div>
      
      <?php if ( is_active_sidebar( 'sidebar-1' ) && ! nxg_is_woocommerce_page() ) : ?>
        
        <aside class="col-12 col-lg-4 pl-lg-5 float-right right sidebar">
          <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </aside>
      
      <?php endif; ?>
      
		</div>
	</div>
	<div class="container taxonomy"> 
		<?php if ( ! empty( $tag_list ) ) : ?>

			<div class="row block-tags">
				<div class="col-12 p-0">
					<i class="fas fa-tags mr-2"></i>
					<div class="tags">
						<?php foreach ( $tag_list as $tag ) : ?>
						
							<a href="<?php echo get_tag_link( $tag->term_id ); ?>" class="tag">
								<?php echo esc_html( $tag->name ); ?>
							</a>

						<?php endforeach; ?>
					</div>							
				</div>
			</div>

		<?php endif; ?>

		<?php if ( ! empty( $cat_list ) ) : ?>

			<div class="row block-categories">
				<div class="col-12 p-0">

					<?php foreach ( $cat_list as $category ) : ?>

						<div class="badges">
							<a href="<?php echo get_category_link( $category->term_id ); ?>" class="badge"><?php echo esc_html( $category->name ); ?></a>
						</div>

					<?php endforeach; ?>
					
				</div>
			</div>

		<?php endif; ?>

		<?php if ( comments_open() ) : ?>

			<hr>
			<div id="comments" class="row block-comments">
				<div class="col-12 p-0">
					<?php if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>
				</div>
			</div>

		<?php endif; ?>
	</div>

</section>
<?php
endwhile;