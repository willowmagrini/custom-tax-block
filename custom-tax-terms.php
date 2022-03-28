<?php
/**
 * Plugin Name:       Custom tax terms block
 * Description:       Exibe termos tde taxonomia customizada no loop.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            willow
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hacklab-blocks
 *
 * @package           hacklab-blocks
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

function render_block_core_post_terms_2( $attributes, $content, $block ) {
	if ( ! isset( $block->context['postId'] ) || ! isset( $attributes['term'] ) ) {
		return '';
	}

	if ( ! is_taxonomy_viewable( $attributes['term'] ) ) {
		return '';
	}

	$post_terms = get_the_terms( $block->context['postId'], $attributes['term'] );
	
	if ( is_wp_error( $post_terms ) || empty( $post_terms ) ) {
		return '';
	}

	$classes = 'taxonomy-' . $attributes['term'];
	if ( isset( $attributes['textAlign'] ) ) {
		$classes .= ' has-text-align-' . $attributes['textAlign'];
	}

	$separator = empty( $attributes['separator'] ) ? ' ' : $attributes['separator'];

	$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $classes ) );

	return get_the_term_list(
		$block->context['postId'],
		$attributes['term'],
		"<div $wrapper_attributes>",
		'<span class="wp-block-post-terms__separator">' . esc_html( $separator ) . '</span>',
		'</div>'
	);
}

/**
 * Registers the `core/post-terms` block on the server.
 */
function register_block_core_post_terms_2() {
	register_block_type_from_metadata(
		__DIR__ . '/build',
		array(
			'render_callback' => 'render_block_core_post_terms_2',
		)
	);
}
add_action( 'init', 'register_block_core_post_terms_2' );