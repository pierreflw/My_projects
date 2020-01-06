<?php
include ('control.php');
                $genre = $bdd->query('SELECT * FROM genre');
                $i=0;

                while ($rep1 = $genre->fetch()) {
                    echo "<option value='". $i ."'>".$rep1['nom']."</option>";
                    $i++;
                }
                ?>