<!DOCTYPE html5>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/menhir.css">
    </head>

    <body>
        <?php include 'header.php'; ?>
        <div id="conteneur0">
        
        <div class="lever" id="start" onclick="pullLever()">🕹️</div>
        <a href="menhir.php" id="restart" class="restart">restart</a>

            <?php 
                $tab=[1,2,3,4,5,6];
                shuffle($tab);
                $a=$tab[0];
                $b=$tab[1];
                $c=$tab[2];
                $d=$tab[3];
                $e=$tab[4];
                $f=$tab[5];

                switch ($a){
                    case 1:
                        ?>
                        <img src="../../img/menhir.png" id="m1">
                            <?php
                        break;
                    case 2:
                        ?>
                        <img src="../../img/menhir.png" id="m2">
                            <?php
                        break;
                    case 3:
                        ?>
                        <img src="../../img/menhir.png" id="m3">
                            <?php
                        break;
                    case 4:
                        ?>
                        <img src="../../img/menhir.png" id="m4">
                            <?php
                        break;
                    case 5:
                        ?>
                        <img src="../../img/menhir.png" id="m5">
                            <?php
                        break;
                    case 6:
                        ?>
                        <img src="../../img/menhir.png" id="m6">
                            <?php
                        break;
                }

                switch ($b){
                    case 1:
                        ?>
                        <img src="../../img/menhir.png" id="m1">
                            <?php
                        break;
                    case 2:
                        ?>
                        <img src="../../img/menhir.png" id="m2">
                            <?php
                        break;
                    case 3:
                        ?>
                        <img src="../../img/menhir.png" id="m3">
                            <?php
                        break;
                    case 4:
                        ?>
                        <img src="../../img/menhir.png" id="m4">
                            <?php
                        break;
                    case 5:
                        ?>
                        <img src="../../img/menhir.png" id="m5">
                            <?php
                        break;
                    case 6:
                        ?>
                        <img src="../../img/menhir.png" id="m6">
                            <?php
                        break;
                }

                switch ($c){
                    case 1:
                        ?>
                        <img src="../../img/menhir.png" id="m1">
                            <?php
                        break;
                    case 2:
                        ?>
                        <img src="../../img/menhir.png" id="m2">
                            <?php
                        break;
                    case 3:
                        ?>
                        <img src="../../img/menhir.png" id="m3">
                            <?php
                        break;
                    case 4:
                        ?>
                        <img src="../../img/menhir.png" id="m4">
                            <?php
                        break;
                    case 5:
                        ?>
                        <img src="../../img/menhir.png" id="m5">
                            <?php
                        break;
                    case 6:
                        ?>
                        <img src="../../img/menhir.png" id="m6">
                            <?php
                        break;
                }

                switch ($d){
                    case 1:
                        ?>
                        <img src="../../img/menhir.png" id="m1">
                            <?php
                        break;
                    case 2:
                        ?>
                        <img src="../../img/menhir.png" id="m2">
                            <?php
                        break;
                    case 3:
                        ?>
                        <img src="../../img/menhir.png" id="m3">
                            <?php
                        break;
                    case 4:
                        ?>
                        <img src="../../img/menhir.png" id="m4">
                            <?php
                        break;
                    case 5:
                        ?>
                        <img src="../../img/menhir.png" id="m5">
                            <?php
                        break;
                    case 6:
                        ?>
                        <img src="../../img/menhir.png" id="m6">
                            <?php
                        break;
                }

                switch ($e){
                    case 1:
                        ?>
                        <img src="../../img/menhir.png" id="m1">
                            <?php
                        break;
                    case 2:
                        ?>
                        <img src="../../img/menhir.png" id="m2">
                            <?php
                        break;
                    case 3:
                        ?>
                        <img src="../../img/menhir.png" id="m3">
                            <?php
                        break;
                    case 4:
                        ?>
                        <img src="../../img/menhir.png" id="m4">
                            <?php
                        break;
                    case 5:
                        ?>
                        <img src="../../img/menhir.png" id="m5">
                            <?php
                        break;
                    case 6:
                        ?>
                        <img src="../../img/menhir.png" id="m6">
                            <?php
                        break;
                }

                switch ($f){
                    case 1:
                        ?>
                        <img src="../../img/menhir.png" id="m1">
                            <?php
                        break;
                    case 2:
                        ?>
                        <img src="../../img/menhir.png" id="m2">
                            <?php
                        break;
                    case 3:
                        ?>
                        <img src="../../img/menhir.png" id="m3">
                            <?php
                        break;
                    case 4:
                        ?>
                        <img src="../../img/menhir.png" id="m4">
                            <?php
                        break;
                    case 5:
                        ?>
                        <img src="../../img/menhir.png" id="m5">
                            <?php
                        break;
                    case 6:
                        ?>
                        <img src="../../img/menhir.png" id="m6">
                            <?php
                        break;
                }
            ?>

            <script>

            function pullLever() {
            const m1 = document.getElementById("m1");
            const m2 = document.getElementById("m2");
            const m3 = document.getElementById("m3");
            const m4 = document.getElementById("m4");
            const m5 = document.getElementById("m5");
            const m6 = document.getElementById("m6");
            const start = document.getElementById("start");
            const restart = document.getElementById("restart");

            m1.classList.add("monter");
            m2.classList.add("monter");
            m3.classList.add("monter");
            m4.classList.add("monter");
            m5.classList.add("monter");
            m6.classList.add("monter");
            start.classList.add("cacher");
            restart.classList.add("montrer");
            }

            </script>

        </div>
    </body>
</html>
