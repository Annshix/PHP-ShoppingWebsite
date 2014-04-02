<?php
class Fileupload {
    protected $filename, $filetoupload;
    
    public function __construct($filetoupload) {
        $this->filetoupload = $filetoupload;
    }
    
    public function upload() {
        if (is_uploaded_file($this->filetoupload['tmp_name']));
        {
            if ($this->filetoupload['type'] == 'image/png'
                    || $this->filetoupload['type'] == 'image/jpeg'
                    || $this->filetoupload['type'] == 'image/pjpeg') {
                $result = move_uploaded_file($this->filetoupload['tmp_name'],
                getcwd() . '/images/' . $this->filetoupload['name']);
            } else {
                $result = false;
            }
        }
        return $result;        
    }
    
    public function getFilename() {
        return $this->filetoupload['name'];
    }
}

?>
