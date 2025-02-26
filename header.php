<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package karlhawptheme
 */

?>
<html data-wf-page="6027894106ca1eb40118e6f5" data-wf-site="6027894006ca1e367918e6f4" class="w-mod-js w-mod-ix wf-lato-i1-active wf-lato-n1-active wf-lato-i4-active wf-lato-n3-active wf-lato-n7-active wf-lato-n9-active wf-montserrat-i7-active wf-montserrat-i1-active wf-montserrat-i5-active wf-montserrat-i9-active wf-montserrat-i8-active wf-montserrat-i3-active wf-montserrat-i2-active wf-montserrat-i4-active wf-montserrat-i6-active wf-martelsans-n2-active wf-lato-i3-active wf-lato-n4-active wf-lato-i7-active wf-lato-i9-active wf-montserrat-n7-active wf-montserrat-n5-active wf-montserrat-n1-active wf-montserrat-n3-active wf-montserrat-n2-active wf-montserrat-n9-active wf-montserrat-n4-active wf-montserrat-n6-active wf-montserrat-n8-active wf-martelsans-n3-active wf-martelsans-n4-active wf-martelsans-n6-active wf-martelsans-n7-active wf-martelsans-n8-active wf-martelsans-n9-active wf-merriweathersans-n7-active wf-merriweathersans-n5-active wf-merriweathersans-n6-active wf-merriweathersans-n4-active wf-merriweathersans-n3-active wf-merriweathersans-n8-active wf-merriweathersans-i4-active wf-merriweathersans-i3-active wf-merriweathersans-i8-active wf-merriweathersans-i6-active wf-merriweathersans-i7-active wf-merriweathersans-i5-active wf-active" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
	<script src="https://www.terminal-app.com/adaptive.js" type="text/javascript"></script>
	<script src="https://ucarecdn.com/libs/blinkloader/3.x/blinkloader.min.js"></script>
	<script src="https://www.terminal-app.com/utilities.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic%7CMontserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7CMartel+Sans:200,300,regular,600,700,800,900%7CMerriweather+Sans:300,regular,500,600,700,800,300italic,italic,500italic,600italic,700italic,800italic" media="all">
	<script type="text/javascript">
		WebFont.load({
			google: {
				families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic", "Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Martel Sans:200,300,regular,600,700,800,900", "Merriweather Sans:300,regular,500,600,700,800,300italic,italic,500italic,600italic,700italic,800italic"]
			}
		});
	</script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic" media="all">
	<script type="text/javascript">
		WebFont.load({
			google: {
				families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic"]
			}
		});
	</script>
	<script type="text/javascript">
		! function(o, c) {
			var n = c.documentElement,
				t = " w-mod-";
			n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
		}(window, document);
	</script>
	<link href="https://ucarecdn.com/d777b7a8-4202-45a5-ad7b-df00a85cf1d0/6050a11d0859b001f06d9bce_KARHLA.png" rel="shortcut icon" type="image/x-icon">
	<link href="https://ucarecdn.com/d777b7a8-4202-45a5-ad7b-df00a85cf1d0/6050a11d0859b001f06d9bce_KARHLA.png" rel="apple-touch-icon">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/css/intlTelInput.css" rel="stylesheet" type="text/css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.4/js.cookie.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<link id="terminal-sweet-alert-stylesheet" rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" media="all">
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="header-section">
		<div class="main-navigation w-nav" data-collapse="medium" data-animation="default" data-duration="400" role="banner">
			<div class="nav-container">
				<div class="top-header-block">
					<div class="header-shipping-block">
						<div class="shipping-location-embed w-embed"><a class="header-shipping-text" data-shippingtext="shipping" onclick="TerminalStore.displayCurrencySelector(event)">Shipping to: Nigeria</a></div>
					</div>
					<div class="nav-brand-block"><a class="nav-brand w-nav-brand w--current" href="/" aria-label="home"><img class="nav-brand-logo" src="<?php echo KARLHA_ASSETS_URL; ?>images/Karhla-Jewels-Logo.png" loading="lazy" alt=""><img class="mobile-nav-brand-logo" src="<?php echo KARLHA_ASSETS_URL; ?>images/KARHLA.png" loading="lazy" alt=""></a></div>
					<div class="top-header-icon-wrapper">
						<div class="top-header-icon-block search"><a class="top-header-icon search w-inline-block" href="/search"></a></div>
						<div class="top-header-icon-block currency">
							<div class="top-header-icon-text currency" data-currency-text="currency" style="cursor: pointer;">NGN</div>
						</div>
						<div class="top-header-icon-block account"><a class="top-header-icon account w-inline-block" data-account-link="" href="/account/login"></a></div>
						<div class="top-header-icon-block cart"><a class="top-header-icon w-inline-block" data-cartlink="" href="/cart/?id=8xWbgIG06g4HwQvwhSGnyriB"></a>
							<div class="cart-count" data-cart-count="cart-count">0</div>
						</div>
					</div>
				</div>
				<div class="bottom-menu-block">
					<nav class="nav-menu w-nav-menu" role="navigation">
						<div class="header-nav-link-block" data-w-id="f85bd51c-be44-a2bc-2de4-613f8f72daf0"><a class="header-nav-link w-nav-link" href="/category/watches">NECKLACES</a>
							<div class="header-nav-dropdown">
								<div class="nav-dropdown-container">
									<div class="nav-dropdown-link-block"><a class="nav-dropdown-link" href="/category/watches/ladies">Ladies</a></div>
									<div class="nav-dropdown-link-block"><a class="nav-dropdown-link" href="/category/watches/gents">Gents</a></div>
								</div>
							</div>
						</div>
						<div class="header-nav-link-block" data-w-id="f85bd51c-be44-a2bc-2de4-613f8f72daf0"><a class="header-nav-link w-nav-link" href="/category/bracelets">BRACELETS</a>
							<div class="header-nav-dropdown" style="display: none; opacity: 0;">
								<div class="nav-dropdown-container">
									<div class="nav-dropdown-link-block"><a class="nav-dropdown-link" href="/category/bracelets/ladies">Ladies</a></div>
									<div class="nav-dropdown-link-block"><a class="nav-dropdown-link" href="/category/bracelets/gents">Gents</a></div>
								</div>
							</div>
						</div>
						<div class="header-nav-link-block" data-w-id="f85bd51c-be44-a2bc-2de4-613f8f72daf0"><a class="header-nav-link w-nav-link" href="/category/rings-copy">RINGS</a>
							<div class="header-nav-dropdown">
								<div class="nav-dropdown-container">
									<div class="nav-dropdown-link-block"><a class="nav-dropdown-link" href="/category/rings-copy/engagement-rings">Engagement Rings</a></div>
									<div class="nav-dropdown-link-block"><a class="nav-dropdown-link" href="/category/rings-copy/cocktail-rings">Cocktail Rings</a></div>
									<div class="nav-dropdown-link-block"><a class="nav-dropdown-link" href="/category/rings-copy/band-rings">Band Rings</a></div>
								</div>
							</div>
						</div>
						<div class="header-nav-link-block" data-w-id="f85bd51c-be44-a2bc-2de4-613f8f72daf0"><a class="header-nav-link w-nav-link" href="/category/accessories-8">ACCESSORIES</a></div>
						<div class="header-nav-link-block" data-w-id="f85bd51c-be44-a2bc-2de4-613f8f72daf0"><a class="header-nav-link w-nav-link" href="/category/sets-3">SETS</a></div>
						<div class="header-nav-link-block" data-w-id="f85bd51c-be44-a2bc-2de4-613f8f72daf0"><a class="header-nav-link w-nav-link" href="/category/earrings-2">EARRINGS</a>
							<div class="header-nav-dropdown">
								<div class="nav-dropdown-container">
									<div class="nav-dropdown-link-block"><a class="nav-dropdown-link" href="/category/earrings-2/stud-earrings">Stud earrings</a></div>
									<div class="nav-dropdown-link-block"><a class="nav-dropdown-link" href="/category/earrings-2/dangle-earrings">Dangle earrings</a></div>
									<div class="nav-dropdown-link-block"><a class="nav-dropdown-link" href="/category/earrings-2/hoop-earrings">Hoop earrings</a></div>
								</div>
							</div>
						</div>
						<div class="header-nav-link-block" data-w-id="f85bd51c-be44-a2bc-2de4-613f8f72daf0"><a class="header-nav-link w-nav-link" href="/category/val-s-day">VAL'S DAY</a></div>
						<div class="mobile-nav-link-block">
							<div class="mobile-dropdown-link w-dropdown" data-hover="" data-delay="0">
								<div class="mobile-dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-0" aria-controls="w-dropdown-list-0" aria-haspopup="menu" aria-expanded="false" role="button" tabindex="0">
									<div class="w-icon-dropdown-toggle"></div>
									<div class="link-text">Necklaces</div>
								</div>
								<nav class="mobile-dropdown-list-block w-dropdown-list" id="w-dropdown-list-0" aria-labelledby="w-dropdown-toggle-0"><a class="mobile-sub-category-link w-dropdown-link" href="/category/watches" tabindex="0">Necklaces</a><a class="mobile-sub-category-link w-dropdown-link" href="/category/watches/ladies" tabindex="0">Ladies</a><a class="mobile-sub-category-link w-dropdown-link" href="/category/watches/gents" tabindex="0">Gents</a></nav>
							</div>
						</div>
						<div class="mobile-nav-link-block">
							<div class="mobile-dropdown-link w-dropdown" data-hover="" data-delay="0">
								<div class="mobile-dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-1" aria-controls="w-dropdown-list-1" aria-haspopup="menu" aria-expanded="false" role="button" tabindex="0">
									<div class="w-icon-dropdown-toggle"></div>
									<div class="link-text">Bracelets</div>
								</div>
								<nav class="mobile-dropdown-list-block w-dropdown-list" id="w-dropdown-list-1" aria-labelledby="w-dropdown-toggle-1"><a class="mobile-sub-category-link w-dropdown-link" href="/category/bracelets" tabindex="0">Bracelets</a><a class="mobile-sub-category-link w-dropdown-link" href="/category/bracelets/ladies" tabindex="0">Ladies</a><a class="mobile-sub-category-link w-dropdown-link" href="/category/bracelets/gents" tabindex="0">Gents</a></nav>
							</div>
						</div>
						<div class="mobile-nav-link-block">
							<div class="mobile-dropdown-link w-dropdown" data-hover="" data-delay="0">
								<div class="mobile-dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-2" aria-controls="w-dropdown-list-2" aria-haspopup="menu" aria-expanded="false" role="button" tabindex="0">
									<div class="w-icon-dropdown-toggle"></div>
									<div class="link-text">Rings</div>
								</div>
								<nav class="mobile-dropdown-list-block w-dropdown-list" id="w-dropdown-list-2" aria-labelledby="w-dropdown-toggle-2"><a class="mobile-sub-category-link w-dropdown-link" href="/category/rings-copy" tabindex="0">Rings</a><a class="mobile-sub-category-link w-dropdown-link" href="/category/rings-copy/engagement-rings" tabindex="0">Engagement Rings</a><a class="mobile-sub-category-link w-dropdown-link" href="/category/rings-copy/cocktail-rings" tabindex="0">Cocktail Rings</a><a class="mobile-sub-category-link w-dropdown-link" href="/category/rings-copy/band-rings" tabindex="0">Band Rings</a></nav>
							</div>
						</div>
						<div class="mobile-nav-link-block">
							<div class="mobile-dropdown-link w-dropdown" data-hover="" data-delay="0">
								<div class="mobile-dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-3" aria-controls="w-dropdown-list-3" aria-haspopup="menu" aria-expanded="false" role="button" tabindex="0">
									<div class="w-icon-dropdown-toggle"></div>
									<div class="link-text">Accessories</div>
								</div>
								<nav class="mobile-dropdown-list-block w-dropdown-list" id="w-dropdown-list-3" aria-labelledby="w-dropdown-toggle-3"><a class="mobile-sub-category-link w-dropdown-link" href="/category/accessories-8" tabindex="0">Accessories</a></nav>
							</div>
						</div>
						<div class="mobile-nav-link-block">
							<div class="mobile-dropdown-link w-dropdown" data-hover="" data-delay="0">
								<div class="mobile-dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-4" aria-controls="w-dropdown-list-4" aria-haspopup="menu" aria-expanded="false" role="button" tabindex="0">
									<div class="w-icon-dropdown-toggle"></div>
									<div class="link-text">Sets</div>
								</div>
								<nav class="mobile-dropdown-list-block w-dropdown-list" id="w-dropdown-list-4" aria-labelledby="w-dropdown-toggle-4"><a class="mobile-sub-category-link w-dropdown-link" href="/category/sets-3" tabindex="0">Sets</a></nav>
							</div>
						</div>
						<div class="mobile-nav-link-block">
							<div class="mobile-dropdown-link w-dropdown" data-hover="" data-delay="0">
								<div class="mobile-dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-5" aria-controls="w-dropdown-list-5" aria-haspopup="menu" aria-expanded="false" role="button" tabindex="0">
									<div class="w-icon-dropdown-toggle"></div>
									<div class="link-text">Earrings</div>
								</div>
								<nav class="mobile-dropdown-list-block w-dropdown-list" id="w-dropdown-list-5" aria-labelledby="w-dropdown-toggle-5"><a class="mobile-sub-category-link w-dropdown-link" href="/category/earrings-2" tabindex="0">Earrings</a><a class="mobile-sub-category-link w-dropdown-link" href="/category/earrings-2/stud-earrings" tabindex="0">Stud earrings</a><a class="mobile-sub-category-link w-dropdown-link" href="/category/earrings-2/dangle-earrings" tabindex="0">Dangle earrings</a><a class="mobile-sub-category-link w-dropdown-link" href="/category/earrings-2/hoop-earrings" tabindex="0">Hoop earrings</a></nav>
							</div>
						</div>
						<div class="mobile-nav-link-block">
							<div class="mobile-dropdown-link w-dropdown" data-hover="" data-delay="0">
								<div class="mobile-dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-6" aria-controls="w-dropdown-list-6" aria-haspopup="menu" aria-expanded="false" role="button" tabindex="0">
									<div class="w-icon-dropdown-toggle"></div>
									<div class="link-text">Val's Day</div>
								</div>
								<nav class="mobile-dropdown-list-block w-dropdown-list" id="w-dropdown-list-6" aria-labelledby="w-dropdown-toggle-6"><a class="mobile-sub-category-link w-dropdown-link" href="/category/val-s-day" tabindex="0">Val's Day</a></nav>
							</div>
						</div>
					</nav>
					<div class="menu-button w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false">
						<div class="w-icon-nav-menu"></div>
					</div>
				</div>
			</div>
			<div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0"></div>
		</div>
	</div>