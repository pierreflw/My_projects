<?php
include ('control.php');
    $distrib = $bdd->query('SELECT * FROM distrib');
    while ($rep = $distrib->fetch()) {

        echo '<option value="' . $rep['id_distrib'] .'">'.$rep['nom'].'</option><br/>';
    }
    ?>