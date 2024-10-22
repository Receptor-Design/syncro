import { registerBlockStyle, unregisterBlockStyle, registerBlockVariation } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';
//import '../scss/screen.scss';

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
    registerBlockStyle( 'core/post-terms', {
        name: "topic-label-transparent-cream",
        label: "Transparent Cream"
    } );
    registerBlockStyle( 'core/post-template', {
        name: "standard-card",
        label: "Standard Card"
    } );
    registerBlockStyle( 'core/details', {
        name: "query-taxonomy-accordion",
        label: "Open On Desktop"
    } );
    registerBlockStyle( 'core/details', {
        name: "taxonomy-accordion",
        label: "Select"
    } );
    registerBlockStyle( 'core/list', {
        name: "checkmark",
        label: "Checkmark"
    } );
    registerBlockStyle( 'core/group', {
        name: "pricing-table",
        label: "Pricing Table"
    } );
} );

const RESOURCE_QUERY_NAME = 'syncro-blocks/resource-query';

registerBlockVariation( 'core/query', {
    name: RESOURCE_QUERY_NAME,
    title: 'Resource Query',
    description: 'Displays a list of resources and posts',
    isActive: ( { namespace, query } ) => {
        return (
            namespace === RESOURCE_QUERY_NAME
            && query.postType === 'resource'
        );
    },
    icon: (<svg viewBox="290.3969 230 40 40" width="40px" height="40px" xmlns="http://www.w3.org/2000/svg"><defs><clipPath id="clip0_1876_325728"><rect width="40" height="40" fill="white" transform="translate(0 0.5)"/></clipPath></defs><g clip-path="url(#clip0_1876_325728)" transform="matrix(1, 0, 0, 1, 290.3968811035156, 229.5)" id="object-0"><path fill-rule="evenodd" clip-rule="evenodd" d="M40 20.5C40 31.5457 31.0457 40.5 20 40.5C8.95431 40.5 0 31.5457 0 20.5C0 9.45431 8.95431 0.5 20 0.5C31.0457 0.5 40 9.45431 40 20.5ZM21.3236 18.7768C21.3666 18.7987 21.4096 18.8205 21.4525 18.8423H21.4599C24.6272 20.4855 27.8391 22.5226 27.8391 26.478C27.8391 30.4334 23.9952 33.3851 20.2257 33.3851C16.4562 33.3851 13.1774 31.2587 12.0547 27.7122H14.4785C15.445 29.9873 17.3855 31.2959 20.2257 31.2959C23.0658 31.2959 25.5268 29.3107 25.5268 26.478C25.5268 23.6453 22.9841 22.1881 20.4116 20.8795C17.2368 19.2736 13.616 16.7308 13.616 13.1323C13.616 9.53379 17.0064 7.22896 20.6049 7.19922H20.6644C21.0956 7.19922 21.5342 7.23639 21.9655 7.31074L23.1328 9.20665L23.0639 9.19751C22.363 9.10443 21.7296 9.02031 20.88 9.00591C18.471 8.97617 15.9283 10.1063 15.9283 13.0951C15.9283 16.0342 18.7824 17.4851 21.3236 18.7768Z" fill="#272E2D"/></g></svg>),
    attributes: {
        namespace: RESOURCE_QUERY_NAME,
        query: {
            perPage: 8,
            pages: 0,
            offset: 0,
            postType: 'resource',
            order: 'desc',
            orderBy: 'date',
            author: '',
            search: '',
            exclude: [],
            include: [],
            sticky: '',
            inherit: false,
        },
    },
    scope: [ 'inserter' ],
    allowedControls: [ 'search' ],
    innerBlocks: [
        [
            'core/columns',
            {},
            [
                [
                    'core/column',
                    {},
                    [
                        [
                            'core/search',
                            {
                                "label":"Search",
                                "showLabel":false,
                                "placeholder":"Search",
                                "buttonText":"Search",
                                "buttonPosition":"button-inside",
                                "buttonUseIcon":true,
                                "className":"ghub-query-search"
                            },
                            []
                        ],
                        
                    ]
                ],
                [
                    'core/column',
                    {},
                    [
                        [
                            'core/group',
                            {
                                "style":{
                                    "spacing":{
                                        "margin":{
                                            "top":"var:preset|spacing|40"
                                        }
                                    }
                                },
                                "layout":{
                                    "type":"constrained"
                                }
                            },
                            [
                                [
                                    'core/details',
                                    {
                                        "className":"query-taxonomy-accordion"
                                    },
                                    [
                                        [
                                            'ghub/query-taxonomy',
                                            {
                                                "showAll":false,
                                                "taxonomySlug":"resource-syncrotopic",
                                                "layout":"checkbox",
                                                "orientation":"column",
                                                "style":{
                                                    "spacing":{
                                                        "margin":{
                                                            "top":"var:preset|spacing|40"
                                                        }
                                                    }
                                                }
                                            },
                                            []
                                        ],
                                        
                                    ]
                                ],
                                
                            ]
                        ],
                        
                    ]
                ],
                [
                    'core/column',
                    {},
                    [
                        [
                            'core/group',
                            {
                                "style":{
                                    "spacing":{
                                        "margin":{
                                            "top":"var:preset|spacing|40"
                                        }
                                    }
                                },
                                "layout":{
                                    "type":"constrained"
                                }
                            },
                            [
                                [
                                    'core/details',
                                    {
                                        "className":"query-taxonomy-accordion"
                                    },
                                    [
                                        [
                                            'ghub/query-taxonomy',
                                            {
                                                "showAll":false,
                                                "taxonomySlug":"resource-category",
                                                "layout":"checkbox",
                                                "orientation":"column",
                                                "style":{
                                                    "spacing":{
                                                        "margin":{
                                                            "top":"var:preset|spacing|40"
                                                        }
                                                    }
                                                }
                                            },
                                            []
                                        ],
                                        
                                    ]
                                ],
                                
                            ]
                        ],
                        
                    ]
                ],
                
            ]
        ],
        [
            'core/columns',
            {
                "className":"is-style-default"
            },
            [
                [
                    'core/column',
                    {
                        "width":"400px"
                    },
                    [
                        [
                            'core/block',
                            {
                                "ref":28047
                            },
                            []
                        ],
                        
                    ]
                ],
                [
                    'core/column',
                    {
                        "width":""
                    },
                    [
                        [
                            'core/group',
                            {
                                "layout":{
                                    "type":"constrained"
                                }
                            },
                            [
                                [
                                    'core/post-template',
                                    {
                                        "className":"is-style-standard-card",
                                        "layout":{
                                            "type":"default"
                                        }
                                    },
                                    [
                                        [
                                            'core/group',
                                            {
                                                "style":{
                                                    "border":{
                                                        "left":{
                                                            "color":"var:preset|color|foreground-10",
                                                            "width":"1px"
                                                        },
                                                        "bottom":{
                                                            "color":"var:preset|color|foreground-10",
                                                            "width":"1px"
                                                        }
                                                    },
                                                    "spacing":{
                                                        "margin":{
                                                            "top":"0"
                                                        }
                                                    }
                                                }
                                            },
                                            [
                                                [
                                                    'core/columns',
                                                    {
                                                        "verticalAlignment":"center",
                                                        "className":"is-style-default"
                                                    },
                                                    [
                                                        [
                                                            'core/column',
                                                            {
                                                                "verticalAlignment":"center",
                                                                "width":"160px"
                                                            },
                                                            [
                                                                [
                                                                    'core/post-featured-image',
                                                                    {
                                                                        "isLink":true,
                                                                        "sizeSlug":"square"
                                                                    },
                                                                    []
                                                                ],
                                                                
                                                            ]
                                                        ],
                                                        [
                                                            'core/column',
                                                            {
                                                                "verticalAlignment":"center",
                                                                "width":"66.66%"
                                                            },
                                                            [
                                                                [
                                                                    'syncro-blocks/resource-type-eyebrow',
                                                                    {
                                                                        "name":"syncro-blocks/resource-type-eyebrow",
                                                                        "mode":"preview"
                                                                    },
                                                                    []
                                                                ],
                                                                [
                                                                    'core/post-title',
                                                                    {
                                                                        "level":4,
                                                                        "isLink":true,
                                                                        "style":{
                                                                            "spacing":{
                                                                                "margin":{
                                                                                    "top":"var:preset|spacing|30"
                                                                                }
                                                                            }
                                                                        }
                                                                    },
                                                                    []
                                                                ],
                                                                [
                                                                    'core/group',
                                                                    {
                                                                        "style":{
                                                                            "typography":{
                                                                                "fontSize":"14px"
                                                                            },
                                                                            "spacing":{
                                                                                "margin":{
                                                                                    "top":"var:preset|spacing|30"
                                                                                },
                                                                                "blockGap":"var:preset|spacing|20"
                                                                            }
                                                                        },
                                                                        "layout":{
                                                                            "type":"flex"
                                                                        }
                                                                    },
                                                                    [
                                                                        [
                                                                            'syncro-blocks/resource-time',
                                                                            {
                                                                                "name":"syncro-blocks/resource-time",
                                                                                "mode":"preview"
                                                                            },
                                                                            []
                                                                        ],
                                                                        [
                                                                            'core/paragraph',
                                                                            {},
                                                                            []
                                                                        ],
                                                                        [
                                                                            'core/post-date',
                                                                            {
                                                                                "isLink":true
                                                                            },
                                                                            []
                                                                        ],
                                                                        [
                                                                            'core/paragraph',
                                                                            {},
                                                                            []
                                                                        ],
                                                                        [
                                                                            'core/post-author',
                                                                            {
                                                                                "showAvatar":false,
                                                                                "showBio":false,
                                                                                "byline":"<br>By"
                                                                            },
                                                                            []
                                                                        ],
                                                                        
                                                                    ]
                                                                ],
                                                                [
                                                                    'core/group',
                                                                    {
                                                                        "style":{
                                                                            "typography":{
                                                                                "fontSize":"14px"
                                                                            },
                                                                            "spacing":{
                                                                                "margin":{
                                                                                    "top":"var:preset|spacing|30"
                                                                                },
                                                                                "blockGap":"var:preset|spacing|20"
                                                                            }
                                                                        },
                                                                        "layout":{
                                                                            "type":"flex",
                                                                            "flexWrap":"nowrap"
                                                                        }
                                                                    },
                                                                    [
                                                                        [
                                                                            'core/post-terms',
                                                                            {
                                                                                "term":"resource-syncrotopic",
                                                                                "className":"is-style-topic-label-cream"
                                                                            },
                                                                            []
                                                                        ],
                                                                        
                                                                    ]
                                                                ],
                                                                
                                                            ]
                                                        ],
                                                        
                                                    ]
                                                ],
                                                
                                            ]
                                        ],
                                        
                                    ]
                                ],
                                
                            ]
                        ],
                        [
                            'ghub/query-load-more',
                            {
                                "backgroundColor":"#eee9e3",
                                "loadingText":" Loading...",
                                "style":{
                                    "elements":{
                                        "link":{
                                            "color":{
                                                "text":"var:preset|color|syncro-black"
                                            }
                                        }
                                    },
                                    "border":{
                                        "radius":"200px"
                                    }
                                },
                                "fontSize":"x-small"
                            },
                            []
                        ],
                        [
                            'core/block',
                            {
                                "ref":28048
                            },
                            []
                        ],
                        
                    ]
                ],
                
            ]
        ],        
    ],
    }
);                 

const SOCIAL_PROOF_SLIDER_NAME = 'syncro-blocks/social-proof-slider';

registerBlockVariation( 'wpe/slider', {
    name: SOCIAL_PROOF_SLIDER_NAME,
    title: 'Social Proof Slider',
    description: 'Displays a set of customer quotes, stories, etc.',
    isActive: ( { namespace, className} ) => {
        return (
            namespace === SOCIAL_PROOF_SLIDER_NAME
            && className === 'syncro-social-proof-slider'
        );
    },
    icon: (<svg viewBox="290.3969 230 40 40" width="40px" height="40px" xmlns="http://www.w3.org/2000/svg"><defs><clipPath id="clip0_1876_325728"><rect width="40" height="40" fill="white" transform="translate(0 0.5)"/></clipPath></defs><g clip-path="url(#clip0_1876_325728)" transform="matrix(1, 0, 0, 1, 290.3968811035156, 229.5)" id="object-0"><path fill-rule="evenodd" clip-rule="evenodd" d="M40 20.5C40 31.5457 31.0457 40.5 20 40.5C8.95431 40.5 0 31.5457 0 20.5C0 9.45431 8.95431 0.5 20 0.5C31.0457 0.5 40 9.45431 40 20.5ZM21.3236 18.7768C21.3666 18.7987 21.4096 18.8205 21.4525 18.8423H21.4599C24.6272 20.4855 27.8391 22.5226 27.8391 26.478C27.8391 30.4334 23.9952 33.3851 20.2257 33.3851C16.4562 33.3851 13.1774 31.2587 12.0547 27.7122H14.4785C15.445 29.9873 17.3855 31.2959 20.2257 31.2959C23.0658 31.2959 25.5268 29.3107 25.5268 26.478C25.5268 23.6453 22.9841 22.1881 20.4116 20.8795C17.2368 19.2736 13.616 16.7308 13.616 13.1323C13.616 9.53379 17.0064 7.22896 20.6049 7.19922H20.6644C21.0956 7.19922 21.5342 7.23639 21.9655 7.31074L23.1328 9.20665L23.0639 9.19751C22.363 9.10443 21.7296 9.02031 20.88 9.00591C18.471 8.97617 15.9283 10.1063 15.9283 13.0951C15.9283 16.0342 18.7824 17.4851 21.3236 18.7768Z" fill="#272E2D"/></g></svg>),
    attributes: {
        namespace: SOCIAL_PROOF_SLIDER_NAME,
        autoplay: false,
        pagination: false,
        className: 'syncro-social-proof-slider'
    },
    scope: [ 'inserter' ],
    allowedControls: []
} );

const  FEATURES_SLIDER_NAME= 'syncro-blocks/features-slider';

registerBlockVariation( 'wpe/slider', {
    name: FEATURES_SLIDER_NAME,
    title: 'Features Slider',
    description: 'Displays a set of features with an image and description',
    isActive: ( { namespace, className} ) => {
        return (
            namespace === FEATURES_SLIDER_NAME
            && className === 'syncro-features-slider'
        );
    },
    icon: (<svg viewBox="290.3969 230 40 40" width="40px" height="40px" xmlns="http://www.w3.org/2000/svg"><defs><clipPath id="clip0_1876_325728"><rect width="40" height="40" fill="white" transform="translate(0 0.5)"/></clipPath></defs><g clip-path="url(#clip0_1876_325728)" transform="matrix(1, 0, 0, 1, 290.3968811035156, 229.5)" id="object-0"><path fill-rule="evenodd" clip-rule="evenodd" d="M40 20.5C40 31.5457 31.0457 40.5 20 40.5C8.95431 40.5 0 31.5457 0 20.5C0 9.45431 8.95431 0.5 20 0.5C31.0457 0.5 40 9.45431 40 20.5ZM21.3236 18.7768C21.3666 18.7987 21.4096 18.8205 21.4525 18.8423H21.4599C24.6272 20.4855 27.8391 22.5226 27.8391 26.478C27.8391 30.4334 23.9952 33.3851 20.2257 33.3851C16.4562 33.3851 13.1774 31.2587 12.0547 27.7122H14.4785C15.445 29.9873 17.3855 31.2959 20.2257 31.2959C23.0658 31.2959 25.5268 29.3107 25.5268 26.478C25.5268 23.6453 22.9841 22.1881 20.4116 20.8795C17.2368 19.2736 13.616 16.7308 13.616 13.1323C13.616 9.53379 17.0064 7.22896 20.6049 7.19922H20.6644C21.0956 7.19922 21.5342 7.23639 21.9655 7.31074L23.1328 9.20665L23.0639 9.19751C22.363 9.10443 21.7296 9.02031 20.88 9.00591C18.471 8.97617 15.9283 10.1063 15.9283 13.0951C15.9283 16.0342 18.7824 17.4851 21.3236 18.7768Z" fill="#272E2D"/></g></svg>),
    attributes: {
        namespace: FEATURES_SLIDER_NAME,
        autoplay: false,
        pagination: false,
        className: 'syncro-features-slider'
    },
    scope: [ 'inserter' ],
    allowedControls: []
} );

const  TESTIMONIALS_SLIDER_NAME= 'syncro-blocks/testimonials-slider';

registerBlockVariation( 'wpe/slider', {
    name: TESTIMONIALS_SLIDER_NAME,
    title: 'Testimonials Slider',
    description: 'Displays a set of testimonials',
    isActive: ( { namespace, className} ) => {
        return (
            namespace === TESTIMONIALS_SLIDER_NAME
            && className === 'syncro-testimonials-slider'
        );
    },
    icon: (<svg viewBox="290.3969 230 40 40" width="40px" height="40px" xmlns="http://www.w3.org/2000/svg"><defs><clipPath id="clip0_1876_325728"><rect width="40" height="40" fill="white" transform="translate(0 0.5)"/></clipPath></defs><g clip-path="url(#clip0_1876_325728)" transform="matrix(1, 0, 0, 1, 290.3968811035156, 229.5)" id="object-0"><path fill-rule="evenodd" clip-rule="evenodd" d="M40 20.5C40 31.5457 31.0457 40.5 20 40.5C8.95431 40.5 0 31.5457 0 20.5C0 9.45431 8.95431 0.5 20 0.5C31.0457 0.5 40 9.45431 40 20.5ZM21.3236 18.7768C21.3666 18.7987 21.4096 18.8205 21.4525 18.8423H21.4599C24.6272 20.4855 27.8391 22.5226 27.8391 26.478C27.8391 30.4334 23.9952 33.3851 20.2257 33.3851C16.4562 33.3851 13.1774 31.2587 12.0547 27.7122H14.4785C15.445 29.9873 17.3855 31.2959 20.2257 31.2959C23.0658 31.2959 25.5268 29.3107 25.5268 26.478C25.5268 23.6453 22.9841 22.1881 20.4116 20.8795C17.2368 19.2736 13.616 16.7308 13.616 13.1323C13.616 9.53379 17.0064 7.22896 20.6049 7.19922H20.6644C21.0956 7.19922 21.5342 7.23639 21.9655 7.31074L23.1328 9.20665L23.0639 9.19751C22.363 9.10443 21.7296 9.02031 20.88 9.00591C18.471 8.97617 15.9283 10.1063 15.9283 13.0951C15.9283 16.0342 18.7824 17.4851 21.3236 18.7768Z" fill="#272E2D"/></g></svg>),
    attributes: {
        namespace: TESTIMONIALS_SLIDER_NAME,
        autoplay: false,
        pagination: true,
        navigation: false,
        className: 'syncro-testimonials-slider'
    },
    scope: [ 'inserter' ],
    allowedControls: []
} );