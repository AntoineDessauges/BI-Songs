<?php

    echo 'Please wait until the end'; //informal message

    //get setlists from api 
    function get_setlists_from_curl($mbid, $page = 1){

        $curl = curl_init("https://api.setlist.fm/rest/1.0/artist/".$mbid."/setlists?p=".$page);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "x-api-key: 1bbb2dcb-32e1-44b8-8519-d8350129b67b",
            "accept: application/json",
            "Accept-Language: fr"
          ]
        );
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $setlists = curl_exec($curl);
        $setlists = json_decode($setlists);

        curl_close($curl);

        return $setlists;
    }

    $mbid = $argv[1]; //a4fb1386-45e7-4c85-a8a5-396060f6ec66     -      b10bbbfc-cf9e-42e0-be17-e2c3e1d2600d

    $setlists = get_setlists_from_curl($mbid);

    //get number of page (round to upper)
    $number_page = ceil ($setlists->total / $setlists->itemsPerPage);


    //delete files if exist
    if(file_exists('../../data/processed/setlists.csv'))
        unlink('setlists.csv');
    if(file_exists('../../data/processed/songs.csv'))
        unlink('songs.csv');

    //open files
    $setlists_file = fopen("../../data/processed/setlists.csv", "w") or die("Unable to open file!");
    fwrite($setlists_file, 'id;artist;date;city;country;tour'."\r\n"); //write column
    $songs_file = fopen("../../data/processed/songs.csv", "w") or die("Unable to open file!");
    fwrite($songs_file, 'id;name'."\r\n"); //write column

    //parse all page from api
    for ($page=1; $page < $number_page+1; $page++) { 
        
        echo '.'; //like a loading for inform the user the script still run

        $setlists = get_setlists_from_curl($mbid, $page);

        // parse all setlists per page
        foreach ($setlists->setlist as $setlist) {
                  
            // write in file
            fwrite($setlists_file, $setlist->id.';'.$setlist->artist->name.';'.$setlist->eventDate.';'.$setlist->venue->city->name.';'.$setlist->venue->city->name.';'.(isset($setlist->tour->name) ? $setlist->tour->name : '')."\r\n");

            //parse all sets in this setlist
            foreach ($setlist->sets as $set) {

                //parse all songs in this set
                if(isset($set[0]->song)){
                    foreach ($set[0]->song as $song) {
                        fwrite($songs_file, $setlist->id.';'.$song->name."\r\n");
                    }
                }
                //parse all "encore" songs in this set
                if(isset($set[1]->song)){
                    foreach ($set[1]->song as $song) {
                        fwrite($songs_file, $setlist->id.';'.$song->name."\r\n");
                    }
                }
            }

        }//foreach

    }//for
  
    //close all files
    fclose($setlists_file);

?>