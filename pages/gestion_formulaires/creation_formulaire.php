<?php
session_start(); 
include '../../php/db_connect.php'
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
    <link rel="icon" href="../../images/icon.png">
    <!-- Bootstrap -->
    <link href="../../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Sweet Alert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="../../css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demoRender.css">
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
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Général <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Général</a></li>
                      <li><a href="index2.html">Profil</a></li>
                      <li><a href="index3.html">Statistiques</a></li>
                    </ul>
                  </li>
                  <li><a href="../gestion_projets/creation_projet.php"><i class="fa fa-edit"></i> Gestion des projets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_projets/creation_projet.php">Créer un projet</a></li>
                      <li><a href="../gestion_projets/consulter_projet.php">Consulter les projets</a></li>
                    </ul>
                  </li>
                  <li><a href="../gestion_zones/ajouter_zone.php"><i class="fa fa-map"></i> Gestion des zones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_zones/ajouter_zone.php">Ajouter une nouvelle zone</a></li>
                      <li><a href="../gestion_zones/consulter_zone.php">Consulter les zones</a></li>
                      <li><a href="../gestion_zones/zone_facultative.php">Consulter les zones</a></li>
                    </ul>
                  </li>
                  <li><a href="../gestion_agents/index.php"><i class="fa fa-users"></i> Gestion des agents</span></a></li>
                  <li><a href="creation_formulaire.php"><i class="fa fa-list-alt"></i>Gestion des formulaires </a>
                    <ul class="nav child_menu">
                      <li><a href="creation_formulaire.php">Créer un formulaire</a></li>
                      <li><a href="consulter_formulaire.php">Consulter les formulaires</a></li>
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
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-xs-7 ">
                      <h2>Créer un nouveau formulaire</h2>
                    </div>
                    <div class="col-xs-5 align-right">
                      <button type="button" class="btn btn-primary m-r-20" onclick="window.location.href = 'consulter_formulaire.php';" >Consulter les formulaires</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="content">
                      <div id="markup"></div>
                      <div id="build-wrap"></div>
                      <br>
                      <div class="row clearfix">
                        <div class=".col-md-4 .col-md-offset-4">
                          <div class="btn-group btn-group-justified" role="group" aria-label="..." >
                            <div class="btn-group" role="group">
                            <button id="clear_form" class="float-right btn btn-danger" type="button">Vider</button>
                            </div>
                            <div class="btn-group" role="group">
                            <button id="save_form" class="float-left btn btn-success" type="button" >Enregistrer</button>
                            </div>
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
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
    <!-- Custom Theme Scripts -->
    <script src="../../js/custom.js"></script>
    <!-- jQuery formBuilder -->
    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/form-builder.min.js"></script>
    <script src="assets/js/form-render.min.js"></script>
    <!-- Sweet Alert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <script>
      
      jQuery(function($) {
        
        //Form options
        var options = {
          i18n: {
            locale: 'fr-FR'
          },
          
          showActionButtons: false 
        };

        //Build form
        var fbEditor = document.getElementById('build-wrap');
        var formBuilder = $(fbEditor).formBuilder(options);

        // Clear form
        document.getElementById('clear_form').onclick = function() {
          formBuilder.actions.clearFields();
        }; 

        //Form fields to HTML
        document.getElementById('save_form').addEventListener('click', function() {

          var escapeEl = document.createElement('textarea'),
          code = document.getElementById('markup'),
          escapeHTML = function(html) {
            escapeEl.textContent = html;
            return escapeEl.innerHTML;
          },
          formData =formBuilder.actions.getData('json') ,
          addLineBreaks = function(html) {
            return html.replace(new RegExp('&gt; &lt;', 'g'), '&gt;\n&lt;').replace(new RegExp('&gt;&lt;', 'g'), '&gt;\n&lt;');
          };
          
          var $markup = $('<div/>');
          $markup.formRender({formData});
          code.innerHTML = addLineBreaks(escapeHTML($markup[0].innerHTML));

          var champs = "<form id=\"idform\">"+$("#markup").text()+"</form>" ;
          //alert("Created form:::::      "+champs);

          //Save form using ajax to db

          swal({
              title: "Donnez un nom significative à votre formulaire",
              text: "Entrez le nom du formulaire",
              type: "input",
              showCancelButton: true,
              closeOnConfirm: false,
              confirmButtonText: "Enregistrer",
              cancelButtonText: "Annuler",
              animation: "slide-from-top",
              inputPlaceholder: "...",
              showLoaderOnConfirm: true,
            }, function (inputValue) {
              if (inputValue === false) return false;
              if (inputValue === "") {
                swal.showInputError("Entrez le nom"); 
                return false;
              }
              $.ajax({
                url: '../../php/add_form.php',
                type: 'POST',
                data: { 'formText':champs , 'nom_form': inputValue },
                
                beforsend :function(){
                  
                },
                success: function(response) {
                  //alert(response);
                  if(response ==1){
                    swal("C'est fait! ", "Un nouveau formulaire a été ajouté", "success");
                    $("#form_add_zonefac").trigger("reset");
                    $("#submitButton_add").html('Sauvegarder');
                  } 
                  if(response ==0){
                    swal.showInputError("Le nom que vous avez introduisez existe déjà! Réessayer avec un autre!"); 

                  }
                  else{
                    swal("ERREUUUUUUR", "Something's not rightttt", "error");
                  }
                } 
              });
            });

        $("#markup").html("");

      });
    });

    </script>
  </body>
</html>