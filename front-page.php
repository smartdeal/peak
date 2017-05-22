<?php get_header(); ?>

    <div id="fullpage" class="msections">
        <?php if( have_rows('main1_slider') ): ?>
        <div class="fullpage__item msection msection_one">
            <div class="msection__in">
                <div class="container">
                    <div class="mslider-wrap">
                        <div class="mslider slickslider js-mslider">
                            <?php while ( have_rows('main1_slider') ) : the_row(); ?>
                            <div class="mslider__item">
                                <?php if($title1 = get_sub_field('main1_title1')): ?>
                                    <div class="mslider__subtitle"><?php echo $title1; ?></div>
                                <?php endif; ?>
                                <?php if($title2 = get_sub_field('main1_title2')): ?>
                                    <div class="mslider__title"><?php echo $title2; ?></div>
                                <?php endif; ?>
                                <?php if($title3 = get_sub_field('main1_title3')): ?>
                                    <div class="mslider__subtitle"><?php echo $title3; ?></div>
                                <?php endif; ?>
                                <?php if($link = get_sub_field('main1_link')): ?>
                                    <a href="<?php echo $link; ?>" class="mslider__more">Смотреть подробнее</a>
                                <?php endif; ?>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="fullpage__item msection msection_brand" id="to-brand">
            <div class="msection__in">
                <div class="container">
                    <div class="msection__inner msection__inner_brand">
                        <?php if($main2_title = get_field('main2_title')): ?>
                            <div class="msection__title msection__title_brand"><?php echo $main2_title; ?></div>
                        <?php endif; ?>
                        <div class="msection__body msection__body_brand">
                            <div class="b-brand__main"><?php the_field('main2_text'); ?></div>
                            <?php if( have_rows('main2_right') ): ?>
                                <div class="b-brand__items">
                                    <div class="b-brand__line"></div>
                                    <?php while( have_rows('main2_right') ): the_row(); ?>
                                        <div class="b-brand__item">
                                            <?php if($main2_right_title = get_sub_field('main2_right_title')): ?>
                                                <div class="b-brand__title"><?php echo $main2_right_title; ?></div>
                                            <?php endif; ?>
                                            <?php if($main2_right_text = get_sub_field('main2_right_text')): ?>
                                                <div class="b-brand__body"><?php echo $main2_right_text; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="b-brand__line"></div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fullpage__item msection msection_catalog" id="to-catalog">
            <div class="msection__in">
                <div class="container">
                    <div class="msection__inner">
                        <?php if($main3_title = get_field('main3_title')): ?>
                            <div class="msection__title msection__title_catalog"><?php echo $main3_title; ?></div>
                        <?php endif; ?>
                        <?php if( have_rows('main3_items') ): ?>
                        <div class="msection__body msection__body_catalog">
                            <div class="b-mcatalog__inner slickslider js-mcatalog">
                                <?php while( have_rows('main3_items') ): the_row(); ?>
                                <div class="b-mcatalog__item">
                                    <a href="<?php the_sub_field('main3_items_link'); ?>" class="b-mcatalog__link">
                                        <div class="b-mcatalog__img" style="background-image:url(<?php echo get_sub_field('main3_items_img')['sizes']['large']; ?>)"></div>
                                        <?php if($main3_items_title = get_sub_field('main3_items_title')): ?>
                                            <div class="b-mcatalog__desc"><?php echo $main3_items_title; ?></div>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="fullpage__item msection msection_advantage" id="to-advantage">
            <div class="msection__in">
                <div class="container">
                    <div class="msection__inner">
                        <?php if($main4_title = get_field('main4_title')): ?>
                        <div class="msection__title msection__title_advantage"><?php echo $main4_title; ?></div>
                        <?php endif; ?>
                        <div class="msection__body msection__body_advantage">
                            <?php if($main4_text = get_field('main4_text')): ?>
                                <div class="msection__desc msection__desc_advantage"><?php echo $main4_text; ?></div>
                            <?php endif; ?>
                            <?php if( have_rows('main4_items') ): ?>
                                <div class="b-adv__items">
                                    <?php $num = 1; while( have_rows('main4_items') ): the_row(); ?>
                                        <div class="b-adv__item">
                                            <div class="b-adv__num"><?php echo sprintf("%02d", $num); ?></div>
                                            <div class="b-adv__txt"><?php the_sub_field('main4_item'); ?></div>
                                        </div>
                                    <?php $num++; endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fullpage__item msection msection_reviews prefooter-section" id="to-reviews">
            <div class="msection__in">
                <div class="container">
                    <div class="msection__inner">
                        <?php if($main5_title = get_field('main5_title')): ?>
                            <div class="msection__title msection__title_reviews"><?php echo $main5_title; ?></div>
                        <?php endif; ?>
                        <?php if( have_rows('main5_reviews') ): ?>
                        <div class="msection__body msection__body_reviews">
                            <div class="b-mreviews">
                                <div class="b-mreviews__inner js-mreviews slickslider">
                                    <?php while( have_rows('main5_reviews') ): the_row(); ?>
                                        <div class="b-mreviews__item">
                                            <?php if($main5_review_logo = get_sub_field('main5_review_logo')): ?>
                                                <div class="b-mreviews__img-wrap"><img class="b-mreviews__img" src="<?php echo $main5_review_logo['sizes']['medium']; ?>"></div>
                                            <?php endif; ?>
                                            <div class="b-mreviews__body">
                                                <?php if($main5_review_title = get_sub_field('main5_review_title')): ?>
                                                    <div class="b-mreviews__title"><?php echo $main5_review_title; ?></div>
                                                <?php endif; ?>
                                                <?php if($main5_review_date = get_sub_field('main5_review_date')): ?>
                                                    <div class="b-mreviews__date"><?php echo $main5_review_date; ?></div>
                                                <?php endif; ?>
                                                <?php if($main5_review_text = get_sub_field('main5_review_text')): ?>
                                                    <div class="b-mreviews__txt"><?php echo $main5_review_text; ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="b-form">
                            <div class="b-form__title">Закажите обратный звонок</div>
                            <?php echo do_shortcode('[contact-form-7 id="3835"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>

