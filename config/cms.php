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
                            'description' => '',
                        ],
                        [
                            'id' => 'subtitle',
                            'type' => 'textarea',
                            'label' => 'Subtitle',
                            'description' => '',
                        ],
                        [
                            'id' => 'btn_link',
                            'type' => 'text',
                            'label' => 'Button Link',
                            'description' => 'To link: `tel:` for number, `mailto:` for email',
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
                                    'id' => 'count',
                                    'label' => 'Count',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'content',
                                    'label' => 'Content',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => false,
                                ]
                            ]
                        ],
                        [
                            'id' => 'testimonial',
                            'type' => 'htmleditor',
                            'label' => 'Title',
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
            ],
        ],

        // Contact Us
        [
            'slug' => 'contact-us',
            'label' => 'Contact Us Page',
            'show_metadata' => 1,
            'sections' => [
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
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'subtitle',
                            'type' => 'text',
                            'label' => 'Subtitle',
                            'description' => '',
                        ],
                        [
                            'id' => 'title',
                            'type' => 'htmleditor',
                            'label' => 'Title',
                            'description' => 'Format text to <i>italic</i> to highlight (color red)',
                        ],
                        [
                            'id' => 'image',
                            'type' => 'image',
                            'label' => 'Image',
                            'description' => 'Max file size: 2MB | Dimension: 343px x 468px',
                        ],
                        [
                            'id' => 'address_label',
                            'type' => 'text',
                            'label' => 'Address Label',
                            'description' => '',
                        ],
                        [
                            'id' => 'address',
                            'type' => 'list_table',
                            'label' => 'Address',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'icon',
                                    'label' => 'Icon',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => false,
                                    'description' => 'Max file size: 2MB | Dimension: 24px x 24px',
                                ],
                                [
                                    'id' => 'address',
                                    'label' => 'Address',
                                    'type' => 'htmleditor',
                                    'rules' => 'required',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'note',
                                    'label' => 'Note',
                                    'type' => 'text',
                                    'rules' => '',
                                    'summary_field' => false,
                                ],
                            ]
                        ],
                        [
                            'id' => 'contactnum_label',
                            'type' => 'text',
                            'label' => 'Contact Number Label',
                            'description' => '',
                        ],
                        [
                            'id' => 'landline',
                            'type' => 'list_table',
                            'label' => 'Landline',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'icon',
                                    'label' => 'Icon',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => false,
                                    'description' => 'Max file size: 2MB | Dimension: 24px x 24px',
                                ],
                                [
                                    'id' => 'details',
                                    'label' => 'Details',
                                    'type' => 'htmleditor',
                                    'rules' => 'required',
                                    'description' => 'To link: `tel:` for number, `mailto:` for email',
                                    'summary_field' => true,
                                ]
                            ]
                        ],
                        [
                            'id' => 'mobile',
                            'type' => 'list_table',
                            'label' => 'Mobile',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'icon',
                                    'label' => 'Icon',
                                    'type' => 'image',
                                    'rules' => '',
                                    'summary_field' => false,
                                    'description' => 'Max file size: 2MB | Dimension: 24px x 24px',
                                ],
                                [
                                    'id' => 'details',
                                    'label' => 'Details',
                                    'type' => 'htmleditor',
                                    'rules' => 'required',
                                    'description' => 'To link: `tel:` for number, `mailto:` for email',
                                    'summary_field' => true,
                                ]
                            ]
                        ],
                        [
                            'id' => 'socials_label',
                            'type' => 'text',
                            'label' => 'Social Media Label',
                            'description' => '',
                        ],
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
                                    'summary_field' => false,
                                    'description' => 'Max file size: 2MB | Dimension: 24px x 24px',
                                ],
                                [
                                    'id' => 'details',
                                    'label' => 'Details',
                                    'type' => 'htmleditor',
                                    'rules' => 'required',
                                    'description' => '',
                                    'summary_field' => true,
                                ]
                            ]
                        ],
                    ],
                ],
                [
                    'id' => 'section2',
                    'label' => 'Section 2: FAQs',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'subtitle',
                            'type' => 'text',
                            'label' => 'Subtitle',
                            'description' => '',
                        ],
                        [
                            'id' => 'title',
                            'type' => 'htmleditor',
                            'label' => 'Title',
                            'description' => 'Format text to <i>italic</i> to highlight (color red)',
                        ],
                        [
                            'id' => 'faqs',
                            'type' => 'list_table',
                            'label' => 'FAQs',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'question',
                                    'label' => 'Question',
                                    'type' => 'text',
                                    'rules' => 'required',
                                    'summary_field' => true,
                                    'description' => '',
                                ],
                                [
                                    'id' => 'answer',
                                    'label' => 'Answer',
                                    'type' => 'htmleditor',
                                    'rules' => 'required',
                                    'description' => '',
                                    'summary_field' => false,
                                ]
                            ]
                        ],
                    ]
                ]
            ],
        ],

        // News
        [
            'slug' => 'news',
            'label' => 'News Page',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'subtitle',
                            'type' => 'text',
                            'label' => 'Subtitle',
                            'description' => '',
                        ],
                        [
                            'id' => 'title',
                            'type' => 'htmleditor',
                            'label' => 'Title',
                            'description' => 'Format text to <i>italic</i> to highlight (color red)',
                        ],
                    ]
                ]
            ],
        ],

        // About Us
        [
            'slug' => 'about-us',
            'label' => 'About Us Page',
            'show_metadata' => 1,
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1',
                    'description' => 'Relevant data and other details',
                    'items' => [
                        [
                            'id' => 'subtitle',
                            'type' => 'text',
                            'label' => 'Subtitle',
                            'description' => '',
                        ],
                        [
                            'id' => 'title',
                            'type' => 'htmleditor',
                            'label' => 'Title',
                            'description' => 'Format text to <i>italic</i> to highlight (color red)',
                        ],
                        [
                            'id' => 'content',
                            'type' => 'htmleditor',
                            'label' => 'Content',
                            'description' => '',
                        ],
                    ],
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
                    'label' => 'Column 1',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'logo',
                            'type' => 'image',
                            'label' => 'Logo',
                            'description' => 'Max file size: 2MB | Dimension: Max height: 75px',
                        ],
                        [
                            'id' => 'subcontent',
                            'type' => 'textarea',
                            'label' => 'Subcontent',
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
                    ]
                ],
                [
                    'id' => 'section2',
                    'label' => 'Column 2',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'links',
                            'type' => 'list_table',
                            'label' => 'Links',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'url',
                                    'label' => 'Link',
                                    'type' => 'text',
                                    'rules' => 'required',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'text',
                                    'label' => 'Text',
                                    'type' => 'text',
                                    'rules' => 'required',
                                    'summary_field' => true,
                                ],
                            ]
                        ],
                    ]
                ],
                [
                    'id' => 'section3',
                    'label' => 'Column 3',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'links',
                            'type' => 'list_table',
                            'label' => 'Links',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'icon',
                                    'label' => 'Icon',
                                    'type' => 'image',
                                    'rules' => '',
                                    'description' => '',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'url',
                                    'label' => 'Link',
                                    'type' => 'text',
                                    'rules' => 'required',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'text',
                                    'label' => 'Text',
                                    'type' => 'text',
                                    'rules' => 'required',
                                    'summary_field' => true,
                                ],
                            ]
                        ],
                    ]
                ],
                [
                    'id' => 'section4',
                    'label' => 'Column 4',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '',
                        ],
                        [
                            'id' => 'links',
                            'type' => 'list_table',
                            'label' => 'Links',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'icon',
                                    'label' => 'Icon',
                                    'type' => 'image',
                                    'rules' => '',
                                    'description' => '',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'details',
                                    'label' => 'Details',
                                    'type' => 'htmleditor',
                                    'rules' => 'required',
                                    'description' => 'To link: `tel:` for number, `mailto:` for email',
                                    'summary_field' => true,
                                ],
                            ]
                        ],
                    ]
                ],
                [
                    'id' => 'section5',
                    'label' => 'Footer',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'copyright',
                            'type' => 'text',
                            'label' => 'Copyright',
                            'description' => '',
                        ],
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
