<?php get_header(); ?>
<div class="content" itemscope itemtype="http://schema.org/Article">
    <section class="page__content page__content_about">
        <div id="fullpage" class="about__items">
            <div class="about__item fullpage__item about__item_one">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <div class="container">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                    </div>
                </div>
                <div class="about__in">
                    <div class="container">
                        <div class="about__inner">
                            <div class="about__title"><h1 itemprop="headline"><?php the_title(); ?></h1></div>
                            <div class="about__body about__body_1">
                                <div class="b-about__main"><?php the_field('about_content_1'); ?></div>
                                <div class="b-about__items">
                                    <div class="b-about__line"></div>
                                    <?php while ( have_rows('about_items_1') ) : the_row(); ?>
                                        <div class="b-about__item">
                                            <?php $about_icon = get_sub_field('icon'); ?>
                                            <img src="<?php echo $about_icon['sizes']['thumbnail']; ?>" alt="">
                                            <div class="b-about__title"><?php the_sub_field('title'); ?></div>
                                            <div class="b-about__text"><?php the_sub_field('text'); ?></div>
                                        </div>
                                        <div class="b-about__line"></div>
                                    <?php endwhile; ?>
                                </div>
                            </div>    
                        </div>    
                    </div>    
                </div>
            </div>
            <div class="about__item fullpage__item about__item_two">
                <div class="about__in">
                    <div class="container">
                        <div class="about__inner">
                            <div class="about__title">Чем доказывается качество и возможности?</div>
                            <div class="about__body about__body_2">
                                <div class="b-about__main"><?php the_field('about_content_2'); ?></div>
                                <div class="b-about__items">
                                    <div class="b-about__line"></div>
                                    <?php while ( have_rows('about_items_2') ) : the_row(); ?>
                                        <div class="b-about__item">
                                            <?php $about_icon = get_sub_field('icon'); ?>
                                            <img src="<?php echo $about_icon['sizes']['thumbnail']; ?>" alt="">
                                            <div class="b-about__title"><?php the_sub_field('title'); ?></div>
                                            <div class="b-about__text"><?php the_sub_field('text'); ?></div>
                                        </div>
                                        <div class="b-about__line"></div>
                                    <?php endwhile; ?>
                                </div>
                            </div>    
                        </div>    
                    </div>    
                </div>
            </div>
            <div class="about__item fullpage__item about__item_last">
                <div class="about__in">
                    <div class="container">
                        <div class="about__inner_last">
                            <?php if ($logos = get_field('about_logos')): ?>
                                <div class="about__caption">Преимущества работы с нами уже оценили наши постоянные клиенты:</div>
                                <div class="logos">
                                    <?php foreach ($logos as $logo): ?>
                                        <div class="logos__item"><img src="<?php echo $logo['sizes']['medium'];  ?>" alt=""></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="about__caption">Стать нашим партнером:</div>
                            <div class="form_about">
                                <?php echo do_shortcode('[contact-form-7 id="3640" title="Стать нашим партнером"]'); ?>
                            </div>
                            <div class="about__caption">Будьте уверены. Работайте с лидером.</div>
                        </div>    
                    </div>    
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
