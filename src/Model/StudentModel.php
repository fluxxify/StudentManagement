<?php

namespace Caballeda\StudentManagement\Model;
use Caballeda\StudentManagement\Core\Crud;

class StudentModel implements Crud {

    public $id;
    public $fullname;
    public $yearLevel;
    public $course;
    public $section;

    public function __construct()
    {
        $this->id = "";
        $this->fullname = "";
        $this->yearLevel = "";
        $this->course = "";
        $this->section = "";
    }

    public function displayInfo(){
        echo "id : ".$this->id."\n";
        echo "fullname : ".$this->fullname."\n";  
        echo "yearLevel : ".$this->yearLevel."\n"; 
        echo "course : ".$this->course."\n"; 
        echo "section : ".$this->section."\n"; 
    }

    public function create(){
        
    }
    public function read(){
        
    }
    public function update(){
    
    }
    public function delete(){

    }
} 