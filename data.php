<?php

require 'database_connect.php';
class data
{


    //Hier wordt bestaande data opgehaald van studenten die ook vast zitten
    function get_stuck_students()
    {
        global $conn;
        return $conn->query('SELECT `username` FROM students')->fetchAll();
    }
    // Bestaande info over coaches ophalen
    function get_coach()
    {
        global $conn;
        return $conn->query('SELECT * FROM coaches')->fetchAll();
    }
    function status_change()
    {
        global $conn;
        $query = "UPDATE stuck_students SET status = ? WHERE id = ?";
        $conn->prepare($query)->execute([]);
    }
    function list_stuck_students()
    {
        global $conn;
        $data = $conn->query(
            "SELECT stuck_students.id, students.username, opdrachten.opdracht, stuck_students.status, 
        date_format(created_at,'%Y-%m-%d') AS created_at 
        FROM stuck_students
        INNER JOIN students ON stuck_students.student_id = students.id
        INNER JOIN opdrachten ON stuck_students.opdracht_id = opdrachten.id;"
        )->fetchAll();
        foreach ($data as $list) {
            $this->delete_studenthulp($list['id'], $list['status'], $list['created_at']);
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
    // Functie voor als studentenhulp op non-actief staat
    function delete_studenthulp($id, $status, $timestamp)
    {
        global $conn;
        if ($status == 0) {
            $timestamp = date_create(date("Y-m-d", strtotime($timestamp)));
            $now = date_create(date("Y-m-d"));
            $date_diff = date_diff($now, $timestamp);
            if ($date_diff->days >= 3) {
                $conn->prepare("DELETE FROM stuck_students WHERE id=?")->execute([$id]);
            }
        }
    }
    function availableCoach()
    {
        $coaches = $this->get_coach();
        $currentday = date('l');
        $checkAvailable;
        switch ($currentday) {
            case 'Monday':
                $checkAvailable = 'ma';

                break;
            case 'Tuesday':
                $checkAvailable = 'di';

                break;
            case 'Wednesday':
                $checkAvailable = 'wo';

                break;
            case 'Thursday':
                $checkAvailable = 'do';

                break;
            case 'Friday':
                $checkAvailable = 'vr';

                break;
        }

        foreach ($coaches as $coach) {
            if (strpos($coach['available_days'], $checkAvailable) !== false) {
                echo "<li class='inline-flex mb-4 whitespace-pre-wrap'>" . $coach['username'];
                echo "<img src=" . $coach['image_url'] . " height='20' width='20'></li><br>";
            }
        }
    }
}
