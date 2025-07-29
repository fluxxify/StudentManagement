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
       try {
        $sql = "INSERT INTO students (`fullname`, `yearLevel`, `course`, `section`) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute([
            $this->fullname,
            $this->yearLevel,
            $this->course,
            $this->section
        ]);
        if ($stmt->affected_rows > 0) {
            echo "Student successfully added!";
        } else {
            echo "Failed to add student.";
        }
        $stmt->close();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

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
            $stmt = $this->conn->prepare(
                "UPDATE students SET fullname = ?, yearLevel = ?, course = ?, section = ? WHERE id = ?"
            );
            $stmt->bind_param(
                "sissi", // s = string, i = integer
                $this->fullname,
                $this->yearLevel,
                $this->course,
                $this->section,
                $this->id
            );
            return $stmt->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function delete()
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM students WHERE id = ?");
            $stmt->bind_param("i", $this->id);
            return $stmt->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
     

    public function readOne() {
        try {
            $sql = "SELECT * FROM students WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $results = $stmt->get_result();           
            $student = $result->fetch_();
            $stmt->close();
            return $student ?: null;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }
    
} 