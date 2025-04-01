<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
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
                                            <a href="lang-add">
                                            <button class="dt-button btn btn-primary btn-add-record ms-2" tabindex="0"
                                                aria-controls="DataTables_Table_0" type="button">
                                                <span>Yeni Dil Ekle</span>
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                             
                                <div
                                    class="col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pe-lg-1 p-0">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                        <label>Arama <input id="search" type="search" class="form-control" placeholder="Dil Ara"
                                                aria-controls="DataTables_Table_0">
                                        </label>
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
                                            aria-label="Client: activate to sort column ascending">Dil Adı</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 73px;"
                                            aria-label="Total: activate to sort column ascending">Dil Kodu</th>
                                       

                                        <th class="cell-fit sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 80px;" aria-label="Actions">Düzenle</th>
                                    </tr>
                                </thead>
                                <tbody id="list">

                                    <?php $total ='0'; ?>
                                    <?php $page = intval(@$_GET['page']);
                                    if (!$page) {
                                        $page = 1;
                                    }
                                    $bak = $DB->prepare("select * from languages");
                                    $bak->execute(array());
                                    $toplam= $bak->rowCount();
                                    $limit = 10;
                                    $goster = $page*$limit-$limit;
                                    $sayfasayisi = ceil($toplam/$limit);
                                    $forlimit = 1; ?>
                                     <?php $langs = $DB->query("SELECT * from languages order by id desc limit $goster,$limit")->fetchAll(PDO::FETCH_ASSOC); 
                                    foreach ($langs as $langsCek) {
                                        ?>
                                    <tr class="odd">
                                        <td class=" control" tabindex="0" style="display: none;"></td>
                                        <td class="sorting_1">
                                            <a class="fw-bold">#<?=$langsCek['id']?></a>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="d-flex flex-column">
                                                    <h6 class="user-name text-truncate mb-0">
                                                        <?=$langsCek['name']?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?=$langsCek['code']?>
                                        </td>
                                       
                                        <td>
                                            <div class="d-flex align-items-center col-actions">
                                                <a class="me-25" href="lang/<?=$langsCek['code']?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Dil Düzenle"
                                                    aria-label="Dil Düzenle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye font-medium-2 text-body">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                                <a class="langSil" langID="<?=$langsCek['id']?>" langCode="<?=$langsCek['code']?>" style="margin-left:20px" class="me-25" 
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Dil Sil"
                                                    aria-label="Dil Sil">
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
                                        url:"../providerjson",
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
     $(".langSil").click(function() {
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
