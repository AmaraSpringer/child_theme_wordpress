<?php
  $recent_title = get_theme_mod('food_express_recent_section_title', __('Blog & News', 'food-express'));
  $recent_sub_title = get_theme_mod('food_express_recent_section_subtitle', __('To present an original cuisine where texture, purity of flavour and balance is paramount.', 'food-express'));
  $recent_show_cat = get_theme_mod( 'food_express_recent_cat', 1);
  $container_class_recent = get_theme_mod( 'food_express_homepage_container_class', true ) ? 'container' : 'fluid';

  $the_query = new WP_Query( array(
    'showposts' => 3,
    'post__not_in' => get_option("sticky_posts"),
    'cat' => esc_attr( $recent_show_cat ),
  ));

?>

<section class="home-recent-posts">
  <div class="content-wrap  <?php echo esc_attr( $container_class_recent ); ?>">

    <div class="section-header">
  		<?php
        echo '<h2>' . esc_html( $recent_title ) . '</h2>';
        echo '<p class="sub-title">' . esc_html( $recent_sub_title ) . '</p>';
      ?>
    </div><!-- .section-header -->

    <div class="section-main">
    <?php
      while ( $the_query -> have_posts() ) : $the_query -> the_post();

          echo '<article class="recent-post">';
            echo '<div class="post-wrap">';

                if ( has_post_thumbnail() ) :
                  echo '<div class="recent-post-image">';
                    the_post_thumbnail('food-express-latest-post-img');
                  echo '</div>';
                endif;

                echo '<div class="recent-post-content">';
      						echo '<h1 class="recent-title"><a href="' . esc_url( get_permalink() ) . '">' . wp_kses_post( get_the_title() ) . '</a></h1>';
                  the_excerpt();
                  echo '<div class="meta">';
                    food_express_posted_on();
                  echo '</div>';
                echo '</div>';

            echo '</div>';
          echo '</article>';

      endwhile;
    ?>
  </div>

</div><!-- .container -->

</section>
