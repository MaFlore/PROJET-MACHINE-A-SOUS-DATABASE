<?php
$connection = new PDO('mysql:host=localhost; dbname=casino;','root','');
?>
<table border="1">
    <thead></thead>
    <tr>
        <th>Nom Du Joueur</th>
        <th>Niveau Du Joueur</th>
        <th>Mise Du Joueur</th>
        <th>Numero Du Tire</th>
        <th>Gain</th>
        <th>Date Du Jeu</th>
    </tr>

    <?php
        $joueur=$connection->query("SELECT * FROM joueur");
        while($element=$joueur->fetch()){
    ?>
    <tr>
        <td><?php echo $element['nom_joueur']?></td>
        <td><?php echo $element['niveau_joueur']?></td>
        <td><?php echo $element['mise_joueur']?></td>
        <td><?php echo $element['numero_tire']?></td>
        <td><?php echo $element['gain']?></td>
        <td><?php echo $element['date_jeu']?></td>
    </tr>
    <?php } ?>
</table>