<?php
/**
 * The Header for our theme.
 *
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */
?><!DOCTYPE html>
<?php
	if ($_GET && key_exists('mfn-rtl', $_GET)):
		echo '<html class="no-js" lang="ar" dir="rtl">';
	else:
?>
<html <?php language_attributes(); ?> class="no-js<?php echo esc_attr(mfn_user_os()); ?>"<?php mfn_tag_schema(); ?>>
	
<!--
  _____ _       _____    _      _ _      __      __   _    
 |_   _| |_  __|_   _| _(_)_ _ (_) |_ _  \ \    / /__| |__ 
   | | | ' \/ -_)| || '_| | ' \| |  _| || \ \/\/ / -_) '_ \
   |_| |_||_\___||_||_| |_|_||_|_|\__|\_, |\_/\_/\___|_.__/.com.br
                                      |__/                 
-->

<?php endif; ?>

<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<?php wp_head(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '4245315228904646');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=4245315228904646&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	
<!-- Global site tag (gtag.js) - Google Ads: 725165602 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-725165602"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-725165602');
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143913870-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143913870-1');
</script>
</head>

<body <?php body_class(); ?>>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<a href="https://api.whatsapp.com/send?phone=5521991429642&text=Oi!%20Vi%20o%20site%20e%20gostaria%20de%20saber%20mais%20sobre%20a%20Pousada%20Le%20Ange." class="float" target="_blank">
		<i class="fa fa-whatsapp my-float"></i>
	</a>

	<script>
		function book() {

			var url = 'https://hbook.hsystem.com.br/Booking?companyId=5e331846ab41d417304faf87&checkin=&checkout=&adults=&children=&promocode='; // URL DO HBOOK

			var a = document.getElementById("adulto");
			var strAdulto = a.options[a.selectedIndex].value;
			url += '&adults=' + strAdulto;

			var chegada = document.getElementById("chegada").value; 
			url += '&checkin=' + chegada;

			var saida = document.getElementById("saida").value;
			url += '&checkout=' + saida;

			window.open(url);
		}
	</script>

	<style>
	a.float2 {
    position: fixed;
    bottom: -30px;
    left: 0px;
    z-index: 100;
    transform: scale(.7);
	}

	a.float2 {
    position: fixed;
    bottom: -30px;
    left: 0px;
    z-index: 100;
    transform: scale(.7);
	}

	.blob {;
	box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
	animation: pulse-black 2s infinite;
	}

	@keyframes pulse-black {
	0% {
		transform: scale(0.6);
	}
	
	70% {
		transform: scale(0.7);
	}
	
	100% {
		transform: scale(0.6);
	}
	}

	@media only screen and (min-width: 769px) {
		.mobonly{
			display: none!important;
		}
	}

	@media only screen and (max-width: 769px) {
		.deskonly{
			display: none!important;
		}

		@keyframes pulse-black {
			0% {
				transform: scale(0.4);
			}
			
			70% {
				transform: scale(0.5);
			}
			
			100% {
				transform: scale(0.4);
			}
		}

		a.float2.blob.mobonly {
			right: -70px;
			left: unset;
			bottom: -70px;
		}
	}

	.float{
		position:fixed;
		width:60px;
		height:60px;
		bottom:40px;
		right:40px;
		background-color:#25d366;
		color:#FFF;
		border-radius:50px;
		text-align:center;
		font-size:30px;
		box-shadow: 2px 2px 3px #999;
		z-index:100;
	}

	.my-float{
		margin-top:16px;
	}

	.HSystemBox {
		font-family: Arial, Sans-serif;
		padding-top:5px;
		padding-bottom:5px;
		text-align:center;
		width:100%;
		font-size: 14px;
	}

	.HSystemBox input, .HSystemBox select{
		padding:7px;
		border:solid #333 1px;
		border-radius:0;
		margin:5px 0px 0px 0px !important;
		margin-left:0;
		width:100%;
	}

	.HSystemBox {
		display: inline-flex;
		align-items: center;
		place-content: space-evenly;
	}

	.HSystemBox > label {
		width: calc(25% - 20px);
	}

	.HSystemBox > input.book {
		width: 15%;
		padding: 12px 7px!important;
		margin: 0!important;
		height: 100%;
		margin-top: 25px!important;
	}


	select#adulto {
		padding: 10px;
		border: solid #333 1px;
		border-radius: 0;
		margin: 5px 0px 0px 0px!important;
		margin-left: 0;
		width: 100%;
	}


	</style>

	<?php do_action('mfn_hook_top'); ?>

	<?php get_template_part('includes/header', 'sliding-area'); ?>

	<?php
		if (mfn_header_style(true) == 'header-creative') {
			get_template_part('includes/header', 'creative');
		}
	?>

	<div id="Wrapper">

		<?php

			// featured image: parallax

			$class = '';
			$data_parallax = array();

			if (mfn_opts_get('img-subheader-attachment') == 'parallax') {
				$class = 'bg-parallax';

				if (mfn_opts_get('parallax') == 'stellar') {
					$data_parallax['key'] = 'data-stellar-background-ratio';
					$data_parallax['value'] = '0.5';
				} else {
					$data_parallax['key'] = 'data-enllax-ratio';
					$data_parallax['value'] = '0.3';
				}
			}
		?>

		<?php
			if (mfn_header_style(true) == 'header-below') {
				echo mfn_slider();
			}
		?>

		<div id="Header_wrapper" class="<?php echo esc_attr($class); ?>" <?php if ($data_parallax) {
			printf('%s="%.1f"', $data_parallax['key'], $data_parallax['value']);
		} ?>>

			<?php
				if ('mhb' == mfn_header_style()) {

					// mfn_header action for header builder plugin

					do_action('mfn_header');
					echo mfn_slider();

				} else {

					echo '<header id="Header">';
						if (mfn_header_style(true) != 'header-creative') {
							get_template_part('includes/header', 'top-area');
						}
						if (mfn_header_style(true) != 'header-below') {
							echo mfn_slider();
						}
					echo '</header>';

				}
			?>

			<?php
				if ((mfn_opts_get('subheader') != 'all') &&
					(! get_post_meta(mfn_ID(), 'mfn-post-hide-title', true)) &&
					(get_post_meta(mfn_ID(), 'mfn-post-template', true) != 'intro')) {

					$subheader_advanced = mfn_opts_get('subheader-advanced');

					if (is_search()) {

						echo '<div id="Subheader">';
							echo '<div class="container">';
								echo '<div class="column one">';

									if (trim($_GET['s'])) {
										global $wp_query;
										$total_results = $wp_query->found_posts;
									} else {
										$total_results = 0;
									}

									$translate['search-results'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-results', 'results found for:') : __('results found for:', 'betheme');
									echo '<h1 class="title">'. esc_html($total_results) .' '. esc_html($translate['search-results']) .' '. esc_html($_GET['s']) .'</h1>';

								echo '</div>';
							echo '</div>';
						echo '</div>';

					} elseif (! mfn_slider_isset() || (is_array($subheader_advanced) && isset($subheader_advanced['slider-show']))) {

						// subheader

						$subheader_options = mfn_opts_get('subheader');

						if (is_home() && ! get_option('page_for_posts') && ! mfn_opts_get('blog-page')) {
							$subheader_show = false;
						} elseif (is_array($subheader_options) && isset($subheader_options[ 'hide-subheader' ])) {
							$subheader_show = false;
						} elseif (get_post_meta(mfn_ID(), 'mfn-post-hide-title', true)) {
							$subheader_show = false;
						} else {
							$subheader_show = true;
						}

						// title

						if (is_array($subheader_options) && isset($subheader_options[ 'hide-title' ])) {
							$title_show = false;
						} else {
							$title_show = true;
						}

						// breadcrumbs

						if (is_array($subheader_options) && isset($subheader_options[ 'hide-breadcrumbs' ])) {
							$breadcrumbs_show = false;
						} else {
							$breadcrumbs_show = true;
						}

						if (is_array($subheader_advanced) && isset($subheader_advanced[ 'breadcrumbs-link' ])) {
							$breadcrumbs_link = 'has-link';
						} else {
							$breadcrumbs_link = 'no-link';
						}

						// output

						if ($subheader_show) {

							echo '<div id="Subheader">';
								echo '<div class="container">';
									echo '<div class="column one">';

										if ($title_show) {
											$title_tag = mfn_opts_get('subheader-title-tag', 'h1');
											echo '<'. esc_attr($title_tag) .' class="title">'. wp_kses(mfn_page_title(), mfn_allowed_html()) .'</'. esc_attr($title_tag) .'>';
										}

										if ($breadcrumbs_show) {
											mfn_breadcrumbs($breadcrumbs_link);
										}

									echo '</div>';
								echo '</div>';
							echo '</div>';

						}
					}
				}
			?>

		</div>

		<?php
			if (get_post_meta(mfn_ID(), 'mfn-post-template', true) == 'intro') {
				get_template_part('includes/header', 'single-intro');
			}
		?>

		<?php do_action('mfn_hook_content_before');
