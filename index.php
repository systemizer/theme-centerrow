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
<?php echo head(array('bodyid' => 'home')); ?>




<div id="homepage-text-block" class="homepage-block">
  <div class="flex-top">
    <div id="learn-more">
      <h1>FWWCP</h1>
      <h3>Digital Collections</h3>
      <a href="/collections/browse"><button>Browse Collections</button></a>
    </div>
    <?php if (get_theme_option('Homepage Text')): ?>
      <div id="homepage-text">
        <?php echo get_theme_option('Homepage Text'); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Featured Item -->

<div id="featured" class="homepage-block">

  <?php if (get_theme_option('Display Featured Item') !== '0' && count(get_random_featured_items()) > 0): ?>
    <?php echo random_featured_items(8); ?>
  <?php endif; ?>
  <?php if (get_theme_option('Display Featured Collection') !== '0' && get_random_featured_collection()): ?>
    <?php echo random_featured_collection(); ?>
  <?php endif; ?>
  <?php if (
    (get_theme_option('Display Featured Exhibit') !== '0')
    && plugin_is_active('ExhibitBuilder')
    && function_exists('centerrow_display_featured_exhibit')
  ): ?>
    <!-- Featured Exhibit -->
    <?php echo centerrow_display_featured_exhibit(); ?>
  <?php endif; ?>
</div><!--end featured-item-->



<div id="getting-started-block" class="homepage-block inverted">
  <h2>GETTING STARTED</h2>
  <div class="flex">
    <div class="getting-started-option">
      <a href="/using-collections">
        <img src="http://fwwcpdigitalcollection.org/files/original/8717104c1b72f71fc8e324ab101f3ed3.png"
          width="300px" />
      </a>
      <h4>Using the Collections</h4>
    </div>
    <div class="getting-started-option">
      <a href="/reading-guides">
        <img src="http://fwwcpdigitalcollection.org/files/original/0ae7c530967cc9078390cac6fdb4dcc8.png"
          width="300px" />
      </a>
      <h4>Reading Guides</h4>
    </div>
    <div class="getting-started-option">
      <a href="/history">
        <img src="http://fwwcpdigitalcollection.org/files/original/4248af7c7e7e109b6a10c8a25b1425f5.jpg"
          width="300px" />
      </a>
      <h4>FWWCP History</h4>
    </div>
  </div>
</div>

<div id="testimonials-container" class="homepage-block">
  <h2>WHY THIS COLLECTION MATTERS</h2>
  <div class="flex-top">
    <div class="testimonial">
      <img width="250" height="375" src="https://fwwcpdigitalcollection.org/files/static/stevenagesurvivors.jpg" />
      <h4>Roy Birch</h4>
      <p>"The voices heard through the work of The Federation of Worker Writers, and its offspring, The FED, are <b><a
            href="/why-use-collections#:~:text=of%20collective%20humanity.%E2%80%9D-,Roy%20Birch,-%2C%20past%2DChair%20TheFED">those
            of the marginalised and the excluded, and they proclaim the poetry of
            difference</a></b>, and the right of that difference to full inclusion as a component of true social
        stability, and the right of all humans to express humanity, and, more importantly, to be heard and taken
        notice of. The archive of the FWWCP/The FED is potentially an extremely valuable mechanism for change through
        social education. The archive is essential."</p>
      <i>past-Chair TheFED</i>
    </div>
    <div class="testimonial">
      <img width="250" height="375" src="https://fwwcpdigitalcollection.org/files/static/SallyFlood.jpg" />
      <h4>Sally Flood</h4>
      <p>“I think that I am the oldest member in the group. It’s a great feeling to be part of this Federation. It
        changed my life actually…<b><a
            href="/why-use-collections#:~:text=to%20this%20point.%E2%80%9D-,Sally%20Flood,-FED%20Executive%20Board">The
            archive is a great idea, a lovely idea, coz we were once told that we were
            irrelevant to literacy [by the Arts Council]</a></b>, so no I think this is great that we have got to this
        point.”</p>
      <i>FED Executive Board Member</i>
    </div>
    <div class="testimonial">
      <img width="250" height="375" src="https://fwwcpdigitalcollection.org/files/static/alehouse.jpg" />
      <h4>Nick Pollard</h4>
      <p>"There are <b><a
            href="/why-use-collections#:~:text=no%2Done%20else!-,Nick%20Pollard,-Heeley%20Writers%20(1980">thousands
            of voices and testimonies, poems, short stories and
            anecdotes from communities across the UK</a></b>, and it is an important record of the everyday lives of
        the generations living through the transitions leading to – and through – the advent of neoliberalism – as
        imagined, recorded, written, published and distributed by themselves – and no-one else!"</p>
      <i>Heeley Writers (1980-2007) <br> Hackney Writers (1982-3) <br> Pecket Well Learning Community (2010-14) <br>
        Occupational Therapy without Borders (reciprocal member 2005-7) <br> Federation Editor (1991-2007) <br>
        Federation exec member (1985-8; 1991-2007)</i>
    </div>
  </div>
</div>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>