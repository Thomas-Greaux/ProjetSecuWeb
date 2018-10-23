# ProjetSecuWeb

## Vulnerabilité A1 - Injection SQL (ok)

Créer une interface de login qui transmet l’identifiant et le mdp directement à la base de donnée sans vérification:  
Select * from Users Where username=”$username” and password=”$password”;
$username = ‘Bob”; -- ‘
$password = ‘’  
On renvoie le username et le password dans un cookie vers l’utilisateur si l’authentification a réussi.

## Vulnerabilité A2 - Broken Authentication (ok)

Utilisation d’une méthode quelconque pour bypasser la connexion et se connecter avec les droits d’un autre ex: brute force, récupération d’url avec le token d’une autre personne, utiliser un pc avec une personne qui a oublié de fermer sa session sur le site ...

## Vulnérabilité A3 - Sensitive Data Exposure (ok)

Récupération de données (via injection par exemple) qui ne sont pas hashé/crypté ou utilise des algorithmes facilement “cassable”

Le secret n'est pas du tout crypté

## Vulnérabilité A4 - XML external entities

## Vulnérabilité A5 - Broken access control (ok)

page VIP qui peut etre accedé uniquement si l'utilisateur est VIP (champ vip dans user).
Un attaquant peut utiliser une injection sql dans la page de connexion pour modifier ce champ et obtenir l'acces.

## Vulnérabilité A6 - Security Misconfiguration (ok ??)

Erreur de configuration dans les différentes couches : réseaux, os, serveur, application, site ...

on peut dire qu'on a mal configurer l'utilisateur de la Base de Données MYSQL utilisé dans le php. En effet l'utilisateur "secu" possède tous les droits sur la db et donc il peut modifier les champs si un attaquant fait une injection. On peut limiter cela en utilisant un utilisateur de db qui n'a que les droit pour faire des SELECT.

## Vulnérabilité A7 - XSS (ok)

On met en place un livre d’or qui permet de laisser un message et de voir les messages qui ont été ajouté.

## Vulnérabilité A8 - Insecure Deserialization

## Vulnérabilité A9 - Using component with known vulnerabilities (ok ??)

dans livre_d_or.php, on utilise un script provenant de www.evil.site.com mais peut etre que ce script contient des vulérabilités qui mettrai en peril notre site. D'autant plus qu'on a ici une vulnerabilité javascript avec la fonction saveCurrentDraftInput() qui retourne this. Le script externe a donc accés à notre objet window

## Vulnérabilité A10 - Insufficient logging monitoring (ok)

## CSRF (ok)

## Javascript (ok)

la fonction saveCurrentDraftInput() dans guestbook retoune this et donc l'objet window

## Path to Alice's secret

-> sur la page de login, on peut injecter du code sql afin d'obtenir le mdp de Bob.

-> on se connecte avec le login et mdp de Bob.

-> on arrive sur une page ou on peut laisser un message que tout le monde peut voir. Sur cette page on execute une attaque XSS qui fait une requete GET vers le service de secret et on envoit le resultat de la requete à un serveur attaquant.

-> Alice se connecte et le script XSS est executé.

-> L'attaquant a le secret.