    <?php $toplamRandevu = 0;?>
    <?php $randevular = $DB->query("SELECT * from appointments order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($randevular as $randevularCek) {
    $toplamRandevu= $toplamRandevu+1;
?>
    <?php }?>
    <?php $toplamMembers = 0;?>
    <?php $members = $DB->query("SELECT * from members order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($members as $membersCek) {
    $toplamMembers= $toplamMembers+1;
?>
    <?php }?>
    <?php $toplamService = 0;?>
    <?php $services = $DB->query("SELECT * from services order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($services as $servicesCek) {
    $toplamService= $toplamService+1;
?>
    <?php }?>
    <?php $toplamGonderilenSms = 0;?>
    <?php $gonderilenSms = $DB->query("SELECT * from sms_history order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($gonderilenSms as $gonderilenSmsCek) {
    $toplamGonderilenSms= $toplamGonderilenSms+1;
?>
    <?php }?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <h5>Merhaba, <?=$providerChk['name']?></h5>
                                    <p class="card-text font-small-3">Randevuları yönetmek için hemen randevu sayfasına
                                        git!</p>

                                    <a href="appointments"><button type="button"
                                            class="btn btn-primary">Randevular</button></a>
                                    <img src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/illustration/badge.svg"
                                        class="congratulation-medal" alt="Medal Pic" />
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->

                        <!-- Statistics Card -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Istatistikler</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text font-small-2 me-25 mb-0">Daima güncel!</p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?=$toplamRandevu?></h4>
                                                    <p class="card-text font-small-3 mb-0">Toplam Randevu</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?=$toplamMembers?></h4>
                                                    <p class="card-text font-small-3 mb-0">Müşteri</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="box" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?=$toplamService?></h4>
                                                    <p class="card-text font-small-3 mb-0">Hizmet</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-success me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>

                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?=$toplamGonderilenSms?></h4>
                                                    <p class="card-text font-small-3 mb-0">Gönderilen SMS</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>

                    <?php if($providerChk['isAdmin']=='1' && $settings['caseSystem']=='1'){ ?>

                    <div class="row match-height">
                        <!-- Revenue Report Card -->
                        <div class="col-lg-12 col-12">
                            <div class="card card-revenue-budget">
                                <div class="row mx-0">
                                    <div class="col-md-8 col-12 revenue-report-wrapper">
                                        <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                            <h4 class="card-title mb-50 mb-sm-0">Gelir - Gider</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center me-2">
                                                    <span style="background-color: #887ef2;"
                                                        class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                                                    <span>Gelir</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                                                    <span>Gider</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="revenue-report-chart"></div>
                                    </div>
                                    <div class="col-md-4 col-12 budget-wrapper">

                                        <?php 
                                    $gelir = 0;
                                    $ay = date("m");
                                    $yil = date("Y");
                                    $caseGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = $ay and YEAR(caseDate) = $yil and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                                    foreach ($caseGelirSorgu as $caseGelirSorguCek) {
                                    ?>
                                        <?php $gelir = $gelir+$caseGelirSorguCek['caseAmount']; ?>
                                        <?php } ?>
                                        <?php 
                                    $gider = 0;
                                    $ay = date("m");
                                    $yil = date("Y");
                                    $caseGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = $ay and YEAR(caseDate) = $yil and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                                    foreach ($caseGiderSorgu as $caseGiderSorguCek) {
                                    ?>
                                        <?php $gider = $gider+$caseGiderSorguCek['caseAmount']; ?>
                                        <?php } ?>
                                        <div class="d-flex justify-content-center">
                                            <span class="fw-bolder me-25">Aylık Gelir:</span>
                                            <span><?=$gelir?>₺</span>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <span class="fw-bolder me-25">Aylık Gider:</span>
                                            <span><?=$gider?>₺</span>
                                        </div>

                                        <div id="budget-chart"></div>
                                        <a href="case" class="btn btn-primary">Kasa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Revenue Report Card -->
                        <?php
                        $yil = date("Y");
                        $ocakGelir = 0;
                        $ocakGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '01' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($ocakGelirSorgu as $ocakGelirSorguCek) {
                        $ocakGelir = $ocakGelir+$ocakGelirSorguCek['caseAmount'];
                        }
                        $subatGelir = 0;
                        $subatGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '02' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($subatGelirSorgu as $subatGelirSorguCek) {
                        $subatGelir = $subatGelir+$subatGelirSorguCek['caseAmount'];
                        }
                        $martGelir = 0;
                        $martGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '03' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($martGelirSorgu as $martGelirSorguCek) {
                        $martGelir = $martGelir+$martGelirSorguCek['caseAmount'];
                        }
                        $nisanGelir = 0;
                        $nisanGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '04' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($nisanGelirSorgu as $nisanGelirSorguCek) {
                        $nisanGelir = $nisanGelir+$nisanGelirSorguCek['caseAmount'];
                        }
                        $mayisGelir = 0;
                        $mayisGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '05' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($mayisGelirSorgu as $mayisGelirSorguCek) {
                        $mayisGelir = $mayisGelir+$mayisGelirSorguCek['caseAmount'];
                        }
                        $haziranGelir = 0;
                        $haziranGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '06' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($haziranGelirSorgu as $haziranGelirSorguCek) {
                        $haziranGelir = $haziranGelir+$haziranGelirSorguCek['caseAmount'];
                        }
                        $temmuzGelir = 0;
                        $temmuzGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '07' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($temmuzGelirSorgu as $temmuzGelirSorguCek) {
                        $temmuzGelir = $temmuzGelir+$temmuzGelirSorguCek['caseAmount'];
                        }
                        $agustosGelir = 0;
                        $agustosGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '08' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($agustosGelirSorgu as $agustosGelirSorguCek) {
                        $agustosGelir = $agustosGelir+$agustosGelirSorguCek['caseAmount'];
                        }
                        $eylulGelir = 0;
                        $eylulGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '09' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($eylulGelirSorgu as $eylulGelirSorguCek) {
                        $eylulGelir = $eylulGelir+$eylulGelirSorguCek['caseAmount'];
                        }
                        $ekimGelir = 0;
                        $ekimGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '10' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($ekimGelirSorgu as $ekimGelirSorguCek) {
                        $ekimGelir = $ekimGelir+$ekimGelirSorguCek['caseAmount'];
                        }
                        $kasimGelir = 0;
                        $kasimGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '11' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($kasimGelirSorgu as $kasimGelirSorguCek) {
                        $kasimGelir = $kasimGelir+$kasimGelirSorguCek['caseAmount'];
                        }
                        $aralikGelir = 0;
                        $aralikGelirSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '12' and YEAR(caseDate) = '$yil' and caseType='1' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($aralikGelirSorgu as $aralikGelirSorguCek) {
                        $aralikGelir = $aralikGelir+$aralikGelirSorguCek['caseAmount'];
                        }
                        ?>
                        <?php
                        $yil = date("Y");
                        $ocakGider = 0;
                        $ocakGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '01' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($ocakGiderSorgu as $ocakGiderSorguCek) {
                        $ocakGider = $ocakGider+$ocakGiderSorguCek['caseAmount'];
                        }
                        $subatGider = 0;
                        $subatGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '02' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($subatGiderSorgu as $subatGiderSorguCek) {
                        $subatGider = $subatGider+$subatGiderSorguCek['caseAmount'];
                        }
                        $martGider = 0;
                        $martGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '03' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($martGiderSorgu as $martGiderSorguCek) {
                        $martGider = $martGider+$martGiderSorguCek['caseAmount'];
                        }
                        $nisanGider = 0;
                        $nisanGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '04' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($nisanGiderSorgu as $nisanGiderSorguCek) {
                        $nisanGider = $nisanGider+$nisanGiderSorguCek['caseAmount'];
                        }
                        $mayisGider = 0;
                        $mayisGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '05' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($mayisGiderSorgu as $mayisGiderSorguCek) {
                        $mayisGider = $mayisGider+$mayisGiderSorguCek['caseAmount'];
                        }
                        $haziranGider = 0;
                        $haziranGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '06' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($haziranGiderSorgu as $haziranGiderSorguCek) {
                        $haziranGider = $haziranGider+$haziranGiderSorguCek['caseAmount'];
                        }
                        $temmuzGider = 0;
                        $temmuzGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '07' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($temmuzGiderSorgu as $temmuzGiderSorguCek) {
                        $temmuzGider = $temmuzGider+$temmuzGiderSorguCek['caseAmount'];
                        }
                        $agustosGider = 0;
                        $agustosGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '08' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($agustosGiderSorgu as $agustosGiderSorguCek) {
                        $agustosGider = $agustosGider+$agustosGiderSorguCek['caseAmount'];
                        }
                        $eylulGider = 0;
                        $eylulGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '09' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($eylulGiderSorgu as $eylulGiderSorguCek) {
                        $eylulGider = $eylulGider+$eylulGiderSorguCek['caseAmount'];
                        }
                        $ekimGider = 0;
                        $ekimGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '10' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($ekimGiderSorgu as $ekimGiderSorguCek) {
                        $ekimGider = $ekimGider+$ekimGiderSorguCek['caseAmount'];
                        }
                        $kasimGider = 0;
                        $kasimGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '11' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($kasimGiderSorgu as $kasimGiderSorguCek) {
                        $kasimGider = $kasimGider+$kasimGiderSorguCek['caseAmount'];
                        }
                        $aralikGider = 0;
                        $aralikGiderSorgu = $DB->query("SELECT * from business_case WHERE MONTH(caseDate) = '12' and YEAR(caseDate) = '$yil' and caseType='2' order by id desc ")->fetchAll(PDO::FETCH_ASSOC); 
                        foreach ($aralikGiderSorgu as $aralikGiderSorguCek) {
                        $aralikGider = $aralikGider+$aralikGiderSorguCek['caseAmount'];
                        }
                        ?>
                    </div>
                    <?php } ?>

                    <div class="row match-height">
                        <!-- Revenue Report Card -->
                        <div class="col-lg-12 col-12">
                            <section class="invoice-list-wrapper">

                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h4 class="card-title">Ayın Elemanı</h4>
                                    </div>
                                    <div class="card-datatable table-responsive">
                                        <div id="DataTables_Table_0_wrapper"
                                            class="dataTables_wrapper dt-bootstrap5 no-footer">
                                            <table class="invoice-list-table table dataTable no-footer dtr-column"
                                                id="DataTables_Table_0" role="grid"
                                                aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="control sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            style="display: none;"
                                                            aria-label=": activate to sort column ascending"></th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            style="width: 42px;"
                                                            aria-label=": activate to sort column ascending">
                                                            ID
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            style="width: 270px;"
                                                            aria-label="Client: activate to sort column ascending">
                                                            Çalışan Adı</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            style="width: 73px;"
                                                            aria-label="Total: activate to sort column ascending">Email
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            style="width: 73px;"
                                                            aria-label="Total: activate to sort column ascending">
                                                            Çalışma Aralığı</th>

                                                        <th class="cell-fit sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 80px;" aria-label="Actions">Bu Ayki Toplam
                                                            Randevu</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="list">

                                                    <?php $total ='0'; ?>
                                                    <?php $page = intval(@$_GET['page']);
                                                    if (!$page) {
                                                        $page = 1;
                                                    }
                                                    $bak = $DB->prepare("select * from provider");
                                                    $bak->execute(array());
                                                    $toplam= $bak->rowCount();
                                                    $limit = 10;
                                                    $goster = $page*$limit-$limit;
                                                    $sayfasayisi = ceil($toplam/$limit);
                                                    $forlimit = 1; ?>
                                                                        <?php 
                                                    $month = date('m');
                                                    ?>
                                                    <?php $provider = $DB->query("SELECT * from provider order by id desc limit $goster,$limit")->fetchAll(PDO::FETCH_ASSOC); 
                                                    foreach ($provider as $providerCek) {
                                                    $providerID = $providerCek['id'];
                                                    $checkApp = $DB->query("SELECT * from appointments WHERE MONTH(appDate)='$month' and providerID='$providerID'")->fetchAll(PDO::FETCH_ASSOC); 
                                                    $monthtotal = 0; 
                                                    foreach ($checkApp as $checkAppCek) {
                                                    $monthtotal = $monthtotal+1;
                                                    }
                                                    ?>
                                                                        <?php 
                                                    $deger[] = array(
                                                    "id" => $providerCek['id'],
                                                    "total" =>  $monthtotal,
                                                    );
                                                    
                                                    ?>

                                                                        <?php 
                                                    } 
                                                    
                                                    usort($deger, function($a, $b) {
                                                        return $b['total'] <=> $a['total'];
                                                    });


                                                    foreach ($deger as $key => $value) {
                                                        $providerID = $value['id'];
                                                        $providerCek = $DB->query("SELECT * from provider WHERE id='$providerID' ")->fetch(PDO::FETCH_ASSOC); 
                                                        ?>

                                                    <tr class="odd">
                                                        <td class=" control" tabindex="0" style="display: none;"></td>
                                                        <td class="sorting_1">
                                                            <a class="fw-bold">#<?=$providerCek['id']?></a>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex justify-content-left align-items-center">
                                                                <div class="d-flex flex-column">
                                                                    <h6 class="user-name text-truncate mb-0">
                                                                        <?=$providerCek['name']?></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?=$providerCek['email']?>
                                                        </td>
                                                        <td>
                                                            <?=$providerCek['workingTime']?>
                                                        </td>


                                                        <td>
                                                            <?=$value['total']?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>


                                                </tbody>
                                            </table>
                                            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js">
                                            </script>
                                            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#search').on("input", function() {
                                                    var aranan = $(this).val();
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "../providerjson",
                                                        data: {
                                                            "aranan": aranan
                                                        },
                                                        success: function(e) {
                                                            $("#list").html(e);
                                                        }
                                                    });
                                                })
                                            });
                                            </script>


                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>




                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->