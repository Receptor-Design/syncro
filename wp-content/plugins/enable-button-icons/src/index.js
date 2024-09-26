/**
 * External dependencies
 */
import classnames from 'classnames';

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { addFilter } from '@wordpress/hooks';
import { InspectorControls } from '@wordpress/block-editor';
import {
	Button,
	PanelBody,
	PanelRow,
	ToggleControl,
	__experimentalGrid as Grid, // eslint-disable-line
} from '@wordpress/components';
import {
	arrowRight,
	arrowLeft,
	chevronLeft,
	chevronLeftSmall,
	chevronRight,
	chevronRightSmall,
	cloud,
	cloudUpload,
	commentAuthorAvatar,
	download,
	external,
	help,
	info,
	lockOutline,
	login,
	next,
	previous,
	shuffle,
	wordpress,
} from '@wordpress/icons';

/**
 * All available icons.
 * (Order determines presentation order)
 */
export const ICONS = [
	{
		label: __( 'Automations + AI', 'enable-button-icons' ),
		value: 'automations-ai',
		icon: (
			<svg
				xmlns="http://www.w3.org/2000/svg"
				width={18}
				height={18}
				fill="none"
			>
				<g fill="#D55E2E" clipPath="url(#a)">
				<path d="m3 18 1-2 2-1-2-1-1-2-1 2-2 1 2 1 1 2ZM16 16l2-1-2-1-1-2-1 2-2 1 2 1 1 2 1-2ZM10 2 9 0 8 2 6 3l2 1 1 2 1-2 2-1-2-1ZM3.75 10.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM.75 7.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM3.75 4.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM.75 1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM17.25 10.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM14.25 7.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM17.25 4.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM14.25 1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM7.5 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 12a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM7.5 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
				</g>
				<defs>
				<clipPath id="a">
					<path fill="#fff" d="M0 0h18v18H0z" />
				</clipPath>
				</defs>
			</svg>
		),
	},
	{
		label: __('Patch Management', 'enable-button-icons' ),
		value: 'patch-management',
		icon: (
			<svg
				xmlns="http://www.w3.org/2000/svg"
				width={19}
				height={19}
				fill="none"
			>
				<g clipPath="url(#a)">
				<path
					fill="#D55E2E"
					d="M9.945 6.632V2.827A2.312 2.312 0 0 0 8.07.527a2.25 2.25 0 0 0-2.625 2.22v5.686l-3.09 3.041a2.25 2.25 0 0 0 0 3.182l3.84 3.841h11.25V8.132l-7.5-1.5Zm6 10.365h-9.13l-3.4-3.402a.75.75 0 0 1-.005-1.056l2.035-2.002v2.71h1.5v-10.5a.75.75 0 0 1 .881-.74.814.814 0 0 1 .619.82v5.035l7.5 1.5v7.635Z"
				/>
				</g>
				<defs>
				<clipPath id="a">
					<path fill="#fff" d="M.945.497h18v18h-18z" />
				</clipPath>
				</defs>
			</svg>
		),
	},
	{
		label: __( 'Remote Access', 'enable-button-icons' ),
		value: 'remote-access',
		icon: (
			<svg
				xmlns="http://www.w3.org/2000/svg"
				width={19}
				height={19}
				fill="none"
			>
				<g clipPath="url(#a)">
				<path
					fill="#D55E2E"
					d="M18.945 14.747V3.497a2.25 2.25 0 0 0-2.25-2.25h-13.5a2.25 2.25 0 0 0-2.25 2.25v11.25h8.25v1.5h-3.75v1.5h9v-1.5h-3.75v-1.5h8.25Zm-16.5-11.25a.75.75 0 0 1 .75-.75h13.5a.75.75 0 0 1 .75.75v9.75h-15v-9.75Zm9.724 3.75h3.776v1.5h-2.973l-1.995 2.99-2.25-4.5-1.005 1.51H3.945v-1.5H6.92l1.994-2.991 2.25 4.5 1.006-1.51Z"
				/>
				</g>
				<defs>
				<clipPath id="a">
					<path fill="#fff" d="M.945.497h18v18h-18z" />
				</clipPath>
				</defs>
			</svg>
		),
	},
	{
		label: __( 'Chevron Right', 'enable-button-icons' ),
		value: 'chevron-right',
		icon: chevronRight,
	},
	{
		label: __( 'Chevron Left', 'enable-button-icons' ),
		value: 'chevron-left',
		icon: chevronLeft,
	},
	{
		label: __( 'Chevron Right (Small)', 'enable-button-icons' ),
		value: 'chevron-right-small',
		icon: chevronRightSmall,
	},
	{
		label: __( 'Chevron Left (Small)', 'enable-button-icons' ),
		value: 'chevron-left-small',
		icon: chevronLeftSmall,
	},
	{
		label: __( 'Shuffle', 'enable-button-icons' ),
		value: 'shuffle',
		icon: shuffle,
	},
	{
		label: __( 'Arrow Right', 'enable-button-icons' ),
		value: 'arrow-right',
		icon: arrowRight,
	},
	{
		label: __( 'Arrow Left', 'enable-button-icons' ),
		value: 'arrow-left',
		icon: arrowLeft,
	},
	{
		label: __( 'Next', 'enable-button-icons' ),
		value: 'next',
		icon: next,
	},
	{
		label: __( 'Previous', 'enable-button-icons' ),
		value: 'previous',
		icon: previous,
	},
	{
		label: __( 'Download', 'enable-button-icons' ),
		value: 'download',
		icon: download,
	},
	{
		label: __( 'External Arrow', 'enable-button-icons' ),
		value: 'external-arrow',
		icon: (
			<svg
				width="24"
				height="24"
				viewBox="0 0 24 24"
				xmlns="http://www.w3.org/2000/svg"
			>
				<polygon points="18 6 8.15240328 6 8.15240328 8.1101993 14.3985932 8.1101993 6 16.5087925 7.4912075 18 15.8898007 9.6014068 15.8898007 15.8475967 18 15.8475967"></polygon>
			</svg>
		),
	},
	{
		label: __( 'External', 'enable-button-icons' ),
		value: 'external',
		icon: external,
	},
	{
		label: __( 'Login', 'enable-button-icons' ),
		value: 'login',
		icon: login,
	},
	{
		label: __( 'Lock', 'enable-button-icons' ),
		value: 'lock-outline',
		icon: lockOutline,
	},
	{
		label: __( 'Avatar', 'enable-button-icons' ),
		value: 'comment-author-avatar',
		icon: commentAuthorAvatar,
	},
	{
		label: __( 'Cloud', 'enable-button-icons' ),
		value: 'cloud',
		icon: cloud,
	},
	{
		label: __( 'Cloud Upload', 'enable-button-icons' ),
		value: 'cloud-upload',
		icon: cloudUpload,
	},
	{
		label: __( 'Help', 'enable-button-icons' ),
		value: 'help',
		icon: help,
	},
	{
		label: __( 'Info', 'enable-button-icons' ),
		value: 'info',
		icon: info,
	},
	{
		label: __( 'WordPress', 'enable-button-icons' ),
		value: 'wordpress',
		icon: wordpress,
	},
];

/**
 * Add the attributes needed for button icons.
 *
 * @since 0.1.0
 * @param {Object} settings
 */
function addAttributes( settings ) {
	if ( 'core/button' !== settings.name ) {
		return settings;
	}

	// Add the block visibility attributes.
	const iconAttributes = {
		icon: {
			type: 'string',
		},
		iconPositionLeft: {
			type: 'boolean',
			default: false,
		},
	};

	const newSettings = {
		...settings,
		attributes: {
			...settings.attributes,
			...iconAttributes,
		},
	};

	return newSettings;
}

addFilter(
	'blocks.registerBlockType',
	'enable-button-icons/add-attributes',
	addAttributes
);

/**
 * Filter the BlockEdit object and add icon inspector controls to button blocks.
 *
 * @since 0.1.0
 * @param {Object} BlockEdit
 */
function addInspectorControls( BlockEdit ) {
	return ( props ) => {
		if ( props.name !== 'core/button' ) {
			return <BlockEdit { ...props } />;
		}

		const { attributes, setAttributes } = props;
		const { icon: currentIcon, iconPositionLeft } = attributes;

		return (
			<>
				<BlockEdit { ...props } />
				<InspectorControls>
					<PanelBody
						title={ __( 'Icon settings', 'enable-button-icons' ) }
						className="button-icon-picker"
						initialOpen={ true }
					>
						<PanelRow>
							<Grid
								className="button-icon-picker__grid"
								columns="5"
								gap="0"
							>
								{ ICONS.map( ( icon, index ) => (
									<Button
										key={ index }
										label={ icon?.label }
										isPressed={ currentIcon === icon.value }
										className="button-icon-picker__button"
										onClick={ () =>
											setAttributes( {
												// Allow user to disable icons.
												icon:
													currentIcon === icon.value
														? null
														: icon.value,
											} )
										}
									>
										{ icon.icon ?? icon.value }
									</Button>
								) ) }
							</Grid>
						</PanelRow>
						<PanelRow>
							<ToggleControl
								label={ __(
									'Show icon on left',
									'enable-button-icons'
								) }
								checked={ iconPositionLeft }
								onChange={ () => {
									setAttributes( {
										iconPositionLeft: ! iconPositionLeft,
									} );
								} }
							/>
						</PanelRow>
					</PanelBody>
				</InspectorControls>
			</>
		);
	};
}

addFilter(
	'editor.BlockEdit',
	'enable-button-icons/add-inspector-controls',
	addInspectorControls
);

/**
 * Add icon and position classes in the Editor.
 *
 * @since 0.1.0
 * @param {Object} BlockListBlock
 */
function addClasses( BlockListBlock ) {
	return ( props ) => {
		const { name, attributes } = props;

		if ( 'core/button' !== name || ! attributes?.icon ) {
			return <BlockListBlock { ...props } />;
		}

		const classes = classnames( props?.className, {
			[ `has-icon__${ attributes?.icon }` ]: attributes?.icon,
			'has-icon-position__left': attributes?.iconPositionLeft,
		} );

		return <BlockListBlock { ...props } className={ classes } />;
	};
}

addFilter(
	'editor.BlockListBlock',
	'enable-button-icons/add-classes',
	addClasses
);
