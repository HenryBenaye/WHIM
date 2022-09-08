<!DOCTYPE html>
<html>
<head>
    <title>Whim</title>
    <meta name="description" content="Our first page">
    <meta name="keywords" content="html tutorial template">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php include "header.php";
    include "data.php";
    $data = new data();
    ?>
</head>
<body>
<div class="container p-2 mx-auto">
    <div class="flex flex-row flex-wrap py-4">
        <aside class="w-full sm:w-1/3 md:w-1/4 px-2 border-2 m-4 mt-0">
            <div class="sticky top-0 p-4 bg-white rounded-xl w-full">
                <ul class="nav flex flex-col overflow-hidden">
                    <li class="nav-item">
                        <p class="font-bold mb-2">Team</p>
                        <p>Alone</p><br>
                    </li>
                    <li class="nav-item">
                        <p class="font-bold mb-4">Online bitters</p>
                        <ul class="nav">
                            <li class="nav-item inline-flex mb-4 whitespace-pre-wrap">Henry Benaye   <img src="img/profilepic.png" height="20" width="20"></li><br>
                            <li class="nav-item inline-flex mb-4 whitespace-pre-wrap">Wessel Willemsem   <img src="img/profilepic.png" height="20" width="20"></li><br>
                        </ul>
                    </li>
                </ul>
                <hr class="solid mb-4 mt-4">
                <button disabled class="bg-blue-300 text-white font-bold py-2 px-4 rounded disabled mb-4" onclick="toggleModal('modal-id')">Hint</button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 rounded"><a href="studentenhulp.php">Ik zit vast</a></button>
                <hr class="solid mb-4 mt-4">
                <p class="font-bold mb-4">Aanwezige coaches</p>
                <ul class="nav">
                    <!-- Insert coaches from database automatically -->
                    <?php
                    $data->availableCoach();
                    ?>
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
                <?php
                echo $data->get_opdracht($_GET['opdracht']);
                ?>
                <p class="pb-4">Als developer ga je natuurlijk mooie en coole dingen ontwikkelen. Die mooie dingen wil je aan mensen kunnen laten zien. Een goede manier om dit te doen, is door middel van een eigen website. Je gaat een webpagina maken waarin je informatie over jezelf en je projecten kan laten zien. In de komende exercises, waarvan dit de eerste is, zullen we leren hoe dit moet!</p>
                <br><div class="bg-cyan-200 w-full h-32">
                    <ul class="ml-6">
                        <li class="inline-flex mb-2 text-sm">Maak een map voor deze exercise met de naam<p class="text-red-600 whitespace-pre-wrap"> mijn-website </p> op de juiste plek.</li>
                        <li class="inline-flex mb-2 text-sm">Open deze map met VsCode of een andere text editor. </li><br>
                        <li class="inline-flex mb-2 text-sm">Maak een bestand met de naam <p class="text-red-600 whitespace-pre-wrap"> index.html</p>. </li>
                        <li class="inline-flex mb-2 text-sm">Open het<p class="text-red-600 whitespace-pre-wrap"> index.html </p>bestand in je browser en zorg dat het dan je naam weergeeft!</li>
                    </ul>
                </div>
                <p class="mt-2 pb-4">Maak hierbij gebruik van de nieuwe technieken die je hieronder kan vinden.</p>
                <h1 class="text-4xl mt-5">2. Leerdoelen</h1><br>
                <ul class="list-disc pl-4">
                    <li>Je leert de belangrijkste onderdelen in de structuur van een webpagina.</li>
                    <li>Je leert hoe je een webpagina maakt en bekijkt in je browser.</li>
                </ul>
                <h1 class="text-4xl mt-5">3. Nieuwe leertechnieken</h1><br>

                <div class="bg-green-200 w-72 h-72">
                    <h1 class="text-4xl mt-5">"Doctype"</h1><br>
                    <p>Een HTML-bestand begint altijd met een declaratie van het type bestand. Dit gebeurt door aan te geven wat de "doctype" is. Dit zorgt ervoor dat de browser weet dat het bestand volgens de HTML regels gelezen moet worden.</p>

                </div>
                <h1 class="text-4xl mt-5">4. Verwachte uitkomst</h1><br>
                <h1 class="text-4xl mt-5">5. Nakijkcriteria</h1><br>
                <ul class="list-decimal pl-4">
                    <li> De goede nakijkcriteria die heel erg belangrijk is</li>
                </ul>
            </div>
            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                <div class="relative w-auto my-6 mx-auto max-w-3xl">
                    <!--content-->
                    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        <!--header-->
                        <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                            <h3 class="text-3xl font-semibold">
                                Je hebt een hint nodig hè😉
                            </h3>
                            <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
          <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
            ×
          </span>
                            </button>
                        </div>
                        <!--body-->
                        <div class="relative p-6 flex-auto">
                            <p class="my-4 text-slate-500 text-lg leading-relaxed">
                                Heb je deze keyword all geprobeerd?:<br>
                                <b id="hint_id"></b><br>
                                <b>html element</b>
                            </p
                            </p>
                        </div>
                        <!--footer-->
                        <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                            <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
        </main>
    </div>
</div>

</body>
<script type="text/javascript">
    // Modal laten zien
    function toggleModal(modalID){
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        get_hint();
    }
    // Een ajax request maken om de hints op te halen en displayen
    function get_hint() {
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "data.php", true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("hint_id").innerHTML = "<?php echo $data->get_hint($_GET['opdracht']);?>";
            }
        }

    }


</script>
</html>
