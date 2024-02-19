# [Lien du projet déployé en ligne](https://ecf-v-parrot-59b9dd8ce789.herokuapp.com/)
*Add-ons utilisés*: JawsDB MySQL et MemCachier 

## [Login](https://ecf-v-parrot-59b9dd8ce789.herokuapp.com/login.php)

## Accéder à l'espace employé

# Faire fonctionner en local

## 1. Télécharger [XAMPP](https://www.apachefriends.org/download.html)
 
## 2. Télécharger le dossier du projet sur [Github](https://github.com/dragoniCat/ECF_Garage_V-Parrot)

## 3. Placer le contenu du dossier sous xampp\htdocs\ECF_Garage_V-Parrot

## 4. Modifier les fichiers suivants en utilisant un éditeur de texte ou un IDE:

### includes\dbh.inc.php
Remplacer le contenu avec les lignes de code suivantes (ou simplement mettre en commentaire la portion JAWSDB et rendre active la portion XAMPP):
```php
<?php

// XAMPP
$dsn = "mysql:host=localhost;dbname=gvp_database";
$dbusername = "root";
$dbpassword = "";
$DATABASE = "gvp_database";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Echec de connexion: " . $e->getMessage();
}

const DB_HOST = 'localhost';
const DB_NAME = 'auth';
const DB_USER = 'root';
const DB_PASSWORD = '';

function db(): PDO {
    static $pdo;

    if (!$pdo) {
        $pdo = new PDO(
            sprintf("mysql:host=localhost;dbname=gvp_database;charset=UTF8", DB_HOST, DB_NAME),
            DB_USER,
            DB_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    return $pdo;
}


// JAWSDB
/*
$JAWSDB_URL = "mysql://edmb7232dcik47yq:n1et8n8ejgqivqqc@d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/qui5aafu163l1ogs";
$DB_PORT = 3306;

$DB_HOST = "d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
$DB_USERNAME = "edmb7232dcik47yq";
$DB_PASSWORD = "n1et8n8ejgqivqqc";
$DATABASE = "qui5aafu163l1ogs";

try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DATABASE;port=$DB_PORT", $DB_USERNAME, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Echec de connexion: " . $e->getMessage();
}

function db(): PDO {
    static $pdo;

    if (!$pdo) {
        $pdo = new PDO(
            sprintf("mysql:host=d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=qui5aafu163l1ogs;port=3306", "d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com", "qui5aafu163l1ogs"),
            "edmb7232dcik47yq",
            "n1et8n8ejgqivqqc",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    return $pdo;
}
*/
```

### includes\login_model.php
Retirer `//` de devant la première ligne `$query = ...` pour le mettre devant la seconde, de cette manière:
```php
<?php

declare(strict_types=1);

function get_email(string $email) {
    require_once "dbh.inc.php";
    $query = "SELECT * FROM gvp_database.utilisateurs WHERE email = :email;";
    // $query = "SELECT * FROM qui5aafu163l1ogs.utilisateurs WHERE email = :email;";
    $stmt = db()->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
```

### includes\config.php
Retirer `//` de devant `'domain' => 'localhost'` pour le mettre devant `'domain' => 'ecf-v-parrot-59b9dd8ce789.herokuapp.com'`, de cette manière:
```php
session_set_cookie_params([
    'lifetime' => 1800,
    // 'domain' => 'ecf-v-parrot-59b9dd8ce789.herokuapp.com',
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);
```

## 5. Lancer XAMPP Control Panel
- Start Apache module
- Start MySQL module

## 6. Mettre en place la base de données
- Ouvrir "Shell" à partir du XAMPP Control Panel
- Entrer la commande
```shell
# mysql -uroot -p
```
- Presser entrer
- Entrer la commande
```shell
\. \xampp\htdocs\ECF_Garage_V-Parrot\Database.sql
```

## 7. Aller à l'adresse http://localhost/ECF_Garage_V-Parrot/ dans le navigateur
- *Login* : http://localhost/ECF_Garage_V-Parrot/login.php

---

# Accéder à l'espace administrateur
- Entrer les identifiants
```
email: vincent.parrot@xxx.com
mdp: 123
```

# Accéder à l'espace employé
- Entrer les identifiants
Employé placeholder:
```
email: john.doe@xxx.com
mdp: j-doe
```

# Créer de nouveaux comptes employé

## En ligne avec Heroku:
- Télécharger [HeidiSQL](https://www.heidisql.com/download.php) et lancer le programme.
- Configurer la base de données à laquelle se connecter.
```md
Network type: MariaDB or MySQL (TCP/IP)
Library: libmariadb.dll
Hostname/IP: d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com
User: edmb7232dcik47yq
Password: n1et8n8ejgqivqqc
Port: 3306
```
- Sélectionner la base de données "qui5aafu163l1ogs" et double cliquer sur le tableau "utilisateurs"
- Sélectionner l'onglet "Data"
- Clique-droit, "Insert row" et rentrer les informations. L'id doit être unique et différent de 13

## En local avec XAMPP:
- Ouvrir Database.sql dans un éditeur de texte
- Coller le code suivant en modifiant les valeurs suivant le besoin:
```sql
INSERT INTO gvp_database.utilisateurs (id, nom, prenom, email, mdp) 
    VALUES ('X', 'Nom', 'Prénom', 'adresse@email.com', 'mdp')
    ON DUPLICATE KEY UPDATE nom='Nom';
```
L'id "X" doit être un chiffre unique autre que 1.