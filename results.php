<?php
include("common.inc.php");
include_header();
require_once 'lib/requests/library/Requests.php';
Requests::register_autoloader();
$request = Requests::get($otpURL.'opentripplanner-api-webapp/ws/plan?_dc=1338678656569&arriveBy=false&time=9%3A07%20am&ui_date=6%2F3%2F2012&mode=WALK&optimize=QUICK&maxWalkDistance=840&date=2012-06-03&preferredRoutes=&routerId=&toPlace=-35.251606%2C149.117444&fromPlace=-35.240392%2C149.096114');
echo "<p>";
$result = json_decode($request->body);
$plan = $result->plan->itineraries[0];
echo "<!--";
print_r($plan);
echo "-->";

$leg = $plan->legs[0];
echo "<centre><h1>".$leg->from->name." to ".$leg->to->name."</h1></centre>";
echo "Total distance ".round($plan->walkDistance)." meters <br>";
echo "Maximum elevation lost ".floor($plan->elevationLost)." meters <br>";
echo "Maximum elevation gained ".floor($plan->elevationGained)." meters <br>";
echo '<img src="http://maps.google.com/maps/api/staticmap?size=400x400&path=enc:'.$leg->legGeometry->points.'&sensor=false"/><br>';
$elevations = Array();
foreach ($leg->steps as $step) {
    echo "Go ".$step->absoluteDirection." on ".$step->streetName." for ".$step->distance." metres"."<br>";
    $stepElevations = explode(",",$step->elevation);
    foreach ($stepElevations as $i => $stepElevation) {
        if (($i+1) % 2 == 0) $elevations[] = $stepElevation;
    }
} 

echo "</p>";
?>
    <div id="gcontainer"></div>
    <!--[if IE]>
    <script type="text/javascript" src="js/flotr2/lib/FlashCanvas/bin/flashcanvas.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/flotr2/flotr2.min.js"></script>
    <script type="text/javascript">
      (function () {

        var
          container = document.getElementById('gcontainer'),
          start = (new Date).getTime(),
          data, graph, offset, i;


          data = [];
          <?php foreach ($elevations as $i => $value) {
              echo "data.push([$i,$value]);\n"; 
          }?>

          // Draw Graph
          graph = Flotr.draw(container, [ data ], {
              yaxis: {
                  title: "Meters<bR>above<br>sealevel"
                  
              }
          });

        

      })();
    </script>
<?php
include_footer();

?>

