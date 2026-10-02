<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
    $undlg = new DialogueBD();
    $projets = $undlg->getToutLesProjets();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/design.css"/>
    <title>Tableau des projets</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1>Tableau des fournisseurs</h1>
<table class="table table-bordered table-striped table-responsive">
    <tr><th>Nom_projet</th><th>date_debut</th><th>date_fin</th><th></th></tr>
    <?php
    foreach ($projets as $ligne) {
        $id = $ligne['id'];
        $nom = $ligne['nom_projet'];
        $date_debut = $ligne['date_debut'];
        $date_fin = $ligne['date_fin'];
        echo "<tr><td>$nom</td><td>$date_debut</td><td>$date_fin</td>";
        echo "<td><a href='detailProjets.php?id=$id'>voir le détail</a></td></tr>";

    }
    ?>
</table>

</body>
</html>

