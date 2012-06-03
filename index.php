<?php
include("common.inc.php");
include_header();
?>
<centre><h1>AmbleMate</h1></centre>
<form action="results.php"> 
<label for="from">From: </label> <input type="text" name="from" id="from" value="-35.240392,149.096114"/><bR>
<label for="to">To: &nbsp;&nbsp;&nbsp;&nbsp;</label> <input type="text" name="to" id="to" value="-35.251606,149.117444"/><br>
<br>
    <input type="checkbox" name="wheelchair" id="wheelchair" />
<label for="wheelchair">Wheelchair/pram accessible </label>
<br />
    Mode of transport:<br>
    <INPUT type="radio" name="mode" value="WALK" checked/> Walking<BR>
    <INPUT type="radio" name="mode" value="BICYCLE"/> Cycling<BR>
        Optimise for:<br>
    <INPUT type="radio" name="optimize" value="QUICK" checked/> Quick - prefer speed over ease<BR>
    <INPUT type="radio" name="optimize" value="SAFE"/> Safe - prefer paths away from roads<BR>
        <INPUT type="radio" name="optimize" value="FLAT"/> Flat - prefer flatter but longer journeys over speed<BR>
    <input type="submit"/>
</form>
<?php
include_footer();

?>

