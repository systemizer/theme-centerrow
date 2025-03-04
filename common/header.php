<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ($author = option('author')): ?>
    <meta name="author" content="<?php echo $author; ?>" />
    <?php endif; ?>
    <?php if ($copyright = option('copyright')): ?>
    <meta name="copyright" content="<?php echo $copyright; ?>" />
    <?php endif; ?>
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file(array('style', 'public', 'iconfonts'));
    queue_css_url('https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,700,700italic');
    echo head_css();
    echo $this->partial('common/theme_option_styles.php');
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_file(array('globals'));
    queue_js_file(array('centerrow', 'jquery-accessibleMegaMenu'), 'js');
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">

        <header role="banner">
	    <div class="block-wrap">

            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

            <div id="search-container" role="search">
                <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                <?php echo search_form(array('show_advanced' => true, 'form_attributes' => array('role' => 'search', 'class' => 'closed'))); ?>
                <?php else: ?>
                <?php echo search_form(array('form_attributes' => array('role' => 'search', 'class' => 'closed'))); ?>
                <?php endif; ?>
                <button type="button" class="search-toggle" title="<?php echo __('Toggle search'); ?>"></button>
            </div>

	    <div id="top-nav-container">
              <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>
              <nav id="top-nav" role="navigation">
                <?php echo centerrow_public_nav_main(); ?>
              </nav>
	    </div>

            <?php echo theme_header_image(); ?>
	    </div>

        </header>

        <article id="content" role="main">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
