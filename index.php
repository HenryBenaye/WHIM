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
        <button class="rounded-full" onclick="stuck_fun()">
            Ik zit vast!!
        </button>
        <div id="data_stuck">

        </div>
    </div>
</div>
</body>
<script>
    function stuck_fun() {
        console.log()
        document.getElementById("data_stuck").innerHTML =
        "<?php foreach ($data->get_stuck_students() as $data) {
            echo $data['username'];
        }?>"
    }
</script>
</html>
