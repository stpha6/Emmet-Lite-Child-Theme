<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
	 function my_theme_enqueue_styles() { 
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
 		  }


//show portfolio on portfolio page and show more posts than home
add_filter ('mp_emmet_portfolio_posts_per_page', 'my_theme_portfolio_posts_per_page');

function my_theme_portfolio_posts_per_page() {
if ( is_page(215)) {
echo '<style>div.section-buttons { display:none; }</style>';

return 20;
}
else { return 8; }
}