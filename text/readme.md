# Rapport final : Quelles sont les chansons les plus jouées par un groupe ?

## Introduction
Dans le cadre du cours de BI, j'ai réalisé une analyse de données afin de répondre à la question `Quelles sont les chansons les plus jouées par un groupe ?`.

J'ai choisi cette thématique car je voulais voir si la sortie d'un nouvel album ou l’arrivée d'une chanson populaire influençait les chansons jouées en concerts ou si les plus vieilles gardaient leur place.

## Analyse
### Provenance des données
Pour effectuer cette analyse j'ai d'abord regardé les sources de données libres concernant les artistes et leurs musiques.
J'ai trouvé deux sources de données qui pourrait correspondre à mes besoins :

 - [Songkick API](https://www.songkick.com/developer)
 - [Setlist.fm API](https://api.setlist.fm/docs/1.0/index.html)

Je me suis tournée vers des API afin de pouvoir obtenir des données sur un artiste spécifique et non vers un fichier contenant tous les concerts de tous les artistes. Cela me permet de simplifier les filtres lors de l'affichage des graphiques et d'avoir un fichier plus léger.

Je me suis finalement tourné vers l'[API](https://api.setlist.fm/docs/1.0/index.html) de [Setlist.fm](https://www.setlist.fm/) pour plusieurs raisons :

 - Elle me permettait d'obtenir mes résultats sur une seule requête
 - Elle contenait les chansons jouées lors des concerts ce qui était obligatoire pour mon analyse

### Traitement
Afin de traiter mes données j'ai dû m'inscrire sur [Setlist.fm](https://www.setlist.fm/) afin d'obtenir une clé d'API qui sera utilisé pour mes requêtes.

Une fois obtenu, j'ai créé mon script de traitement de données. Ce script réalisé en PHP effectue une requête sur l'[API](https://api.setlist.fm/docs/1.0/index.html) de [Setlist.fm](https://www.setlist.fm/) et génère les fichiers .csv grâce aux résultats obtenus.

## Résultats

Afin d’analyser les résultats trois graphiques ont été générer pour deux artistes différents. 

### Chansons les plus jouées par un artiste

|  Coldplay  |
|---|
| ![enter image description here](https://i.imgur.com/PvBPiwf.png)  |

|  Iron maiden  |
|---|
| ![enter image description here](https://i.imgur.com/inptzQv.png)  |


Ces graphiques permettent de répondre à la question principale `Quelles sont les chansons les plus jouées par un groupe ?`. 

### Chanson la plus jouée par pays pour un artiste

|  Coldplay  |
|---|
| ![enter image description here](https://i.imgur.com/0FTRnAy.png)  |

|  Iron maiden  |
|---|
| ![enter image description here](https://i.imgur.com/PcRTkp5.png)  |

Ces graphiques permettent de démontrer que dans la majeure partie des cas, la chanson reste identique quelque sois le pays. Ce résultat s'explique simplement par le fait que la chanson la plus jouée est celle qui se retrouve dans la majeure partie des pays.

### Chanson la plus jouée par année pour un artiste

|  Coldplay  |
|---|
| ![enter image description here](https://i.imgur.com/zpfr3IW.png)  |

|  Iron maiden  |
|---|
| ![enter image description here](https://i.imgur.com/0zswKUm.png)  |


Ce graphique démontre qu'au fil des années le choix des chansons est influencé par la tendance et que la sortie d'albums ou l'ancienneté des chansons impacte les chansons choisies pour un concert.

# Conclusion

A la fin de cette analyse, nous pouvons clairement déduire que les chansons les plus jouées par un artiste sont forcément les plus vieilles ou les gros succès. En analysant plus en détails les résultats en fonction des pays, nous retrouvons les mêmes résultats que les chansons les plus jouées pour la même raison que le premier graphique.

Le plus intéressant est lorsque nous filtrons les chansons par année, ce qui nous permet de voir les changements au fil des années, les baisses de popularité des chansons plus vieilles ou les chansons à succès sorti.

Pour répondre à la question `Quelles sont les chansons les plus jouées par un groupe ?`, d'un point de vue global ce sont les chansons à succès de l'artiste les plus vieilles qui ont été le plus jouées. Cela s'explique car il y a simplement plus en de concert où elles ont pu être jouées. Cependant si on se base sur les chansons les plus jouées sur une année les résultats sont différents, dans ce cas ce sont les chansons populaires de l'année en cours qui sont le plus jouées.

Bien évidemment ces faits s'appliquent sur la majeure partie des artistes mais ce n'est pas forcément le cas pour tous, une nouvelle chanson à gros succès pourrait très bien être plus jouée qu'une vieille chanson. Cela dépendra de plusieurs facteurs tels que l'année de création du groupe, leur nombre de concerts, etc.