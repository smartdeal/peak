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
            <h1 itemprop="headline">Страница не найдена</h1>
        </div>
    </div>    
    <section class="page__content" itemprop="articleBody">
        <div class="container">
            <div class="content__list">
                <a href="<?php echo home_url(); ?>" class="content-404-link">Перейти на главную</a>
            </div>
        </div>
    </section>
</div>


<?php get_footer(); ?>
