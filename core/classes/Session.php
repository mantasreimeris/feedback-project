<?php

namespace Core;

class Session {

    private $model;
    private $user;

    public function __construct() {
        session_start();
        $this->model = new \App\Users\Model();

        // Execute login from cookie
        $this->loginFromCookie();
    }

    /*
     * Checks if user email and password is the same as in $_SESSION
     */
    public function loginFromCookie() {
        if ($_SESSION ?? false) {
            $this->login($_SESSION['email'], $_SESSION['password']);
        }
    }

    /*
     * Checks if user email and password is the same as in $_SESSION
     */
    public function login($email, $password) {
        $users = $this->model->get([
            'email' => $email,
            'password' => $password
        ]);

        if ($users) {
            $this->user = $users[0];

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            return true;
        } else {
            $this->user = null;
        }

        return false;
    }

    /*
     * returns logged in user
     */
    public function getUser() {
        return $this->user;
    }

    /*
     * Checks if user is logged in
     */
    public function userLoggedIn() {
        return $this->user ? true : false;
    }

    /*
     * log outs logged in user
     */
    public function logout() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            // Clear the superglobal
            $_SESSION = [];

            // Remove server-side cookie file
            session_destroy();

            // Remove client-side cookie
            setcookie(session_name(), null, -1, "/");
        }
    }

}
