<?php
require 'database_connect.php';
class data {
    //Hier wordt bestaande data opgehaald van studenten die ook vast zitten
    function get_stuck_students() {
        global $conn;
         return $conn->query('SELECT `username` FROM students')->fetchAll();
    }
    function get_coach() {
        global $conn;
        return $conn->query('SELECT username FROM coaches')->fetchAll();
    }
    function status_change() {
        global $conn;
        $query = "UPDATE stuck_students SET status = ? WHERE id = ?";
        $conn->prepare($query)->execute([]);
    }
    function list_stuck_students() {
        global $conn;
        return $conn->query(
            "SELECT stuck_students.id, students.username, opdrachten.opdracht
        FROM stuck_students
        INNER JOIN students ON stuck_students.id = students.id
        INNER JOIN opdrachten ON stuck_students.id = opdrachten.id;")->fetchAll();
    }
}
