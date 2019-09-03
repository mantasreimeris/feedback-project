<?php

/**
 * Validates user login 
 * @param array $filtered_input 
 * @param array $form
 * return bool
 */
function validate_login($filtered_input, &$form) {
    $login_success = \App\App::$session->login(
            $filtered_input['email'], $filtered_input['password']
    );

    if (!$login_success) {
        $form['fields']['password']['error'] = 'Login information is incorrect!';
        $form['fields']['password']['value'] = '';
        return false;
    }

    return true;
}

/**
 * Validates user email
 * @param $field_value
 * @param $field
 * return bool
 */
function validate_user($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['email' => $field_value]);
    if ($users) {
        $field['error'] = 'The user with this email is already registered!';
        return false;
    }

    return true;
}

function validate_correct_mail($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['email' => $field_value]);
    if (!$users) {
        $field['error'] = 'There is no user with this email adress!';
        return false;
    }

    return true;
}

function validate_correct_pass($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['password' => $field_value]);
    if (!$users) {
        $field['error'] = 'The password is incorrect!';
        return false;
    }

    return true;
}