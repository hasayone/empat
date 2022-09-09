<?php
namespace empat\helper;
use empat\helper\options;
use empat\helper\media;

class front {

	/**
	 * Print title tag
	 */
	public static function print_title_tag( $title, $tag = 'h2', $css_class_name = '', $default_tag = 'h2') {

		if( trim( $tag ) == '' ) {
			$tag = $default_tag;
		}

		echo $title <> '' ? '<' . $tag . ' class="' . $css_class_name . '">' . nl2br( self::colorize_text( $title ) ) . '</' . $tag . '>' : '';
	}

	/**
	 * Colorize text
	 */
	public static function colorize_text( $text ) {

		$text = str_replace( '[blue]', '<span class="color-blue">', $text);
		$text = str_replace( '[grey]', '<span class="color-grey">', $text);
		$text = str_replace( '[/grey]', '</span>', $text);
		$text = str_replace( '[/blue]', '</span>', $text);

		return $text;

	}

	/**
	 * Print CTA tag
	 */
	public static function print_cta_tag( $link, $class_name = 'button btn-cta' ) {

		if( ! empty( $link ) ) {
			echo '<div class="cta-holder">';
			echo '<a href="' . $link['url'] . '" target="' . $link['target'] . '" class="' . $class_name . '">' . $link['title'] . '</a>';
			echo '</div>';
		}

	}

	/**
	 * Generate preview text for a keyword
	 */
	public static function get_preview_text( $keyword, $str, $words_num_before = 5, $words_num_after = 20 ) {
    $all_words = explode(' ', $str);

		$keyword_lowercase = strtolower( $keyword);
		$all_words_lowercase = array_map( 'strtolower', $all_words);
		$result = $str;

		if( in_array( $keyword_lowercase, $all_words_lowercase ) ) {

			$needle_index = array_search( strtolower( $keyword), array_map('strtolower', $all_words));
			$before = array_slice( $all_words, 0, $needle_index, true );
			$before = array_slice( $before, 0, $words_num_before );
			$after = array_slice( $all_words, $needle_index, $words_num_after );
			$result = '...' . implode( ' ', $before ) . ' ' . $keyword .' ' . implode(' ', $after ) . '...';
		} 

		return $result;

	}

	/**
	 * Generate excerpt for search post
	 * uses prepared data from the_post();
	 */
	public static function generate_search_post_excerpt( $post_id, $excerpt_len = 25 ) {

		$excerpt = '';

		if( get_post_type( $post_id ) == 'page' && function_exists( 'have_rows') ) {

			ob_start();

			while ( have_rows('content') ) {
				the_row();
				get_template_part( 'blocks/' . get_row_layout() );
			} 

			$page_content = preg_replace('/\s\s+/', ' ', strip_tags( ob_get_clean() ) );
			$excerpt = self::get_preview_text( preg_replace( '/[^a-zA-Z0-9 ]+/', '', trim( get_search_query() ) ), $page_content );

			wp_reset_postdata();

		} else {
			$excerpt = get_the_excerpt();
		}

		return wp_trim_words( $excerpt, $excerpt_len );

	}

	/**
	 * Make excerpt from string
	 */
	public static function make_excerpt( $string, $chars_count = 150) {

		$string = strip_tags( $string );
		$return = substr( $string, 0, $chars_count );

		if( strlen( $string ) > $chars_count ) {
			$return = $return . '...';
		}

		return $return;

	}
	
	/**
	 * New lines to UL LI list
	 */
	public static function nl2list( $str, $tag = 'ul', $class = '') {
		$bits = explode( "\n", $str);

		$class_string = $class ? ' class="' . $class . '"' : false;

		$newstring = '<' . $tag . $class_string . '>';

		foreach( $bits as $bit) {
			$newstring .= '<li>' . $bit . '</li>';
		}

		return $newstring . '</' . $tag . '>';
	}

}

?>