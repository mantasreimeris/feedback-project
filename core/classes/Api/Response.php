<?php

namespace Core\Api;

class Response {

    private $data;
    private $errors;

    public function __construct($data = []) {
        if ($data) {
            $this->setData($data['data'] ?? []);
            $this->setErrors($data['errors'] ?? []);
        }
        }

        /**
         * Print json_encode errors
         * returns printed json string (print json_encode(array))
         */
        public function print() {
        $is_success = $this->errors ? false : true;

        print json_encode([
            'status' => $is_success ? 'success' : 'fail',
            'data' => $this->data,
            'errors' => $this->errors
        ]);
        exit;
    }

    /**
     * * Sets all data from $data
     * @param array
     */
    public function setData($data) {
        $this->data = $data;
    }

    /**
     * * Sets data from $body
     * @param array
     */
    public function addData($body, $index = null) {
        if ($index) {
            $this->data[$index] = $body;
        } else {
            $this->data[] = $body;
        }
    }

    /**
     * * Sets all errors from $errors
     * @param array
     */
    public function setErrors($errors) {
        $this->errors = $errors;
    }

    /**
     * * Sets an error from $body
     * @param array
     */
    public function addError($body, $index = null) {
        if ($index) {
            $this->errors[$index] = $body;
        } else {
            $this->errors[] = $body;
        }
    }

}
