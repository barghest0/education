<?php
class Ex2{
    private $students = ['Ivanov','Petrov'];
    public function isStudent($lastname){
        return in_array($lastname, $this->students);
    }
}