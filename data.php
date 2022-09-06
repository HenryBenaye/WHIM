<?php
require 'database_connect.php';
class data {
    //Hier wordt bestaande data opgehaald
    function get_stuck_students() {
        global $conn;
         return $conn->query('SELECT `username` FROM students')->fetchAll();
    }
}
