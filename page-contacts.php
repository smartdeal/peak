<?php 
/*
* Template name: Контакты
*/ 
?>

<?php get_header(); ?>

<div class="content" itemscope itemtype="http://schema.org/Organization">
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
            <div class="contacts">
                <div class="contacts__form">
                    <div class="form form_contacts">
                        <div class="form__btitle">
                            <div class="contacts__title form__title">Связаться с нами</div>
                        </div>
                        <div class="form__body">
                            <?php echo do_shortcode('[contact-form-7 id="4" title="Форма на странице контактов"]'); ?>
                        </div>
                    </div>                    
                </div>
                <?php if( have_rows('offices') ): ?>
                    <div class="contacts__adresses"> 
                        <div class="contacts__title">Наши офисы</div>
                        <div class="contacts__items">
                            <?php while ( have_rows('offices') ) : the_row(); ?>
                                <div class="office">
                                    <div class="office__name"><?php the_sub_field('name'); ?></div>
                                    <div class="office__adr"><?php the_sub_field('adr'); ?></div>
                                    <?php if( have_rows('tels') ): ?>
                                        <div class="office__tels">
                                        <?php while ( have_rows('tels') ) : the_row(); ?>
                                            <div class="office__tel">
                                            <?php the_sub_field('tel_type'); ?>: <?php the_sub_field('tel'); ?>
                                            </div>
                                        <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="contacts__address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <?php if ($ftel1 = get_field('tel1', 'option')): ?><div class="contacts__item contacts__item_tel1" itemprop="telephone"><?php echo $ftel1; ?></div><?php endif; ?>
                    <?php if ($ftel2 = get_field('tel2', 'option')): ?><div class="contacts__item contacts__item_tel2" itemprop="telephone"><?php echo $ftel2; ?></div><?php endif; ?>
                    <?php if ($femail = get_field('email', 'option')): ?><div class="contacts__item contacts__item_email" itemprop="email"><?php echo $femail; ?></div><?php endif; ?>
                    <?php if ($fadr = get_field('adr', 'option')): ?><div class="contacts__item contacts__item_adr" itemprop="streetAddress"><?php echo $fadr; ?></div><?php endif; ?>
                </div>
            </div>
        </div>
        <div class="contacts__map">
            <div class="container">
                <?php if ($fmap = get_field('map', 'option')) echo $fmap; ?>
            </div>
        </div>
    </section>
</div>


<?php get_footer(); ?>
