<?php
/**
 * The Content Sidebar
 *
 * @package WordPress
 * 
 * 
 */

if ( ! is_active_sidebar( 'sidebar-news' ) ) {
	return;
}
?>
<section class="page__sidebar page__sidebar_news hidden-xs hidden-sm" role="complementary">
    <ul id="sidebar">
	    <?php dynamic_sidebar( 'sidebar-news' ); ?>
    </ul>
</section>
