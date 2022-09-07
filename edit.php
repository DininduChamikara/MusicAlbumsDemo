<?php
	session_start();
	if(isset($_POST['edit'])){
		$albums = simplexml_load_file('files/albums.xml');
		foreach($albums->CD as $album){
			if($album->ID == $_POST['id']){
				$album->TITLE = $_POST['title'];
				$album->ARTIST = $_POST['artist'];
				$album->COUNTRY = $_POST['country'];
				$album->COMPANY = $_POST['company'];
				$album->PRICE = $_POST['price'];
				$album->YEAR = $_POST['year'];
				break;
			}
		}
 
		file_put_contents('files/albums.xml', $albums->asXML());
		$_SESSION['message'] = 'Album updated successfully';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Select album to edit first';
		header('location: index.php');
	}
 
?>