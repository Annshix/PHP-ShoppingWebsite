<?php

require_once ('models/class.item.php');
require_once ('models/class.tableAbstract.php');

class ItemTable extends TableAbstract {

    protected $name = 'item';
    protected $primaryKey = 'item_id';

    public function fetchAllItems() {
        $results = $this->readtbl();
        $itemArray = array();
        while ($row = $results->fetch()) {
            $itemArray[] = new Item($row);
        }
        return $itemArray;
    }

    public function inserttbl($data) {
        $sql = 'INSERT INTO ' . $this->name . ' (name, os, description, cost, image)
            VALUES (:name, :os, :description, :cost, :image)';
        $result = $this->dbh->prepare($sql);
        $result->execute(array(
            ':name' => $data['name'],
            ':os' => $data['os'],
            ':description' => $data['description'],
            ':cost' => $data['cost'],
            ':image' => $data['image']
        ));
        return $this->dbh->lastInsertId();
    }

    public function edittbl($data) {
        $sql = 'UPDATE ' . $this->name . ' SET name = :name, os = :os, description = :description, image = :image,
           item_id = item_id, cost = :cost WHERE item_id = :item_id';
        $result = $this->dbh->prepare($sql);
        return $result->execute(array(
                    ':name' => $data['name'],
                    ':os' => $data['os'],
                    ':description' => $data['description'],
                    ':image' => $data['image'],
                    ':cost' => $data['cost'],
                    ':item_id' => $data['item_id']
                ));
    }

    public function deletetbl($data) {
        $sql = 'DELETE FROM ' . $this->name . ' WHERE item_id = :item_id';
        $result = $this->dbh->prepare($sql);
        return $result->execute(array(':item_id' => $data['item_id']));
    }

    public function fetchByCategory($os) {
        $sql = 'SELECT * FROM ' . $this->name . ' WHERE os = :os';
        $results = $this->dbh->prepare($sql);
        $results->execute(array(':os' => $os));
        $itemArray = array();
        while ($row = $results->fetch()) {
            $itemArray[] = new Item($row);
        }
        return $itemArray;
    }

}

?>
