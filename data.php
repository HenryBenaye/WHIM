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
}
