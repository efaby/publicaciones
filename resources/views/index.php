<!DOCTYPE html>
<html lang="es-ES" ng-app="soft-publi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Publicaciones</title>
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/ionicons.min.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/AdminLTE.min.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/_all-skins.min.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/styles.css') ?>">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition sidebar-mini skin-red-light" ng-controller="mainController">
<div class="wrapper">
  <header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>IDI</b></span>
      <span class="logo-lg"><img src="images/logo-idi.png" alt="IDI" style="height: 50px"> </span>
    </a>
    
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/usuarios/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/usuarios/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  Alexander Pierce - Investigador
                  <small>Miembro desde Nov. 2012</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Cerrar Sesi&oacute;n</a>
                </div>
              </li>
            </ul>
          </li>    
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/usuarios/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">MEN&Uacute; PRINCIPAL</li>
        <li class="active" id="inicio">
          <a href="#" ng-click="toModuloInicio($event);">
            <i class="fa fa-dashboard"></i> <span>Inicio</span>            
          </a>         
        </li>
        <li >
          <a href="#">
            <i class="fa fa-edit"></i> <span>Ingreso Publicaciones</span>            
          </a>          
        </li>
      
        <li id="publicaciones">
          <a href="#" ng-click="toModuloPublicaciones($event);">
            <i class="fa fa-book"></i>
            <span>Mis Publicaciones</span>            
          </a>         
        </li>
         <li><a href="#"><i class="fa fa-files-o"></i> <span>Publicaciones No Indexadas</span></a></li> 
         <li id="facultades">
          <a href="#" ng-click="toModuloFacultades($event);">
            <i class="fa fa-book"></i>
            <span>Facultades</span>            
          </a>         
        </li>        
      </ul>
    </section>
  </aside>
  <div class="content-wrapper" style="overflow: auto;">
    <section class="content-header">
     	<h1>        
       <span ng-bind="titulo"></span>
      </h1>
      <ol class="breadcrumb" id="list_breadcrumb"></ol>      
    </section>
    <section class="content">
		<div class="col-xs-12" style="padding: 0; overflow-y: auto; overflow-x: hidden;" ng-include="toModulo">
	</section>    
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>ESPOCH</b> 
    </div>
    <strong>Copyright &copy; 2017 <a href="http://cimogsys.espoch.edu.ec/idi/public/" target="_blank">Instituto de Investigaciones</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>

<script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
<script src="<?= asset('app/lib/angular/angular-route.min.js') ?>"></script>
<script src="<?= asset('app/lib/angular/dirPagination.js') ?>"></script>
    
<script src="<?= asset('js/jquery-2.2.3.min.js') ?>"></script>
<script src="<?= asset('js/jquery-ui.min.js') ?>"></script>
<script src="<?= asset('js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('js/app.min.js') ?>"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="<?= asset('app/app.js') ?>"></script>
<script src="<?= asset('app/controllers/mainController.js') ?>"></script>
<script src="<?= asset('app/controllers/misPublicacionesController.js') ?>"></script>
<script src="<?= asset('app/controllers/facultadesController.js') ?>"></script>


</body>
</html>