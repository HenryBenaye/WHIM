<?php
require 'database_connect.php';
class data {
    //Hier wordt bestaande data opgehaald van studenten die ook vast zitten
    function get_stuck_students() {
        global $conn;
         return $conn->query('SELECT `username` FROM students')->fetchAll();
    }
    function get_coach_images() {
        global $conn;
        return $conn->query('SELECT `img_url` FROM coaches')->fetchAll();
    }
}
