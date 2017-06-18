<?php
/*
* Template name: Команда
*/
?>
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
    <?php  
        $team = array(  'type' => array(), 
                        'person' => array());
        $terms = get_terms( array(
                        'taxonomy' => 'race-type',
                        'hide_empty' => true,
        ) );
        foreach ($terms as $term) {
            $my_wp_query = new WP_Query();
            $persons = $my_wp_query->query(array('post_type' => 'team-peak', 'race-type' => $term->slug));
            $team['type'][] = $term;
            $team['person'][] = $persons;
            wp_reset_postdata();
            
        }
        // echo '<pre>'.print_r($persons,true).'</pre>';
        // echo '<pre>'.print_r($term,true).'</pre>';
    ?>
    <section class="page__content page__content_team">
        <div class="container">
            <div class="content__title content__title_team">Более 30 лет в автоспорте.</div>
            <div class="content__list">
                <div class="content__item">
                    <?php if (have_posts()) {while (have_posts()) { the_post(); ?>        
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="content__txt">
                                <div class="content__desc">
                                    <div class="content__body content__body_team" itemprop="articleBody"><?php the_content(); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
                <div class="content__item">
                    <div class="team">
                        <ul class="nav nav-tabs">
                            <?php foreach ($team['type'] as $key => $team_one) { 
                                if ($team_img = get_field('img', $team_one->taxonomy.'_'.$team_one->term_id )) $team_src = $team_img['sizes']['large'];
                                    else $team_src = '';
                            ?>
                                <li <?php if ($key == 0) echo 'class="active"'; ?> data-img="<?php echo $team_src; ?>"><a href="#team-<?php echo $key; ?>" data-toggle="tab"><?php echo $team_one->name; ?></a></li>
                            <?php } ?>
                        </ul> 
                        <div class="tab-content">
                            <?php foreach ($team['type'] as $key => $team_one) { ?>
                                <div class="tab-pane fade <?php if ($key == 0) echo 'in active'; ?>" id="team-<?php echo $key; ?>">
                                    <div class="team__title"><?php echo $team_one->name; ?></div>
                                    <?php if ($team_desc = term_description( $team_one->term_id, $team_one->taxonomy )): ?>
                                        <div class="team__desc"><?php echo $team_desc; ?></div>
                                    <?php endif; ?>
                                    <div class="team__persons">
                                    <?php foreach ($team['person'][$key] as $person) { ?>
                                        <div class="team__person">
                                            <a class="team__link" href="#detail-<?php echo $person->ID; ?>">
                                                <div class="team__photo" style="background-image: url(<?php echo get_field('photo',$person->ID)['sizes']['medium']; ?>)"></div>
                                                <div class="team__name"><?php echo $person->post_title; ?></div>
                                                <div class="team__position"><?php echo get_field('position',$person->ID); ?></div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <div class="team__details">
                                    <?php foreach ($team['person'][$key] as $person) { ?>
                                        <div class="detail__item" id="detail-<?php echo $person->ID; ?>">
                                            <div class="detail__photo" style="background-image: url(<?php echo get_field('photo',$person->ID)['sizes']['medium']; ?>)"></div>
                                            <div class="detail__text">
                                                <div class="detail__name"><?php echo $person->post_title; ?></div>
                                                <?php if ($detail_date = get_field('date',$person->ID)): ?>
                                                    <div class="detail__date">Дата Рождения: <?php echo $detail_date; ?></div>
                                                <?php endif; ?>
                                                <?php if ($detail_place = get_field('place',$person->ID)): ?>
                                                    <div class="detail__place">Место Рождения: <?php echo $detail_place; ?></div>
                                                <?php endif; ?>
                                                <?php if ($detail_desc = $person->post_content): ?>
                                                    <div class="detail__desc"><?php echo $detail_desc; ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if ($detail_imgs = get_field('imgs',$person->ID)): ?>
                                                <div class="detail__imgs">
                                                    <?php foreach ($detail_imgs as $img) { ?>
                                                        <a href="<?php echo $img['sizes']['large']; ?>" class="fancybox" rel="team-img"><div class="detail__img" style="background-image:url(<?php echo $img['sizes']['medium']; ?>)"></div></a>
                                                    <?php } ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
