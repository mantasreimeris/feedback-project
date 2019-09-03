<?php

use \App\App;

require '../../../bootloader.php';
date_default_timezone_set('europe/vilnius');

// Check user authorization
if (!App::$session->userLoggedIn()) {
    $response = new \Core\Api\Response();
    $response->addError('You are not authorized!');
    $response->print();
}

// Filter received data
$form = (new \App\Feedbacks\Views\ApiForm())->getData();
$filtered_input = get_form_input($form);
validate_form($filtered_input, $form);

/**
 * If request passes validation
 * this function is automatically
 * called
 * 
 * @param type $filtered_input
 * @param type $form
 */
function form_success($filtered_input, &$form) {
    $response = new \Core\Api\Response();
    $model = new \App\Feedbacks\Model();

    $conditions = [
        'row_id' => intval($_POST['id'])
    ];

    $feedbacks = $model->get($conditions);
    if (!$feedbacks) {
        $response->addError('Feedback doesn`t exist!');
    } else {
        $participant = $feedbacks[0];

        //setting values from input fields into dataholder:
        $participant->setName($filtered_input['name']);
        $participant->setFeedback($filtered_input['feedback']);
        $participant->setDate(date('Y-m-d H:i:s'));
        //updating those values in db
        $model->update($participant);

        //all participant data put into $response and then into json (print method)
        $response->setData($participant->getData());
    }

    $response->print();
}

/**
 * If request fails validation
 * this function is automatically
 * called
 * 
 * @param type $filtered_input
 * @param type $form
 */
function form_fail($filtered_input, &$form) {
    $response = new \Core\Api\Response();

    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['error'])) {
            $response->addError($field['error'], $field_id);
        }
    }

    $response->print();
}
