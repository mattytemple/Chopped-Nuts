        
	    </div>
        <div id="footer">
			<?php print stripslashes(get_option('pd_contact_details')); ?>
        </div>
    </div>
</div>
<div id="hack"><a href="#" id="hacklink"><img src="<?php print get_bloginfo('template_directory'); ?>/img/empty.gif" alt="hackalt" width="220" height="160" /></a></div>
<?php wp_footer(); ?>
<?php if (get_option('pd_google_analytics')): ?>
	<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
    try {
    var pageTracker = _gat._getTracker("<?php echo get_option('pd_google_analytics'); ?>");
    pageTracker._trackPageview();
    } catch(err) {} </script>
<?php endif; ?>
</body>
</html>