<?php
get_header();
?>

    <div class="container toys">
        <h2 class="subtitle">Товары из категории "Мягкие игрушки"</h2>
        <div class="toys__wrapper">

            <?php
                // параметры по умолчанию
                $posts = get_posts( array(
                    'numberposts' => 3,
                    'category_name'    => 'soft_toys',
                    'orderby'     => 'date',
                    'order'       => 'ASC',
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                foreach( $posts as $post ){
                    setup_postdata($post);
                    ?>
                        <div class="toys__item" style="background-image: url(<?php 
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail_url();
                        } else {
                            echo get_template_directory_uri() . '/assets/img/not-found.jpg';
                        }
                            ?>)">
                            <div class="toys__item-info">
                                <div class="toys__item-title"><?php the_title()?></div>
                                <div class="toys__item-descr">
                                    <?php the_field('toys_descr') ?>                           
                                </div>
                                <a href="<?php echo get_permalink(); ?>" class="minibutton toys__trigger">Подробнее</a>
                            </div>
                        </div>
                    <?php
                }

                wp_reset_postdata(); // сброс
            ?>

        </div>
    </div>
<?php
get_footer();
?>