<!doctype html>
<html class="no-js html h-100" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="x-ua-compatible" content="IE=Edge"/>
	<link rel="icon" href="/favicon.ico">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script>(function (w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start':
					new Date().getTime(), event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-KZQ74WJ');</script>
	<!-- End Google Tag Manager -->

</head>

<body <?php body_class( 'd-flex flex-column h-100' ); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript>
	<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KZQ74WJ"
			height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<?php
/* Calling the navigation.php file in the template-parts folder. */
get_template_part( 'template-parts/navigation' ); ?>

<main class="flex-shrink-0">
	<div id="content">
