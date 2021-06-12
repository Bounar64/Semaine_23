<!-- application/views/liste.php -->
<!-- **************** EXERCICE 2 CODEIGNITER **************** -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <ul>
        <?php foreach($Produits as $liste) { ?>
            <li><?php echo $liste; ?></li>
        <?php }?>      
    </ul>
</body>
</html>