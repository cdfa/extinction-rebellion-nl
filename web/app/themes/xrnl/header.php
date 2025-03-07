<!DOCTYPE html>
<html>
<head>
  <meta charSet="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <meta name="google-site-verification" content="Oc-GUQaXHiPF-oVpMLzShjKqQTDGGZ3caVsE9t1Y5Kg" />
  <link rel="icon" href="<?php echo get_theme_file_uri("assets/images/favicon.png") ?>" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Montserrat" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo get_theme_file_uri("dist/fonts/fucxed.css"); ?>" />
  <link rel="stylesheet" href="<?php echo get_theme_file_uri("dist/css/app.css".date("?Ymd")."?v2"); ?>" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
  <!-- Matomo -->
  <script type="text/javascript">
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(["disableCookies"]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//extinctionrebellion.nl/matomo/";
      _paq.push(['setTrackerUrl', u+'matomo.php']);
      _paq.push(['setSiteId', '1']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <!-- End Matomo Code -->
  <?php wp_head(); ?>
</head>

<?php
  $args = wp_parse_args($args, array(
    'bg-color'      => 'green', // optional bg-color, defaults to green
    'accent-color'  => 'white', // optional highlight color, defaults to white
    'navbar-logo'   => 'xrnl-hoogwater-symbol.svg' // takes optional svg file from /dist/images
  ));
?>

<body>
  <header class="bg-xr-<?php echo $args['bg-color'] ?>">
    <nav class="navbar navbar-light navbar-expand-xl nav-accent-xr-<?php echo $args['accent-color']; ?>" role="navigation">

      <a class="navbar-brand" href="<?php echo (ICL_LANGUAGE_CODE === 'nl') ? '/' : '/en'; ?>" onclick="<?= register_button_click('logo', 'header')?>">
        <img src="<?php echo get_theme_file_uri('/dist/images/' . $args['navbar-logo']); ?>" alt="Extinction Rebellion Nederland">
      </a>

      <div>
        <?php
          $donatePage = apply_filters('wpml_object_id', 308, 'page', true); // 308 is page ID
          $donatePageURL = get_permalink( $donatePage );

          $joinPage = apply_filters('wpml_object_id', 7587, 'page', true); // 7587 is page ID
          $joinPageUrl = get_permalink( $joinPage );
        ?>
        <a href="<?php echo $donatePageURL ?>" class="btn btn-black-r-invert hide-xl" target="_blank" onclick="<?= register_button_click('donate (mobile)', 'header'); ?>"><?php _e('donate', 'theme-xrnl'); ?></a>
        <a href="<?php echo $joinPageUrl ?>" class="btn btn-black-r hide-xl" onclick="<?= register_button_click('join us (mobile)', 'header'); ?>"><?php _e('join us', 'theme-xrnl'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="main-nav">
        <?php wp_nav_menu( [
            'theme_location'         => 'primary',
            'depth'	                 => 2,
            'container'              => '',
            'menu_class'             => 'navbar-nav',
            'clicks_page_identifier' => 'header',
            'fallback_cb'            => 'WP_Bootstrap_Navwalker::fallback',
            'walker'                 => new WP_Bootstrap_Navwalker(),
          ]); 
        ?>

        <ul class="list-unstyled d-flex my-3 my-xl-0 align-items-center ml-auto">
          <li class="mx-3 mx-lg-2 show-xl">
            <?php wp_nav_menu( [
                'theme_location' => 'language',
                'container'       => '',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'menu_class'      => 'navbar-nav language-menu',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ] ); ?>
          </li>
          <li class="mx-3 mx-lg-2 show-xl">
            <a href="<?php echo $donatePageURL ?>" class="btn btn-black-r-invert" target="_blank" onclick="<?= register_button_click('donate (desktop)', 'header'); ?>"><?php _e('donate', 'theme-xrnl'); ?></a>
          </li>
          <li class="mx-3 mx-lg-2 hide-xl show-xl">
            <a href="<?php echo $joinPageUrl ?>" class="btn btn-black-r" onclick="<?= register_button_click('join us (desktop)', 'header'); ?>"><?php _e('join us', 'theme-xrnl'); ?></a>            
          </li>
        </ul>

        <div class="d-flex">
          <div class="hide-xl">
            <?php wp_nav_menu( [
                'theme_location' => 'language',
                'container'       => '',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'menu_class'      => 'navbar-nav language-menu',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ] ); ?>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main>
