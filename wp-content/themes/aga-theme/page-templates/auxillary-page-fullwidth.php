<?php
/**
 * Template Name: Auxillary Page
 *
 * This is the template that displays full width page without sidebar
 *
 * @package sparkling
 */

get_header(); ?>
<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
	 <?php the_post_thumbnail( 'sparkling-full-page-half', array( 'class' => 'single-featured img-responsive' )); ?>
	
      <div class="jumbo-caption">
           
        <h1 class="entry-title"><?php the_title(); ?></h1>
       <?php if(function_exists('the_subtitle')) {
       	?>
       	<p class="subtitle"><?php echo the_subtitle();?></p>
       	<?php 
       }
       ?> 
        <p><a class="btn btn-primary" href="#primary" role="button">Learn more <i class="fa fa-angle-double-right"></i></a></p>
      </div>
    </div>
  	<div id="primary" class="content-area container-fluid white">

    	<main id="main" class="site-main" role="main">

	      <?php while ( have_posts() ) : the_post(); ?>
	
	        <?php get_template_part( 'content', 'auxillary-page' ); ?>
	        
	      <?php endwhile; // end of the loop. ?>

    	</main><!-- #main -->

	</div><!-- #primary -->

  

<?php get_footer(); ?>
