<?php
include 'vendor/autoload.php';

use Caballeda\StudentManagement\Core\Database;
use Caballeda\StudentManagement\Model\StudentModel;

$student = new StudentModel();


if (isset($_GET['delete_id'])) {
    $student->id = $_GET['delete_id'];
    $student->delete();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$students = $student->read();


    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':

                $student->id = $_POST['id'];
                $student->fullname = $_POST['fullname'];
                $student->yearLevel = $_POST['yearLevel'];
                $student->course = $_POST['course'];
                $student->section = $_POST['section'];
                $student->create();            

                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
                break;

            case 'update':

                $student->id = $_POST['id'];
                $student->fullname = $_POST['fullname'];
                $student->yearLevel = $_POST['yearLevel'];
                $student->course = $_POST['course'];
                $student->section = $_POST['section'];
                $student->update();
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
                break;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
</head>
<body>
    <h1>Student System</h1>

    <h2>Add New Student</h2>
    <form method="POST">
        <input type="hidden" name="action" value="create">
        <input type="text" name="id" placeholder="ID" required><br>
        <input type="text" name="fullname" placeholder="Fullname" required><br>
        <input type="number" name="yearLevel" placeholder="Year Level" required><br>
        <input type="text" name="course" placeholder="Course" required><br>
        <input type="text" name="section" placeholder="Section" required><br>
        <button type="submit">Add Student</button>
    </form>

    <h2>Update Student</h2>
    <form method="POST" action="index.php">
        <input type="hidden" name="action" value="update">
        <input type="number" name="id" placeholder="Student ID to update" required><br>
        <input type="text" name="fullname" placeholder="Fullname" required><br>
        <input type="number" name="yearLevel" placeholder="Year Level" required><br>
        <input type="text" name="course" placeholder="Course" required><br>
        <input type="text" name="section" placeholder="Section" required><br>
        <button type="submit">Update Student</button>
    </form>

    <h2>All Students</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>Year Level</th>
            <th>Course</th>
            <th>Section</th>
            <th>Actions</th>
        </tr>

        <?php if (!empty($students)): ?>
            <?php foreach ($students as $stu): ?>
                <tr>
                    <td><?= $stu['id'] ?></td>
                    <td><?= $stu['fullname'] ?></td>
                    <td><?= $stu['yearLevel'] ?></td>
                    <td><?= $stu['course'] ?></td>
                    <td><?= $stu['section'] ?></td>
                    <td>
                        <a href="index.php?delete_id=<?= $stu['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">No students found</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
