<?php

require_once ('mysql_pdo_connect.php');

$photo_data = array();
$search_key = "";
$search_dist = 100;
$filtered_photos = array();

// get all photos

function get_photo_data() {

global $db;
	global $photo_data;
	
   $result = array();
   try {
   		$stmt = $db->query("SELECT * from beaches where 1  order by gpsDate DESC ");
   		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   		$photo_data = $result;
   	}
   	catch (PDOException $ex) {
   	
   	}
   
	return $result;
}

// get all photos

function get_all_photos() {

	global $photo_data;
	$photo_data = get_photo_data();
    return $photo_data;
}

// search through photos array to find photos whose location includes search string
// one of assignment tasks is to enhance this method to accept distance and filter the photos
// based on distance
function get_searched_photos($search_string, $search_distance) {

	global $photo_data;
	global $search_key;
	global $filtered_photos;

	$filtered_photos = array();
	get_photo_data();

	// if distance is not zero, filter by distance
	// otherwise, filter by location

	if ($search_distance != 0) {
		foreach ($photo_data as $photo) {
			if (haversine($photo['latitude'], $photo['longitude']) <= $search_distance) {
				$filtered_photos[] = $photo;
			}
		}
	}
	else {
		if (strlen($search_string) == 0) {
			return $photo_data; // for a null string return all photos
		}
	//	echo $search_string . "<br>";
	  foreach ($photo_data as $photo) {
	//    echo $photo[location] . "<br> " ;
	    $p = stripos($photo['location'], $search_string);
	   //  echo "class: " . get_class($p);
	    if (is_int($p))  {
	    //     echo "found". "<br>" ;
	    	$filtered_photos[] = $photo;
	    } 
	  }
	}

  if (sizeof($filtered_photos) > 0) {
 //   echo sizeof($filtered_photos);
  	return $filtered_photos;
  }
  else {
		return nil;
	}
}

// get the distance from Monmouth University to a certain point given latitude and longitude in degrees
function haversine($latitude, $longitude) {

	$earthRadius = 3959; //earth's radius in miles
  $monLatitude = 40.280036; //Monmouth University's latitude in degrees
  $monLongitude = -74.004939; //Monmouth University's longitude in degrees

  // convert latitudes and longitudes from degrees to radians
  $lat = deg2rad($latitude);
  $long = deg2rad($longitude);
  $monLat = deg2rad($monLatitude);
  $monLong = deg2rad($monLongitude);

  $distance = 2 * $earthRadius * asin(sqrt(pow(sin(($lat - $monLat) / 2), 2) + cos($monlat) * cos($lat) * pow(sin(($long - $monLong) / 2), 2)));

  return $distance; // distance in miles
}

// get data on a specific photo
function get_photo_details($photo_id) {

 global $db;
 
   $result = array();
   try {
   	 $stmt = $db->query("SELECT * from beaches where id='$photo_id' ");
  	 $result = $stmt->fetch(PDO::FETCH_ASSOC);

  	 return $result;
   }
   catch (PDOException $ex) {
        return nil;
   }

}

// add photo to db_id_list

function add_new_photo($url, $size, $loc, $time, $date, $lat, $lng, $thumbnail) {

    global $db;
	 try {
		$stmt = $db->prepare("INSERT INTO beaches(photo,size,location,gpstime,gpsdate,latitude,longitude, tumbnail) VALUES(:photo,:size,:location,:gpstime,:gpsdate,:latitude,:longitude,:thumbnamil)");
		$stmt->execute(array(':photo' => $url, ':size' => $size, ':location' => $loc,':gpstime' => $time, ':gpsdate' => $date,  ':latitude' => $lat,  ':longitude' => $lng, ':thumbnail' => $thumbnail ));
        $lastId = $db->lastInsertId();
        
        return $lastId;
    }
    catch (PDOException $ex) {
       return nil;
    }
    

	 
}

?>
