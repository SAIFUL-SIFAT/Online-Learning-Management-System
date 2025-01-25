<?php
include_once 'Admin.php';
include_once 'Instructor.php';
include_once 'Moderator.php';
include_once 'Student.php';

class User {
    static function getAll() {
        return array_merge(Student::getStudents(), Instructor::getInstructors(), Moderator::getModerators(), Admin::getAdmins());
    }
}