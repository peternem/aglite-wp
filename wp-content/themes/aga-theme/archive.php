<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparkling
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
            <?php $posty_counter; ?>
					<?php
						if ( is_category() ) :
                           ?>
                            <div class="jumbotron">
                                <?php if (function_exists('z_taxonomy_image')){
                                $attr = array(
                                'class' => 'single-featured img-responsive category_image',
                                'alt' => 'image alt',
                                'title' => 'category title',
                                );
                                z_taxonomy_image(NULL, 'sparkling-full-page', $attr); 
                                
                                } ?>  
                                <div class="jumbo-caption">  
                                    <h1 class="entry-title"><?php $singleCat = single_cat_title(); ?> </h1>
                                    <?php
                                    // Show an optional term description.
                                   $term_description = category_description( $category_id );
                                    if ( ! empty( $term_description ) ) :
                                        echo $term_description;
                                    endif;
                                    ?>
                                    <div class="jumbo-btn">
                                        <a class="btn btn-primary" href="#welcome" role="button">Learn more <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="breadcrumb-container">
                                <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
                            </div>
						<?php
						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'sparkling' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'sparkling' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'sparkling' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'sparkling' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'sparkling' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'sparkling' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'sparkling');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'sparkling');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'sparkling' );

						else :
							_e( 'Archives', 'sparkling' );

						endif;
					?>
            <div id="welcome" class="content-area container-fluid white">
               <div class="aga-row row">
                    <?php
                    
                    // if ( is_category() ) {
                    // $categories = get_the_category(); 
                    // echo "<pre>";
                    // print_r ($categories);
                    // echo "</pre>";
                    // }
                    ?>
                    
                    <?php
                    
                    /*******     Collections Feature Post  - Tagged: Fetured Post     ************/
                    $this_category = get_category($cat); //echo $this_category->cat_ID; 
                    query_posts("cat=$this_category->cat_ID&tag=featured-post&showposts=1"); ?>
                    <?php  while (have_posts()) : the_post(); ?>
                        <?php get_template_part('archive-single-feature'); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            <div class="aga-row row">
                    <?php $cat_slug = get_category(get_query_var('cat'))->slug; ?>
                    <?php
                    if ($cat_slug == "collections") {
                        $argsx= array(                          
                            'post_type' => 'post',
                            'category_name' => 'collections',
                            'post_type'         => 'post',
                            'posts_per_page'    => -1,
                            'meta_key'          => 'collection_rank',
                            'orderby'           => 'meta_value_num',
                            'order'             => 'ASC'
                        );
                    } else {
                        $sticky = get_option( 'sticky_posts' );
                        $argsx= array(
                            'orderby'   => 'title',
                            'order'     => 'ASC',
                            'category_name' => $cat_slug,
                            'ignore_sticky_posts' => 1, 
                            'post__not_in' => $sticky,
                            //'tag__not_in'=>array('23'),
                            'posts_per_page' => -1,
                        );
                    }

                    /*******     Collection options     ************/
                    $archive_query = new WP_Query( $argsx);
                    ?>
                    
                    <?php while( $archive_query->have_posts() ) : $archive_query->the_post(); ?>
            		<?php //while ( have_posts() ) : the_post(); ?> 
                        <?php if ($posty_counter == 0) { echo "<div class=\"aga-row row\">"; } ?>
                        <?php $posty_counter++;  ?>
                        <?php if (($posty_counter == 4) || ($posty_counter == 7) || ($posty_counter == 10)) { echo "</div><div class=\"aga-row row\">";} ?>
                        <section  id="post-<?php the_ID(); ?>" class="col-md-4 aga-box" data-post="<?php echo $posty_counter ?>">
                            <?php $this_category->cat_ID; ?>
                            <?php get_template_part( 'archive-single-option', get_post_format() ); ?>
                        </section>
            		<?php endwhile; ?>    
            		<?php wp_reset_postdata(); ?>
                </div>
            </div>
			<?php sparkling_paging_nav(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
                
            </div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>