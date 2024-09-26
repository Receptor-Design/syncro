import { registerBlockStyle, unregisterBlockStyle } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';
import '../scss/screen.scss';

const styles = [
    {
        name: "cta-medium",
        label: "CTA Medium",
        isDefault: true
    }
];

domReady( () => {
    unregisterBlockStyle( 'core/button', 'fill' );
    unregisterBlockStyle( 'core/button', 'outline' );
    styles.forEach( style => {
        registerBlockStyle( 'core/button', style );
    } );
    registerBlockStyle( 'core/columns', {
        name: "vertical-divider",
        label: "Vertical Divider"
    } );
} );
