<?php
$autoplay = (get_theme_option('home_slider_autoplay') !== null) ? get_theme_option('home_slider_autoplay') : '1';
$autoplaySpeed = (get_theme_option('home_slider_autoplay_speed') !== null) ? (int) get_theme_option('home_slider_autoplay_speed') : 5000;
$autoplayOptions = ($autoplay == '1') ? 'autoplay: true, autoplaySpeed: ' . $autoplaySpeed . ',' : 'autoplay: false,';
queue_css_url('//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css');
queue_js_url('//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js');
queue_js_string('
    jQuery(document).ready(function(){
      jQuery("#featured").slick({
        slidesToShow: 1,
        slidesToScroll: 1,' . 
        $autoplayOptions . 
        'arrows: false,
        centerMode: true,
        fade: true,
        dots: true
      });
    });
');
?>
<?php echo head(array('bodyid'=>'home')); ?>

<!-- Featured Item -->
<div id="featured">

    <?php if (get_theme_option('Display Featured Item') !== '0' && count(get_random_featured_items()) > 0): ?>
    <?php echo random_featured_items(3); ?>
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Collection') !== '0' && get_random_featured_collection()): ?>
    <?php echo random_featured_collection(); ?>
    <?php endif; ?>
    <?php if ((get_theme_option('Display Featured Exhibit') !== '0')
            && plugin_is_active('ExhibitBuilder')
            && function_exists('centerrow_display_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo centerrow_display_featured_exhibit(); ?>
    <?php endif; ?>
</div><!--end featured-item-->

<div id="homepage-text-block">
  <div id="learn-more">
    <h1>FWWCP</h1>
    <h2>Digital Collections</h2>
    <a href="/about"><button>Learn more</button></a>
  </div>  
  <?php if (get_theme_option('Homepage Text')): ?>
  <div id="homepage-text"><?php echo get_theme_option('Homepage Text'); ?></div>
  <?php endif; ?>
  </div>
</div>


<div id="getting-started-block">
  <div id="wrap">
    <h2>GETTING STARTED</h2>
    <div id="getting-started-options">
      <div class="getting-started-option">
        <a href="/using-collections">
          <img src="http://fwwcpdigitalcollection.org/files/original/8717104c1b72f71fc8e324ab101f3ed3.png" width="300px" />
        </a>  
        <h3>Using the Collections</h3>
      </div>
      <div class="getting-started-option">
        <a href="/reading-guides">
          <img src="http://fwwcpdigitalcollection.org/files/original/0ae7c530967cc9078390cac6fdb4dcc8.png" width="300px" />
        </a>  
        <h3>Reading Guides</h3>
      </div>
      <div class="getting-started-option">
        <a href="/history">
          <img src="http://fwwcpdigitalcollection.org/files/original/4248af7c7e7e109b6a10c8a25b1425f5.jpg" width="300px" />
        </a>
        <h3>FWWCP History</h3>
      </div>
    </div>
  </div>
</div>


<div id="why-use-these-collections-block">
  <div id="wrap">
    <h2>WHY USE THESE COLLECTIONS</h2>
    <div id="testimonial-container">
      <div class="testimonial">
      <iframe width="475" height="300" src="https://www.youtube.com/embed/a4rGtt3EWVM?clip=Ugkx1HMAuSLZ0LEFH2dY9uHg4qN77YFfTgXd&amp;clipt=EMPHORin2jw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
      <div class="testimonial">
        <iframe width="475" height="300" src="https://www.youtube.com/embed/1qQ0XUz26yY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
    </div>
    <div id="watch-more-container">
      <a href="why-use-collections"><button>Watch More</button></a>
    </div>
  </div>
</div>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
