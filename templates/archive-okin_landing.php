<?php
/**
 * The template for displaying archive landng pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Okin_Plugin
 */

	// Args for landing post type query 
	$args = array( 'post_type' => 'okin_landing', 
		       'tax_query' => array (
			    array (
				'taxonomy' => 'cat_okin',
				'field' => 'slug',
				'terms' => array ('crossfit', 'fitness'),
			)
		     ),
		       'posts_per_page' => 10
		     );
	$the_query = new WP_Query( $args ); 
	?>
	<?php if ( $the_query->have_posts() ) : ?>
	    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		    <div class="okin-atletas-wrapper"><?php
		        if ( $i % 2 == 0 ) {?>
			<div class="row"><?php
		        } ?>
			<div class="atleta">
			    <div class="atleta-img">
		                <h2 class="atleta-title"><?php the_title(); ?></h2>
				<h4 class="atleta-lema"><?php echo esc_attr( get_post_meta( get_the_ID(), 'okin_lema', true ) ); ?></h4>
		                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a> 
			    </div>
			</div><?php
			$i++;
			if ( $i != 0 && $i % 2 == 0 ) {?>
			</div><?php
			}?>
		    </div><?php
	 	    endwhile;

	        else:  ?>
	         <p><?php //_e( 'Sorry, no posts matched your criteria.' ); ?></p><?php

	      endif; 

	      wp_reset_postdata(); 

