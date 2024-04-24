<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CMS Schema Definition
    |--------------------------------------------------------------------------
    */

    'schema' => [
        // Home
        [
            'slug' => 'home',
            'label' => 'Home Page',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'htmleditor',
                            'label' => 'Title',
                            'description' => 'Format text to <strong>bold</strong> to highlight (accent color)',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                        [
                            'id' => 'btn_link',
                            'type' => 'text',
                            'label' => 'Button Link',
                            'description' => '',
                        ],
                        [
                            'id' => 'btn_text',
                            'type' => 'text',
                            'label' => 'Button Text',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section2',
                    'label' => 'Section 2',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'image',
                                    'label' => 'Image',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'link',
                                    'label' => 'Link',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ],
                    ]
                ],
                [
                    'id' => 'section3',
                    'label' => 'Section 3',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'image',
                                    'label' => 'Image',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ]
                            ]
                        ],
                    ],
                ],

                [
                    'id' => 'section4',
                    'label' => 'Section 4',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'image',
                                    'label' => 'Image',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'htmleditor',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'htmleditor',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'btn_link',
                                    'type' => 'text',
                                    'label' => 'Button Link',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'btn_text',
                                    'type' => 'text',
                                    'label' => 'Button Text',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ],
                    ]
                ],
                [
                    'id' => 'section5',
                    'label' => 'Section 5',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'htmleditor',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'prefix',
                                    'label' => 'Prefix',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'count',
                                    'label' => 'Count',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'suffix',
                                    'label' => 'Suffix',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ]
                            ]
                        ],
                        [
                            'id' => 'testimonial',
                            'type' => 'textarea',
                            'label' => 'Testimonial',
                            'description' => '',
                        ],
                        [
                            'id' => 'name',
                            'type' => 'text',
                            'label' => 'Name',
                            'description' => '',
                        ],
                        [
                            'id' => 'position',
                            'type' => 'text',
                            'label' => 'Position',
                            'description' => '',
                        ],
                        [
                            'id' => 'image',
                            'type' => 'image',
                            'label' => 'Image',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section6',
                    'label' => 'Section 6',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'link',
                                    'label' => 'Link',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'logo',
                                    'label' => 'Logo',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ]
                            ]
                        ],
                    ]
                ],
                [
                    'id' => 'section7',
                    'label' => 'Section 7',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                        [
                            'id' => 'btn_link',
                            'type' => 'text',
                            'label' => 'Button Link',
                            'description' => '',
                        ],
                        [
                            'id' => 'btn_text',
                            'type' => 'text',
                            'label' => 'Button Text',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section8',
                    'label' => 'Section 8',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'htmleditor',
                            'label' => 'Title',
                            'description' => 'Format text to <strong>bold</strong> to highlight (accent color)',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'htmleditor',
                            'label' => 'Content',
                            'description' => '',
                        ],
                        [
                            'id' => 'btn_link',
                            'type' => 'text',
                            'label' => 'Button Link',
                            'description' => '',
                        ],
                        [
                            'id' => 'btn_text',
                            'type' => 'text',
                            'label' => 'Button Text',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ]
                            ]
                        ],
                    ],
                ],
            ],
        ],
        [
            'slug' => 'industries-gaming',
            'label' => 'Industries - Gaming and Entertainment',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'label' => 'Header Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                        [
                            'id' => 'footer',
                            'label' => 'Footer Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section2',
                    'label' => 'Section 2',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'image',
                            'label' => 'Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ],
                ],
                [
                    'id' => 'section3',
                    'label' => 'Section 3',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'logo',
                                    'label' => 'Logo',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ],
                        [
                            'id' => 'footer',
                            'label' => 'Footer Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                    ],
                ],
                [
                    'id' => 'section4',
                    'label' => 'Section 4',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'image',
                            'label' => 'Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'logo',
                                    'label' => 'Logo',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'section5',
                    'label' => 'Section 5',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        
                        [
                            'id' => 'image',
                            'label' => 'Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section6',
                    'label' => 'Section 6',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'textarea',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ]              
            ],
        ],

        // SaaS
        [
            'slug' => 'industries-saas',
            'label' => 'Industries - SaaS',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section2',
                    'label' => 'Section 2',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'image',
                            'label' => 'Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section3',
                    'label' => 'Section 3',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'logo',
                                    'label' => 'Logo',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'section4',
                    'label' => 'Section 4',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'logo',
                                    'label' => 'Logo',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'section5',
                    'label' => 'Section 5',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        
                        [
                            'id' => 'image',
                            'label' => 'Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section6',
                    'label' => 'Section 6',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'textarea',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ]          
            ],
        ],

        // E-Commerce
        [
            'slug' => 'industries-ecommerce',
            'label' => 'Industries - E-Commerce',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section2',
                    'label' => 'Section 2',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'image',
                                    'label' => 'Image',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'section3',
                    'label' => 'Section 3',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'image',
                                    'label' => 'Image',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'section4',
                    'label' => 'Section 4',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'image',
                                    'label' => 'Image',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'section5',
                    'label' => 'Section 5',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'image',
                            'label' => 'Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section6',
                    'label' => 'Section 6',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'textarea',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ]     
            ],
        ],

        // Finance
        [
            'slug' => 'industries-finance',
            'label' => 'Industries - Finance',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'uppertext',
                            'type' => 'text',
                            'label' => 'Upper Text',
                            'description' => '',
                        ],
                        [
                            'id' => 'middletext',
                            'type' => 'text',
                            'label' => 'Middle Text',
                            'description' => 'Larger Text (highlight)',
                        ],
                        [
                            'id' => 'lowertext',
                            'type' => 'text',
                            'label' => 'Lower Text',
                            'description' => '',
                        ],
                        
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section2',
                    'label' => 'Section 2',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'image',
                            'label' => 'Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section3',
                    'label' => 'Section 3',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'image',
                                    'label' => 'Image',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'section4',
                    'label' => 'Section 4',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'image',
                                    'label' => 'Image',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'section5',
                    'label' => 'Section 5',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'image',
                            'label' => 'Image',
                            'type' => 'image',
                            'rules' => '',
                        ],
                        [
                            'id' => 'header',
                            'type' => 'htmleditor',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section6',
                    'label' => 'Section 6',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'textarea',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ]     
            ],
        ],

        // Resources
        [
            'slug' => 'resources',
            'label' => 'Resources',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'image',
                            'type' => 'image',
                            'label' => 'Image',
                            'description' => 'Max file size: 2MB | Dimension: 343px x 468px',
                        ],
                        [
                            'id' => 'title',
                            'type' => 'textarea',
                            'label' => 'Title',
                            'description' => '',
                        ],
                    ]
                ],
            ],
        ],
        //Careers
        [
            'slug' => 'careers',
            'label' => 'Careers',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'image',
                            'type' => 'image',
                            'label' => 'Image',
                            'description' => 'Max file size: 2MB | Dimension: 343px x 468px',
                        ],
                        [
                            'id' => 'title',
                            'type' => 'textarea',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'header',
                            'type' => 'textarea',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section2',
                    'label' => 'Section 2',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'section3',
                    'label' => 'Section 3',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'textarea',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'items',
                            'type' => 'list_table',
                            'label' => 'Items',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'image',
                                    'label' => 'Image',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'textarea',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'section4',
                    'label' => 'Section 4',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'textarea',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'image',
                            'type' => 'image',
                            'label' => 'Thumbnail',
                            'description' => 'Max file size: 2MB | Dimension: 1920 x 1080px',
                        ],
                        [
                            'id' => 'video_link',
                            'type' => 'text',
                            'label' => 'Video Link',
                            'description' => 'Youtube Link',
                        ],
                        
                    ]
                ],
                [
                    'id' => 'section5',
                    'label' => 'Section 5',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'textarea',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'application',
                    'label' => 'Career Application',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'email_recipient',
                            'type' => 'text',
                            'label' => 'Email Recipient',
                            'description' => 'This email will be used as a recipient for inquiries. Separate emails with a comma (test@email.com, email@test.com)',
                        ],

                    ]
                ],
            ],
        ],
        //Calculator
        [
            'slug' => 'calculator',
            'label' => 'Calculator',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'image',
                            'type' => 'image',
                            'label' => 'Image',
                            'description' => 'Max file size: 2MB | Dimension: 343px x 468px',
                        ],
                        [
                            'id' => 'title',
                            'type' => 'textarea',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'header',
                            'type' => 'textarea',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section2',
                    'label' => 'Section 2',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'image',
                            'type' => 'image',
                            'label' => 'Image',
                            'description' => 'Max file size: 2MB | Dimension: 343px x 468px',
                        ],
                        [
                            'id' => 'title',
                            'type' => 'htmleditor',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'textarea',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ]
                ],
            ],
        ],

        // Contact Us
        [
            'slug' => 'contact-us',
            'label' => 'Contact Us Page',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'header',
                            'type' => 'textarea',
                            'label' => 'Header',
                            'description' => '',
                        ],
                        [
                            'id' => 'image',
                            'type' => 'image',
                            'label' => 'Image',
                            'description' => 'Max file size: 2MB | Dimension: 343px x 468px',
                        ],
                        [
                            'id' => 'subtitle',
                            'type' => 'htmleditor',
                            'label' => 'Subtitle',
                            'description' => '',
                        ],
                        [
                            'id' => 'description',
                            'type' => 'htmleditor',
                            'label' => 'Description',
                            'description' => '',
                        ],
                    ],
                ],
                [
                    'id' => 'inquiry',
                    'label' => 'General Inquiry',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'email_recipient',
                            'type' => 'text',
                            'label' => 'Email Recipient',
                            'description' => 'This email will be used as a recipient for inquiries. Separate emails with a comma (test@email.com, email@test.com)',
                        ],

                    ]
                ],
                [
                    'id' => 'subscription',
                    'label' => 'Subscription',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'email_recipient',
                            'type' => 'text',
                            'label' => 'Email Recipient',
                            'description' => 'This email will be used as a recipient for inquiries. Separate emails with a comma (test@email.com, email@test.com)',
                        ],

                    ]
                ],
            ],
        ],
        // Privacy Policy
        [
            'slug' => 'privacy-policy',
            'label' => 'Privacy Policy Page',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Privacy Policy',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'htmleditor',
                            'label' => 'Content',
                            'description' => '',
                        ]
                    ],
                ],
            ],
        ],

        // Terms and Conditions
        [
            'slug' => 'terms-and-conditions',
            'label' => 'Terms and Conditions Page',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Terms and Conditions',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'htmleditor',
                            'label' => 'Content',
                            'description' => '',
                        ]
                    ],
                ],
            ],
        ],

        // Header
        [
            'slug' => 'header',
            'label' => 'General: Header',
            'show_metadata' => 0,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Header',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'logo',
                            'type' => 'image',
                            'label' => 'Logo',
                            'description' => 'Max file size: 2MB | Dimension: Max height: 32px',
                        ],
                    ],
                ],
            ],
        ],
        // Footer
        [
            'slug' => 'footer',
            'label' => 'General: Footer',
            'show_metadata' => 0,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Footer',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'logo',
                            'type' => 'image',
                            'label' => 'Logo',
                            'description' => 'Max file size: 2MB | Dimension: Max height: 75px',
                        ],
                        [
                            'id' => 'address',
                            'type' => 'textarea',
                            'label' => 'Address',
                            'description' => '',
                        ],
                        [
                            'id' => 'accreditation',
                            'type' => 'list_table',
                            'label' => 'Accreditation',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'logo',
                                    'label' => 'Logo',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => true,
                                    'description' => 'Max file size: 2MB | Dimension: 24px x 24px',
                                ]
                            ]
                        ],
                        [
                            'id' => 'copyright',
                            'type' => 'text',
                            'label' => 'Copyright',
                            'description' => '',
                        ],
                    ]
                ],
                [
                    'id' => 'section2',
                    'label' => 'Social Media Accounts',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'social_accounts',
                            'type' => 'list_table',
                            'label' => 'Social Media Accounts',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'icon',
                                    'label' => 'Icon',
                                    'type' => 'image',
                                    'rules' => '',
                                    'description' => 'Max file size: 2MB | Dimension: 24px x 24px',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'link',
                                    'label' => 'Link',
                                    'type' => 'text',
                                    'rules' => 'required',
                                    'description' => '',
                                    'summary_field' => true,
                                ]
                            ]
                        ],
                    ]
                ]
            ]
        ],
        [
            'slug' => 'api_keys',
            'label' => 'General: API Keys',
            'show_metadata' => 0,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Google Analytics',
                    'description' => 'Add the key to enable google analytics',
                    'items' => [
                        [
                            'id' => 'googleanalytics',
                            'type' => 'text',
                            'label' => 'Google Analytics Key',
                            'description' => 'ex: G-H33RXMHQNV',
                            'rules' => ''
                        ],
                    ],
                ],
                [
                    'id' => 'section2',
                    'label' => 'Tawk.to',
                    'description' => 'Add the tawk.to id to enable the chat',
                    'items' => [
                        [
                            'id' => 'tawkto_link',
                            'type' => 'text',
                            'label' => 'Tawk.to ID',
                            'description' => 'ex: 5cf8afbab534676f32ad96b7',
                            'rules' => ''
                        ],
                    ],
                ],
                [
                    'id' => 'section3',
                    'label' => 'Facebook Page ID for Chat',
                    'description' => 'Add the facebook page ID to enable facebook chat',
                    'items' => [
                        [
                            'id' => 'facebook_page_id',
                            'type' => 'text',
                            'label' => 'Facebook Page ID',
                            'description' => 'ex: 124807260896296',
                            'rules' => ''
                        ],
                    ],
                ]
            ],
        ],
    ],
];
