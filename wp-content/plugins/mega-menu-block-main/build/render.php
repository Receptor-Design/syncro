<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
global $wp;

$disable_when_collapsed = $attributes['disableWhenCollapsed'] ?? false;
$label                  = esc_html( $attributes['label'] ?? '' );
$menu_slug              = esc_attr( $attributes['menuSlug'] ?? '');
$collapsed_url          = esc_url( $attributes['collapsedUrl'] ?? '');
$justify_menu           = esc_attr( $attributes['justifyMenu'] ?? '');
$menu_width             = esc_attr( $attributes['width'] ?? 'content');
$active_path			= esc_attr( $attributes['activePath'] ?? '');

// Don't display the mega menu link if there is no label or no menu slug.
if ( ! $label || ! $menu_slug ) {
	return null;	
}

$classes  = $disable_when_collapsed ? 'disable-menu-when-collapsed ' : '';
$classes .= $collapsed_url ? 'has-collapsed-link ' : '';
$classes .= str_starts_with( $wp->request, $active_path ) ? 'current-menu-item ' : '';

$wrapper_attributes = get_block_wrapper_attributes(
	array( 'class' => $classes )
);

$menu_classes  = 'wp-block-outermost-mega-menu__menu-container';
$menu_classes .= ' menu-width-' . $menu_width;
$menu_classes .= $justify_menu ? ' menu-justified-' . $justify_menu : '';

// Icons.
$close_icon  = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z"></path></svg>';
$toggle_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" width="12" height="12" aria-hidden="true" focusable="false" fill="none"><path d="M1.50002 4L6.00002 8L10.5 4" stroke-width="1.5"></path></svg>';
$mobile_toggle_plus = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" aria-hidden="true" focusable="false"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.75 5.5C15.75 5.08579 15.4142 4.75 15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V14.25H5.5C5.08579 14.25 4.75 14.5858 4.75 15C4.75 15.4142 5.08579 15.75 5.5 15.75H14.25V24.5C14.25 24.9142 14.5858 25.25 15 25.25C15.4142 25.25 15.75 24.9142 15.75 24.5V15.75H24.5C24.9142 15.75 25.25 15.4142 25.25 15C25.25 14.5858 24.9142 14.25 24.5 14.25H15.75V5.5Z" fill="black"/></svg>';
$mobile_toggle_minus = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" aria-hidden="true" focusable="false"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H24.5C24.9142 14.25 25.25 14.5858 25.25 15C25.25 15.4142 24.9142 15.75 24.5 15.75H5.5C5.08579 15.75 4.75 15.4142 4.75 15Z" fill="black"/></svg>';
?>

<li
	<?php echo $wrapper_attributes; ?>
	data-wp-interactive='{ "namespace": "outermost/mega-menu" }'
	data-wp-context='{ "menuOpenedBy": {} }'
	data-wp-on--focusout="actions.handleMenuFocusout"
	data-wp-on--keydown="actions.handleMenuKeydown"
	data-wp-watch="callbacks.initMenu"
>
	<button
		class="wp-block-outermost-mega-menu__toggle"
		data-wp-on--click="actions.toggleMenuOnClick"
		data-wp-bind--aria-expanded="state.isMenuOpen"
	>
		<?php echo $label; ?>
		<span class="wp-block-outermost-mega-menu__toggle-icon"><?php echo $toggle_icon; ?></span>
		<span class="wp-block-outermost-mega-menu__toggle-icon-mobile-plus"><?php echo $mobile_toggle_plus; ?></span>
		<span class="wp-block-outermost-mega-menu__toggle-icon-mobile-minus"><?php echo $mobile_toggle_minus; ?></span>
	</button>
	<div class="wp-block-outermost-mega-menu__overlay"></div>
	<div
		class="<?php echo $menu_classes; ?>"
		tabindex="-1"
	>
		<?php echo block_template_part( $menu_slug ); ?>
		<button 
			aria-label="<?php echo __( 'Close menu', 'mega-menu' ); ?>" 
			class="menu-container__close-button" 
			data-wp-on--click="actions.closeMenuOnClick"
			type="button" 
		>
			<?php echo $close_icon; ?>
		</button>
	</div>

	<?php if ( $disable_when_collapsed && $collapsed_url ) { ?>
		<a class="wp-block-outermost-mega-menu__collapsed-link" href="<?php echo $collapsed_url; ?>">
			<span class="wp-block-navigation-item__label"><?php echo $label; ?></span>
		</a>
	<?php } ?>
</li>
