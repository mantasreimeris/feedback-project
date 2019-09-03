<?php

namespace App\Users;

use \App\App;

class Model {

    private $table_name = 'users';

    public function __construct() {
        App::$db->createTable($this->table_name);
    }

    /** Inserts $user into db
     * @param User $user
     * @return bool
     */
    public function insert(User $user) {
        return App::$db->insertRow($this->table_name, $user->getData());
    }

    /**
     * Get users by conditions
     * @param array $conditions
     * @return array of user objects
     */
    public function get($conditions = []) {
        $users = [];

        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row) {
            $row['id'] = $row_id;
            $users[] = new User($row);
        }

        return $users;
    }

    /**
     * Updates user in db
     * @param User $user
     * @return bool
     */
    public function update(User $user) {
        return App::$db->updateRow($this->table_name, $user->getId(), $user->getData());
    }

    /**
     * Deletes User $user from db
     * @param User $user
     * @return bool
     */
    public function delete(User $user) {
        App::$db->deleteRow($this->table_name, $user->getId());
    }

    /**
     * Delete all users from db
     */
    public function deleteAll() {
        App::$db->truncateTable($this->table_name);
    }

    public function __destruct() {
        App::$db->save();
    }

}

?>