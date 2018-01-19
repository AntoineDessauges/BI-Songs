# Rapport final : Quelles sont les chansons les plus jouées par un groupe ?

## Introduction
Dans le cadre du cours de BI, j'ai réaliser une analyse de données afin de répondre à la question `Quelles sont les chansons les plus jouées par un groupe ?`.

J'ai choisi cette thématique car je voulais voir si la sortie de nouvelle album ou l’arrivée d'une chanson mobile influençait les chansons joués en concert ou si les plus vieilles chansons populaire gardait leurs place.

## Analyse
### Provenance des données
Pour effectuer cette analyse j'ai d'abord regarder les sources de données libre concernant les artiste et leurs musiques.
J'ai trouvé deux sources de données qui pourrait correspondre à mes besoins :

 - [Songkick API](https://www.songkick.com/developer)
 - [Setlist.fm API](https://api.setlist.fm/docs/1.0/index.html)

Je me suis tournée vers des API afin de pouvoir obtenir des données sur un artiste spécifique et non trouvé un fichier contenant tous les concerts de tous les artistes. Cela me permet de simplifier les filtres lors de l'affichages des graphiques et d'avoir un fichier plus léger.

Je me suis finalement tourné vers l'[API](https://api.setlist.fm/docs/1.0/index.html) de [Setlist.fm](https://www.setlist.fm/) pour plusieurs raisons :

 - Elle me permettait d'obtenir mes résultats sur une seule requête
 - Elle contenait les chansons joués lors des concerts ce qui était obligatoire pour mon analyse
### Traitement
Afin de traité mes données j'ai dû m'inscrire sur Setlist.fm](https://www.setlist.fm/) afin d'obtenir une clé d'API qui sera utilisé pour mes requetes.

Une fois obtenu, j'ai créer mon script de traitement de données. Ce script est réaliser en PHP qui effectue une requête sur [API](https://api.setlist.fm/docs/1.0/index.html) de [Setlist.fm](https://www.setlist.fm/) et génère les fichiers .csv grâce au résultats obtenus.

## Résultats

Afin d’analyser les résultats trois graphiques ont été générer pour deux artiste différent. 

### Chansons la plus joués par un artiste

|  Coldplay  |
|---|
| ![enter image description here](https://i.imgur.com/PvBPiwf.png)  |

|  Iron maiden  |
|---|
| ![enter image description here](https://i.imgur.com/inptzQv.png)  |


Ces graphiques permettent de répondre à la question principal `Quelles sont les chansons les plus jouées par un groupe ?`. 

### Chansons la plus joués par pays pour un artiste

|  Coldplay  |
|---|
| ![enter image description here](https://i.imgur.com/0FTRnAy.png)  |

|  Iron maiden  |
|---|
| ![enter image description here](https://i.imgur.com/PcRTkp5.png)  |

Ces graphiques permettent de démontrer que dans la majeure partie des cas, la chanson reste identique quelque sois le pays. Ce résultat s'explique simplement par le faite que la chanson la plus joués et celle qui se retrouve dans la majeure partie des pays.

### Chansons la plus joués par année pour un artiste

|  Coldplay  |
|---|
| ![enter image description here](https://i.imgur.com/zpfr3IW.png)  |

|  Iron maiden  |
|---|
| ![enter image description here](https://i.imgur.com/0zswKUm.png)  |


Ce graphique démontre que au fil des années le choix des chansons est influencer par la tendance. Que la sortie d'album ou ancienneté des chansons impacte les chansons choisies pour un concert.

# Conclusion

A la fin de cette analyse, nous pouvons clairement dédire que les chansons les plus joués par un artiste sont forcément les plus vieilles ou les gros succès. En analysant plus en détails les résultats en fonction des pays, nous retrouvons les mêmes résultats que les chansons les plus joués pour la même raison que le premier graphique.

Le plus intéressant est lorsque nous filtrons les chansons par années, ce qui nous permet de voir les changements au fil des années, les baisse de popularité des chansons plus vieilles ou les chansons à succès sorti. 