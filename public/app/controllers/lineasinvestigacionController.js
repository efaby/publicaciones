

app.controller('lineasinvestigacionController', function($scope, $http, API_URL) {
    $scope.lineasinvestigaciones= [];
    $scope.modalstate =  '';
    $scope.idlineasinvestigacion_del = 0;


    $scope.initLoad = function () {
        $http.get(API_URL + 'lineasinvestigaciones/getLineasInvestigacion').success(function (response) {
            $scope.lineasinvestigaciones = response;
        });
    }

    $scope.Add = function (modalstate,id) {
    	$scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':            	
            	$scope.form_title = "Nueva Línea de Investigación";    
            	$scope.lineasinvestigacion = {};
            	$('#modalActionLineasInvestigacion').modal('show');
                $scope. RE= /^[a-zA-Z, ; . _ ñ Ñ \-\á\é\í\ó\ú\Á\É\Í\Ó\Ú\   ]{1,64}$/;
                $scope. RD= /^[a-zA-Z, ; . _ ñ Ñ \-\á\é\í\ó\ú\Á\É\Í\Ó\Ú\@\!\¡\?\¿\$\#\* 0-9  ]{1,164}$/;
            	break;
            case 'edit':
                $scope.form_title = "Editar Línea de Investigación";
                $scope.id = id;
                $http.get(API_URL + 'lineasinvestigaciones/'  + id).success(function(response){
                	$scope.lineasinvestigacion = response;     
                	$('#modalActionLineasInvestigacion').modal('show');
                        $scope. RE= /^[a-zA-Z, ; . _ ñ Ñ \-\á\é\í\ó\ú\Á\É\Í\Ó\Ú\  ]{1,64}$/;
                        $scope. RD= /^[a-zA-Z, ; . _ ñ Ñ \-\á\é\í\ó\ú\Á\É\Í\Ó\Ú\@\!\¡\?\¿\$\#\* 0-9  ]{1,164}$/;
                });

                break;
            case 'info':
            	$http.get(API_URL + 'lineasinvestigaciones/'  + id ).success(function(response){
                	    $scope.lineasinvestigacion = response; 
                	   
                        $('#modalInfoLineasInvestigacion').modal('show');
                    });

                break;

            default:
                break;
        }   	
    	
    };

    $scope.Save = function (){
    		
    	console.log($scope.lineasinvestigacion);
    	var url = API_URL + "lineasinvestigaciones";
    	
        if ($scope.modalstate === 'edit'){
            url += "/" + $scope.id ;
        }
       
        if ($scope.modalstate === 'add'){
           // $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            $http.post(url,$scope.lineasinvestigacion ).success(function (data) {
                $scope.initLoad();
                $('#modalActionLineasInvestigacion').modal('hide');
                $scope.message = 'Se insertó correctamente la Línea de Investigación...';
                $('#modalMessage').modal('show');
                setTimeout("$('#modalMessage').modal('hide')",3000);

            });
        } else {
        	 console.log($scope.lineasinvestigacion);
            $http.put(url, $scope.lineasinvestigacion ).success(function (data) {
                $scope.initLoad();
                $('#modalActionLineasInvestigacion').modal('hide');
                $scope.message = 'Se Modifico correctamente la Línea de Investigación...';
                $('#modalMessage').modal('show');
                setTimeout("$('#modalMessage').modal('hide')",3000);
            });
            
        }   	
    };

    $scope.showModalConfirm = function (lineasinvestigacion) {
        $scope.idlineasinvestigacion_del = lineasinvestigacion.id;
        $scope.lineasinvestigacion_name = lineasinvestigacion.nombre;
        $('#modalConfirmDelete').modal('show');
    };


    $scope.delete = function(){
        $http.delete(API_URL + 'lineasinvestigaciones/' + $scope.idlineasinvestigacion_del).success(function(response) {
            if(response.success == true){
                $scope.initLoad();
                $('#modalConfirmDelete').modal('hide');
                $scope.idcargo_del = 0;
                $scope.message = 'Se eliminó correctamente la Línea de Investigación...';
                $('#modalMessage').modal('show');
                $scope.hideModalMessage();

            } else {
                $scope.message_error = 'La Línea de Investigación no puede ser eliminada porque esta asignado a una sublínea de investigación...';
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


