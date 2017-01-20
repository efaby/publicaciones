

app.controller('facultadesController', function($scope, $http, API_URL) {
    $scope.facultades = [];
    $scope.modalstate =  '';
    $scope.idfacultad_del = 0;


    $scope.initLoad = function () {
        $http.get(API_URL + 'facultades/getFacultades').success(function (response) {
            $scope.facultades = response;
        });
    }

    $scope.Add = function (modalstate,id) {
    	$scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':            	
            	$scope.form_title = "Nueva Facultad";    
            	$scope.facultad = {};
            	$('#modalActionFacultad').modal('show');
            	break;
            case 'edit':
                $scope.form_title = "Editar Facultad";
                $scope.id = id;
                $http.get(API_URL + 'facultades/'  + id).success(function(response){
                	$scope.facultad = response;     
                	$('#modalActionFacultad').modal('show');
                });

                break;
            case 'info':
            	$http.get(API_URL + 'facultades/'  + id ).success(function(response){
                	    $scope.facultad = response; 
                	   
                        $('#modalInfoFacultad').modal('show');
                    });

                break;

            default:
                break;
        }   	
    	
    };

    $scope.Save = function (){
    		
    	console.log("entro");
    	var url = API_URL + "facultades";
    	
        if ($scope.modalstate === 'edit'){
            url += "/" + $scope.id ;
        }
       
        if ($scope.modalstate === 'add'){
        	
                $http.post(url,$scope.facultad ).success(function (data) {
                $scope.initLoad();
                $('#modalActionFacultad').modal('hide');
                $scope.message = 'Se insertó correctamente la Facultad...';
                $('#modalMessage').modal('show');
                setTimeout("$('#modalMessage').modal('hide')",3000);

            });
        } else {
        	 console.log($scope.facultad);
                $http.put(url, $scope.facultad ).success(function (data) {
                $scope.initLoad();
                $('#modalActionFacultad').modal('hide');
                $scope.message = 'Se Modifico correctamente la Facultad...';
                $('#modalMessage').modal('show');
                setTimeout("$('#modalMessage').modal('hide')",3000);
            });
            
        }   	
    };

    $scope.showModalConfirm = function (facultad) {
        $scope.idfacultad_del = facultad.id;
        $scope.facultad_name = facultad.nombre;
        $('#modalConfirmDelete').modal('show');
    };


    $scope.delete = function(){
        $http.delete(API_URL + 'facultades/' + $scope.idfacultad_del).success(function(response) {
            if(response.success == true){
                $scope.initLoad();
                $('#modalConfirmDelete').modal('hide');
                $scope.idcargo_del = 0;
                $scope.message = 'Se eliminó correctamente la Facultad seleccionada...';
                $('#modalMessage').modal('show');
                $scope.hideModalMessage();

            } else {
                $scope.message_error = 'La Facultad no puede ser eliminada porque esta asignado a una escuela...';
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

