    <div class="msbottom msbottom_last">
        <div class="container">
            <div class="msbottom__inner msbottom__inner_last">
                <div class="msbottom__item msbottom__social msbottom__social_last">
                    <?php if ($soc_link = get_field('option_google', 'option')): ?>
                        <a href="<?php echo $soc_link; ?>" class="msbottom__social_link"><i class="fa fa-google-plus"></i></a>
                    <?php endif; ?>
                    <?php if ($soc_link = get_field('option_youtube', 'option')): ?>
                        <a href="<?php echo $soc_link; ?>" class="msbottom__social_link"><i class="fa fa-youtube"></i></a>
                    <?php endif; ?>
                    <?php if ($soc_link = get_field('option_vk', 'option')): ?>
                        <a href="<?php echo $soc_link; ?>" class="msbottom__social_link"><i class="fa fa-vk"></i></a>
                    <?php endif; ?>
                    <?php if ($soc_link = get_field('option_facebook', 'option')): ?>
                        <a href="<?php echo $soc_link; ?>" class="msbottom__social_link"><i class="fa fa-facebook"></i></a>
                    <?php endif; ?>
                    <?php if ($soc_link = get_field('option_instagram', 'option')): ?>
                        <a href="<?php echo $soc_link; ?>" class="msbottom__social_link"><i class="fa fa-instagram"></i></a>
                    <?php endif; ?>
                </div>
                <div class="msbottom__item msbottom__next msbottom__next_last"><a href="#to-top" class="next__link next__link_last"><span class="next__elem next__elem_last"><i class="fa fa-angle-up"></i></span></a></div>
                <div class="msbottom__item msbottom__region msbottom__region_last">
                    <?php if ($soc_link = get_field('option_brazil', 'option')): ?>
                        <a href="<?php echo $soc_link; ?>" class="msbottom__region_link"><i class="fa fa-globe"></i> Brazil</a>
                    <?php endif; ?>
                    <?php if ($soc_link = get_field('option_mexico', 'option')): ?>
                        <a href="<?php echo $soc_link; ?>" class="msbottom__region_link"><i class="fa fa-globe"></i> Mexico</a>
                    <?php endif; ?>
                    <?php if ($soc_link = get_field('option_usa', 'option')): ?>
                        <a href="<?php echo $soc_link; ?>" class="msbottom__region_link"><i class="fa fa-globe"></i> USA</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="msbottom__menus">
                <div class="fmenu">
                    <div class="fmenu__item">
                        <?php wp_nav_menu( array('theme_location'    => 'footer1') ); ?>
                    </div>
                    <div class="fmenu__item">
                        <?php wp_nav_menu( array('theme_location'    => 'footer2') ); ?>
                    </div>
                    <div class="fmenu__item">
                        <?php wp_nav_menu( array('theme_location'    => 'footer3') ); ?>
                    </div>
                    <div class="fmenu__item">
                        <?php wp_nav_menu( array('theme_location'    => 'footer4') ); ?>
                    </div>
                    <div class="fmenu__item">
                        <?php echo do_shortcode('[mc4wp_form id="3929"]'); ?>
                    </div>
                </div>
                <?php 
                // <div class="develop">Разработка <a href="http://seohelp24.ru/" rel="nofollow">seohelp24.ru</a></div>
                 ?>
            </div>
            <div class="copyright">
                © 2017 ООО "ПИК Кемикалс" (PEAK Chemicals, LLC). Все права защищены. FINAL CHARGE, FLEET CHARGE, BlueDEF, THERMAL CHARGE, PEAK и логотип PEAK являются товарными знаками, принадлежащими компании Old World Industries, LLC.
            </div>
        </div>
    </div>
    <div class="hidden">
        <div id="popup-form" class="pform">
            <div class="pform__title">Заказать звонок</div>
            <?php echo do_shortcode('[contact-form-7 id="3835" title="Закажите обратный звонок (на главной)"]'); ?>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>
