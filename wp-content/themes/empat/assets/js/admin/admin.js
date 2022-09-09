(function($){

	class ThemeAdmin {

		constructor() {

			// add InsertMedia button to Insert/Edit link dialog
			this.addInsertEditLinkMediaUploader();

			// disable save post by press Enter key
			this.disableKeyPressSavePost();

			// flexible content UI tweaks
			this.pageBuilderUITweaks();

		}

		/**
		 * Add Media Uploader button to insert / Edit link TinyMCE editor
		 */
		 addInsertEditLinkMediaUploader() {

			$(document).on( 'wplink-open', function( wrap ) {

				// Custom HTML added to the link dialog
				if( $('#bilberrry-link-to-media-btn').length < 1 ) {
					$( '<div id="wp-link-media-field"><p>Or choose existing media file</p><div><label><span>&nbsp;</span></label><button class="button" id="empat-link-to-media-btn">Choose media</button></div>').insertAfter( $('#link-options') );
				}
			
			});

			let image_frame;

			$(document).on( 'click', '#bilberrry-link-to-media-btn', function( e ) {
				e.preventDefault();

				if( ! image_frame ){
					image_frame = wp.media({
						title: 'Select Media',
						multiple : false
					}).on( 'select', function() {
						const attachment = image_frame.state().get('selection').first().toJSON();
						$('#wp-link-url').val( attachment.url );
					});
				}

				image_frame.open();

			});

		}

		/**
		 * Disable save post by press Enter key
		 */
		disableKeyPressSavePost() {

			$('.post-php input#title, .post-new-php input#title').on( 'keydown', function( e ) {

				if( e.keyCode == 13 ) {
					return false;
				}

			});

		}

		/**
		 * Page builder UI tweaks
		 */
		pageBuilderUITweaks() {
			$('.post-php .acf-flexible-content .layout, .post-new-php .acf-flexible-content .layout').addClass('-collapsed');
		}

	}

	window.ThemeAdmin = new ThemeAdmin();

})( window.jQuery );
