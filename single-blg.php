<?php get_header();?>


<link href="/wp-content/themes/peak/css/blog.css?201707191540" rel="stylesheet">
<div class="content content_blog_single" itemscope itemtype="http://schema.org/Article">
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
						$getcat = get_the_category( $post->ID ); 
						$catid = $getcat[0]->cat_ID;
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
    <div class="blog-content">
		<div class="container">
		<section class="page__content">
				<div class="content__list">
				<?php if (have_posts()) {while (have_posts()) { the_post(); ?>        
					<div class="content__item">
						<div class="content__img_block">
						<?php if (has_post_thumbnail()) echo '<img class="content__img" src="'.wp_get_attachment_image_url(get_post_thumbnail_id(),'large1024').'">'; ?>
						<div class="content__avatar"><?php $author_email = get_the_author_email(); echo get_avatar($author_email, '60');?></div>
						<div class="content__icons content__icons_single"><span><?php the_author();?></span><br><?php the_date('j F Y'); ?> <i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?> <i class="fa fa-commenting-o"></i> <?php comments_number('0', '1', '%'); ?></div>
						</div>
						<div class="content__date"><h1 itemprop="headline"><?php the_title(); ?></h1></div>
						<div class="content__txt">
							<div class="content__desc">
									<div class="content__body" itemprop="articleBody"><?php the_content(); ?></div>
							</div>
						</div>
					</div>
				<?php }} ?>
				</div>
		</section>

		<div class="page__title">
				<h1>Понравилась статья?</h1>
				<p>Рекомендуем еще материалы по данной тематике: </p>
		</div>    
		<div class="page__content-wrap content_blog">
				<section class="page__content">
					<div class="content__list">
					<?php $query_posts_rand = new WP_Query('orderby=rand&posts_per_page=3&cat='. $catid);
						if ($query_posts_rand->have_posts()) {while ($query_posts_rand->have_posts()) { $query_posts_rand->the_post();?>        
						<div class="content__item content__item_rand">
							<div class="content__item-inner">
							<?php if (has_post_thumbnail()) echo '<div class="content__img content__img_archive" style="background-image: url('. wp_get_attachment_image_url(get_post_thumbnail_id(),'medium') .');"><a href="'.get_permalink().'"></a></div>'; ?>
							<div class="content__txt">
								<div class="content__desc content__desc_archive">
									<div class="content__category"><?php echo get_the_category_list(); ?></div>
									<div class="content__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
									<!--<div class="content__body"><?php the_excerpt(); ?></div>-->
								</div>
							</div>
							<div class="content__icons"><i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?> <a href="<?php comments_link();?>"><i class="fa fa-commenting-o"></i> <?php comments_number('0', '1', '%'); ?></a></div>
							</div>
						</div>
					<?php }} wp_reset_postdata();?>
					</div>
					<?php comments_template('/comments.php');?>
				</section>
		</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>