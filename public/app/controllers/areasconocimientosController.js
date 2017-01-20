

app.controller('areasconocimientosController', function($scope, $http, API_URL) {
    $scope.areasconocimientos = [];
    $scope.modalstate =  '';
    $scope.idareaconocimiento_del = 0;


    $scope.initLoad = function () {
        $http.get(API_URL + 'areasconocimientos/getAreaConocimiento').success(function (response) {
            $scope.areasconocimientos  = response;
        });
    }

    $scope.Add = function (modalstate,id) {
    	$scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':            	
            	$scope.form_title = "Nueva Área del Conocimiento";    
            	$scope.areaconocimiento = {};
            	$('#modalActionAreaConocimiento').modal('show');
            	break;
            case 'edit':
                $scope.form_title = "Editar Área del Conocimiento";
                $scope.id = id;
                $http.get(API_URL + 'areasconocimientos/'  + id).success(function(response){
                	$scope.areaconocimiento = response;     
                	$('#modalActionAreaConocimiento').modal('show');
                });

                break;
            case 'info':
            	$http.get(API_URL + 'areasconocimientos/'  + id ).success(function(response){
                	    $scope.areaconocimiento = response; 
                	   
                        $('#modalInfoAreaConocimiento').modal('show');
                    });

                break;

            default:
                break;
        }   	
    	
    };

    $scope.Save = function (){
    		
    	console.log("entro");
    	var url = API_URL + "areasconocimientos";
    	
        if ($scope.modalstate === 'edit'){
            url += "/" + $scope.id ;
        }
       
        if ($scope.modalstate === 'add'){
            //$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            $http.post(url,$scope.areaconocimiento ).success(function (data) {
                $scope.initLoad();
                $('#modalActionAreaConocimiento').modal('hide');
                $scope.message = 'Se insertó correctamente el Área de Conocimiento...';
                $('#modalMessage').modal('show');
                setTimeout("$('#modalMessage').modal('hide')",3000);

            });
        } else {
        	 console.log($scope.areaconocimiento);
            $http.put(url, $scope.areaconocimiento ).success(function (data) {
                $scope.initLoad();
                $('#modalActionAreaConocimiento').modal('hide');
                $scope.message = 'Se Modifico correctamente el Área de Conocimiento...';
                $('#modalMessage').modal('show');
                setTimeout("$('#modalMessage').modal('hide')",3000);
            });
            
        }   	
    };

    $scope.showModalConfirm = function (areaconocimiento) {
        $scope.idareaconocimiento_del = areaconocimiento.id;
        $scope.areaconocimiento_name = areaconocimiento.nombre;
        $('#modalConfirmDelete').modal('show');
    };


    $scope.delete = function(){
        $http.delete(API_URL + 'areasconocimientos/' + $scope.idareaconocimiento_del).success(function(response) {
            if(response.success == true){
                $scope.initLoad();
                $('#modalConfirmDelete').modal('hide');
                $scope.idcargo_del = 0;
                $scope.message = 'Se eliminó correctamente el Área de Conocimiento...';
                $('#modalMessage').modal('show');
                $scope.hideModalMessage();

            } else {
                $scope.message_error = 'El Área de Conocimiento no puede ser eliminada porque esta asignado a una subarea de conocimiento...';
                $('#modalMessageError').modal('show');
                $('#modalConfirmDelete').modal('hide');
            }
        });



    };

    $scope.hideModalMessage = function () {
        setTimeout("$('#modalMessage').modal('hide')", 3000);
    };

    $scope.initLoad();
});


