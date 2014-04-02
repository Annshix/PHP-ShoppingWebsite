<?php


class Cookies {
    
    public function setCookie($key, $value)
    {
        if (strlen($value) == 0) {
            $return = false;
        }
        else {
            setcookie($key, $value);
            $return = true;
        }
        return $return;   
}

    public function getCookie($key) {
        if (isset($_COOKIE[$key])) {
            $return = $_COOKIE[$key];
        }
        else {
            $return = false;
        }
        return $return;
    }
    
    public function deleteCookie($key) {
        if (isset($_COOKIE[$key])) {
            setcookie($key, '');
            $return = true;
        }
        else {
            $return = false;
        }
        return $return;
        
    }

}
?>
