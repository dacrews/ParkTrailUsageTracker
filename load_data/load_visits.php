<?php
    $strQry = "SELECT visit_activity, ST_AsGeoJSON(visit_location) as geom FROM park_visit";

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
