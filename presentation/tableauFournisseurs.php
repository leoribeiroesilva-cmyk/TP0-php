<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $undlg = new DialogueBD();
    $fournisseurs = $undlg->getTousLesFournisseurs();
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!-- PARTIE AFFICHAGE --------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/design.css"/>
    <title>Tableau des fournisseurs</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1>Tableau des fournisseurs</h1>
<table class="table table-bordered table-striped table-responsive">
    <tr><th>Nom</th><th>Adresse</th><th>Email</th><th>Tel</th><th></th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($fournisseurs as $ligne) {
        $id = $ligne['id'];
        $nom = $ligne['nom_fournisseur'];
        $adresse = $ligne['adresse'];
        $email= $ligne['email'];
        $tel= $ligne['telephone'];
        echo "<tr><td>$nom</td><td>$adresse</td><td>$email</td><td>$tel</td>";
        echo "<td><a href='detailFournisseur.php?id=$id'>voir le détail</a></td></tr>";
    }
    ?>

</table>

</body>
</html>
