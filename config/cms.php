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
        [
            'slug' => 'header_footer',
            'label' => 'General: Header & Footer',
            'sections' => [
                [
                    'id' => 'header',
                    'label' => 'Header',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'logo',
                            'type' => 'image',
                            'label' => 'Logo',
                            'description' => 'Max file size: 2MB',
                            'rules' => 'required'
                        ],
                    ],
                ],
                [
                    'id' => 'footer',
                    'label' => 'Footer',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'title1',
                            'type' => 'text',
                            'label' => 'Column Title 1',
                            'description' => '',
                            'rules' => 'required'
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
                                    'description' => 'Dimension: 28px x 28px | Max file size: 2MB',
                                    'rules' => 'required',
                                    'summary_field' => true,
                                ],
                            ]
                        ],
                    ],
                ],
            ],
        ],
    ],
];
