<div class="okin-landing-meta-box">
    <style scoped>
        .okin-landing-meta-box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .okin-landing-field{
            display: contents;
        }
    </style>
    <p class="meta-options okin-landing-field">
        <label for="okin_lema">Lema</label>
        <input id="okin_lema" 
	       type="text" 
	       name="okin_lema"
               value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'okin_lema', true ) ); ?>">
    </p>
    <p class="meta-options okin-landing-field">
        <label for="okin_motiv">¿Qué te motiva?</label>
        <input id="okin_motiv" 
	       type="text" 
	       name="okin_motiv"
	       value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'okin_motiv', true ) ); ?>">
    </p>
    <p class="meta-options okin-landing-field">
        <label for="okin_historia">Historia</label>
        <textarea id="okin_historia" 
	          name="okin_historia"
		  rows="6"
		  maxlength="600">
	    <?php echo esc_attr( get_post_meta( get_the_ID(), 'okin_historia', true ) ); ?>
	</textarea>
    </p>
    <p class="meta-options okin-landing-field">
        <label for="okin_metas">Metas</label>
        <textarea id="okin_metas" 
	          name="okin_metas"
		  rows="6"
		  maxlength="600">
	    <?php echo esc_attr( get_post_meta( get_the_ID(), 'okin_metas', true ) ); ?>
	</textarea>
    </p>
</div>
