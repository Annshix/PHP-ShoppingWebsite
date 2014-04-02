<?php

require_once ('models/class.member.php');
require_once ('models/class.tableAbstract.php');

class MemberTable extends TableAbstract {
    protected $name = 'member';
    protected $primaryKey = 'member_id';
    
    public function fetchAllMembers() {
        $results = $this->readtbl();
        $itemArray = array();
        while ($row = $results->fetch()) {
            $itemArray[] = new Member($row);            
        }
        return $itemArray;
    }
    
    public function inserttbl($data) {
        $sql = 'INSERT INTO '.$this->name.' (surname, forename, email, password)
            VALUES (:surname, :forename, :email, :password)';
        $result = $this->dbh->prepare($sql);
        $result->execute(array(
            ':surname' => $data['surname'],
            ':forename' => $data['forename'],
            ':email' => $data['email'],
            ':password' => $data['password']
        ));
        return $this->dbh->lastInsertId();
    }
    
    public function edittbl($data) {
        $sql = 'UPDATE '.$this->name.' SET surname = :surname, forename = :forename, email = :email, password = :password WHERE member_id = :member_id';
        $result = $this->dbh->prepare($sql);
        return $result->execute(array(
            ':surname' => $data['surname'],
            ':forename' => $data['forename'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':member_id' => $data['member_id']
            
        ));
    }
    
    public function deletetbl($data) {
        $sql = 'DELETE FROM '.$this->name.' WHERE member_id = :member_id';
        $result = $this->dbh->prepare($sql);
        return $result->execute(array(':member_id' => $data['member_id']));
    }
    
    public function fetchByEmail($email) {
        $sql = 'SELECT * FROM '.$this->name.' WHERE email = :email';
        $results = $this->dbh->prepare($sql);
        $results->execute(array(':email' => $email));
        return $results->fetch();
    }  
}
?>
