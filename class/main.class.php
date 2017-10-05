<?php
if(!defined("PROTECT")) { exit("STOP!"); }

class mainClass {
    private $className;

    public function loadClass($className) {
        $this->className = strtolower($_SERVER['DOCUMENT_ROOT']."/".CLS_DIR . $className . ".class.php");
        if (file_exists($this->className)) {
            include($this->className);
        } else {
            die("no class" . $this->className . "found");
        }
    } 

} 

?>