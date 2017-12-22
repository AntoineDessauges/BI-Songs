<?php

    $mbid = $argv[1]; //a4fb1386-45e7-4c85-a8a5-396060f6ec66

    $curl = curl_init("https://api.setlist.fm/rest/1.0/artist/".$mbid."/setlists");
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

    //create a csv with that !!!!!!!!!!!!!!!!!
    foreach ($setlists->setlist as $setlist) {
        echo $mbid;
        echo $setlist->artist->name;
        echo $setlist->eventDate;
        echo $setlist->venue->city->name;
        echo $setlist->venue->city->country->name;
        if(isset($setlist->tour->name))
            echo $setlist->tour->name;
    } 
?>