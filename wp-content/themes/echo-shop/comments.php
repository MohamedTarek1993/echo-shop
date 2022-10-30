<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Echo-shop
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if (have_comments()) {
?>

	<div class="custombox" id="comments">
		<h4 class="small-title">
			<?php printf(
				_n('%s Comment', '%s Comments', get_comments_number(), 'echo-shop'),
				number_format_i18n(get_comments_number())
			); ?>
		</h4>
		<div class="row">
			<div class="col-lg-12">
				<div class="comments-list">
					<?php
					$max_depth = get_option('thread_comments_depth');
					if (get_option('thread_comments') != '1') {
						$max_depth = 1;
					}
					wp_list_comments([
						'avatar_size' => 80,
						'style' => 'div',
						'callback' => 'wpc_comment_callback',
						'max_depth' => $max_depth,
					]);
					?>
				</div>
				<div class="d-flex justify-content-between">
					<div><?php previous_comments_link(__('Previous Comments', 'echo-shop')); ?></div>
					<div><?php next_comments_link(__('Next Comments', 'echo-shop')); ?></div>
				</div>
			</div>
		</div>
	</div>
<?php
}


comment_form([
	'class_container' => 'custombox',
	'title_reply_before' => '<h4 class="small-title">',
	'title_reply_after' => '</h4>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'class_submit' => 'btn',
	'fields' => [
		'author' => '<input name="author" type="text" class="form-control" placeholder="' . esc_attr(__('Your name', 'echo-shop')) . '">',
		'email' => '<input name="email" type="text" class="form-control" placeholder="' . esc_attr(__('Email address', 'echo-shop')) . '">',
		'cookies' => '',
	],
	'comment_field' => '<textarea name="comment" class="form-control" placeholder="' . esc_attr(__('Your comment', 'echo-shop')) . '"></textarea>',
	'class_form' => 'form-wrapper',
]);
?>


