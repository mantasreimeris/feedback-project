<?php

namespace App\Feedbacks\Views;

class BaseForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                ],
                'feedback' => [
                    'label' => 'Feedback',
                    'type' => 'text',
                ],
                'date' => [
                    'type' => 'hidden',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                ],
            ]
        ];
    }

}
