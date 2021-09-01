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
                            'rules' => 'required|max:50'
                        ],
                        [
                            'id' => 'button1_text',
                            'type' => 'text',
                            'label' => 'Button 1 Text',
                            'description' => '10 characters max',
                            'rules' => 'required|max:20'
                        ],
                        [
                            'id' => 'button1_url',
                            'type' => 'url',
                            'label' => 'Button 1 URL',
                            'description' => '',
                        ],
                        [
                            'id' => 'button2_text',
                            'type' => 'text',
                            'label' => 'Button 2 Text',
                            'description' => '10 characters max',
                            'rules' => 'required|max:20'
                        ],
                        [
                            'id' => 'button2_url',
                            'type' => 'url',
                            'label' => 'Button 2 URL',
                            'description' => '',
                        ],
                        [
                            'id' => 'mascot_image',
                            'type' => 'image',
                            'label' => 'Mascot Image',
                            'description' => '2MB max',
                            'rules' => 'max:2000',
                        ],
                        [
                            'id' => 'scroll_label_image',
                            'type' => 'image',
                            'label' => 'Scroll to Continue Image',
                            'description' => '1MB max',
                            'rules' => 'max:1000',
                        ],
                        [
                            'id' => 'background_image',
                            'type' => 'image',
                            'label' => 'Backround Image',
                            'description' => '2MB max',
                            'rules' => 'max:2000',

                        ],
                    ],
                ],
                [
                    'id' => 'section2',
                    'label' => 'Section 2',
                    'description' => '',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '50 characters max',
                            'rules' => 'required|max:50'
                        ],
                        [
                            'id' => 'subtitle',
                            'type' => 'text',
                            'label' => 'Subtitle',
                            'description' => '100 characters max',
                            'rules' => 'required|max:100'
                        ],
                        [
                            'id' => 'icon_item1',
                            'type' => 'image',
                            'label' => 'Item 1 Icon',
                            'description' => '',
                            'rules' => ''
                        ],
                        [
                            'id' => 'text_item1',
                            'type' => 'text',
                            'label' => 'Item 1 Text',
                            'description' => '',
                            'rules' => 'required'
                        ],
                        [
                            'id' => 'icon_item2',
                            'type' => 'image',
                            'label' => 'Item 2 Icon',
                            'description' => '',
                            'rules' => ''
                        ],
                        [
                            'id' => 'text_item2',
                            'type' => 'text',
                            'label' => 'Item 2 Text',
                            'description' => '',
                            'rules' => 'required'
                        ],
                        [
                            'id' => 'icon_item3',
                            'type' => 'image',
                            'label' => 'Item 3 Icon',
                            'description' => '',
                            'rules' => ''
                        ],
                        [
                            'id' => 'text_item3',
                            'type' => 'text',
                            'label' => 'Item 3 Text',
                            'description' => '',
                            'rules' => 'required'
                        ],

                    ],
                ],
                [
                    'id' => 'section3',
                    'label' => 'Section 3',
                    'description' => 'Trusted Brands',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '50 characters max',
                            'rules' => 'required|max:50'
                        ],
                        [
                            'id' => 'subtitle',
                            'type' => 'text',
                            'label' => 'Subtitle',
                            'description' => '100 characters max',
                            'rules' => 'required|max:100'
                        ],

                    ],
                ],
                [
                    'id' => 'section4',
                    'label' => 'Section 4',
                    'description' => 'Mobile App',
                    'items' => [
                        [
                            'id' => 'title',
                            'type' => 'text',
                            'label' => 'Title',
                            'description' => '50 characters max',
                            'rules' => 'required|max:50'
                        ],
                        [
                            'id' => 'subtitle',
                            'type' => 'text',
                            'label' => 'Subtitle',
                            'description' => '100 characters max',
                            'rules' => 'required|max:100'
                        ],
                        [
                            'id' => 'playstore_image',
                            'type' => 'image',
                            'label' => 'Play Store Button',
                            'description' => '',
                            'rules' => ''
                        ],
                        [
                            'id' => 'appstore_image',
                            'type' => 'image',
                            'label' => 'App Store Button',
                            'description' => '',
                            'rules' => ''
                        ],
                        [
                            'id' => 'mascot_image',
                            'type' => 'image',
                            'label' => 'Mascot Image',
                            'description' => '',
                            'rules' => ''
                        ],
                        [
                            'id' => 'phone_image',
                            'type' => 'image',
                            'label' => 'Phone Image',
                            'description' => '',
                            'rules' => ''
                        ],
                        [
                            'id' => 'vector_image',
                            'type' => 'image',
                            'label' => 'Vector Image',
                            'description' => '',
                            'rules' => ''
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
                            'rules' => 'max:1000',
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
    ],
];
