<?php

function override_parent() {

remove_shortcode( 'et_pb_fullwidth_portfolio','et_pb_fullwidth_portfolio');

add_shortcode( 'et_pb_fullwidth_portfolio', 'et_pb_fullwidth_portfolio_custom' );

}

add_action ('wp','override_parent', 20);





function et_pb_fullwidth_portfolio_custom ( $atts ) {

extract( shortcode_atts( array(

'title' => '',

'module_id' => '',

'module_class' => '',

'fullwidth' => 'on',

'include_categories' => '',

'posts_number' => '',

'show_title' => 'on',

'show_date' => 'on',

'background_layout' => 'light',

'auto' => 'off',

'auto_speed' => 7000,

), $atts

) );



$args = array();

if ( is_numeric( $posts_number ) && $posts_number > 0 ) {

$args['posts_per_page'] = $posts_number;

} else {

$args['nopaging'] = true;

}



if ( '' !== $include_categories ) {

$args['tax_query'] = array(

array(

'taxonomy' => 'project_category',

'field' => 'id',

'terms' => explode( ',', $include_categories ),

'operator' => 'IN'

)

);

}



$projects = et_divi_get_projects( $args );



ob_start();

if( $projects->post_count > 0 ) {

while ( $projects->have_posts() ) {

$projects->the_post();

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_portfolio_item ' ); ?>>

<?php

$thumb = '';



$width = 320;

$width = (int) apply_filters( 'et_pb_portfolio_image_width', $width );



$height = 241;

$height = (int) apply_filters( 'et_pb_portfolio_image_height', $height );



list($thumb_src, $thumb_width, $thumb_height) = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array( $width, $height ) );



$orientation = ( $thumb_height > $thumb_width ) ? 'portrait' : 'landscape';



if ( '' !== $thumb_src ) : ?>

<div class="et_pb_portfolio_image <?php echo esc_attr( $orientation ); ?>">

<a href="<?php echo $thumb_src; ?>" class="et_pb_lightbox_image">

<img src="<?php echo esc_attr( $thumb_src ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/>

<div class="meta">

<span class="et_overlay"></span>



<?php if ( 'on' === $show_title ) : ?>

<h3><?php the_title(); ?></h3>

<?php endif; ?>



<?php if ( 'on' === $show_date ) : ?>

<p class="post-meta"><?php echo get_the_date(); ?></p>

<?php endif; ?>

</div>

</a>

</div>

<?php endif; ?>

</div>

<?php

}

}



wp_reset_postdata();



$posts = ob_get_clean();



$class = " et_pb_bg_layout_{$background_layout}";



$output = sprintf(

'<div%4$s class="et_pb_fullwidth_portfolio %1$s%3$s%5$s" data-auto-rotate="%6$s" data-auto-rotate-speed="%7$s">

%8$s

<div class="et_pb_portfolio_items clearfix" data-columns="">

%2$s

</div><!-- .et_pb_portfolio_items -->

</div> <!-- .et_pb_fullwidth_portfolio -->',

( 'on' === $fullwidth ? 'et_pb_fullwidth_portfolio_carousel' : 'et_pb_fullwidth_portfolio_grid clearfix' ),

$posts,

esc_attr( $class ),

( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),

( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' ),

( '' !== $auto && in_array( $auto, array('on', 'off') ) ? esc_attr( $auto ) : 'off' ),

( '' !== $auto_speed && is_numeric( $auto_speed ) ? esc_attr( $auto_speed ) : '7000' ),

( '' !== $title ? sprintf( '<h2>%s</h2>', esc_html( $title ) ) : '' )

);



return $output;

}

function movies_register_post_type() {

register_post_type(
'project',
array(
'labels' => array(
'name' => __('Fotos'),
'singular_name' => __('Fotos')
),
'public' => true,
'has_archive' => true,
'rewrite' => array(
'slug' => 'fotos'
)
)
);

} // end example_register_post_type
add_action('wp_loaded', 'movies_register_post_type');