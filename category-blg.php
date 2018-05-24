<?php get_header(); 
function getCurrentCatID(){
    global $wp_query;
    if(is_category() || is_single()){
        $cat_ID = get_query_var('cat');
    }
    return $cat_ID;
}
$catinf = get_the_category();

$catid = getCurrentCatID();

?>

<link href="/wp-content/themes/peak/css/blog.css?201707191540" rel="stylesheet">
<div class="content content_blog">
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
            <!--<h1><?php the_archive_title(); ?></h1>-->
				<ul class="blog-category__list">
                    <?php
						$catid = get_query_var('cat');
                        $categories = get_categories('parent=31');
					?>
					<li class="<?php echo $catid == 31 ? 'active' : ''; ?>"><a href="/blog/"><span>Все рубрики</span></a></li>
					<?php
						foreach($categories as $category) {
					?>
					<li<?php if($category->term_id == $catid) { ?> class="active"<?php } ?>><a href="<?php echo get_category_link($category->term_id); ?>"><span><?php echo $category->name; ?></span></a></li>
					<?php } ?>
				</ul>
        </div>
    </div>    
    <div class="page__content-wrap">
        <div class="container">
            <section class="page__content">
                <div class="content__list content__list_archive">
                <?php $count_posts = 0; if (have_posts()) {while (have_posts()) { the_post();$count_posts++;?>        
                <div class="content__item <?php echo "content__item$count_posts"?>" itemscope itemtype="http://schema.org/Article">		<?php if ($count_posts == 1) $count_thumb_size = 'large1024'; 
						elseif ($count_posts > 2 && $count_posts < 7) $count_thumb_size = 'medium'; 
						else $count_thumb_size = 'large';?>
						<div class="content__item-inner">
                        <?php if (has_post_thumbnail()) echo '<div class="content__img content__img_archive" style="background-image: url('. wp_get_attachment_image_url(get_post_thumbnail_id(), $count_thumb_size) .');"><a href="'.get_permalink().'"></a></div>'; ?>
                        <div class="content__txt">
                            <div class="content__desc content__desc_archive">
								<div class="content__category"><?php echo get_the_category_list(); ?></div>
                                <div class="content__title" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
								<?php if ($count_posts == 1):?>
                                <div class="content__body" itemprop="articleBody"><?php the_excerpt(); ?></div>
								<?php endif;?>
                            </div>
                        </div>
						<div class="content__icons"><i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?> <a href="<?php comments_link();?>"><i class="fa fa-commenting-o"></i> <?php comments_number('0', '1', '%'); ?></a></div>
						</div>
                    </div>
                <?php }} ?>
                </div>
            </section>
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
