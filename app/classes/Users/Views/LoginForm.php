<?php

namespace App\Users\Views;

class LoginForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'attr' => [
                'id' => 'login-form',
                'method' => 'POST',
            ],
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_mail_is_mail',
                            'validate_correct_mail'
                        ],
                        'attr' => [
                            'placeholder' => 'Enter email...'
                        ],
                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_correct_pass'
                        ],
                        'attr' => [
                            'placeholder' => 'Enter password...'
                        ],
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Login',
                ],
            ],
            'validators' => [
                'validate_login'
            ],
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }

}
