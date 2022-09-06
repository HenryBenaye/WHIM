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
        <button class="rounded-full">
            Ik zit vast!!
        </button>
        <div>
            <?php foreach ($data->get_stuck_students() as $data) {
                  echo $data['username'];
            };?>
        </div>
    </div>
</div>
</body>
</html>
