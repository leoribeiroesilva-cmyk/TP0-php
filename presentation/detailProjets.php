<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $id = $_GET['id'];
    $undlg = new DialogueBD();
    $projet = $undlg->getUnProjet($id);
    $employers = $undlg->getEmployerDuProjet($id);

} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Détail Projets</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1> <?php echo $projet->nom_projet; ?></h1>
<h2>Liste des Employers</h2>
<table>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Poste</th>
    </tr>
    <?php
    foreach ($employers as $ligne) {
        $nom = $ligne['nom'];
        $prenom = $ligne['prenom'];
        $poste = $ligne['poste'];
        echo "<tr><td>$nom</td><td>$prenom</td><td>$poste</td></tr>";
    }
    ?>
</table>
</body>
</html>
