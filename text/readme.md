# Rapport final - BI-Songs

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

<style>
.column{
  float: left;
  width: 33%;
  text-align: left;
}
</style>

<div class="column">
h
</div>

#
<div class="column">
g  
</div>

# Conclusion

