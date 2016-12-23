<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Sydney
 */
?>
<aside itemscope itemtype="https://schema.org/WPSideBar">
	<?php
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
	?>

	<!--<div id="secondary" class="widget-area col-md-3" role="complementary">
	<?php /*dynamic_sidebar( 'sidebar-1' ); */?>
</div>--><!-- #secondary -->
</aside>