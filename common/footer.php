</article><!-- end content -->

<footer role="contentinfo">

    <div id="footer-content" class="center-div">
        <?php if($footerText = get_theme_option('Footer Text')): ?>
        <div id="custom-footer-text">
            <p><?php echo get_theme_option('Footer Text'); ?></p>
        </div>
        <?php endif; ?>
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>
        <nav id="bottom-nav">
            <ul class="navigation">
                <li><a href="/">The FWWCP Digital Collection</a></li>
                <li><a href="/about">About the Project</a></li>
                <li><a href="/contact">Contact</a></li>

            </ul>
	    </nav>

    </div><!-- end footer-content -->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.skipNav();
        CenterRow.megaMenu();
    });
</script>

</body>

</html>
