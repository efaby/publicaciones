(function(){

app.controller('mainController',['$scope','$route', function($scope, $http, API_URL,$route) {

	$scope.titulo = "Inicio";
	$scope.toModulo = "home";

	$scope.list_breadcrumb = [];

	$scope.toModuloInicio = function(e){
		$scope.titulo = "Inicio";
		$scope.toModulo = "home";
		var list = [];
		$scope.prepareListBreadcrumb(list);
		$scope.itemActive(e);
	};

	$scope.toModuloPublicaciones = function(e){
		$scope.titulo = "Mis Publicaciones";
		$scope.toModulo = "publicaciones";
		var list = [
			'<li>Mis Publicaciones</li>'
		];		
		$scope.prepareListBreadcrumb(list);	
		$scope.itemActive(e);
	};
	
	$scope.toModuloFacultades = function(e){
		$scope.titulo = "Facultades";
		$scope.toModulo = "facultades";
		var list = [
			'<li>Facultades</li>'
		];		
		$scope.prepareListBreadcrumb(list);	
		$scope.itemActive(e);
	};

	$scope.prepareListBreadcrumb = function (list_module) {
		$scope.list_breadcrumb = [
			"<li><i class='fa fa-dashboard'></i> &nbsp; Inicio</li>",
		];

		var breadcrumb = ($scope.list_breadcrumb).concat(list_module);

		$('#list_breadcrumb').html(breadcrumb);

	};

	$scope.itemActive = function (e){
		var elem = angular.element(e.currentTarget);
		var ul = elem.parent().parent();
		ul.children().removeClass( "active" );		
		elem.parent().addClass( "active" );	
	}
	
	$scope.prepareListBreadcrumb();
	
}]);
})();

