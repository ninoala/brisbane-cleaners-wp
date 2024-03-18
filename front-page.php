<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brisbane-window-cleaners
 */

get_header();
?>

	<main id="primary" class="site-main">
        <section class="hero">
        <div class="hero-content">
            <h1><?php bloginfo('name') ?></h1>
            <p>Enhancing Your Home's Beauty & Value with Professional Care</p>
        </div>
        </section>
        <section class="services">
            <h2>Our Services</h2>
            <p>At Australian Property Stars, we specialise in the residential and commercial servicing of exterior and interior window cleaning in Queensland. We take pride in what we do and strive to do the best job possible to make you happy with our 100% workmanship guarantee on every job.</p>
            <?php 
            $args = array(
                'post_type' => 'service',
                'posts_per_page' => 10, // Adjust the number to display
            );
            $service_query = new WP_Query($args);

            if ($service_query->have_posts()) :
                echo '<div class="service-cards-container">'; // Container for all service cards
                while ($service_query->have_posts()) : $service_query->the_post();
                    // Each service card
                    echo '<div class="service-card">';
                    // Link to the individual service
                    echo '<a href="' . get_permalink() . '">';
                    // Display the featured image
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('medium', ['class' => 'service-card-img']);
                    }
                    // Display the post title
                    echo '<h2 class="service-card-title">' . get_the_title() . '</h2>';
                    echo '</a>';
                    echo '</div>'; // Close service card
                endwhile;
                echo '</div>'; // Close container
                wp_reset_postdata();
            else :
                echo '<p>No services found.</p>';
            endif;
            ?>
            <div class="custom-cta">
                <a href="#" class="cta-button">Learn More</a>
            </div>
        </section>
        <section class="about-and-contact">
            <h2>Your Local Window Cleaning Experts</h2>
            
        </section>
    </main><!-- #main -->

<?php

