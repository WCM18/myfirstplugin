<?php
/**
 * Plugin Name: testimonial
 * Plugin URI:  https://example.com/plugins/the-basics/
 * Description: Basic WordPress Plugin Header Comment
 * Version:     0.1
 * Author:      WordPress.org
 * Author URI:  https://author.example.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: testimonial
 * Domain Path: /languages
 */

function mt_shortcode($user_atts = [], $content = null, $tag = '') {

      $default_atts=[
          'post'=>3,
          'title'=>latest News;
          'foter'=>'footer';
      ];
    $atts = shortcode_atts($default_atts,$user_atts,$tag);
     
    $posts = new WP_Query([
        'posts_per_page' => 3,
    ]);
   return "Atts:<pre>".print_r()-</pre>;
    $output = "<h2>Latest Posts</h2>";
    if ($posts->have_posts()) {
        $output .= "<ul>";
        while ($posts->have_posts()) {
            $posts->the_post();
            $output .= "<li>";
            $output .= "<a href='";
            $output .= get_the_permalink();
            $output .= "'>";
            $output .= get_the_title();
            $output .= "</a>";
            $output .= get_the_author();
            $output .= get_the_category_list(',');
            $output .= get_the_date();
            $output .= get_the_time();
            $output .= "</li>";
        }
        wp_reset_postdata();
        $output .= "</ul>";
 
    } else {
        $output .= "No latest posts available.";
    }
 
    return $output;
 }
 
 function mlp_init() {
    add_shortcode('latest_posts', 'mlp_shortcode');
 
 }
 add_action('init', 'mlp_init');