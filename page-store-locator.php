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
    <div class="page__title">
        <div class="container">
            <h1 itemprop="headline"><?php the_title(); ?></h1>
        </div>
    </div>    
    <section class="page__content">
        <div class="container">
            <div class="where__items">
                <?php if( have_rows('where_shops') ): ?>
                    <div class="where__item">
                        <div class="where__title">Интернет магазины</div>
                        <div class="where__body">
                            <div class="b-logos">
                            <?php while ( have_rows('where_shops') ) : the_row(); ?>
                                <div class="b-logos__item">
                                    <?php if (get_sub_field('where_link')): ?>
                                        <a class="b-logos__link" href="<?php the_sub_field('where_link'); ?>" rel="nofollow">
                                            <div class="b-logos__img">
                                                <img src="<?php echo get_sub_field('where_logo')['sizes']['medium']; ?>" alt="">
                                            </div>
                                        </a>
                                    <?php else: ?>
                                        <div class="b-logos__link">
                                            <div class="b-logos__img">
                                                <img src="<?php echo get_sub_field('where_logo')['sizes']['medium']; ?>" alt="">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if( have_rows('where_dealers') ): ?>
                        <?php $where_dealers = array(); ?>
                        <div class="where__item js-where__dealers">
                            <div class="where__title">Дилеры на карте</div>
                            <div class="where__body">
                                <div id="map" class="where__map"></div>
                                <?php 
                                    while ( have_rows('where_dealers') ) : the_row(); 
                                        $where_dealers[] = array(   'lat' => get_sub_field('where_lat'),
                                                                    'long' => get_sub_field('where_long'),
                                                                    'desc' => get_sub_field('where_desc'));
                                    endwhile; 
                                ?>
                            </div>
                        </div>
                        <script>
                            var where_dealers = <?php echo json_encode($where_dealers); ?>;
                        </script>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
