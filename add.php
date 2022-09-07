<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$albums = simplexml_load_file('files/albums.xml');
		$album = $albums->addChild('CD');
		$album->addChild('ID', $_POST['id']);
		$album->addChild('TITLE', $_POST['title']);
		$album->addChild('ARTIST', $_POST['artist']);
		$album->addChild('COUNTRY', $_POST['country']);
		$album->addChild('COMPANY', $_POST['company']);
		$album->addChild('PRICE', $_POST['price']);
		$album->addChild('YEAR', $_POST['year']);
		// Save to file
		// file_put_contents('files/members.xml', $users->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($albums->asXML());
		$dom->save('files/albums.xml');
		// Prettify / Format XML and save
 
		$_SESSION['message'] = 'Album added successfully';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
		header('location: index.php');
	}
?>