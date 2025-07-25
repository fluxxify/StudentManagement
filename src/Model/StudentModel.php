<?php

namespace Caballeda\StudentManagement\Model;
use Caballeda\StudentManagement\Core\Crud;
use Caballeda\StudentManagement\Core\Database;

class StudentModel extends Database implements Crud {

    public $id;
    public $fullname;
    public $yearLevel;
    public $course;
    public $section;

    public function __construct()
    {
        parent::__construct();
        $this->id = "";
        $this->fullname = "";
        $this->yearLevel = "";
        $this->course = "";
        $this->section = "";
    }

    public function displayInfo()
    {
        echo "id : ".$this->id."\n";
        echo "fullname : ".$this->fullname."\n";  
        echo "yearLevel : ".$this->yearLevel."\n"; 
        echo "course : ".$this->course."\n"; 
        echo "section : ".$this->section."\n"; 
    }

    public function create() 
    {

    }
    
    public function read(){
        try {
            $sql = "SELECT * FROM students";
            $results = $this->conn->query($sql);
            return $results->fetch_all(MYSQLI_ASSOC);
        }catch(\Exception $e){
            echo $e->getMessage();
        } 
    }
    public function update()
    {
        try {
            $stmt = $this->conn->prepare("UPDATE students SET fullname = ?, yearLevel = ?, course = ?, section = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $this->fullname, $this->yearLevel, $this->course, $this->section, $this->id);
            return $stmt->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    
    
    public function delete()
    {
        try {
            $stmt = $this->conn->prepare("UPDATE students SET fullname = ?, yearLevel = ?, course = ?, section = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $this->fullname, $this->yearLevel, $this->course, $this->section, $this->id);
            return $stmt->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    

    
} 