# Guide pour le projet ECF Garage V.Parrot

## 1. Télécharger [XAMPP](https://www.apachefriends.org/download.html)
 
## 2. Télécharger le dossier du projet sur [Github](https://github.com/dragoniCat/ECF_Garage_V-Parrot)

## 3. Placer le contenu du dossier sous xampp\htdocs\ECF_Garage_V-Parrot

## 4. Lancer XAMPP Control Panel
- Start Apache module
- Start MySQL module

## 5. Mettre en place la base de données
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

## 6. Aller à l'adresse http://localhost/ECF_Garage_V-Parrot/ dans le navigateur

---

# Accéder à l'espace administrateur
- Aller à l'adresse http://localhost/ECF_Garage_V-Parrot/login.php ou http://localhost/ECF_Garage_V-Parrot/admin.php
- Entrer les identifiants
```
email: vincent.parrot@xxx.com
mdp: 123
```

# Accéder à l'espace employé
- Aller à l'adresse http://localhost/ECF_Garage_V-Parrot/login.php ou http://localhost/ECF_Garage_V-Parrot/employe.php
- Entrer les identifiants
Employé placeholder:
```
email: john.doe@xxx.com
mdp: j-doe
```

# Créer de nouveaux comptes employé
- Ouvrir Database.sql dans un éditeur de texte
- Coller le code suivant en modifiant les valeurs suivant le besoin:
```sql
INSERT INTO gvp_database.utilisateurs (id, nom, prenom, email, mdp) 
    VALUES ('X', 'Nom', 'Prénom', 'adresse@email.com', 'mdp')
    ON DUPLICATE KEY UPDATE nom='Nom';
```
L'id "X" doit être un chiffre unique autre que 1.