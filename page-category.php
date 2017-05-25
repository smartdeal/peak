<?php 
/*
* Template name: Каталог-рубрика
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
    <section class="page__content">
        <div class="container">
            <?php if (have_posts()) {while (have_posts()) { the_post(); ?>        
                <div class="product__title product__title_cat">
                    <h1 itemprop="headline"><?php the_title(); ?></h1>
                </div>    
            <?php 
            $arg_posts =  array(
                'orderby'      => 'menu_order',
                'order'        => 'ASC',
                'posts_per_page' => -1,
                'post_type' => 'page',
                'post_parent' => get_the_ID(),
                'post_status' => 'publish',

            );
            $query = new WP_Query($arg_posts);
            ?>
            <?php if ($query->have_posts() ): ?>
                    <div class="category__items js-category__items">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="category__item">
                            <div class="category__img">
                                <?php if (has_post_thumbnail()) echo '<a href="'.get_permalink().'"><img class=category__picture" src="'.wp_get_attachment_image_url(get_post_thumbnail_id(),'large').'"></a>'; ?>
                            </div>
                            <div class="category__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            <?php if ($category_excerpt = get_field('excerpt')): ?>
                                <div class="category__excerpt"><?php echo $category_excerpt; ?></div>
                            <?php endif; ?>
                        </div>
            <?php endwhile; ?>
                    </div>
            <?php endif; wp_reset_postdata();
            ?>
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
        </div>
    </section>
</div>


<?php get_footer(); ?>
