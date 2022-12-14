<?php
require 'database_connect.php';
$data = new data();
if (isset($_POST['opdracht'])){
    $data->update_stuck_students();
}
class data
{
    public function login($email,$password) {
        global $conn;
       $query = $conn->prepare("SELECT id, email, password FROM students WHERE email = ? AND password = ?");
       $query->execute([$email,$password]);
       $data = $query->fetch();
       return array($data['id'],$data['email'],$data['password']);
    }
    //Hier wordt bestaande data opgehaald van studenten die ook vast zitten
    public function get_stuck_students()
    {
        global $conn;
        return $conn->query('SELECT `username` FROM students')->fetchAll();
    }
    // Bestaande info over coaches ophalen
    public function get_coach()
    {
        global $conn;
        return $conn->query('SELECT * FROM coaches')->fetchAll();
    }
    // opdracht ophalen
    public function get_opdracht($id)
    {
        global $conn;
        $query = $conn->prepare("SELECT opdracht FROM opdrachten WHERE id = ?");
        $query->execute([$id]);
        $data = $query->fetch();
         return  <<<HTML
                    <h1 class="text-4xl mt-5">{$data['opdracht']}</h1><br> 
HTML;
    }
    // Hints ophalen
    public function get_hint($id)
    {
        global $conn;
        $query = $conn->prepare("SELECT hints FROM opdrachten WHERE id = ?");
        $query->execute([$id]);
        $data = $query->fetch();
        return $data['hints'];
    }
    
    public function status_change()
    {
        global $conn;
        $query = "UPDATE stuck_students SET status = ? WHERE id = ?";
        $conn->prepare($query)->execute([]);
    }
    public function list_stuck_students()
    {
        global $conn;
        $data = $conn->query(
            "SELECT stuck_students.id, students.username, opdrachten.opdracht, stuck_students.status, 
        date_format(created_at,'%Y-%m-%d') AS created_at 
        FROM stuck_students
        INNER JOIN students ON stuck_students.student_id = students.id
        INNER JOIN opdrachten ON stuck_students.opdracht_id = opdrachten.id ORDER BY id DESC;"
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
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Helpen</a>
                                </td>
                            </tr>
HTML;
        }
    }
    // Functie voor als studentenhulp op non-actief staat
    public function delete_studenthulp($id, $status, $timestamp)
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
    // aanwezige coaches weergeven
    public function availableCoach()
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
    public function update_stuck_students()
    {
        global $conn;
        $query = "INSERT INTO stuck_students (status, student_id, opdracht_id) VALUES (?,?,?)";
        $conn->prepare($query)->execute([1, $_POST['student'], $_POST['opdracht']]);
        header("Location: StudentenHulp.php");
    }
    public function skilledCoach()
    {
        $excersizeSkill = "front-end";
        $coaches = $this->get_coach();
        foreach ($coaches as $coach) {
            if ($coach['top_skill'] == $excersizeSkill) {
                echo "<li class='inline-flex mb-4 whitespace-pre-wrap'>" . $coach['username'];
                echo "<img src=" . $coach['image_url'] . " height='20' width='20'></li><br>";
            }
        }

    }
}
