<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/glide.min.js" integrity="sha512-IkLiryZhI6G4pnA3bBZzYCT9Ewk87U4DGEOz+TnRD3MrKqaUitt+ssHgn2X/sxoM7FxCP/ROUp6wcxjH/GcI5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/css/glide.core.min.css" integrity="sha512-YQlbvfX5C6Ym6fTUSZ9GZpyB3F92hmQAZTO5YjciedwAaGRI9ccNs4iw2QTCJiSPheUQZomZKHQtuwbHkA9lgw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/css/glide.theme.min.css" integrity="sha512-wCwx+DYp8LDIaTem/rpXubV/C1WiNRsEVqoztV0NZm8tiTvsUeSlA/Uz02VTGSiqfzAHD4RnqVoevMcRZgYEcQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body <?php body_class(); ?>>
    <?php get_header(); ?>
    <div id="content">
        <main>
        <?php
            // Check if the repeater field has rows
            $slide1 = get_field('slider_1');
            $slide2 = get_field('slider_2');
            $slide3 = get_field('slider_3');
        ?>
        <?php if ( isset($slide1['title']) && $slide1['title']  ) : ?>
            <section class="glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides flex lg:max-h-[356px]">

                        <!-- //
                        // Slide 1
                        // -->
                        <li class="slide glide__slide h-full grid grid-rows-2 grid-cols-1 lg:grid-cols-2 lg:grid-rows-1 grid-flow-col gap-0">
                            <div class="relative bg-cover bg-center bg-primary p-16">
                                <div class="content relative p-8 text-center lg:text-left text-white z-10">
                                    <h2 class="text-4xl font-regualr mb-4"><?php echo esc_html($slide1['title']); ?></h2>
                                    <p class="text-lg mb-6"><?php echo esc_html($slide1['text']); ?></p>
                                    <?php if ( (isset($slide1['button_url']['url'])) && (isset($slide1['button_text'])) ) : ?>
                                        <a href="<?php echo esc_html($slide1['button_url']['url']); ?>" class="bg-white text-primary py-2 font-bold px-4 rounded hover:bg-gray-100"><?php echo esc_html($slide1['button_text']); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="bg-black bg-opacity-50 p-16" style="background: url('<?php if (isset($slide1['image']['url'])) : echo esc_html($slide1['image']['url']); endif; ?>'); background-size:cover;">
                                <!-- The Image -->
                            </div>
                        </li>


                        <!-- //
                        // Slide 2
                        // -->
                        <?php if ( isset($slide2['title']) && $slide2['title'] ) : ?>
                            <li class="slide glide__slide grid grid-rows-2 grid-cols-1 lg:grid-cols-2 lg:grid-rows-1 grid-flow-col gap-0">
                            <div class="relative bg-cover bg-center bg-primary p-16">
                                <div class="content relative p-8 text-center lg:text-left text-white z-10">
                                    <h2 class="text-4xl font-regualr mb-4"><?php echo esc_html($slide2['title']); ?></h2>
                                    <p class="text-lg mb-6"><?php echo esc_html($slide2['text']); ?></p>
                                    <?php if ( (isset($slide2['button_url']['url'])) && (isset($slide2['button_text'])) ) : ?>
                                        <a href="<?php echo esc_html($slide2['button_url']['url']); ?>" class="bg-white text-primary py-2 font-bold px-4 rounded hover:bg-gray-100"><?php echo esc_html($slide2['button_text']); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="bg-black bg-opacity-50 p-16" style="background: url('<?php if (isset($slide2['image']['url'])) : echo esc_html($slide2['image']['url']); endif; ?>'); background-size:cover;">
                                <!-- The Image -->
                            </div>
                        </li>
                        <?php endif; ?>


                        <!-- //
                        // Slide 3
                        // -->
                        <?php if ( isset($slide3['title']) && $slide3['title']  ) : ?>
                            <li class="slide glide__slide grid grid-rows-2 grid-cols-1 lg:grid-cols-2 lg:grid-rows-1 grid-flow-col gap-0">
                            <div class="relative bg-cover bg-center bg-primary p-16">
                                <div class="content relative p-8 text-center lg:text-left text-white z-10">
                                    <h2 class="text-4xl font-regualr mb-4"><?php echo esc_html($slide3['title']); ?></h2>
                                    <p class="text-lg mb-6"><?php echo esc_html($slide3['text']); ?></p>
                                    <?php if ( (isset($slide3['button_url']['url'])) && ($slide3['button_text']) ) : ?>
                                        <a href="<?php echo esc_html($slide3['button_url']['url']); ?>" class="bg-white text-primary py-2 font-bold px-4 rounded hover:bg-gray-100"><?php echo esc_html($slide3['button_text']); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="bg-black bg-opacity-50 p-16" style="background: url('<?php if (isset($slide3['image']['url'])) : echo esc_html($slide3['image']['url']); endif; ?>'); background-size:cover;">
                                <!-- The Image -->
                            </div>
                        </li>
                        <?php endif; ?>

                    </ul>
                </div>


            </section>
            <?php endif; ?>  
            <div class="max-w-screen-xl mx-auto mt-8">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>

        </main>
    </div>
    <?php //get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>
