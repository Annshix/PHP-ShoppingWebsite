<?php
class Member {
    protected $id, $surname, $forename, $email, $password;
    
    public function __construct($dbrow) {
        $this->id = $dbrow['member_id'];
        $this->surname = $dbrow['surname'];
        $this->forename = $dbrow['forename'];
        $this->email = $dbrow['email'];
        $this->password = $dbrow['password'];
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function getSurname() {
        return $this->surname;
    }
    
    public function getForename() {
        return $this->forename;
    }
    
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
}
?>
