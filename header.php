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
						<div class="top-header-icon-block searchform" style="display: none;">
							<form action="" method="get">
								<span>X</span>
								<input type="text" name="search" placeholder="Search">
								<button type="submit">Search</button>
							</form>
						</div>
					</div>
				</div>
				<div class=" bottom-menu-block">
					<?php
					$menu_items = wp_get_nav_menu_items('karlha');
					$menu_tree = [];

					foreach ($menu_items as $item) {
						if ($item->menu_item_parent == 0) {
							$menu_tree[$item->ID] = [
								'title' => $item->title,
								'url'   => $item->url,
								'children' => []
							];
						} else {
							$menu_tree[$item->menu_item_parent]['children'][] = [
								'title' => $item->title,
								'url'   => $item->url
							];
						}
					}
					?>
					<nav class="nav-menu w-nav-menu" role="navigation">
						<?php foreach ($menu_tree as $item) : ?>
							<div class="header-nav-link-block" data-w-id="f85bd51c-be44-a2bc-2de4-613f8f72daf0"><a class="header-nav-link w-nav-link" href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a>
								<?php if (!empty($item['children'])) : ?>
									<div class="header-nav-dropdown">
										<div class="nav-dropdown-container">
											<?php foreach ($item['children'] as $child) : ?>
												<div class="nav-dropdown-link-block">
													<a class="nav-dropdown-link" href="<?php echo $child['url']; ?>">
														<?php echo $child['title']; ?>
													</a>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</nav>
					<div class="menu-button w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false">
						<div class="w-icon-nav-menu"></div>
					</div>
				</div>
			</div>
			<div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0"></div>
		</div>
	</div>