<?php

    $most_played_per_year = [];
    $most_played_per_country = [];

    echo 'Please wait until the end'; //informal message

    //get setlists from api 
    function get_setlists_from_curl($mbid, $page = 1){

        $curl = curl_init("https://api.setlist.fm/rest/1.0/artist/".$mbid."/setlists?p=".$page);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "x-api-key: 1bbb2dcb-32e1-44b8-8519-d8350129b67b",
            "accept: application/json",
            "Accept-Language: fr",
            'Content-type: text/csv; charset=UTF-8',
          ]
        );
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $setlists = curl_exec($curl);
        $setlists = json_decode($setlists);

        curl_close($curl);

        return $setlists;
    }

    $mbid = $argv[1]; //mdbid of the musician, more informations in readme

    $setlists = get_setlists_from_curl($mbid);

    //if not api return ->  api down or mbid incorect
    if(is_null($setlists)){
        echo "\nErruer : Mbid incorecte ou API ne fonctionne pas !";
        return;
    }

    //get number of page (round to upper)
    $number_page = ceil ($setlists->total / $setlists->itemsPerPage);


    //delete files if exist
    if(file_exists('../../data/processed/setlists.csv'))
        unlink('../../data/processed/setlists.csv');
    if(file_exists('../../data/processed/songs.csv'))
        unlink('../../data/processed/songs.csv');

    //open files
    $setlists_file = fopen("../../data/processed/setlists.csv", "w") or die("Fichier ouvert !");
    fwrite($setlists_file, "\xEF\xBB\xBF"); //set encodage for excel
    fwrite($setlists_file, 'id;artist;year;city;country;tour'."\r\n"); //write column
    $songs_file = fopen("../../data/processed/songs.csv", "w") or die("Fichier ouvert !");
    fwrite($songs_file, "\xEF\xBB\xBF");//set encodage for excel
    fwrite($songs_file, 'id;name'."\r\n"); //write column

    //parse all page from api
    for ($page=1; $page < $number_page+1; $page++) { 
        
        echo '.'; //like a loading for inform the user the script still run

        $setlists = get_setlists_from_curl($mbid, $page);

        // parse all setlists per page
        foreach ($setlists->setlist as $setlist) {
                  
            // write in file
            fwrite($setlists_file, $setlist->id.';'.$setlist->artist->name.';'.substr($setlist->eventDate,-4).';'.$setlist->venue->city->name.';'.$setlist->venue->city->country->name.';'.(isset($setlist->tour->name) ? $setlist->tour->name : '')."\r\n");

            //parse all sets in this setlist
            foreach ($setlist->sets as $set) {

                //parse all songs in this set
                if(isset($set[0]->song)){
                    foreach ($set[0]->song as $song) {
                        fwrite($songs_file, $setlist->id.';'.$song->name."\r\n");

                        //generate array for most played song per year
                        if (!array_key_exists(substr($setlist->eventDate,-4), $most_played_per_year))
                            $most_played_per_year[substr($setlist->eventDate,-4)] = [];
                        if (!array_key_exists($song->name, $most_played_per_year[substr($setlist->eventDate,-4)]))
                            $most_played_per_year[substr($setlist->eventDate,-4)][$song->name] = 0;
                        $most_played_per_year[substr($setlist->eventDate,-4)][$song->name]++;

                        //generate array for most played song per country
                        if (!array_key_exists($setlist->venue->city->country->name, $most_played_per_year))
                            $most_played_per_year[$setlist->venue->city->country->name] = [];
                        if (!array_key_exists($song->name, $most_played_per_year[$setlist->venue->city->country->name]))
                            $most_played_per_year[$setlist->venue->city->country->name][$song->name] = 0;
                        $most_played_per_year[$setlist->venue->city->country->name][$song->name]++;

                    }
                }
                //parse all "encore" songs in this set
                if(isset($set[1]->song)){
                    foreach ($set[1]->song as $song) {
                        fwrite($songs_file, $setlist->id.';'.$song->name."\r\n");

                        //generate array for most played song per year
                        if (!array_key_exists(substr($setlist->eventDate,-4), $most_played_per_year))
                            $most_played_per_year[substr($setlist->eventDate,-4)] = [];
                        if (!array_key_exists($song->name, $most_played_per_year[substr($setlist->eventDate,-4)]))
                            $most_played_per_year[substr($setlist->eventDate,-4)][$song->name] = 0;
                        $most_played_per_year[substr($setlist->eventDate,-4)][$song->name]++;

                        //generate array for most played song per country
                        if (!array_key_exists($setlist->venue->city->country->name, $most_played_per_country))
                            $most_played_per_country[$setlist->venue->city->country->name] = [];
                        if (!array_key_exists($song->name, $most_played_per_country[$setlist->venue->city->country->name]))
                            $most_played_per_country[$setlist->venue->city->country->name][$song->name] = 0;
                        $most_played_per_country[$setlist->venue->city->country->name][$song->name]++;

                    }
                }
            }

        }//foreach

    }//for

    // create most played songs per year file
    $most_played_per_year_file = fopen("../../data/processed/most_played_per_year.csv", "w") or die("Fichier ouvert !");
    fwrite($most_played_per_year_file, "\xEF\xBB\xBF"); //set encodage for excel
    fwrite($most_played_per_year_file, 'year;name;count'."\r\n"); //write column

    //foreach most played songs per year array to create csv
    foreach ($most_played_per_year as $year => $songs) {
        
        $most_played_this_year = '';
        $most_played_this_year_count = 0;

        //determine the most played this year
        foreach ($songs as $song => $count_play) {
            if($count_play > $most_played_this_year_count){
                $most_played_this_year = $song;
                $most_played_this_year_count = $count_play;
            }
        }

        fwrite($most_played_per_year_file, $year.';'.$most_played_this_year.';'.$most_played_this_year_count."\r\n");
    }


    // create most played songs per country file
    $most_played_per_country_file = fopen("../../data/processed/most_played_per_country.csv", "w") or die("Fichier ouvert !");
    fwrite($most_played_per_country_file, "\xEF\xBB\xBF"); //set encodage for excel
    fwrite($most_played_per_country_file, 'country;name;count'."\r\n"); //write column

    //foreach most played songs per country array to create csv
    foreach ($most_played_per_country as $country => $songs) {
        
        $most_played_this_country = '';
        $most_played_this_country_count = 0;

        //determine the most played this year
        foreach ($songs as $song => $count_play) {
            if($count_play > $most_played_this_country_count){
                $most_played_this_country = $song;
                $most_played_this_country_count = $count_play;
            }
        }

        fwrite($most_played_per_country_file, $country.';'.$most_played_this_country.';'.$most_played_this_country_count."\r\n");
    }


    //close all files
    fclose($setlists_file);
    fclose($songs_file);
    fclose($most_played_per_year_file);
    fclose($most_played_per_country_file);

?>