<!DOCTYPE html>
<html>
<head>
<title>Whim</title>
<meta name="description" content="Our first page">
<meta name="keywords" content="html tutorial template">
<script src="https://cdn.tailwindcss.com"></script>
<?php include "header.php";?>
<?php include "data.php";
$data = new data()?>
</head>
<body>
<div>
    <div>
        <div id="data_stuck">

        </div>
        <div>
            <?php foreach ($data->get_coach() as $coach) {
                echo $coach['username'];
            }?>
        </div>
    </div>
</div>
</body>
<script>
    function stuck_fun() {
        document.getElementById("data_stuck").innerHTML =
        "<?php foreach ($data->get_stuck_students() as $data) {
            echo $data['username'];
        }?>"
    }
</script>
</html>
