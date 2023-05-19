<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CMS Schema Definition
    |--------------------------------------------------------------------------
    */

    'schema' => [
        // Home Page
        [
            'slug' => 'home',
            'label' => 'Home Page',
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1: Home Page Banner',
                    'description' => 'Home Page Banner Section.',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '50 characters max',
                            'rules' => 'required|max:50',
                        ],
                        [
                            'id' => 'subtitle',
                            'type' => 'textarea',
                            'label' => 'Subtitle',
                            'description' => '',
                        ],
                        [
                            'id' => 'desc',
                            'type' => 'htmleditor',
                            'label' => 'Description',
                            'description' => '',
                        ],
                        [
                            'id' => 'button1_text',
                            'type' => 'text',
                            'label' => 'Button 1 Text',
                            'description' => '10 characters max',
                            'rules' => 'required|max:10'
                        ],
                        [
                            'id' => 'button1_url',
                            'type' => 'url',
                            'label' => 'Button 1 URL',
                            'description' => '',
                        ],
                        [
                            'id' => 'mascot_image',
                            'type' => 'image',
                            'label' => 'Mascot Image',
                            'description' => '2MB max',
                            'rules' => 'required',
                        ],
                        [
                            'id' => 'banner_images',
                            'type' => 'list_table',
                            'label' => 'Banner Images',
                            'description' => 'Sample banner images.',
                            'items' => [
                                [
                                    'id' => 'image',
                                    'label' => 'Image',
                                    'type' => 'image',
                                    'rules' => 'required',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'rules' => 'required',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'title2',
                                    'label' => 'Title',
                                    'type' => 'textarea',
                                    'rules' => 'required',
                                    'summary_field' => false,
                                ],
                                [
                                    'id' => 'title3',
                                    'label' => 'Title',
                                    'type' => 'htmleditor',
                                    'rules' => 'required',
                                    'summary_field' => false,
                                ],
                            ]
                        ],
                    ],
                ],
            ],
        ],
        [
            'slug' => 'about',
            'label' => 'About Page',
            'sections' => [
                [
                    'id' => 'section1',
                    'label' => 'Section 1: Bio Data',
                    'description' => 'Bio Data.',
                    'items' => [
                        [
                            'id' => 'age',
                            'type' => 'text',
                            'label' => 'Age',
                            'description' => '50 characters max',
                            'rules' => 'required|integer'
                        ],
                        [
                            'id' => 'name',
                            'type' => 'text',
                            'label' => 'Name',
                            'description' => '20 characters max',
                            'rules' => 'required|max:20'
                        ],
                        [
                            'id' => 'picture',
                            'type' => 'image',
                            'label' => 'Picture',
                            'description' => 'PNG/JPG only 10 MB',
                            'rules' => 'required_without:scroll_label_image|file|max:1000',
                        ],
                        [
                            'id' => 'blurb',
                            'type' => 'text',
                            'label' => 'Blurb',
                            'description' => 'Max 5 characters',
                            'rules' => 'required:max:5',
                        ],

                    ]
                ]
            ]
        ],
        // Header
        [
            'slug' => 'header',
            'label' => 'General: Header',
            'sections' => [
                [
                    'id' => 'content',
                    'label' => 'Header',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'logo',
                            'type' => 'image',
                            'label' => 'Logo',
                            'description' => 'Max file size: 2MB',
                        ],
                    ],
                ],
            ],
        ],
        // Footer
        [
            'slug' => 'footer',
            'label' => 'General: Footer',
            'sections' => [
                [
                    'id' => 'content',
                    'label' => 'Footer',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'logo',
                            'type' => 'image',
                            'label' => 'Footer Logo',
                            'description' => 'Max file size: 2MB',
                        ],
                        [
                            'id' => 'copyright',
                            'type' => 'textarea',
                            'label' => 'Copyright Text',
                            'description' => '',
                        ],
                        [
                            'id' => 'social_accts',
                            'type' => 'list_table',
                            'label' => 'Social Media Accounts',
                            'description' => '',
                            'items' => [
                                [
                                    'id' => 'link',
                                    'label' => 'Link',
                                    'type' => 'url',
                                    'rules' => 'required',
                                    'summary_field' => true,
                                ],
                                [
                                    'id' => 'icon',
                                    'label' => 'Icon',
                                    'type' => 'image',
                                    'description' => 'Max file size: 2MB',
                                    'rules' => 'required',
                                    'summary_field' => true,
                                ],
                            ]
                        ],
                    ]
                ]
            ]
        ],
        [
            'slug' => 'api_keys',
            'label' => 'General: API Keys',
            'sections' => [
                [
                    'id' => 'googleanalytics',
                    'label' => 'Google Analytics',
                    'description' => 'Add the key to enable google analytics',
                    'items' => [
                        [
                            'id' => 'googleanalytics',
                            'type' => 'text',
                            'label' => 'Google Analytics KEY',
                            'description' => 'ex: G-H33RXMHQNV',
                            'rules' => ''
                        ],
                    ],
                ],
                [
                    'id' => 'tawkto',
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
                    'id' => 'facebook',
                    'label' => 'Facebook Page Id for Chat',
                    'description' => 'Add the facebook page id to enable facebook chat',
                    'items' => [
                        [
                            'id' => 'facebook_page_id',
                            'type' => 'text',
                            'label' => 'Facebook Page Id',
                            'description' => 'ex: 124807260896296',
                            'rules' => ''
                        ],
                    ],
                ]
            ],
        ],
    ],
];
