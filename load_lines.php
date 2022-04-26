<?php
    $strQry = "SELECT id, ST_AsGeoJSON(geometry) as geom, trail_name FROM park_line";

    $db=new PDO('pgsql:host=localhost;port=5432;dbname=;user=;password=');
    $sql = $db->query($strQry);
    $features=[];
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        $feature=['type'=>'Feature'];
        $feature['geometry']=json_decode($row['geom']);
        unset($row['geom']);
        $feature['properties']=$row;
        array_push($features, $feature);
    }
    $featureCollection=['type'=>'FeatureCollection', 'features'=>$features];
    echo json_encode($featureCollection);
?>