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
<style>
    label:after {
    content: "";
    width: 0rem;
    height: 0rem;
    top: 0%;}
    </style>
<?php 
$serviceID = $_POST['serviceID'];
?>
<option selected="" disabled="" value=""><?=$translations['chooseemployee']?></option>

<?php $providers = $DB->query("SELECT * from provider WHERE working='1' order by id ASC")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($providers as $provider) {
?>
<?php 
$service = $provider['services']; 
$service = explode(",", $service);
if (in_array($serviceID, $service))
{
?>

<div class="col-md-3">
    <input class="custom-option-item-check-provider" type="radio" name="provider"
        id="provider<?=id($provider['name'])?>" value="<?=$provider['id']?>" />
    <label class="custom-option-item text-center p-1" for="provider<?=id($provider['name'])?>">
        <img style="border-radius: 50%;height: 100px;width: 100px;object-fit: cover;"
            src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/profile/<?php if(empty($provider['photo'])){echo 'no-photo.png';}else{echo $provider['photo'];} ?>">
        <br><br><span class="custom-option-item-title h4 d-block">
        <?=$provider['name']?></span>
    </label>
</div>

<script>
    $("#provider<?=id($provider['name'])?>").click(function() {
        $('#providerID').val(<?=$provider['id']?>);
        $('#providerAdSoyad').val('<?=$provider['name']?>');

    });
    </script>
<?php } }  ?>