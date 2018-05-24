<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">
	<?php comment_form( array(
						'comment_notes_before'       => '<p class="comment-notes">Или укажите Имя и E-mail</p>',
						));
		if ( have_comments() ) : ?>
		<h3 id="comments-title">
			<?php padeg_comments (get_comments_number (),array ('комментарий', 'комментария', 'комментариев'));?>
		</h3>
		<ol class="comment-list">
			<?php /*
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 74,
				) );
				*/
				wp_list_comments ('type=comment&callback=mytheme_comment');
			?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

</div><!-- #comments -->



<?php
function mytheme_comment ($comment, $args, $depth){
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class (); ?> id="li-comment-<?php comment_ID () ?>">
    <div id="comment-<?php comment_ID (); ?>" class="comment-body">
    <div class="comment-author vcard">
        <?php echo get_avatar ( $comment, $size='45'); ?>
        <cite class="fn"><?php echo get_comment_author_link () ?></cite><br>
		<a href="<?php echo htmlspecialchars ( get_comment_link ( $comment->comment_ID ) ) ?>"><?php printf ( '%1$s в %2$s', get_comment_date ('j F Y'),  get_comment_time ('H:i')) ?></a>
        <?php edit_comment_link ('(Редактировать)', '  ', '') ?>
		
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
        <em>Ваш комментарий ожидает проверки.</em>
        <br />
    <?php endif; ?>

    <div class="comment-text">
		<?php comment_text () ?>
    </div>

<!--
    <div class="reply">
        <?php comment_reply_link (array_merge ( $args, array ('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
-->
    </div>
<?php
}
function padeg_comments ($number, $after) {
	$cases = array (2, 0, 1, 1, 1, 2);
	if ($number == 0) echo 'Нет'.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ]; else
	echo $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
}
?>