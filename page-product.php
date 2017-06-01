<?php 
/*
* Template name: Товары
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
            <?php if (have_posts()) {while (have_posts()) { the_post(); ?>        
            <div class="product">
                <div class="product__imgwr">
                    <div class="product__img">
                        <?php if (has_post_thumbnail()) echo '<img class="content__img" src="'.wp_get_attachment_image_url(get_post_thumbnail_id(),'large').'">'; ?>
                    </div>
                    <div class="product__dloads">
                        <?php if ($product_pdf = get_field('pdf')): ?><a class="btn btn_yellow btn_pdf" href="<?php echo $product_pdf['url']; ?>">Описание</a><?php endif; ?>
                        <?php if ($product_msds = get_field('msds')): ?><a class="btn btn_yellow btn_msds" href="<?php echo $product_msds['url']; ?>">Паспорт безопасности</a><?php endif; ?>
                    </div>
                </div>
                <div class="product__body">
                    <div class="product__title">
                        <h1 itemprop="headline"><?php the_title(); ?></h1>
                    </div>    
                    <?php if ($product_iso = get_field('iso')) {?>
                        <div class="product__iso">SAE:&nbsp;
                            <?php foreach ($product_iso as $value) {
                                    echo '<span class="product__iso-item">'.$value.'</span>';
                            } ?>
                        </div>
                    <?php } ?>
                    <div class="product__captions">
                        <a href="#product-desc" class="product__sect-caption product__sect-caption_active">Описание</a>
                        <?php 
                            foreach (array('allow', 'use', 'adv') as $value) {
                                if (get_field($value)) { ?>
                                    <a href="#product-<?php echo $value; ?>" class="product__sect-caption">
                                        <?php echo get_field_object($value)['label']; ?>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                    </div>
                    <div class="product__desc">
                        <div class="product__sects">
                            <div id="product-desc" class="product__sect">
                                <div class="product__sect-desc" itemprop="articleBody">
                                    <?php the_content(); ?>
                                </div>
                                <div class="product__btnwr">
                                    <a class="btn btn_white btn_pr-buy" href="/store-locator">Купить</a>
                                    <a class="btn btn_yellow btn_pr-part" href="/contacts">Стать партнером</a>
                                </div>
                            </div>
                            <?php if ($product_allow = get_field('allow')) { ?>
                                <div id="product-allow" class="product__sect">
                                    <div class="product__sect-title">Допуски и соответствия</div>
                                    <div class="product__sect-desc product__sect-desc_allow js-product__sect-desc_allow">
                                        <?php echo $product_allow; ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($product_use = get_field('use')) { ?>
                                <div id="product-use" class="product__sect">
                                    <div class="product__sect-title">Применение</div>
                                    <div class="product__sect-desc product__sect-desc_use js-product__sect-desc_use">
                                        <?php echo $product_use; ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($product_adv = get_field('adv')) { ?>
                                <div id="product-adv" class="product__sect">
                                    <div class="product__sect-title">Преимущества</div>
                                    <div class="product__sect-desc">
                                        <ul class="product__adv-items">
                                        <?php 
                                            foreach ($product_adv as $k) {
                                                echo '<li class="product__adv-item">';
                                                echo '<div class="product__adv-title">'.$k['title'].'</div>';
                                                echo '<div class="product__adv-txt">'.$k['txt'].'</div>';
                                                echo '</li>';
                                            }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
    </section>
</div>


<?php get_footer(); ?>
