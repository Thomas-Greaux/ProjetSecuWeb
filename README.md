# ProjetSecuWeb

## Vulnerabilité A1 - Injection SQL

Créer une interface de login qui transmet l’identifiant et le mdp directement à la base de donnée sans vérification:  
Select * from Users Where username=”$username” and password=”$password”;
$username = ‘Bob”; -- ‘
$password = ‘’  
On renvoie le username et le password dans un cookie vers l’utilisateur si l’authentification a réussi.

## Vulnerabilité A2 - Broken Authentication

Utilisation d’une méthode quelconque pour bypasser la connexion et se connecter avec les droits d’un autre ex: brute force, récupération d’url avec le token d’une autre personne, utiliser un pc avec une personne qui a oublié de fermer sa session sur le site ...

## Vulnérabilité A3 - Sensitive Data Exposure

Récupération de données (via injection par exemple) qui ne sont pas hashé/crypté ou utilise des algorithmes facilement “cassable”

## Vulnérabilité A4 - XML external entities

## Vulnérabilité A5 - Broken access control

## Vulnérabilité A6 - Security Misconfiguration

Erreur de configuration dans les différentes couches : réseaux, os, serveur, application, site ...

## Vulnérabilité A7 - XSS

On met en place un livre d’or qui permet de laisser un message et de voir les messages qui ont été ajouté.

## Vulnérabilité A8 - Insecure Deserialization

## Vulnérabilité A9 - Using component with known vulnerabilities

## Vulnérabilité A10 - Insufficient logging monitoring

## CSRF

## Javascript

## Path to Alice's secret

-> sur la page de login, on peut injecter du code sql afin d'obtenir le mdp de Bob.
-> on se connecte avec le login et mdp de Bob.
-> on arrive sur une page ou on peut laisser un message que tout le monde peut voir. Sur cette page on execute une attaque XSS qui fait une requete GET vers le service de secret et on envoit le resultat de la requete à un serveur attaquant.
-> Alice se connecte et le script XSS est executé.
-> L'attaquant a le secret.