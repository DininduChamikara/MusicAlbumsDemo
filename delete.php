<?php
	session_start();
	$id = $_GET['id'];
 
	$albums = simplexml_load_file('files/albums.xml');
 
	//we're are going to create iterator to assign to each user
	$index = 0;
	$i = 0;
 
	foreach($albums->CD as $album){
		if($album->ID == $id){
			$index = $i;
			break;
		}
		$i++;
	}
 
	unset($albums->CD[$index]);
	file_put_contents('files/albums.xml', $albums->asXML());
 
	$_SESSION['message'] = 'Album deleted successfully';
	header('location: index.php');
 
?>