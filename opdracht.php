<!DOCTYPE html>
<html>
<head>
<title>Whim</title>
<meta name="description" content="Our first page">
<meta name="keywords" content="html tutorial template">
<script src="https://cdn.tailwindcss.com"></script>
<?php include "header.php";?>
</head>
<body>
<div class="container p-2 mx-auto">
    <div class="flex flex-row flex-wrap py-4">
        <aside class="w-full sm:w-1/3 md:w-1/4 px-2 border-2 m-4">
            <div class="sticky top-0 p-4 bg-white rounded-xl w-full">
                <ul class="nav flex flex-col overflow-hidden">
                    <li class="nav-item">
                        <p class="font-bold mb-2">Team</p>
                        <p>Alone</p><br>
                    </li>
                    <li class="nav-item">
                        <p class="font-bold mb-4">Online bitters</p>
                            <p> klasgenoot</p>
                            <p> klasgenoot</p>
                            <p> klasgenoot</p>
                    </li>
                </ul>   
            <hr class="solid mb-4 mt-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Hint</button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 rounded"><a href="studentenhulp.php">Studentenhulp</a></button>
            <hr class="solid mb-4 mt-4">
                <p class="font-bold mb-4">Aanwezige coaches</p>
                    <ul class="nav">
                        <!-- Insert coaches from database automatically -->
                        <li class="nav-item inline-flex mb-4 whitespace-pre-wrap">Bob   <img src="profilepic.png" height="20" width="20"></li><br>
                        <li class="nav-item inline-flex mb-4 whitespace-pre-wrap">Joris   <img src="profilepic.png" height="20" width="20"></li><br>
                        <li class="nav-item inline-flex mb-4 whitespace-pre-wrap">Klaas   <img src="profilepic.png" height="20" width="20"></li><br>
                        <li class="nav-item inline-flex mb-4 whitespace-pre-wrap">Stein   <img src="profilepic.png" height="20" width="20"></li>
                    </ul>
                    <hr class="solid mb-4 mt-4">
                    <p class="font-bold mb-4">Skilled coaches</p>
                    <ul class="nav">
                        <!-- Insert coaches from database automatically -->
                        <li class="nav-item inline-flex mb-4 whitespace-pre-wrap">Bas   <img src="profilepic.png" height="20" width="20"></li><br>
                        <li class="nav-item inline-flex mb-4 whitespace-pre-wrap">Josephine   <img src="profilepic.png" height="20" width="20"></li><br>

                    </ul>
               
            </div>
        </aside>
        <main role="main" class="w-1/2 px-2 border-2">
            <div class="min-h-screen" id="orders">
                <h1 class="text-4xl mt-5">1. Omschrijving</h1><br>
                <p class="pb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In molestie, odio a sollicitudin rutrum, mi massa molestie urna, eget auctor felis tellus eget enim. Phasellus vel mauris arcu. Maecenas at nisl nulla. Morbi pretium posuere sem id dapibus. Maecenas nec placerat libero. Morbi consequat justo sed semper semper. Fusce eget lorem a quam suscipit congue et id nunc. Nullam convallis euismod velit, sed blandit ex consectetur sit amet. Donec ut lacus non erat finibus aliquet. Fusce sed leo nec ex varius dictum et eleifend odio. Pellentesque vel dui non nisi convallis hendrerit. Donec finibus leo et libero tincidunt, non sollicitudin augue porttitor. </p>
                <h1 class="text-4xl mt-5">2. Leerdoelen</h1><br>
                <ul class="list-disc pl-4">
                    <li> Leerdoel</li>
                    <li> Leerdoel</li>
                    <li> Leerdoel</li>
                    <li> Leerdoel</li>
                </ul>
                <h1 class="text-4xl mt-5">3. Herhaalde leertechnieken</h1><br>
                <h1 class="text-4xl mt-5">4. Verwachte uitkomst</h1><br>
                <h1 class="text-4xl mt-5">5. Nakijkcriteria</h1><br>
                <ul class="list-decimal pl-4">
                    <li> De goede nakijkcriteria die heel erg belangrijk is</li>
            </ul>
            </div>
        </main>
    </div>
</div>
</body>
</html>
