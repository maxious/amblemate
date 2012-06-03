<?php
include("common.inc.php");
include_header();
require_once 'lib/requests/library/Requests.php';
Requests::register_autoloader();
$request = Requests::get('http://amblemate.lambdacomplex.org:8080/opentripplanner-api-webapp/ws/plan?_dc=1338678656569&arriveBy=false&time=9%3A07%20am&ui_date=6%2F3%2F2012&mode=WALK&optimize=QUICK&maxWalkDistance=840&date=2012-06-03&preferredRoutes=&routerId=&toPlace=-35.251606%2C149.117444&fromPlace=-35.240392%2C149.096114');
echo "<p>";
var_dump($request->body);
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
          offset = 2 * Math.PI * (1) / 10000;

          // Sample the sine function
          for (i = 0; i < 4 * Math.PI; i += 0.2) {
            data.push([i, Math.sin(i - offset)]);
          }

          // Draw Graph
          graph = Flotr.draw(container, [ data ], {
            yaxis : {
              max : 2,
              min : -2
            }});

        

      })();
    </script>
<?php
include_footer();

?>

