<?php

namespace App\Feedbacks;

use \App\App;

class Model {

    private $table_name = 'feedbacks';

    public function __construct() {
        App::$db->createTable($this->table_name);
    }

    /**
     * Inserts $person_feedback into DB
     * @param Feedback $person_feedback
     * @return bool
     */
    public function insert(Feedback $person_feedback) {
        return App::$db->insertRow($this->table_name, $person_feedback->getData());
    }

    /**
     * Get person_feedbacks by conditions
     * @param array $conditions
     * @return array
     */
    public function get($conditions = []) {
        $feedbacks = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $feedbacks[] = new Feedback($row_data);
        }
        return $feedbacks;
    }

    /**
     * Update person_feedback
     * @param Feedback $person_feedback
     * @return bool
     */
    public function update(Feedback $person_feedback) {
        return App::$db->updateRow($this->table_name, $person_feedback->getId(), $person_feedback->getData());
    }

    /**
     * Deletes feedback from database
     * @param Feedback $person_feedback
     * @return bool
     */
    public function delete(Feedback $person_feedback) {
        return App::$db->deleteRow($this->table_name, $person_feedback->getId());
    }

    public function __destruct() {
        App::$db->save();
    }

}
