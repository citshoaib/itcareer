<script>
    function selectCountry(city){
 $("#search-box").val(city);
 $("#suggesstion-box").hide();
 } 
    
</script>

<?php
include('../../../config/config.php');
include('../../../config/function.php');
if(!empty($_POST["keyword"])) {
$query =  $conn->query("SELECT distinct(city) FROM zip_code WHERE city like '" . $_POST["keyword"] . "%' ORDER BY city LIMIT 0,6");

if($query->num_rows>0){
?>
<ul id="country-list">
<?php
 while($fetch=$query->fetch_array())
{
?>
<li onClick="selectCountry('<?php echo $fetch["city"]; ?>');"><?php echo $fetch["city"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>
