<?php
    if (file_exists('files/albums.xml')) {
        $xml = simplexml_load_file('files/albums.xml');
    } else {
        exit('Failed to open albums.xml.');
    }
    // $client was defined in the config.php
    $albums = $client->selectCollection('MusicAlbumsDemo', 'albums');

    // Delete predefined data
    $deleteResult = $albums->deleteMany([]);

    // insert data to the mongoDB 
    foreach ($xml->CD as $cd) {

        $insertOneResult = $albums->insertOne([
            'id' => (string) $cd->ID,
            'title' => (string) $cd->TITLE,
            'artist' => (string) $cd->ARTIST,
            'country' => (string) $cd->COUNTRY,
            'company' => (string) $cd->COMPANY,
            'price' => (float) $cd->PRICE,
            'year' => (int) $cd->YEAR,
        ]);
    }

?>