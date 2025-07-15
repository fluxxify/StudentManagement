<?php

include 'vendor/autoload.php';

use Caballeda\StudentManagement\Model\StudentModel;

$student = new StudentModel;
$student->id = 2024723003;
$student->fullname = "Caballeda, Eduardo Jr";
$student->yearLevel = "First Year";
$student->course = "BSIT";
$student->section = "A";

$student->displayInfo();
