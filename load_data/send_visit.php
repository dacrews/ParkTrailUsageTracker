<?php

// another php page to pull data from park visit table
// isset($_POST['visitor_Fname']) & isset($_POST['visitor_Lname']) & isset($_POST['parkSelect']) & isset($_POST['activitySelect']) & isset($_POST['markerLat']) & isset($_POST['markerLat'])

$db=pg_connect("host=localhost port=5432 dbname= user= password=");

// if ($db){
//     echo "success";
// }

if (isset($_POST['submit'])) {
    $fname = $_POST['visitor_Fname'];
    $lname = $_POST['visitor_Lname'];
    $pname = $_POST['parkSelect'];
    $act = $_POST['activitySelect'];
    $lat = $_POST['markerLat'];
    $lng = $_POST['markerLng'];

    $strQry = "INSERT INTO park_visit (first_name, last_name, park_name, visit_activity, visit_location) VALUES ('$fname', '$lname', '$pname', '$act', ST_PointFromText('POINT($lng $lat)', 4326));";

    $result = pg_query($db, $strQry);

    header('Location: index.html');

}
else {
      
}

pg_close();
?>
