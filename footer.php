		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<nav role="navigation">
							<?php wp_nav_menu(array(
								'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
								'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
								'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
								'menu_class' => 'nav footer-nav cf',            // adding custom nav class
								'theme_location' => 'footer-links',             // where it's located in the theme
								'before' => '',                                 // before the menu
								'after' => '',                                  // after the menu
								'link_before' => '',                            // before each link
								'link_after' => '',                             // after each link
								'depth' => 0,                                   // limit the depth of the nav
								'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
							)); ?>
						</nav>
						<section class="meta">
						    <p class="colophon"><img src="/wp-content/uploads/2015/07/cc.large_.png" class="tiny-cc-logo" alt="creative commons icon"/> 2007-<?php echo date('Y');?>BIL Conference | </p>
						    <p class="sponsors">Web hosting courtesy of <a href="http://mediatemple.7eer.net/c/138444/176548/2795">Media Temple</a>. Web fonts served by <a href="http://www.typekit.com/?utm_source=grok&amp;utm_medium=sponsor&amp;utm_content=gkge130201&amp;utm_campaign=general">Adobe Typekit</a>. Made with <i class="ss-icon">heart</i> in New York City.</p>
						 </section>
						<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>


