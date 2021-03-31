<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IPHAN_INRC
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php
	// You can start editing here -- including this comment!
	if (have_comments()) :
	?>
		<h2 class="comments-title">
			<?php
			$iphan_inrc_comment_count = get_comments_number();
			if ('1' === $iphan_inrc_comment_count) {
				printf(
					/* translators: 1: title. */
					esc_html__('One thought on &ldquo;%1$s&rdquo;', 'iphan_inrc'),
					'<span>' . wp_kses_post(get_the_title()) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $iphan_inrc_comment_count, 'comments title', 'iphan_inrc')),
					number_format_i18n($iphan_inrc_comment_count), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post(get_the_title()) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->
		<?php the_comments_navigation(); ?>
		<ol class="comment-list">
			<?php
			function wp_comment_date($date)
			{
			?>
				<span class="time-ago"> <?php echo sprintf(esc_html__('%s atrás', 'textdomain'), human_time_diff(get_the_time('U'), current_time('timestamp'))); ?></span>
			<?php
				$date = date("d/m/Y");
				return $date;
			}
			add_filter('get_comment_date', 'wp_comment_date');

			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 0
				)
			);
			?>
		</ol><!-- .comment-list -->
		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'iphan_inrc'); ?></p>
	<?php
		endif;
	endif; // Check for have_comments().
	comment_form();
	?>
</div><!-- #comments -->