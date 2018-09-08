<?php
session_start(); 
include '../php/db_connect.php';
if(!isset($_SESSION["username"]))
{
 header("location:login/sign-in.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>NAVCollect | Acceuil </title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Icon -->
    <link rel="icon" href="../images/icon.png">
    <!-- Bootstrap -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- NProgress -->
    <link href="../plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Sweet Alert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md ">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <center><a href="index.php" class="site_title"><i></i> <img src="../images/logo.png"> <span></span></a></center>
            </div>
            <div class="clearfix"></div>
            <br>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bonjour</span>
                <h2><?php echo $_SESSION['prenom'] ."&nbsp;".$_SESSION['nom'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Général <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Acceuil</a></li>
                      <li><a href="profile.php">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Gestion des projets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="gestion_projets/creation_projet.php">Créer un projet</a></li>
                      <li><a href="gestion_projets/consulter_projets.php">Consulter les projets</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map"></i> Gestion des zones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="gestion_zones/ajouter_zone.php">Ajouter une nouvelle zone</a></li>
                      <li><a href="gestion_zones/consulter_zone.php">Consulter les zones</a></li>
                      <li><a href="gestion_zones/zone_facultative.php">Zones facultatives</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i>Gestion des formulaires<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="gestion_formulaires/creation_formulaire.php">Créer un formulaire</a></li>
                      <li><a href="gestion_formulaires/consulter_formulaire.php">Consulter les formulaires</a></li>
                    </ul>
                  </li>
                  <li><a href="gestion_agents/index.php"><i class="fa fa-users"></i> Gestion des agents</span></a></li>
                  <li><a href="gestion_donnees/donnees_collectees.php"><i class="fa fa-database"></i>Les données collectées</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/img.jpg" alt=""><?php echo $_SESSION['prenom'] ."&nbsp;".$_SESSION['nom'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Profile</a></li>
                    <li><a href="../php/logout.php"><i class="fas fa-sign-out-alt pull-right"></i> Se déconnecter</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><strong> Profile</strong></h3>
              </div>
            </div>
          </div>
          <br> <br> <br>
          <!-- Widgets -->
          <div class="clearfix"></div>
          <div class="row">
            <!-- Column -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4> <i class="fas fa-user-tie"></i> &nbsp; Vos informations personnelles</h4>
                        <div class="clearfix"></div>
                    </div>
                    <?php 
                        $query = "SELECT  * FROM administrateur where id_admin='$_SESSION[id_admin]' ";
                        $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
                        $row=pg_fetch_row($result);
                    ?>
                    <div class="x_content">
                        <center class="m-t-30"> <img src="../images/img.jpg" class="img-circle" width="150" />
                            <br>
                            <h4 class="card-title m-t-10" id="fullname"><?php echo $_SESSION['prenom'] ."&nbsp;".$_SESSION['nom'] ?></h4>
                            <h6 class="card-subtitle"id="username">Nom d'utilisateur : <?php echo $row[3] ?></h6>
                            <h6 class="card-subtitle" id="email">Email : <?php echo $row[5] ?></h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4"><strong>Date de création de votre compte : </strong><?php echo $row[6] ?> </div>
                                <div class="col-4" id="modif_date"><strong>Date de dernière modification  de votre compte :</strong> <?php echo $row[7] ?>  </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4><i class="fas fa-cog"></i> &nbsp; Mettre à jour vos informations personnelles</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="form_update_admin" method="POST" action"../php/update_admin.php">

                            <div class="form-group form-float">
                                <label class="form-label">Nom</label>
                                <div class="form-line">
                                    <input type="text" class="form-control nom_update" name="nom_update" id="nom_update" required autofocus>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <label class="form-label">Prenom</label>
                                <div class="form-line">
                                    <input type="text" class="form-control prenom_update" id="prenom_update" name="prenom_update"  required autofocus >
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <label class="form-label">Pseudo</label>
                                <div class="form-line">
                                    <input type="text" class="form-control pseudo_update" id="pseudo_update" name="pseudo_update" required autofocus>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <label class="form-label">Mot de passe</label>
                                <div class="form-line">
                                    <input type="text" class="form-control password_update" id="password_update" name="password_update" required autofocus>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <label class="form-label">Mot de passe (Confirmation)</label>
                                <div class="form-line">
                                    <input type="text" class="form-control password1_update" id="password1_update" name="password1_update" required autofocus>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <label class="form-label">Email</label>
                                <div class="form-line">
                                    <input type="text" class="form-control email_update" id="email_update" name="email_update" required>
                                </div>
                            </div>

                            <button type="submit" class="btn bg-green waves-effect pull-right" id="submitButton_update" >Sauvegarder</button>
     
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
      </div>
    </div>
    <div class="clearfix"></div>

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        NAVCollect, NAVCities-Témara, Rabat. <br>
        &copy; 2018
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

    <!-- jQuery -->
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../plugins/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Jquery Validation Plugin Css -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Sweet Alert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>
    <script src="../js/profile/update_admin.js"></script>
  </body>
  <?php 
    pg_free_result($result);
    pg_close($dbconn);
   ?>
</html>