<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/eral.php';
function id($text) {
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '', $text);

    return $text;
}
?>
<?php 
$serviceID = $_POST['serviceID'];
?>
<option selected="" disabled="" value=""><?=$translations['select']?></option>

<?php $providers = $DB->query("SELECT * from provider WHERE working='1' order by id ASC")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($providers as $provider) {
?>
<?php 
$service = $provider['services']; 
$service = explode(",", $service);
if (in_array($serviceID, $service))
{
?>
<option id="provider<?=id($provider['name'])?>" data-label="<?=id($provider['name'])?>" value="<?=$provider['id']?>" ><?=$provider['name']?></option>
<?php } }  ?>