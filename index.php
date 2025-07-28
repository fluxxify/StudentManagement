<?php
include 'vendor/autoload.php';

use Caballeda\StudentManagement\Core\Database;
use Caballeda\StudentManagement\Model\StudentModel;

$student = new StudentModel();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create' :
                $student->id = $_POST['id'];
                $student->fullname = $_POST['name'];
                $student->year_level = $_POST['yearLevel'];
                $student->course = $_POST['course'];
                $student->section = $_POST['section'];
                $student->create();            
                
                header("Location:" . $_SERVER['PHP_SELF']);
                exit();

                break;

                case 'update':
                    $student->id = $_POST['id'];
                    $student->fullname = $_POST['name'];
                    $student->year_level = $_POST['yearLevel'];
                    $student->course = $_POST['course'];
                    $student->section = $_POST['section'];
                    $student->update();
                    break;
                    case 'delete':
                        $student->id = $_POST['id'];
                        $student->delete();
                        
                        header("Location:" . $_SERVER['PHP_SELF']);
                        exit();
    
                        break;
        }   

    }
}








