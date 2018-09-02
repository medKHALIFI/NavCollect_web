<?php
session_start(); 
include '../../php/db_connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>NAVCollect | Consultation les projets</title>

    <!-- Openlayers -->
    <link rel="stylesheet" href="../../plugins/ol-3.15.1/ol.css" />
    <script type="text/javascript" src="../../plugins/ol-3.15.1/ol.js"></script>
    <!-- ol-ext -->
    <link rel="stylesheet" href="../../plugins/ol-ext/ol-ext.css" />
    <script type="text/javascript" src="../../plugins/ol-ext/ol-ext.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Icon -->
    <link rel="icon" href="../../images/icon.png">
    <!-- Bootstrap -->
    <link href="../../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- NProgress -->
    <link href="../../plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Bootgrid css -->
    <link rel="stylesheet" type="text/css" href="../../plugins/bootgrid/jquery.bootgrid.css">
    <!-- Sweet Alert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="../../css/custom.css" rel="stylesheet">
    <link href="../../css/map.css" rel="stylesheet">

  </head>

  <body class="nav-md ">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title">&nbsp; <img src="../../images/icon1.png"> <span>NAVCollect</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../images/img.jpg" alt="..." class="img-circle profile_img">
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
                      <li><a href="../index.php">Acceuil</a></li>
                      <li><a href="../profile.php">Profil</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Gestion des projets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_projets/creation_projet.php">Créer un projet</a></li>
                      <li><a href="../gestion_projets/consulter_projets.php">Consulter les projets</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map"></i> Gestion des zones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ajouter_zone.php">Ajouter une nouvelle zone</a></li>
                      <li><a href="consulter_zone.php">Consulter les zones</a></li>
                      <li><a href="zone_facultative.php">Zones facultatives</a></li>
                    </ul>
                  </li>
                  <li><a href="../gestion_agents/index.php"><i class="fa fa-users"></i> Gestion des agents</span></a></li>
                  <li><a><i class="fa fa-list-alt"></i> Gestion des formulaires <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_formulaire/creation_formulaire.php">Créer un nouveau formulaire</a></li>
                      <li><a href="../gestion_formulaire/consulter_formulaire.php">Consulter les formulaires</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Se déconnecter" href="../../php/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
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
                    <img src="../../images/img.jpg" alt=""><?php echo $_SESSION['prenom'] ."&nbsp;".$_SESSION['nom'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="../../php/logout.php"><i class="fa fa-sign-out pull-right"></i> Se déconnecter</a></li>
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
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-xs-7 ">
                      <h2>Consulter vos projets</h2>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped jambo_table table-hover dataTable js-exportable" id="table_zone_fac" >
                          <thead>
                            <tr>
                              <th style="width: 30%;">Nom de projet</th>
                              <th style="width: 40%;">Description de projet</th>
                              <th style="width: 15%;">Affectation</th>
                              <th style="width: 15%;">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            // Exécution de la requête SQL
                            $query = 'select projet.id_projet,administrateur.nom_admin,projet.titre,projet.description_projet from projet,administrateur where projet.id_admin = administrateur.id_admin';
                            $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
                            while ($row=pg_fetch_row($result)) { 
                                ?>
                            <tr>
                              <td id="titre_projet"><?php  echo $row[2] ?></td>
                              <td id="description_projet"><?php  echo $row[3] ?></td>
                              <td>
                                <center>
                                  <button name="preview" class="btn bg-blue-sky affectation" data-toggle="modal" id="<?php echo $affectation =$row[0]; ?>">
                                    <i class="far fa-eye"></i> Visualiser
                                  </button>
                                </center>
                              <td>
                                <center>
                                  <button name="delete" class="btn bg-red delete_projet" id="<?php echo $delete_projet = $row[0]; ?>">
                                      <i class="fas fa-trash"></i> Supprimer
                                  </button>
                                </center>
                              </td>
                            </tr>
                            <?php } 
                            //pg_free_result($result);
                            //pg_close($dbconn);
                            ?>
                          </tbody>
                      </table>
                    </div>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- Modals : Prévisualiser la zone  -->
        <div class="modal fade" id="affectationModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Affectation</h4>
                </div>
                <br>
                <div class="modal-body" id="bodyPreview">
                
                    
                </div>
                <br> <br> <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
                </div>
            </div>
          </div>
        </div>

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            NAVCollect, NAVCities-Témara, Rabat.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../plugins/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <!-- Bootgrid js -->
    <script src="../../plugins/bootgrid/jquery.bootgrid.min.js"></script>
    <!-- Sweet Alert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Jquery Validation Plugin Css -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../js/custom.js"></script>
    <script src="../../js/gestion_agents/jquery-datatable.js"></script>
    <script src="../../js/gestion_projets/delete_projet.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>
    <!-- Preview-->
    <script type="text/javascript">
      var id_zone;
      var id_projet;
      
      $(document).ready(function(){
        $(".affectation").click(function(){
          $("#affectationModal").modal();
          $("#bodyPreview").html('<table class="table table-bordered jambo_table table-striped table-hover dataTable js-exportable" id="table_affectation" ><thead><tr><th style="width: 30%;">Agent</th><th style="width: 20%;">Formulaire</th><th style="width: 10%;">Géométrie</th><th style="width: 30%;">Zone détude</th><th style="width: 10%;">Action</th></tr> </thead><tbody></tbody></table>');
          //$("#bodyPreview").html('<table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table_affectation" ><thead><tr><th style="width: 10%;">Agent</th><th style="width: 10%;">Formulaire</th><th style="width: 30%;">Type de géométrie</th><th style="width: 20%;">Zone d'étude</th><th style="width: 30%;">Visualiser les données</th></tr> </thead><tbody></tbody></table>');
          id_projet = $(this).attr("id");
          //alert(id_projet);
        });
        
        $("#affectationModal").on('shown.bs.modal', function () {
         // alert(id_projet);
          recuperer_projet(id_projet);
        });

      });
      function delete_affect(id_affect){
        //alert(id_affect);
        var el = this;
        swal({
          title: "Etes-vous sûr que vous voulez supprimer cette affectation?",
          text: "Vous ne pourrez pas le récupérer !",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Oui, supprimer",
          cancelButtonText: "Non, annuler",
          closeOnConfirm: false,
          closeOnCancel: false
        }, 
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: '../../php/delete_affectation.php',
              type: 'POST',
              data: { id_affect: id_affect },
              success: function(response) {
                //alert(response);
                swal("C'est fait!", "Cette affectation a été supprimée", "success");
                $(this).closest('tr').css('background', 'tomato');
                $(this).closest('tr').fadeOut(800, function() {
                  $(this).remove();
                });
              }
            });
           } 
            else {
                swal("Annulé!", "Vous n'avez pas continué cette opération", "error");
            }
        })
      }
      function recuperer_projet(id_projet){
        //alert("appel de lafonction recuperer_projet id du projet "+id_projet);
        var url = "../../php/recupere_affectation_projet.php";
        $.getJSON(url, function(result) {
            //alert("resultat de php"+result);
           
            $.each(result, function(i, field) {

                var id_projet_affect = field.id_projet_affect;
                var nom_agent=field.nom_agent;
                var nom_form=field.nom_form;
                var id_geom_affect=field.id_geom_affect;
                var nom_zone=field.nom_zone;
                var id_affect=field.id_affect;
                var prenom_agent=field.prenom_agent;

                //console.log("id projet affect"+id_projet_affect);
                if (id_projet_affect == id_projet ) {
                  //alert("agent"+nom_agent+" form"+nom_form+"geom"+id_geom_affect+"zone"+nom_zone);
                  if(id_geom_affect == 1){
                    $("#table_affectation").append("<tr><td>"+prenom_agent+" "+nom_agent+"</td><td>"+nom_form+"</td><td>Point</td><td>"+nom_zone+"</td><td><center><button class='btn bg-red delete_projet' onclick=delete_affect("+id_affect+")><i class='fas fa-trash'></i></center></button></td></tr>");

                  }else if(id_geom_affect == 2){
                    $("#table_affectation").append("<tr><td>"+prenom_agent+" "+nom_agent+"</td><td>"+nom_form+"</td><td>Ligne</td><td>"+nom_zone+"</td><td><center><button class='btn bg-red delete_projet' onclick=delete_affect("+id_affect+")><i class='fas fa-trash'></i></center></button></td></tr>");

                  }else{
                    $("#table_affectation").append("<tr><td>"+prenom_agent+" "+nom_agent+"</td><td>"+nom_form+"</td><td>Polygone</td><td>"+nom_zone+"</td><td><center><button class='btn bg-red delete_projet' onclick=delete_affect("+id_affect+")><i class='fas fa-trash'></i></center></button></td></tr>");
                  }
                }
            });
          });
        }
    </script>


  </body>
  <?php pg_close($dbconn);
 ?>
</html>