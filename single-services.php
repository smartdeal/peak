<?php get_header(); ?>

<?php if (have_posts()) {while (have_posts()) { the_post(); ?>

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
    <section class="page__banner hidden-xs" <?php  if (has_post_thumbnail()) echo 'style="background-image: url('. wp_get_attachment_image_url(get_post_thumbnail_id(),'thumb1920') .');"'; ?>> </section>
    <section class="page__content">
        <div class="container">
            <div class="form form_service">
                <div class="form__btitle">
                    <div class="form__title">Заказать услугу:</div>
                    <div class="form__subtitle"></div>
                </div>
                <div class="form__body">
                    <?php echo do_shortcode('[contact-form-7 id="4"]'); ?>
                </div>
            </div>
            <?php if( have_rows('prices') ): ?>
                <div class="services__price">
                    <table class="price__table">
                        <tr>
                            <th class="price__head">Наименование услуги</th>
                            <th class="price__head">Цена</th>
                        </tr>
                    <?php while ( have_rows('prices') ) : the_row(); ?>
                        <tr>
                            <td class="price__name"><?php the_sub_field('price-name'); ?></td>
                            <td class="price__value"><span class="price__from">от </span><?php the_sub_field('price-value'); ?><span class="price__unit"> руб.</td>
                        </tr>
                    <?php endwhile; ?>
                    </table>
                </div>
            <?php endif; ?>
            <?php 
                if ($service_caption = get_field('caption')) {
                    echo '<div class="services__caption">'.$service_caption.'</div>';
                }
            ?>
            <div class="content__body" itemprop="articleBody">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <?php get_template_part( 'inc/completed-works' ); ?>
    <?php get_template_part( 'inc/how-we-works' ); ?>
    <div class="btn-wrap btn-wrap_service">
        <a href="#popup_service" class="btn-more btn-more_service">Заказать услугу сейчас</a>
    </div>

</div>

    <div class="call-back__wrap mfp-hide" id="popup_service">
        <div class="call-back__bg"></div>
        <div class="form form_popup form_popup_service">
            <div class="form__btitle">
                <div class="form__title">Заказать услугу:</div>
                <div class="form__subtitle"></div>
            </div>
            <div class="form__body">
                <?php echo do_shortcode('[contact-form-7 id="4"]'); ?>
            </div>
        </div>
    </div>

<?php

}} // end have_post if while

?>

<?php get_footer(); ?>
