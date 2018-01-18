# Données traités

Il existe deux fichiers de donnés traités :

 - setlists.csv
 - songs.csv
 - most_played_per_country.csv
 - most_played_per_year.csv
 
Ces fichiers sont générer via l'[API](https://api.setlist.fm/docs/1.0/index.html) de [setlist.fm](https://www.setlist.fm/).


----------
## Strucutre des fichiers

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


Contient le nom des chansons lié par une relation avec la colonne id.

### most_played_per_country.csv

|  most_played_per_country|
|---|
|  country |
|  name|
|  count|


Contient la chanson la plus joué dans un pays et le nombre de fois qu'elle a été joué dans ce pays.

### most_played_per_year.csv

|  most_played_per_year|
|---|
|  year |
|  name|
|  count|


Contient la chanson la plus joué chaque année et le nombre de fois qu'elle a été joué dans cette année.