<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form. 
 */
if ( post_password_required() ) {
	return;
}

$twenty_twenty_one_comment_count = get_comments_number();
?>
<style>
	.comments-area h2{
		font-size: 32px;
	}
	form.comment-form{
		position: relative;
	}	
	form.comment-form label{
		font-weight: 700;
   	 	margin-bottom: 10px;
	}
	form.comment-form textarea{
		width: 100%;
		border-radius: 4px;
		padding: 10px 15px;
		padding-right: 45px;
	}
	form.comment-form .form-submit{
		position: absolute;
	    right: 10px;
	    top: 50%;
	    margin-bottom: 0;
	    cursor: pointer;
	}
	form.comment-form .form-submit button{
		background-color: transparent;
		padding: 0 10px;
	}
	span.says {
	    display: none;
	}
	.comments-area ol li{
		margin-bottom: 30px;
	}
	.comment-body{
		padding-left: 100px;
    	position: relative;
	}
	.comment-body .comment-author img{
		position: absolute;
    	left: 0;
    	top: 0;
	}
	.comment-body .comment-author b{
		font-size: 20px;
	}
	.comment-metadata {
	    color: #F05A25;
	    font-size: 16px;
	}
	.reply {
	    display: none;
	}
	nav.comments-pagination{
		padding-top: 25px;
		margin-bottom: 15px;
	}
	.page-numbers {
	    margin-right: 5px;
	    border: 1px solid #1b1464;
	    padding: 5px 10px;
	}
	.page-numbers.current {
	    background-color: #1b1464b3;
	    color: white;
	}
	@media only screen and (max-width: 1400px){
		.comments-area h2{
			margin-bottom: 30px;
		}
		.hr-height {
		    margin-top: 50px;
		    margin-bottom: 50px;
		}
	}
	@media only screen and (max-width: 575px){
		.comments-area ol li {
		    margin-bottom: 15px;
		}
		.comment-body .comment-author b {
		    font-size: 18px;
		}
		.comment-body {
		    padding-left: 90px;
		}
		.comment-metadata{
			font-size: 14px;
		}
		.comment-content p{
			font-size: 16px;
		}
		nav.comments-pagination{
			font-size: 14px;
		}
		.comments-area h2{
			margin-bottom: 20px;
			font-size: 25px;
		}
		.hr-height {
		    margin-top: 30px;
		    margin-bottom: 30px;
		}
	}
</style>
<div id="comments" class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

	<?php
	comment_form(
		array(
			'logged_in_as'       => null,
			'title_reply'        => esc_html__( 'Comments:', 'twentytwentyone' ),
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title mb-45">',
			'title_reply_after'  => '</h2>',
			'comment_field' => '<div class="comment-form-comment"><label for="comment">Write a comment:</label><br />
				<textarea id="comment" name="comment" aria-required="true" rows="3"></textarea></div>',
			'submit_button' => '<button name="submit" type="submit" id="submit" class="submit fa fa-paper-plane" value=""></button>'
		)
	);
	?>
	<?php
	if ( have_comments() ) :
		;
		?>
		<div class="mb-30"></div>
		<ol class="comment-list pl-0">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 70,
					'style'       => 'ol',
					'short_ping'  => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				'before_page_number' => esc_html__( '', 'twentytwentyone' ) . ' ',
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl() ? '' : '',
					esc_html__( 'Older comments', 'twentytwentyone' )
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					esc_html__( 'Newer comments', 'twentytwentyone' ),
					is_rtl() ? '' : ''
				),
			)
		);
		?>
		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'twentytwentyone' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

</div><!-- #comments --> 
