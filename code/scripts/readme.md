# Script

Ce dossier contient le script qui permet de générer les fichiers de données traitées en utilisant  l'[API](https://api.setlist.fm/docs/1.0/index.html) de [setlist.fm](https://www.setlist.fm/).

## Utilisation

Pour utiliser ce script il vous faut posséder PHP 7 d'installer sur votre machine. Si ce n'est pas le cas, suivez la marche à suivre d’installation [ici](http://php.net/manual/fr/install.php).

Une fois installé, lancé un invité de commande dans ce dossier.

Pour exécuter le script utiliser la commande suivante : `php create_csv.php <mbid>`
Où `<mbid>` est l'identifiant unique de l'artiste sur lequel vous souhaiter faire l'analyse (voir partie `MusicBrainz Identifier (Mbid)` pour plus d'informations).

Une fois la commande exécutée, les fichiers .csv traités sont placés dans `/data/processed`.

### MusicBrainz Identifier (Mbid)

Mbid est un identifiant unique pour les musiciens. Il se compose d'une série de lettres et espace séparé par des tirets (Exemple :  cc197bad-dc9c-440d-a5b5-d52ba2e14234). 
Cette identifiant se trouve sur le site de [MusicBrainz Identifier](https://musicbrainz.org/doc/MusicBrainz_Identifier).

Effectuer une recherche de l'artiste désiré :
> ![enter image description here](https://i.imgur.com/LPcVCk3.png)

Trouver l'artiste dans la recherche et cliquez dessus :
> ![enter image description here](https://i.imgur.com/HAgUt8M.png)

Rendez-vous dans l'onglet détails pour trouver le mbid :
> ![enter image description here](https://i.imgur.com/HTM7NaG.png)