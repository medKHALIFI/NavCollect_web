<?php

header("Access-Control-Allow-Origin: *");
include_once("db_connect.php");


$layer1 = $_POST['layer1'];
$layer2 = $_POST['layer2'];


$query = "WITH data AS (SELECT '$layer1'::json AS fc)
    
SELECT
  row_number() OVER () AS gid,
  ST_AsText(ST_GeomFromGeoJSON(feat->>'geometry')) AS geom,
  feat->'properties' AS properties
FROM (
  SELECT json_array_elements(fc->'features') AS feat
  FROM data
) AS f;";
//les feature de couche 1
$feature1 = pg_query($query) or die('Échec de la requête : ' . pg_last_error());



$query = "WITH data AS (SELECT '$layer2'::json AS fc)
    
SELECT
  row_number() OVER () AS gid,
  ST_AsText(ST_GeomFromGeoJSON(feat->>'geometry')) AS geom,
  feat->'properties' AS properties
FROM (
  SELECT json_array_elements(fc->'features') AS feat
  FROM data
) AS f;";


$feature2 = pg_query($query) or die('Échec de la requête : ' . pg_last_error());


$row = pg_fetch_row($feature2);
$geom2= $row[1];

while ($row = pg_fetch_row($feature2)) {

   $temp =$row[1];
   $query = "SELECT ST_AsText(ST_Union(ST_GeomFromText('$temp'),ST_GeomFromText('$geom2') ) )";
   $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
   $row = pg_fetch_row($result);
   $geom2 =$row[0];
}

$row = pg_fetch_row($feature1);
$geom1= $row[1];

while ($row = pg_fetch_row($feature1)) {
      
    $temp =$row[1];
    $query = "SELECT ST_AsText(ST_Union(ST_GeomFromText('$temp'),ST_GeomFromText('$geom1') ) )";
    $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
    
    $row = pg_fetch_row($result);
    $geom1 =$row[0];
}

// Intersection
$query = " SELECT ST_AsGeoJSON(ST_Intersection('$geom1','$geom2')) ";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

$row = pg_fetch_row($result);

echo '{"type":"FeatureCollection","features":[{"type":"Feature","geometry":'.$row[0].',"properties":null}]}' ;

pg_free_result($result);

pg_close($dbconn);


?>