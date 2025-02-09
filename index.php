<?php

/**
 * 1. Importez la table user dans une base de données que vous aurez créée au préalable via PhpMyAdmin
 * 2. En utilisant l'objet de connexion qui a déjà été défini =>
 *    --> Remplacez les informations de connexion ( nom de la base et vérifiez les paramètres d'accès ).
 *    --> Supprimez le dernier utilisateur de la liste, faites une capture d'écran dans PhpMyAdmin pour me montrer que vous avez supprimé l'entrée et pushez la avec votre code.
 *    --> Faites un truncate de la base de données, les auto incréments présents seront remis à 0
 *    --> Insérez un nouvel utilisateur dans la table ( faites un screenshot et ajoutez le au repo )
 *    --> Finalement, vous décidez de supprimer complètement la table
 *    --> Et pour finir, comme vous n'avez plus de table dans la base de données, vous décidez de supprimer aussi la base de données.
 */

require 'Classes/DB.php';

$db = new DB();
$pdo = $db::getInstance();

try {

    $sql = "DELETE FROM user WHERE id = 4";

    if($pdo->exec($sql) !== false){
        echo "entrée supprimée";
    }

    $sql = "TRUNCATE TABLE user";

    if($pdo->exec($sql) !== false){
        echo "contenu supprimé";
    }

    $sql = "INSERT INTO user (nom, prenom, rue, numero, code_postal, ville, pays, mail)
            VALUES ('Vador', 'Dark', 'des étoiles', 1, 2000, 'de la mort', 'coté sombre', 'sith@force.sw');
            ";

    $pdo->exec($sql);

    $sql = "DROP TABLE user";

    if($pdo->exec($sql) !== false){
        echo "table supprimée";
    }

    $dbName = 'exo193b';
    $sql = "DROP DATABASE $dbName";

    if($pdo->exec($sql) !== false){
        echo "base supprimée";
    }

}
catch (PDOException $e){
    echo "Error : " . $e->getMessage();
}

