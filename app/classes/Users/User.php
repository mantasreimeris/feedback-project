<?php

namespace App\Users;

class User {

    private $data = [];

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name' => null,
                'surname' => null,
                'email' => null,
                'phone' => null,
                'adress' => null,
                'password' => null
            ];
        }
    }

    /**
     * * Sets all data from array
     * @param $array
     */
    public function setData($array) {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }

        $this->setName($array['name'] ?? null);
        $this->setSurname($array['surname'] ?? null);
        $this->setEmail($array['email'] ?? null);

        if (isset($array['phone'])) {
                $this->setPhone($array['phone']);
        } else {
            $this->data['phone'] = null;
        }

        if (isset($array['adress'])) {
            $this->setAdress($array['adress']);
        } else {
            $this->data['adress'] = null;
        }

        $this->setPassword($array['password'] ?? null);
    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'adress' => $this->getAdress(),
            'password' => $this->getPassword()
        ];
    }

    /**
     * Sets id
     * @param int $id
     */
    public function setId(int $id) {
        $this->data['id'] = $id;
    }

    /**
     * Returns id
     * @return int|null
     */
    public function getId() {
        return $this->data['id'];
    }

    /**
     * Sets Name
     * @param int $name
     */
    public function setName(String $name) {
        $this->data['name'] = $name;
    }

    /**
     * Returns Name
     * @return string
     */
    public function getName() {
        return $this->data['name'];
    }

    /**
     * Sets Surname
     * @param string $surname
     */
    public function setSurname(String $surname) {
        $this->data['surname'] = $surname;
    }

    /**
     * Returns Surname
     * @param string $surname
     */
    public function getSurname() {
        return $this->data['surname'];
    }

    /**
     * Sets Email
     * @param $email
     */
    public function setEmail(String $email) {
        $this->data['email'] = $email;
    }

    /**
     * Sets Password
     * @param mixed $password
     */
    public function setPassword(String $password) {
        $this->data['password'] = $password;
    }

    /**
     * Returns Email
     * @param string $email
     */
    public function getEmail() {
        return $this->data['email'];
    }

    /**
     * Returns Password
     * @param mixed $password
     */
    public function getPassword() {
        return $this->data['password'];
    }

    /**
     * Sets Phone number
     * @param int $phone
     */
    public function setPhone(string $phone) {
        $this->data['phone'] = $phone;
    }

    /**
     * Returns Phone number
     * @return int|null
     */
    public function getPhone() {
        return $this->data['phone'];
    }

    /**
     * Sets adress
     * @param string $adress
     */
    public function setAdress(string $adress) {
        $this->data['adress'] = $adress;
    }

    /**
     * Returns adress
     * @return string
     */
    public function getAdress() {
        return $this->data['adress'];
    }

}
