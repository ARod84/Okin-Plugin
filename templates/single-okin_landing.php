<?php
/**
 * The template for displaying all landing pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package eCommerce_Gem
 */

get_header('okin_landing');

    //The Loop
    while ( have_posts() ) : the_post(); ?>

	<!--================Coupon Modal=================-->
        <div id="modal-okin-coupon" class="modal-okin-coupon" style="display:none;">
            <div class="modal-coupon-content">
	        <div class="modal-coupon-inner">
	            <h5 class="okin-coupon-title">Usa este código al realizar tu compra:</h5>
	            <p class="coupon">atletas-okin-Z3NX</p>
	        </div>
            </div>
        </div>
	<!--================End Coupon Modal =================-->

	<!--================Slider Area =================-->
	<section class="landing">
	    <div id="landing-slide" class="landing-slide-wrapper">
		<ul><?php
                $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID) );

		  echo '<li class="landing-slide-overlay1 mySlides fade" style="background: url('. $url .');background-size: 100% auto;">'; ?>
		  <div class="container">
		      <div class="landing-slide-caption">
		          <h6 class="landing-title"><?php echo esc_attr( get_post_meta( get_the_ID(), "okin_lema", true ) ); ?></h6>
		  	  <h1 class="landing-title"><?php the_title(); ?></h1>
		  	  <h3 class="landing-title"><?php echo esc_attr( get_post_meta( get_the_ID(), "okin_motiv", true ) ); ?></h3>
		  	  <p class="landing-subtitle"><?php echo esc_attr( get_post_meta( get_the_ID(), "okin_historia", true ) ); ?></p>
		  	  <div class="action-buttons">
		  	      <div class="landing-button primary-btn swing"><a onclick="coupon()" href="#modal-okin-coupon">Obtén un cupón</a></div>
		  	      <div class="landing-button secondary-btn swing"><a href="<?php echo home_url('/tienda/', 'https'); ?>">Ver Tienda</a></div>
		  	  </div>
		  	  </div>
		  	      <div class="action-list">
		  	      <i onclick="plusSlides(1)" class="fas fa-angle-right fa-8x"></i>
		  	  </div>
		      </div>
	          </li>
		  <?php
		  echo '<li class="landing-slide-overlay2 mySlides fade" style="background: url('. $url .');background-size: 100% auto;">'; ?>
		      <i onclick="plusSlides(-1)" class="fas fa-angle-left fa-6x left"></i>
		      <div class="landing-slide-caption">
			  <h1 class="landing-title slide2"><?php the_title(); ?></h1>
			  <p class="landing-subtitle slide2"><?php echo esc_attr( get_post_meta( get_the_ID(), "okin_metas", true ) ); ?></p>
		      </div>
	          </li>
		</ul>
	    </div>
	</section>
	<!--================End Slider Area =================-->

	<!--================ Landing Option =================-->
        <section class="landing-option">
  	    <div class="landing-option-first">
		<div class="option">
		    <h6 class="option-sub">¿Quieres conocer a <?php the_author(); ?>?</h6>
		    <h1 class="option-sub">Próximos eventos</h1>
		    <p class="option-sub">Eventos Okin es una selección de los mejores eventos de CrossFit. Entérate de los próximos eventos de tu Atleta Okin.</p>
		    <div class="landing-button secondary-btn swing"><a href="<?php echo home_url( '/category/eventos/', 'https' ); ?>">Ver Eventos</a></div>
		</div>
	    </div>
	    <div class="landing-option-second">
		<div class="option">
		    <h6 class="option-sub">¿Qué es un Atleta Okin?</h6>
		    <h1 class="option-sub">Atletas Okin</h1>
		    <p class="option-sub">Un Atleta Okin es una figura referencia en el mundo del CrossFit, que además representa la autenticidad y excelencia de la marca.</p>
		    <div class="landing-button secondary-btn swing"><a href="<?php echo home_url( '/atletas-okin/', 'https' ); ?>">Ver Atletas</a></div>
		</div>
	    </div>
	</section>
        <!--================End Landing Option =================-->

	<!--================ Description =================-->
	<section class="landing">
	    <div class="landing-description">
	        <div class="landing-description-text">
	            <!--================ CTA Area =================-->
	            <div class="landing-action">
			<div id ="join" class="landing-action-action">
		            <h1 class="landing-title action">¡Únete al Club Okin!</h1>
			    <h6 class="landing-title">Entérate de nuestras promociones, descuentos y eventos exclusivos.</h6>
		    	    <div class="landing-form">
              <!-- form template here -->  
		          </div>
		        </div>
	            </div><!--================ End CTA Area =================-->
                </div><!--========= End of Description Text ===========-->
            </div>
        </section>
        <!--================ End of Description =================-->



<?php endwhile; ?>
		</main><!-- #main -->
	</div--><!-- #primary -->

<?php

get_footer();
