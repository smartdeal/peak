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
    <section class="page__content page__content_career">
        <div class="container">
            <div class="content__list">
                <div class="content__item">
                    <?php if (have_posts()) {while (have_posts()) { the_post(); ?>        
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="content__txt">
                                <div class="content__desc">
                                    <div class="content__body" itemprop="articleBody"><?php the_content(); ?></div>
                                </div>
                            </div>
                        </div>
                        <?php  
                            $my_wp_query = new WP_Query();
                            $all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));
                            wp_reset_postdata();
                            $career_children = get_page_children( get_the_ID(), $all_wp_pages );
                            if ($career_children) $is_exist_vacancy = true; else $is_exist_vacancy = false;
                        ?>
                        <?php if ($is_exist_vacancy): ?> 
                            <div class="col-xs-12 col-sm-6">
                                <div class="vacancy">
                                    <div class="vacancy__title">Вакансии</div>
                                    <ul class="vacancy__list">
                                    <?php foreach ($career_children as $career_one) { ?>
                                            <li class="vacancy__item"><a href="<?php the_permalink($career_one->ID); ?>"><?php echo $career_one->post_title; ?></a></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                            <div class="hidden-xs <?php if ($is_exist_vacancy) echo 'col-sm-6'; else echo 'col-sm-12'; ?>">
                                <div class="content__thumb-wrap">
                                    <img class="content__thumb" src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(),'large'); ?>">
                                </div>
                            </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
