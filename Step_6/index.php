<?php
    get_header();
?>
        <div class="mainslider glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">

                    <?php 
                        $posts = get_posts( array(
                            'numberposts' => -1,
                            'category_name'    => 'slider',
                            'orderby'     => 'date',
                            'order'       => 'ASC',
                            'post_type'   => 'post',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );

                        foreach( $posts as $post ){
                            setup_postdata($post);
                            ?>
                            <li style="background-image: url('<?php the_field('slider_img'); ?>')" class="glide__slide">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-7 offset-1">
                                            <h2 
                                             style="
                                             <?php
                                                $field = get_field('slider_color');

                                                if ($field == 'white') {
                                                    ?>
                                                        color: #fff
                                                    <?php
                                                }
                                             ?>
                                             "class="slider__title"><?php the_title(); ?></h2>

                                            <?php
                                                $field = get_field('slider_btn');

                                                if ($field == 'on') {
                                                    ?>
                                                        <a href="<?php the_field('slider_link') ?>" class="button">Узнать больше</a>
                                                    <?php
                                                }
                                             ?>

                                        </div>
                                    </div>
                                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                        <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.982942 13.3923L12.2253 24.631C12.7186 25.123 13.5179 25.123 14.0124 24.631C14.5057 24.1389 14.5057 23.3397 14.0124 22.8476L3.66178 12.5007L14.0112 2.15378C14.5045 1.66172 14.5045 0.862477 14.0112 0.369169C13.5179 -0.122894 12.7174 -0.122894 12.2241 0.369169L0.981696 11.6077C0.495966 12.0947 0.495966 12.9065 0.982942 13.3923Z" fill="white"/>
                                        </svg>
                                    </button>
                                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                        <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.0171 11.6077L2.77467 0.369029C2.28137 -0.123032 1.48213 -0.123032 0.987571 0.369029C0.494263 0.861093 0.494264 1.66033 0.987572 2.15239L11.3382 12.4993L0.98882 22.8462C0.495512 23.3383 0.495512 24.1375 0.98882 24.6308C1.48213 25.1229 2.28261 25.1229 2.77592 24.6308L14.0183 13.3923C14.504 12.9053 14.504 12.0935 14.0171 11.6077Z" fill="white"/>
                                        </svg>
                                    </button>
                                </div>
                            </li>
                            <?php
                        }

                        wp_reset_postdata(); // сброс
                    ?>

                </ul>
            </div>
        </div>

        <div class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
                        <div class="about__img">
                            <?php
                                $image = get_field('about_img');

                                if (!empty($image)): ?>
                                    <img 
                                    src="<?php echo $image['url']; ?>" 
                                    alt="<?php echo $image['alt']; ?>">
                                <?php endif;
                            ?>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 col-xl-5 offset-xl-1">
                        <h1 class="title underlined"><?php the_field('about_title'); ?></h1>
                        <div class="about__text">
                            <?php the_field('about_descr'); ?>
                        </div>
                        <a href="#" class="button">Узнать больше</a>
                    </div>
                </div>
            </div>
        </div>
<?php 
    get_footer();
?>

