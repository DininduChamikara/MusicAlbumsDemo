<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("files/albums.xml");

$x=$xmlDoc->getElementsByTagName('CD');

//get the q parameter from URL
$q=$_GET["q"];



//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $searchResult="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('TITLE');

    $albumNo = $x->item($i)->getElementsByTagName('ID');
    $title = $x->item($i)->getElementsByTagName('TITLE');
    $artist = $x->item($i)->getElementsByTagName('ARTIST');
    $country = $x->item($i)->getElementsByTagName('COUNTRY');
    $company = $x->item($i)->getElementsByTagName('COMPANY');
    $price = $x->item($i)->getElementsByTagName('PRICE');
    $year = $x->item($i)->getElementsByTagName('YEAR');

    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($searchResult=="") {
          $searchResult="
            <thead>
              <th>Album No</th>
              <th>Title</th>
              <th>Artist</th>
              <th>Country</th>
              <th>Company</th>
              <th>Price</th>
              <th>Year</th>
            </thead>
            <tbody>
          " . 
          "
          <tr>
            <td>" . $albumNo->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $title->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $artist->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $country->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $company->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $price->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $year->item(0)->childNodes->item(0)->nodeValue . "</td>
          </tr>
          ";

        } else {
          $searchResult=$searchResult . 
          
          "
          <tr>
            <td>" . $albumNo->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $title->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $artist->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $country->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $company->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $price->item(0)->childNodes->item(0)->nodeValue . "</td>
            <td>" . $year->item(0)->childNodes->item(0)->nodeValue . "</td>
          </tr>
          ";
          
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($searchResult=="") {
  $response="no suggestion";
} else {
  $response=$searchResult . "</tbody>";
}

//output the response
echo $response;
?>