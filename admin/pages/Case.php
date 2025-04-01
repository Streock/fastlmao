<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
?>
<?php 
if(empty($_GET['month'])){
$ay = date("m");  
$_GET['month'] = date("m");
}else{
$ay = $_GET['month'];      
}
if(empty($_GET['year'])){
$yil = date("Y");  
}else{
$yil = $_GET['year'];  
$_GET['year'] = date("Y"); 
}
if(empty($_GET['date'])){
$caseDate = date("Y-m-d"); 
}else{
$caseDate = $_GET['date'];   
}
?>
<?php 
$gelir = 0;
$caseGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = $ay and YEAR(caseDate) = $yil and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($caseGelirSorgu as $caseGelirSorguCek) {
?>
<?php $gelir = $gelir+$caseGelirSorguCek['caseAmount']; ?>
<?php } ?>
<?php 
$gider = 0;
$caseGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = $ay and YEAR(caseDate) = $yil and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($caseGiderSorgu as $caseGiderSorguCek) {
?>
<?php $gider = $gider+$caseGiderSorguCek['caseAmount']; ?>
<?php } ?>

<?php 
$gunlukgelir = 0;
$caseGunlukGelirSorgu = $DB->query("SELECT * from business_case WHERE caseDate='$caseDate' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($caseGunlukGelirSorgu as $caseGunlukGelirSorguCek) {
?>
<?php $gunlukgelir = $gunlukgelir+$caseGunlukGelirSorguCek['caseAmount']; ?>
<?php } ?>
<?php 
$gunlukgider = 0;
$caseGunlukGiderSorgu = $DB->query("SELECT * from business_case WHERE caseDate='$caseDate' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($caseGunlukGiderSorgu as $caseGunlukGiderSorguCek) {
?>
<?php $gunlukgider = $gunlukgider+$caseGunlukGiderSorguCek['caseAmount']; ?>
<?php } ?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">
     
      <section id="dashboard-analytics">
                    <div class="row match-height">
                  

                           <!-- Orders Chart Card starts -->
                           <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start">
                                    <div class=" bg-light-warning ">
                                        Gelir - Gider Tarih Filtresi
                                    </div>
                                    
                                    
                                </div>

                                <form style="padding: 20px;" action="" method="get">
                                        <select class="form-control mt-1"  name="month" id="month" style="margin-right:5px;">
                                            <option <?php if($_GET['month']=='1'){echo 'selected';} ?> value="1">Ocak</option>
                                            <option <?php if($_GET['month']=='2'){echo 'selected';} ?> value="2">Şubat</option>
                                            <option <?php if($_GET['month']=='3'){echo 'selected';} ?> value="3">Mart</option>
                                            <option <?php if($_GET['month']=='4'){echo 'selected';} ?> value="4">Nisan</option>
                                            <option <?php if($_GET['month']=='5'){echo 'selected';} ?> value="5">Mayıs</option>
                                            <option <?php if($_GET['month']=='6'){echo 'selected';} ?> value="6">Haziran</option>
                                            <option <?php if($_GET['month']=='7'){echo 'selected';} ?> value="7">Temmuz</option>
                                            <option <?php if($_GET['month']=='8'){echo 'selected';} ?> value="8">Ağustos</option>
                                            <option <?php if($_GET['month']=='9'){echo 'selected';} ?> value="9">Eylül</option>
                                            <option <?php if($_GET['month']=='10'){echo 'selected';} ?> value="10">Ekim</option>
                                            <option <?php if($_GET['month']=='11'){echo 'selected';} ?> value="11">Kasım</option>
                                            <option <?php if($_GET['month']=='12'){echo 'selected';} ?> value="12">Aralık</option>
                     
                                        </select>
                                        <?php 
                                        $currently_selected = date('Y'); 
                                        $earliest_year = 2018; 
                                        $latest_year = date('Y'); ?>
                                        <select class="form-control mt-1"  name="year" id="year" style="margin-right:5px;">
                                        <?php 
                                        foreach ( range( $latest_year, $earliest_year ) as $i ) {?>
                                        <option <?php if($currently_selected==$i){echo 'selected';} ?> value="<?=$i?>"><?=$i?></option>
                                        <?php }?>
                                        </select>
                                       

                                        <button style="width: 100%;" class="dt-button btn btn-danger btn-add-record mt-1" tabindex="0"
                                                aria-controls="DataTables_Table_0" type="submit">
                                                <span>Filtrele</span>
                                            </button>
                                            <a href="../admin/case" style="width: 100%;" class="dt-button btn btn-danger btn-add-record mt-1" tabindex="0"
                                                aria-controls="DataTables_Table_0" >
                                                <span>Sıfırla</span>
                                                </a>
                                    </form>
                                
                        </div>
                        <!-- Orders Chart Card ends -->
                    </div>
                    

                          <!-- Subscribers Chart Card starts -->
                          <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div style="display: flex;">
                                <div style="width:50%" class="card-header flex-column align-items-start">
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <svg style="width: 2rem;height: 2rem;" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down-right"><line x1="7" y1="7" x2="17" y2="17"></line><polyline points="17 7 17 17 7 17"></polyline></svg>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder mt-1"><?=$gelir?>₺</h2>
                                    <p class="card-text"><b>Aylık Gelir </b></p>
                                </div>
                                <div style="width:50%" class="card-header flex-column align-items-start">
                                    <div class="avatar bg-light-warning p-50 m-0">
                                        <div class="avatar-content">
                                         <svg style="width: 2rem;height: 2rem;"  xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>                                        </div>
                                    </div>
                                    <h2 class="fw-bolder mt-1"><?=$gider?>₺</h2>
                                    <p class="card-text"><b>Aylık Gider</b></p>
                                </div>
                                </div>
                                <div style="width:100%" class="card-header flex-column align-items-start">
                                    <div class="avatar bg-light-warning p-50 m-0">
                                        <div class="avatar-content">
                                        <svg style="width: 2rem;height: 2rem;" width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 12L17 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder mt-1"><?=$gelir-$gider?>₺</h2>
                                    <p class="card-text"><b>Aylık Kalan</b></p>
                                </div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 340px; height: 239px;"></div></div><div class="contract-trigger"></div></div></div>
                        </div>
                        <!-- Subscribers Chart Card ends -->

                             <!-- Orders Chart Card starts -->
                             <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start">
                                    <div class=" bg-light-warning ">
                                        Günlük Gelir - Gider Filtresi
                                    </div>
                                    
                                    
                                </div>

                                <form style="padding:20px;" action="" method="get">
                                <select class="form-control"  name="type" id="type" style="margin-right:5px;">
                                            <option <?php if($_GET['type']=='0'){echo 'selected';} ?> value="0">Hepsi</option>
                                            <option <?php if($_GET['type']=='1'){echo 'selected';} ?> value="1">Gelir</option>
                                            <option <?php if($_GET['type']=='2'){echo 'selected';} ?> value="2">Gider</option>
                                        </select>
                                    <input class="form-control mt-1" id="date" type="date" value="<?php if(empty($_GET['date'])){echo date("Y-m-d");}else{echo $_GET['date'];}?>" name="date">
                                   
                                        <button style="width: 100%;" class="dt-button btn btn-danger btn-add-record mt-1" tabindex="0"
                                                aria-controls="DataTables_Table_0" type="submit">
                                                <span>Filtrele</span>
                                            </button>
                                            <a href="../admin/case" style="width: 100%;" class="dt-button btn btn-danger btn-add-record mt-1" tabindex="0"
                                                aria-controls="DataTables_Table_0" >
                                                <span>Sıfırla</span>
                                                </a>
                                    </form>
                                
                        </div>
                        <!-- Orders Chart Card ends -->
                    </div>

                    <!-- Subscribers Chart Card starts -->
                    <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div style="display: flex;">
                                <div style="width:50%" class="card-header flex-column align-items-start">
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <svg style="width: 2rem;height: 2rem;" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down-right"><line x1="7" y1="7" x2="17" y2="17"></line><polyline points="17 7 17 17 7 17"></polyline></svg>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder mt-1"><?=$gunlukgelir?>₺</h2>
                                    <p class="card-text"><b>Günlük Gelir </b></p>
                                </div>
                                <div style="width:50%" class="card-header flex-column align-items-start">
                                    <div class="avatar bg-light-warning p-50 m-0">
                                        <div class="avatar-content">
                                         <svg style="width: 2rem;height: 2rem;"  xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>                                        </div>
                                    </div>
                                    <h2 class="fw-bolder mt-1"><?=$gunlukgider?>₺</h2>
                                    <p class="card-text"><b>Günlük Gider</b></p>
                                </div>
                                </div>
                                <div style="width:100%" class="card-header flex-column align-items-start">
                                    <div class="avatar bg-light-warning p-50 m-0">
                                        <div class="avatar-content">
                                        <svg style="width: 2rem;height: 2rem;" width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 12L17 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder mt-1"><?=$gunlukgelir-$gunlukgider?>₺</h2>
                                    <p class="card-text"><b>Günlük Kalan</b></p>
                                </div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 340px; height: 239px;"></div></div><div class="contract-trigger"></div></div></div>
                        </div>
                        <!-- Subscribers Chart Card ends -->


                    
                    
                </section>
                
                <section class="invoice-list-wrapper">
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row d-flex justify-content-between align-items-center m-1">
                                <div class="col-lg-6 d-flex align-items-center">

                                    <div class="dt-action-buttons text-xl-end text-lg-start text-lg-end text-start ">
                                        <div class="dt-buttons">
                                            <a href="case-add?type=1">
                                            <button class="dt-button btn btn-success btn-add-record ms-2" tabindex="0"
                                                aria-controls="DataTables_Table_0" type="button">
                                                <span>Gelir Ekle</span>
                                            </button>
                                            </a>
                                            <a href="case-add?type=2">
                                            <button class="dt-button btn btn-danger btn-add-record ms-2" tabindex="0"
                                                aria-controls="DataTables_Table_0" type="button">
                                                <span>Gider Ekle</span>
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                    
                                 
                                </div>
                                <!--<div
                                    class="col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pe-lg-1 p-0">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                        <label>Arama <input id="search" type="search" class="form-control" placeholder="Hizmet Ara"
                                                aria-controls="DataTables_Table_0">
                                        </label>
                                    </div>
                                </div>-->
                            </div>
                            <table class="invoice-list-table table dataTable no-footer dtr-column"
                                id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th class="control sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" style="display: none;"
                                            aria-label=": activate to sort column ascending"></th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 42px;"
                                            aria-label=": activate to sort column ascending">
                                            ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 42px;"
                                            aria-label=": activate to sort column ascending">
                                            Tip
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 42px;"
                                            aria-label=": activate to sort column ascending">
                                            Tarih
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 270px;"
                                            aria-label="Client: activate to sort column ascending">Tutar</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 73px;"
                                            aria-label="Total: activate to sort column ascending">Açıklama</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 73px;"
                                            aria-label="Total: activate to sort column ascending">Ödeme Methodu</th>

                                        <th class="cell-fit sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 80px;" aria-label="Actions">Düzenle</th>
                                    </tr>
                                </thead>
                                <tbody id="list">

                                <?php if(empty($_GET['date'])){ ?>
                                    <?php $total ='0'; ?>
                                    <?php $page = intval(@$_GET['page']);
                                    if (!$page) {
                                        $page = 1;
                                    }
                                    $bak = $DB->prepare("select * from business_case");
                                    $bak->execute(array());
                                    $toplam= $bak->rowCount();
                                    $limit = 10;
                                    $goster = $page*$limit-$limit;
                                    $sayfasayisi = ceil($toplam/$limit);
                                    $forlimit = 1; ?>
                                    <?php $case = $DB->query("SELECT * from business_case order by id desc limit $goster,$limit")->fetchAll(PDO::FETCH_ASSOC); 
                                     }else{ 
                                     ?>

                                    <?php if($_GET['type']=='0'){
                                    $total ='0'; 
                                    $page = intval(@$_GET['page']);
                                    if (!$page) {
                                        $page = 1;
                                    }
                                    $bak = $DB->prepare("SELECT * from business_case where caseDate=?");
                                    $caseDate = $_GET['date'];
                                    $bak->execute(array($caseDate));
                                    $toplam= $bak->rowCount();
                                    $limit = 10;
                                    $goster = $page*$limit-$limit;
                                    $sayfasayisi = ceil($toplam/$limit);
                                    $forlimit = 1; 
                                    $case = $DB->query("SELECT * from business_case WHERE caseDate='$caseDate' order by id desc limit $goster,$limit")->fetchAll(PDO::FETCH_ASSOC); 
                                    }else {
                                    $total ='0'; 
                                    $page = intval(@$_GET['page']);
                                    if (!$page) {
                                        $page = 1;
                                    }
                                    $bak = $DB->prepare("SELECT * from business_case where caseDate=? and caseType=?");
                                    $caseDate = $_GET['date'];
                                    $caseType = $_GET['type'];
                                    $bak->execute(array($caseDate,$caseType));
                                    $toplam= $bak->rowCount();
                                    $limit = 10;
                                    $goster = $page*$limit-$limit;
                                    $sayfasayisi = ceil($toplam/$limit);
                                    $forlimit = 1; 
                                    $case = $DB->query("SELECT * from business_case WHERE caseDate='$caseDate' and caseType='$caseType' order by id desc limit $goster,$limit")->fetchAll(PDO::FETCH_ASSOC); 
                                    }
                                    }?>




                                    <?php foreach ($case as $caseCek) {?>
                                        
                                    <tr class="odd">
                                        <td class=" control" tabindex="0" style="display: none;"></td>
                                        <td class="sorting_1">
                                            <a class="fw-bold">#<?=$caseCek['id']?></a>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="d-flex flex-column">
                                                    <h6 class="user-name text-truncate mb-0">
                                                        <?php if($caseCek['caseType']=='1'){echo "<p style='color:green'>Gelir</p>";}?>
                                                        <?php if($caseCek['caseType']=='2'){echo "<p style='color:red'>Gider</p>";}?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="d-flex flex-column">
                                                    <h6 class="user-name text-truncate mb-0">
                                                        <?=$caseCek['caseDate']?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="d-flex flex-column">
                                                    <h6 class="user-name text-truncate mb-0">
                                                        <?=$caseCek['caseAmount']?>₺</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?=$caseCek['caseNote']?>
                                        </td>
                                        <td>
                                            <?=$caseCek['casePaymentMethod']?> 
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center col-actions">
                                                <a class="me-25" href="case/<?=$caseCek['id']?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="İşlem Düzenle"
                                                    aria-label="İşlem Düzenle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye font-medium-2 text-body">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                                <a class="caseSil" caseID="<?=$caseCek['id']?>" style="margin-left:20px" class="me-25" 
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Kasa İşlem Sil"
                                                    aria-label="Kasa İşlem Düzenle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="red"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                     <polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                     </path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
                           <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                            <script type="text/javascript">
                              $(document).ready(function(){
                                $('#search').on("input", function() {
                                    var aranan = $(this).val();
                                    $.ajax({
                                        type:"POST",
                                        url:"../servicesjson",
                                        data:{"aranan":aranan},
                                        success:function(e)
                                        {
                                          $("#list").html(e);
                                      }
                                  });
                                })
                            });
                        </script>

                            <div class="d-flex justify-content-between mx-2 row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                        aria-live="polite">Showing 1 to 10 of 50 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                        id="DataTables_Table_0_paginate">
                                        <ul class="pagination">
                                            <?php $onceki = $page-1; ?>
                                            <li class="paginate_button page-item previous <?php if($page=='1'){echo 'disabled';} ?>"
                                                id="DataTables_Table_0_previous">
                                                <a href="<?php echo '?page='.$onceki.'' ?><?php if(!empty($_GET['type'])){?>&type=<?=$_GET['type']?>&date=<?=$_GET['date']?><?php }?>"
                                                    aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                                    class="page-link">&nbsp;</a>
                                            </li>
                                            <li
                                                class="paginate_button page-item <?php if($page=='1'){echo 'disabled';} ?> <?php if($page=='1'){echo 'active';} ?>">
                                                <a href="?page=1<?php if(!empty($_GET['type'])){?>&type=<?=$_GET['type']?>&date=<?=$_GET['date']?><?php }?>" aria-controls="DataTables_Table_0" data-dt-idx="1"
                                                    tabindex="0" class="page-link">1</a>
                                            </li>

                                            <?php
                                            for ($i= $page - $forlimit ; $i < $page + $forlimit + 1 ; $i++) {
                                                if ($i>1 and $i<=$sayfasayisi) {
                                                    if ($i == $page) {?>
                                            <li class="paginate_button page-item active">
                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2"
                                                    tabindex="0" class="page-link"><?=$i?></a>
                                            </li>
                                            <?php }else{ ?>
                                            <li class="paginate_button page-item">
                                                <a href="?page=<?=$i?><?php if(!empty($_GET['type'])){?>&type=<?=$_GET['type']?>&date=<?=$_GET['date']?><?php }?>" aria-controls="DataTables_Table_0"
                                                    data-dt-idx="2" tabindex="0" class="page-link"><?=$i?></a>
                                            </li><?php 
                                                    }
                                                }
                                            }
                                            ?>
                                            <?php $sonraki = $page+1; ?>
                                            <li class="paginate_button page-item next <?php if($sonraki<=$sayfasayisi){}else{echo 'disabled';} ?>"
                                                id="DataTables_Table_0_next">
                                                <a href="<?php echo '?page='.$sonraki.'' ?><?php if(!empty($_GET['type'])){?>&type=<?=$_GET['type']?>&date=<?=$_GET['date']?><?php }?>"
                                                    aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0"
                                                    class="page-link">&nbsp;</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                
                
        </div>
    </div>
</div>

<script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/js/jquery-3.5.1.min.js">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>


     $(".caseSil").click(function() {
        Swal.fire({
        title: "Hata",
        text: "DEMODA İŞLEM YAPILAMAZ",
        icon: 'error',
        confirmButtonColor: '#7367f0',
        confirmButtonText: "Tamam"

        });
            
    });
</script>





<!-- END: Content--> <?php
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>

<script>
$("#date").flatpickr({
dateFormat: "Y-m-d",
locale: {
    weekdays: {
      longhand: ['Pazar', 'Pazartesi','Salı','Çarşamba','Perşembe', 'Cuma','Cumartesi'],
      shorthand: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt']
    },
    months: {
      longhand: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos', 'Eylül','Ekim','Kasım','Aralık'],
      shorthand: ['Oca','Şub','Mar','Nis','May','Haz','Tem','Ağu','Eyl','Eki','Kas','Ara']
    },
    today: 'Bugün',
    clear: 'Temizle'
  }
});
$("#year").flatpickr({
    static: true,
  altInput: true,
  plugins: [new monthSelectPlugin({shorthand: false, dateFormat: "Y-m-d", altFormat: "M Y"})],
locale: {
    weekdays: {
      longhand: ['Pazar', 'Pazartesi','Salı','Çarşamba','Perşembe', 'Cuma','Cumartesi'],
      shorthand: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt']
    },
    months: {
      longhand: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos', 'Eylül','Ekim','Kasım','Aralık'],
      shorthand: ['Oca','Şub','Mar','Nis','May','Haz','Tem','Ağu','Eyl','Eki','Kas','Ara']
    },
    today: 'Bugün',
    clear: 'Temizle'
  }
});
</script>

