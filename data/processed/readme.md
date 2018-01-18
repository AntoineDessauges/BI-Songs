# Données traitées

Il existe deux fichiers de donnés traités :

 - setlists.csv
 - songs.csv
 - most_played_per_country.csv
 - most_played_per_year.csv
 
Ces fichiers sont générés via l'[API](https://api.setlist.fm/docs/1.0/index.html) de [setlist.fm](https://www.setlist.fm/).


----------
## Structure des fichiers

### setlists.csv

|  setlists |
|---|
|  id |
|  artist |
|  year |
|  city |
|  country |
|  tour |

Contient les setlists ainsi que leurs informations.

### songs.csv

|  songs|
|---|
|  id |
|  name|


Contient le nom des chansons liés par une relation avec la colonne id à une setlist.

### most_played_per_country.csv

|  most_played_per_country|
|---|
|  country |
|  name|
|  count|


Contient la chanson la plus jouée dans un pays et le nombre de fois qu'elle a été joué dans ce pays.

### most_played_per_year.csv

|  most_played_per_year|
|---|
|  year |
|  name|
|  count|


Contient la chanson la plus jouée chaque année et le nombre de fois qu'elle a été joué dans cette année.