import { registerBlockStyle, unregisterBlockStyle, registerBlockVariation } from '@wordpress/blocks';
import { useSelect } from '@wordpress/data';
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
    registerBlockStyle( 'core/post-terms', {
        name: "topic-label-black",
        label: "Black Topic Label"
    } );
    registerBlockStyle( 'core/post-template', {
        name: "standard-card",
        label: "Standard Card"
    } );
} );