# Projet web Exia 2018

Site web développé à partir de la bibliothèque ReactPHP. Serveur PHP asynchrone à la Node.JS.<br />
<a href="http://vps429331.ovh.net:8080">http://vps429331.ovh.net:8080</a>

## Lancer le site

1. Installer les dépendances : ```composer install```
2. Exécuter ```schema.sql``` dans la base de données
3. Éditer config.json commu voulu
4. Lancer le serveur : ```./start.sh``` (l'arrêter : ```./stop.sh```, sous Windows directement : ```php src/phpttpd```)