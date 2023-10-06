<?php
namespace empat\helper;

if ( ! class_exists( 'Aq_Resize' ) ) {
	require_once get_template_directory() . '/vendor-custom/aq_resizer/aq_resizer.php';
}

class media {

	/**
	 * Check is attachment JPG or PNG
	 */
	public static function is_attachment_jpg_or_png( $attachment_id_or_url ) {
		$true_by_mime = $true_by_ext = false;

		if ( is_numeric( $attachment_id_or_url ) ) {
			$mime         = \get_post_mime_type( $attachment_id_or_url );
			$true_by_mime = in_array( $mime, [ 'image/jpg', 'image/jpeg', 'image/png' ] );
		} else {
			$path        = parse_url( $attachment_id_or_url, PHP_URL_PATH );
			$extension   = pathinfo( $path, PATHINFO_EXTENSION );
			$true_by_ext = in_array( strtolower( $extension ), [ 'jpeg', 'jpg', 'png' ] );
		}

		return $true_by_mime || $true_by_ext;
	}

	/**
	 * Make crop from top image
	 */
	public static function make_crop_position_from_top( $payload, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {
		// Change this to a conditional that decides whether you want to override the defaults for this image or not.
		if ( false ) {
			return $payload;
		}

		if ( $crop ) {
			// crop the largest possible portion of the original image that we can size to $dest_w x $dest_h
			$aspect_ratio = $orig_w / $orig_h;
			$new_w        = min( $dest_w, $orig_w );
			$new_h        = min( $dest_h, $orig_h );

			if ( ! $new_w ) {
				$new_w = intval( $new_h * $aspect_ratio );
			}

			if ( ! $new_h ) {
				$new_h = intval( $new_w / $aspect_ratio );
			}

			$size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );

			$crop_w = round( $new_w / $size_ratio );
			$crop_h = round( $new_h / $size_ratio );

			$s_x = 0; // [[ formerly ]] ==> floor( ($orig_w - $crop_w) / 2 );
			$s_y = 0; // [[ formerly ]] ==> floor( ($orig_h - $crop_h) / 2 );

		} else {
			// don't crop, just resize using $dest_w x $dest_h as a maximum bounding box
			$crop_w = $orig_w;
			$crop_h = $orig_h;

			$s_x = 0;
			$s_y = 0;

			list( $new_w, $new_h ) = wp_constrain_dimensions( $orig_w, $orig_h, $dest_w, $dest_h );
		}

		// if the resulting image would be the same size or larger we don't want to resize it
		if ( $new_w >= $orig_w && $new_h >= $orig_h ) {
			return false;
		}

		// the return array matches the parameters to imagecopyresampled()
		// int dst_x, int dst_y, int src_x, int src_y, int dst_w, int dst_h, int src_w, int src_h
		return [ 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h ];
	}

	/**
	 * Simply resize image
	 */
	public static function get_img_resized( $url, $width, $height = null, $crop_from_top = false, $upscale = false ) {
		if ( ! self::is_attachment_jpg_or_png( $url ) ) {
			return $url;
		}

		if ( $crop_from_top ) {
			add_filter( 'image_resize_dimensions', [ 'empat\helper\media', 'make_crop_position_from_top' ], 10, 6 );
		}

		$resized = \aq_resize( $url, $width, $height, true, true, $upscale );

		if ( $crop_from_top ) {
			remove_filter( 'image_resize_dimensions', [ 'empat\helper\media', 'make_crop_position_from_top' ], 10 );
		}

		if ( is_string( $resized ) && $resized <> '' ) {
			return $resized;
		} else {
			return $url;
		}
	}

}
