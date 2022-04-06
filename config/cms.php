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
                            'id' => 'mascot_image',
                            'type' => 'image',
                            'label' => 'Mascot Image',
                            'description' => '2MB max',
                            'rules' => 'required',
                        ],
                    ],
                ],
                [
                    'id' => 'section2',
                    'label' => 'Section 1: Sample List',
                    'description' => 'Home Page Sample Lists',
                    'items' => [
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
                                    'id' => 'url',
                                    'label' => 'Link',
                                    'type' => 'url',
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
    ],
];
