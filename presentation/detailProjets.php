<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $id = $_GET['id'];
    $undlg = new DialogueBD();
    $projet = $undlg->getUnProjet($id);
    $employes = $undlg->getEmployesProjet($id);

} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/design.css"/>
    <title>Détail Projets</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1> <?php echo $projet->nom_projet; ?></h1>
<h2>Liste des Employes</h2>
<table class="table table-bordered table-striped table-responsive">
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Poste</th>
    </tr>
    <?php  ?>
    <?php
    foreach ($employes as $employer) {
        $nom = $employer['nom'];
        $prenom = $employer['prenom'];
        $poste = $employer['poste'];
        echo "<tr><td>$nom</td><td>$prenom</td><td>$poste</td></tr>";
    }
    ?>
</table>
<a href="tableauProjets.php" class="btn btn-primary">Retour à la liste des projets</a>
<a href="/index.php" class="btn btn-primary">Retour à l'accueil</a>

</body>
</html>
