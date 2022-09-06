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
        $data = $conn->query(
            "SELECT stuck_students.id, students.username, opdrachten.opdracht, stuck_students.status
        FROM stuck_students
        INNER JOIN students ON stuck_students.id = students.id
        INNER JOIN opdrachten ON stuck_students.id = opdrachten.id;")->fetchAll();
        foreach ($data as $list) {
            $status_html = ($list["status"] == 1) ? '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>' : '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Not Active</span>' ;

             echo <<<HTML
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="img/profilepic.png" alt="" />
                                        </div>
    
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900"> {$list['username']}</div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{$list['opdracht']}</div>
                                </td>
    
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {$status_html}
                                </td>
    
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">Owner</td>
    
                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Studentenhulp</a>
                                </td>
                            </tr>
HTML;
        }
    }
}
