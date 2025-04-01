<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
$member = $_GET['id'];
?>
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">
            <section class="invoice-list-wrapper">
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                           <div class="row d-flex justify-content-between align-items-center m-1">
                                <div class="col-lg-6 d-flex align-items-center">

                                    <div class="dt-action-buttons text-xl-end text-lg-start text-lg-end text-start ">
                                        <div class="dt-buttons">
                                            <a href="../members">
                                            <button class="dt-button btn btn-primary btn-add-record ms-2" tabindex="0"
                                                aria-controls="DataTables_Table_0" type="button">
                                                <span>Geri Dön</span>
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                              
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
                                            colspan="1" style="width: 270px;"
                                            aria-label="Client: activate to sort column ascending">Hizmet Adı</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 73px;"
                                            aria-label="Total: activate to sort column ascending">İşlem Başlangıç</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 73px;"
                                            aria-label="Total: activate to sort column ascending">İşlem Bitiş</th>

                                        
                                    </tr>
                                </thead>
                                <tbody id="list">

                                    <?php $total ='0'; ?>
                                    <?php $page = intval(@$_GET['page']);
                                    if (!$page) {
                                        $page = 1;
                                    }
                                    $bak = $DB->prepare("select * from appointments WHERE member=$member");
                                    $bak->execute(array());
                                    $toplam= $bak->rowCount();
                                    $limit = 10;
                                    $goster = $page*$limit-$limit;
                                    $sayfasayisi = ceil($toplam/$limit);
                                    $forlimit = 1; ?>
                                     <?php $appointments = $DB->query("SELECT * from appointments WHERE member=$member order by id desc limit $goster,$limit")->fetchAll(PDO::FETCH_ASSOC); 
                                    foreach ($appointments as $appointmentsVeri) {
                                        ?>
                                    <tr class="odd">
                                        <td class=" control" tabindex="0" style="display: none;"></td>
                                        <td class="sorting_1">
                                            <a class="fw-bold">#<?=$appointmentsVeri['appDate']?></a>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="d-flex flex-column">
                                                    <h6 class="user-name text-truncate mb-0">
                                                       <?php
                                            $serviceID = $appointmentsVeri['service'];
                                            $services= $DB->query("SELECT * from services where id=$serviceID")->fetch(PDO::FETCH_ASSOC);
                                            ?>
                                            <?=$services['serviceName']?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?=$appointmentsVeri['startTime']?>
                                        </td>
                                        <td>
                                            <?=$appointmentsVeri['endTime']?>
                                        </td>
                                      
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
                           <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                        

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
                                                <a href="<?php echo '?page='.$onceki.'' ?>"
                                                    aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                                    class="page-link">&nbsp;</a>
                                            </li>
                                            <li
                                                class="paginate_button page-item <?php if($page=='1'){echo 'disabled';} ?> <?php if($page=='1'){echo 'active';} ?>">
                                                <a href="?page=1" aria-controls="DataTables_Table_0" data-dt-idx="1"
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
                                                <a href="?page=<?=$i?>" aria-controls="DataTables_Table_0"
                                                    data-dt-idx="2" tabindex="0" class="page-link"><?=$i?></a>
                                            </li><?php 
                                                    }
                                                }
                                            }
                                            ?>
                                            <?php $sonraki = $page+1; ?>
                                            <li class="paginate_button page-item next <?php if($sonraki<=$sayfasayisi){}else{echo 'disabled';} ?>"
                                                id="DataTables_Table_0_next">
                                                <a href="<?php echo '?page='.$sonraki.'' ?>"
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
     $(".hizmetSil").click(function() {
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