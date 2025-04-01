<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
?>
<?php $aranan = $_POST['aranan']; ?>
<?php $total ='0'; ?>
<?php $page = intval(@$_GET['page']);
if (!$page) {
    $page = 1;
}
$bak = $DB->prepare("select * from orders");
$bak->execute(array());
$toplam= $bak->rowCount();
$limit = 10;
$goster = $page*$limit-$limit;
$sayfasayisi = ceil($toplam/$limit);
$forlimit = 1; ?>
   <?php $orders = $DB->query("SELECT * from orders where id like '%$aranan%'  order by id desc limit $goster,$limit")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($orders as $ordersCek) {
    ?>
<tr class="odd">
    <td class=" control" tabindex="0" style="display: none;"></td>
    <td class="sorting_1">
        <a class="fw-bold">#<?=$ordersCek['id']?></a>
    </td>

    <td>
        <div class="d-flex justify-content-left align-items-center">
            <div class="d-flex flex-column">
                <h6 class="user-name text-truncate mb-0">
                    <?php
                    $urunParcala = explode(",",$ordersCek['products']);
                    $urunSayi = count($urunParcala);
                    $i = 0;
                    foreach($urunParcala as $urunParcalaCek){
                    $urunDetay = $DB->query("select * from products where id=$urunParcalaCek")->fetch(PDO::FETCH_ASSOC);  
                    $i++;
                    ?>
                    <?php echo $urunDetay['ad']; if($i!=$urunSayi){echo ", ";}?>
                    <?php }?>
                    
                    </h6>
            </div>
        </div>
    </td>
    <td>
        <?=$ordersCek['orderDate']?>
    </td>
    <td>
        <?=$ordersCek['orderFiyat']?> ₺
    </td>
    <td>
        <div class="d-flex align-items-center col-actions">
            <a class="me-25" href="orders/<?=$ordersCek['id']?>"
                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                data-bs-original-title="Sipariş Düzenle"
                aria-label="Sipariş Düzenle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-eye font-medium-2 text-body">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
            </a>
            <a class="siparisSil" orderID="<?=$ordersCek['id']?>" style="margin-left:20px" class="me-25" 
                data-bs-toggle="tooltip" data-bs-placement="top" title=""
                data-bs-original-title="Sipariş Sil"
                aria-label="Sipariş Sil">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="red"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                 <polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                 </path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
            </a>
        </div>
    </td>
</tr>
<?php } ?>
