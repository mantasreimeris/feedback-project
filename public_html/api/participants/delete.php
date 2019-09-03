<?php

use App\App;

require '../../../bootloader.php';

$response = new \Core\Api\Response();

if (App::$session->userLoggedIn()) {

    $model = new \App\Feedbacks\Model();

    $feedbacks = $model->get(['row_id' => intval($_POST['id'])]);

    if ($feedbacks) {
        $person = $feedbacks[0];
        $model->delete($person);

        $response->setData($person->getData());
    } else {
        $response->addError('Feedback doesn`t exist');
    }
} else {
    $response->addError('Authorization failed!');
}

$response->print();
