<?php 
/*
* Template name: Каталог
*/ 
?>

<?php get_header(); ?>

<div class="content" itemscope itemtype="http://schema.org/Article">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
        <div class="container">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
        </div>
    </div>
    <section class="page__content page__content_catalog">
            <?php if (have_posts()) {while (have_posts()) { the_post();
            $arg_posts =  array(
                'orderby'      => 'none',
                'order'        => 'ASC',
                'posts_per_page' => -1,
                'post_type' => 'page',
                'post_parent' => get_the_ID(),
                'post_status' => 'publish',

            );
            $query = new WP_Query($arg_posts);
            if ($query->have_posts() ): ?>
                <div class="catalog__items" id="fullpage">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php 
                        if ($bg_section_src = get_field('bg',get_the_ID()))
                            $bg_section = ' style="background-image:url('.$bg_section_src['sizes']['thumb1920'].')"';
                        else
                            $bg_section = '';
                    ?>
                    <div class="catalog__item fullpage__item" <?php echo $bg_section; ?>>
                        <div class="container">
                            <div class="catalog__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            <?php 

                            $args = array(
                                'orderby'      => 'none',
                                'order'        => 'ASC',
                                'posts_per_page' => -1,
                                'post_type' => 'page',
                                'post_parent' => get_the_ID(),
                                'post_status' => 'publish',
                            );

                            $posts = get_posts( $args ); 
                            $cats_count = count($posts);
                            if ($cats_count == 4) $cat_class = 'category__items_4'; 
                                else 
                                    if ($cats_count > 6) $cat_class = 'category__items_6more'; 
                                        else  $cat_class = '';
                            ?>
                            <div class="category__items <?php echo $cat_class; ?>">
                            <?php foreach($posts as $post){ setup_postdata($post); ?>
                                <div class="category__item">
                                    <div class="category__img">
                                        <a href="<?php the_permalink(); ?>">
                                        <?php 
                                            if (has_post_thumbnail())
                                                $cur_img = wp_get_attachment_image_url(get_post_thumbnail_id(),'large');
                                            else
                                                $cur_img = get_template_directory_uri().'/img/placeholder.png';
                                        ?>
                                            <img class="category__picture" src="<?php echo $cur_img; ?>">
                                        </a>
                                    </div>
                                    <div class="category__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                </div>
                            <?php
                            }
                            wp_reset_postdata();
                            ?>                        
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; wp_reset_postdata(); ?>
            <?php if ($seo_txt = get_the_content()): ?>
                <div class="product__desc">
                    <div class="product__sects">
                        <div id="product-desc" class="product__sect">
                            <div class="product__sect-desc" itemprop="articleBody">
                                <?php echo $seo_txt; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php }} ?>
    </section>
</div>


<?php get_footer(); ?>
