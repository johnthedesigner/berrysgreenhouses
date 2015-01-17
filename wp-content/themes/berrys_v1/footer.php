	    </div> <!-- END #page -->
		<footer>
			<div class="container_12">
				<div class="grid_2 alpha">
					<img src="<?php bloginfo('template_directory'); ?>/img/logofoot.jpg" alt="Saucony" />
				</div>
				<nav class="footNav grid_3">
					<p class="footHead">Info</p>
					<?php wp_nav_menu( array( 'menu' => 'Footer Info' )); ?>
				</nav>
				<nav class="footNav grid_3">
					<p class="footHead">Products</p>
					<?php wp_nav_menu( array( 'menu' => 'Footer Products' )); ?>
				</nav>
				<div class="grid_4 omega" style="display:none;">
					<p class="footHead">Find Out First</p>
					<p class="footSubhead">Get in the loop and hear about new product and promotions.</p>
					<div class="createsend-button" style="height:27px;display:inline-block;" data-listid="r/4B/6B8/EBE/CE392B0FC614B85F">
</div><script type="text/javascript">(function () { var e = document.createElement('script'); e.type = 'text/javascript'; e.async = true; e.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://btn.createsend1.com/js/sb.min.js?v=2'; e.className = 'createsend-script'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(e, s); })();</script>
				</div>
				<span class="clearfix"></span>
		</footer>  	

<?php wp_footer(); ?>

    </body>
</html>
