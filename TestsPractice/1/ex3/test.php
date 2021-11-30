<?php
session_start();
class Ex3{
    public function isRoots($roots){
        return in_array($roots, $_SESSION['res']);
    }
}