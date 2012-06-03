<?php
include("common.inc.php");
include_header();
?>
<centre><h1>AmbleMate</h1></centre>
<form action="results.php"> 
    From: <input type="text"/>
    To: <input type="text"/>
    Wheelchair/pram accessible: <input type="checkbox"/>
    Walking or cycling: <select>
    <input type="submit"/>
</form>
<?php
include_footer();

?>

