<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $id = $_GET['id'];
    $undlg = new DialogueBD();
    $fournisseur = $undlg->getUnFournisseur($id);
    $produits=$undlg->getProduitsFournisseur($id);

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
    <title>Détail fournisseur</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>

<h1><?php echo $fournisseur->nom_fournisseur; ?></h1>
<h2>Liste des produits</h2>
<table class="table table-bordered table-striped table-responsive">
    <tr><th>Produit</th><th>Description</th><th>Prix</th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($produits as $ligne) {
        $nom = $ligne['nom_produit'];
        $desc = $ligne['description'];
        $prix= $ligne['prix'];
        echo "<tr><td>$nom</td><td>$desc</td><td>$prix</td></tr>";
    }
    ?>
</table>
<a href="tableauFournisseurs.php" class="btn btn-primary">Retour à la liste des fournisseurs</a>
<a href="/index.php" class="btn btn-primary">Retour à l'accueil</a>

</body>
</html>

