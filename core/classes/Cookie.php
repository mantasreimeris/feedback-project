<?php

namespace Core;

class Cookie {

    public function __construct($name) {
        $this->name = $name;
    }

    /**
     * Checks if cookie exists
     */
    public function exists(): bool {
        if (isset($_COOKIE[$this->name])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Returns json_decoded array
     */
    public function read(): array {
        $array = json_decode($_COOKIE[$this->name], true);
        if ($array) {
            return $array;
        } else {
            trigger_error('Nepavyko dekodinti $COOKIE!', E_USER_WARNING);
        }
        return [];
    }

    /**
     * Sets cookie
     */
    public function save(array $data, int $expires_in = 3600): void {
        $string = json_encode($data);
        setcookie($this->name, $string, time() + $expires_in, "/");
    }

    /**
     * Deletes cookie
     */
    public function delete(): void {
        unset($_COOKIE[$this->name]);
        setcookie($this->name, null, -1, "/");
    }

}
