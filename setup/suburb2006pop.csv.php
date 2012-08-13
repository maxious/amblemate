<?php 
$fp = fopen('php://output', 'w');
if ($fp ) {
    header('Content-Type: text/csv; charset=utf-8');
   header('Content-Disposition: attachment; filename="suburbpop.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    
$xml = simplexml_load_file('suburb2006population.kml');
$json = json_encode($xml);
$data = json_decode($json,TRUE);
foreach ($data['Folder']['Placemark'] as $suburb) {
    if ($suburb['name'] == "Unclassified ACT")        continue;
    $geo = "";
    if (isset($suburb['MultiGeometry']['Polygon']['outerBoundaryIs']['LinearRing'])) {
    $geo = $suburb['MultiGeometry']['Polygon']['outerBoundaryIs']['LinearRing']['coordinates'];
    } else {
        foreach ($suburb['MultiGeometry']['Polygon'] as $poly) {
            $geo .= " ".trim($poly['outerBoundaryIs']['LinearRing']['coordinates']);
        }
    }
    $coords = explode(" ",trim($geo));
    $sumlat = 0;
    $sumlon = 0;
    
    foreach($coords as $coord) {
        $latlng = explode(",",$coord);
if (count($latlng) < 2) continue;
        $sumlat += $latlng[0];
        $sumlon += $latlng[1];
    }
    
    fputcsv($fp,Array($sumlat/count($coords),$sumlon/count($coords),
        $suburb['name'],
        str_replace(".0", "", str_replace("Persons@ Location on Census Night:","",$suburb['description']))));
}


    die;
}
?>
?>