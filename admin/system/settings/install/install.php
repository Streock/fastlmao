<?php
require_once '../licence.php'; // Include LicenseBox external/client api helper file
$api = new LicenseBoxExternalAPI(); // Initialize a new LicenseBoxExternalAPI object
$filename = 'database.sql'; //SQL file to be imported
$db_file = '../db.php';
$db_file_sample = 'database-sample.php';
$installFile = "install.eralbilisim";
@chmod($installFile,0777);
if (is_file($installFile)) {
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8"/>
    <title>FastyGO Installation Wizard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" crossorigin="anonymous" />
    <style type="text/css">
      body, html {
        background: #F4F5F7;
      }
    </style>
  </head>
  <body>
    <?php
    $errors = false;
    $step = isset($_GET['step']) ? $_GET['step'] : '';
    ?>
    <div class="container" style="padding-top: 20px;"> 
      <div class="section">
        <div class="columns is-centered">
          <div class="column is-two-fifths">
            <center>
              <h1 class="title" style="padding-top: 20px">FastyGO Installation Wizard</h1><br>
            </center>
            <div class="box">
              <?php
              switch ($step) {
                default: ?>
                <div class="tabs is-fullwidth">
                  <ul>
                    <li class="is-active">
                      <a>
                        <span><b>Requirements</b></span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Licence</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Database</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Installation Successful</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <?php  
                  // Add or remove your script's requirements below
                if(phpversion() < "5.5"){
                  $errors = true;
                  echo "<div class='notification is-danger is-light' style='padding:12px;'><i class='fa fa-times'></i> Minimum PHP 5.5 or higher required.</div>";
                }else{
                  echo "<div class='notification is-success is-light' style='padding:12px;'><i class='fa fa-check'></i> PHP Version: ".phpversion()." Appropriate.</div>";
                }
                if(!extension_loaded('mysqli')){
                  $errors = true; 
                  echo "<div class='notification is-danger is-light' style='padding:12px;'><i class='fa fa-times'></i> MySQLi PHP eklentisi kurulu değil!</div>";
                }else{
                  echo "<div class='notification is-success is-light' style='padding:12px;'><i class='fa fa-check'></i> The MySQLi PHP plugin is installed. Appropriate.</div>";
                }
                if(!is_writeable($db_file)){
                  $errors = true; 
                  echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times p-r-xs'></i> The database file (settings/db.php) no permission to write!</div>";
                }else
                {
                 echo "<div class='notification is-success is-light' style='padding:12px;'><i class='fa fa-check'></i> The database file (settings/db.php) permission to write. Appropriate.</div>";

               }
               ?>

               <div style='text-align: right;'>
                <?php if($errors==true){ ?>
                  <a href="#" class="button is-link is-rounded" disabled>Continue</a>
                <?php }else{ ?>
                  <a href="install?step=0" class="button is-link is-rounded">Continue</a>
                <?php } ?>
                </div><?php
                break;
                case "0": ?>
                <div class="tabs is-fullwidth">
                  <ul>
                    <li>
                      <a>
                        <span><i class="fa fa-check-circle"></i> Requirements</span>
                      </a>
                    </li>
                    <li class="is-active">
                      <a>
                        <span><b>Licence</b></span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Database</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Installation Successful</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <?php
                  $res = $api->verify_license();
                  if($res['status']!=true){ ?>
                      <form action="install?step=0" method="POST">
                        <div class="notification is-danger is-light">Your license could not be verified! Please re-enter.</div>
                        <div class="field">
                          <label class="label">Licence Code</label>
                          <div class="control">
                            <input class="input" type="text" placeholder="Please enter your license code." name="license" required>
                          </div>
                        </div>
                        <div class="field">
                          <label class="label">Name</label>
                          <div class="control">
                            <input class="input" type="text" placeholder="Please enter your Name Surname." name="client" required>
                          </div>
                        </div>
                        <div style='text-align: right;'>
                          <button type="submit" class="button is-link is-rounded">Verify</button>
                        </div>
                        </form><?php
                      }else{ ?>
                        <form action="install?step=1" method="POST">
                          <div class="notification is-success is-light">License Verified! You can continue with the installation.</div>
                          <input type="hidden" name="lcscs" id="lcscs" value="<?php echo ucfirst($activate_response['status']); ?>">
                          <div style='text-align: right;'>
                            <button type="submit" class="button is-link">Next</button>
                          </div>
                          </form><?php
                        } ?>
                      
                      <?php 
                      break;
                      case "1": ?>
                      <div class="tabs is-fullwidth">
                        <ul>
                          <li>
                            <a>
                              <span><i class="fa fa-check-circle"></i> Requirements</span>
                            </a>
                          </li>
                          <li>
                            <a>
                              <span><i class="fa fa-check-circle"></i> Licence</span>
                            </a>
                          </li>
                          <li class="is-active">
                            <a>
                              <span><b>Database</b></span>
                            </a>
                          </li>
                          <li>
                            <a>
                              <span>Installation Successful</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <?php
                      if($_POST && isset($_POST["lcscs"])){
                        $valid = strip_tags(trim($_POST["lcscs"]));
                        $db_host = strip_tags(trim($_POST["host"]));
                        $db_user = strip_tags(trim($_POST["user"]));
                        $db_pass = strip_tags(trim($_POST["pass"]));
                        $db_name = strip_tags(trim($_POST["name"]));
                        $siteName = strip_tags(trim($_POST["siteName"]));
                        $siteDesc = strip_tags(trim($_POST["siteDesc"]));
                        $siteKeyword = strip_tags(trim($_POST["siteKeyword"]));


                      // Let's import the sql file into the given database
                        if(!empty($db_host)){
                          $con = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
                          if(mysqli_connect_errno()){ ?>
                            <form action="install?step=1" method="POST">
                              <div class='notification is-danger is-light'>Failed to connect to MySQL: <?php echo mysqli_connect_error(); ?></div>
                              <input type="hidden" name="lcscs" id="lcscs" value="<?php echo $valid; ?>">
                              <div class="field">
                                <label class="label">Database Host</label>
                                <div class="control">
                                  <input class="input" type="text" id="host" placeholder="enter your database host" name="host" required>
                                </div>
                              </div>
                              <div class="field">
                                <label class="label">Database Username</label>
                                <div class="control">
                                  <input class="input" type="text" id="user" placeholder="enter your database username" name="user" required>
                                </div>
                              </div>
                              <div class="field">
                                <label class="label">Database Password</label>
                                <div class="control">
                                  <input class="input" type="text" id="pass" placeholder="enter your database password" name="pass">
                                </div>
                              </div>
                              <div class="field">
                                <label class="label">Database Name</label>
                                <div class="control">
                                  <input class="input" type="text" id="name" placeholder="enter your database name" name="name" required>
                                </div>
                              </div>
                              <div class="field">
                                <label class="label">Site Name</label>
                                <div class="control">
                                  <input class="input" type="text" id="siteName" placeholder="enter your site name" name="siteName" required>
                                </div>
                              </div>
                              <div class="field">
                                <label class="label">Site Desc</label>
                                <div class="control">
                                  <input class="input" type="text" id="siteDesc" placeholder="enter your site description" name="siteDesc" required>
                                </div>
                              </div>
                              <div class="field">
                                <label class="label">Site Keyword</label>
                                <div class="control">
                                  <input class="input" type="text" id="siteKeyword" placeholder="enter your site description" name="siteKeyword" required>
                                </div>
                              </div>
                              <div style='text-align: right;'>
                                <button type="submit" class="button is-link is-rounded">Import</button>
                              </div>
                              </form><?php
                              exit;
                            }
                            $templine = '';
                            $lines = file($filename);
                            foreach($lines as $line){
                              if(substr($line, 0, 2) == '--' || $line == '')
                                continue;
                              $templine .= $line;
                              $query = false;
                              if(substr(trim($line), -1, 1) == ';'){
                                $query = mysqli_query($con, $templine);
                                $templine = '';
                              }
                            } 

                            if($db_port!=3306){
                              $trans = array("{[DB_NAME]}" => $db_name, "{[DB_USER]}" => $db_user, "{[DB_PASS]}" => $db_pass, "{[DB_HOST]}" => $db_host, "{[DB_PORT]}" => ";port=".$db_port, "{[DB_DEFAULT_PORT]}" => '$db["default"]["port"] = '.$db_port.';', "{[DB_HOST_PORT]}" => $db_host.":".$db_port);
                            }else{
                              $trans = array("{[DB_NAME]}" => $db_name, "{[DB_USER]}" => $db_user, "{[DB_PASS]}" => $db_pass, "{[DB_HOST]}" => $db_host, "{[DB_PORT]}" => null, "{[DB_DEFAULT_PORT]}" => null, "{[DB_HOST_PORT]}" => $db_host);
                            }

                            if(is_writeable($db_file)){
                              file_put_contents($db_file,strtr(file_get_contents($db_file_sample), $trans));
                            }
                            else{ ?>
                              <div class='notification is-danger'>Database file (<strong><?php echo $db_file; ?></strong>) is not writable, you should change the file permission first then retry this step or you can change the db settings yourself.</div>
                            <?php }
                            if(is_writeable($installFile))
                            {
                              unlink($installFile);
                              unlink($filename);
                            }
                            ?>

                            <form action="install?step=2" method="POST">
                              <div class='notification is-success is-light'>The database was successfully imported.</div>
                              <input type="hidden" name="dbscs" id="dbscs" value="true">
                              <div style='text-align: right;'>
                                <button type="submit" class="button is-link">Continue</button>
                              </div>
                              <?php 
                              define('DB_DRIVER', 'mysql');
                              define('DB_SERVER', $db_host);
                              define('DB_SERVER_USERNAME', $db_user);
                              define('DB_SERVER_PASSWORD',  $db_pass);
                              define('DB_DATABASE', $db_name);

                              $dboptions = array(
                                PDO::ATTR_PERSISTENT => FALSE,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                              );

                              try {
                                $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
                              } catch (Exception $ex) {
                                echo $ex->getMessage();
                                die;
                              }

                              $guncelle = $DB->prepare("UPDATE settings SET siteName=?, siteDesc=?, siteKeyword=? WHERE id=?");
                              $guncelle -> execute(array($siteName,$siteDesc,$siteKeyword,'1'));

                              ?>
                              </form><?php
                            }else{ ?>
                              <form action="install?step=1" method="POST">
                                <input type="hidden" name="lcscs" id="lcscs" value="<?php echo $valid; ?>">
                                <div class="field">
                                  <label class="label">Database Host</label>
                                  <div class="control">
                                    <input class="input" type="text" id="host" placeholder="enter your database host" name="host" required>
                                  </div>
                                </div>
                                <div class="field">
                                  <label class="label">Database User</label>
                                  <div class="control">
                                    <input class="input" type="text" id="user" placeholder="enter your database username" name="user" required>
                                  </div>
                                </div>
                                <div class="field">
                                  <label class="label">Database Password</label>
                                  <div class="control">
                                    <input class="input" type="text" id="pass" placeholder="enter your database password" name="pass">
                                  </div>
                                </div>
                                <div class="field">
                                  <label class="label">Database Name</label>
                                  <div class="control">
                                    <input class="input" type="text" id="name" placeholder="enter your database name" name="name" required>
                                  </div>
                                </div>
                                <div class="field">
                                <label class="label">Site Name</label>
                                <div class="control">
                                  <input class="input" type="text" id="siteName" placeholder="enter your site name" name="siteName" required>
                                </div>
                              </div>
                              <div class="field">
                                <label class="label">Site Desc</label>
                                <div class="control">
                                  <input class="input" type="text" id="siteDesc" placeholder="enter your site description" name="siteDesc" required>
                                </div>
                              </div>
                              <div class="field">
                                <label class="label">Site Keyword</label>
                                <div class="control">
                                  <input class="input" type="text" id="siteKeyword" placeholder="enter your site description" name="siteKeyword" required>
                                </div>
                              </div>
                                <div style='text-align: right;'>
                                  <button type="submit" class="button is-link is-rounded">Import</button>
                                </div>
                                </form><?php
                              } 
                            }else{ ?>
                              <div class='notification is-danger is-light'>Sorry, the operation failed..</div><?php
                            }
                            break;
                            case "2": ?>
                            <div class="tabs is-fullwidth">
                              <ul>
                                <li>
                                  <a>
                                    <span><i class="fa fa-check-circle"></i> Requirements</span>
                                  </a>
                                </li>
                                <li>
                                  <a>
                                    <span><i class="fa fa-check-circle"></i> Licence</span>
                                  </a>
                                </li>
                                <li>
                                  <a>
                                    <span><i class="fa fa-check-circle"></i> Database</span>
                                  </a>
                                </li>
                                <li class="is-active">
                                  <a>
                                    <span><b>Installation Successful</b></span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                            <?php
                            if($_POST && isset($_POST["dbscs"])){
                              $valid = $_POST["dbscs"];
                              ?>
                              <center>
                                <p><strong>Mira B2B has been successfully established.</strong></p><br>
                              </center>
                              <?php
                            }else{ ?>
                              <div class='notification is-danger is-light'>Sorry, the installation could not be completed.</div><?php
                            } 
                            break;
                          } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="content has-text-centered">
                  <p>Copyright <?php echo date('Y'); ?> Eral Bilisim, All rights reserved.</p><br>
                </div>
              </body>
              </html>

            <?php } else{ ?>
              <?php 
              echo '<meta http-equiv="refresh" content="0; url=../">'; 
              ?>
            <?php } ?>
