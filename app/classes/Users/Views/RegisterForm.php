<?php

namespace App\Users\Views;

class RegisterForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'attr' => [
                'id' => 'register-form',
                'method' => 'POST',
            ],
            'fields' => [
                'name' => [
                    'label' => 'Name *',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_text_length' => ['length' => 40],
                        ],
                        'attr' => [
                            'placeholder' => 'Enter your name...'
                        ],
                    ],
                ],
                'surname' => [
                    'label' => 'Surname *',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_text_length' => ['length' => 40],
                        ],
                        'attr' => [
                            'placeholder' => 'Enter your surname...'
                        ],
                    ],
                ],
                'email' => [
                    'label' => 'Email *',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_user',
                            'validate_mail_is_mail'
                        ],
                        'attr' => [
                            'placeholder' => 'Enter your email...'
                        ],
                    ],
                ],
                'phone' => [
                    'label' => 'Phone number',
                    'type' => 'number',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your phone number...'
                        ],
                    ],
                ],
                'adress' => [
                    'label' => 'Home adress',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your home adress...'
                        ],
                    ],
                ],
                'password' => [
                    'label' => 'Password *',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ],
                        'attr' => [
                            'placeholder' => 'Enter your password...'
                        ],
                    ],
                ],
                'password_repeat' => [
                    'label' => 'Repeat password *',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ],
                        'attr' => [
                            'placeholder' => 'Repeat your password...'
                        ],
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Register',
                ],
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }

}
