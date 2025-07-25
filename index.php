<?php
include 'vendor/autoload.php';

use Caballeda\StudentManagement\Core\Database;
use Caballeda\StudentManagement\Model\StudentModel;

$student = new StudentModel();
$students = $student->read();
var_dump($students);









