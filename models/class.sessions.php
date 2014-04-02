<?php

class Session {
    
    public function __construct() {
        session_start();
    }
    
    public function setSession($name, $value) {
        if (strlen($value) == 0)
        {
            $return = false;
        }
        else {
            $_SESSION[$name] = $value;
            $return = true;
        }
        return $return;
    }
    
    public function getSession($name) {
        if (isset($_SESSION[$name])) {
            $return = $_SESSION[$name];
        }
        else {
            $return = false;
        }
        return $return;
    }
    
    public function deleteSession($name) {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
            $return = true;
        }
        else {
            $return = false;
        }
        return $return;
    }
}
?>
