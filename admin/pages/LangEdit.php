<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
?>
<?php
$language = $_GET['id'];
?>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?=$language?> Dil Düzenleme</h4>
                            </div>
                            <div class="card-body">
                            <form action="" method="post">
                            <table style="width: 100%;">
                            <tr>
                            <th>Key</th>
                            <th>Value</th>
                            </tr>
                            <?php
                            try {

                            $stmt = $DB->prepare("SELECT key_name, value FROM translations WHERE language = :language");
                            $stmt->bindParam(':language', $language);
                            $stmt->execute();

                            $translations = $stmt->fetchAll();

                            foreach ($translations as $translation) {
                            echo '<tr>';
                            echo '<td>' . $translation['key_name'] . '</td>';
                            echo '<td><input type="text" class="form-control" name="translations[' . $translation['key_name'] . ']" value="' . $translation['value'] . '"></td>';
                            echo '</tr>';
                            }
                            } catch(PDOException $e) {
                            echo 'Error: ' . $e->getMessage();
                            }
                            ?>
                            </table>
                            <input type="hidden" name="language" value="<?=$language?>">
                            <input type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light" name="langUpdate" value="Güncelle">
                            <a href="../langs"><button type="button" class="btn btn-outline-secondary waves-effect">Dillere Dön</button></a>
                            </form>
                       
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/jquery-3.5.1.min.js">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$("#bankEdit").click(function() {
    Swal.fire({
        title: "Hata",
        text: "DEMODA İŞLEM YAPILAMAZ",
        icon: 'error',
        confirmButtonColor: '#7367f0',
        confirmButtonText: "Tamam"

        });

});
</script>



<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Footer.php';
?>