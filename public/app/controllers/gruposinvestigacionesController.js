

app.controller('gruposinvestigacionesController', function($scope, $http, API_URL) {
    $scope.gruposinvestigaciones = [];
    $scope.modalstate =  '';
    $scope.idgrupoinvestigacion_del = 0;


    $scope.initLoad = function () {
        $http.get(API_URL + 'gruposinvestigaciones/getGrupoInvestigacion').success(function (response) {
            $scope.gruposinvestigaciones  = response;
        });
    }

    $scope.Add = function (modalstate,id) {
    	$scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':            	
            	$scope.form_title = "Nuevo Grupo de Investigación";    
            	$scope.grupoinvestigacion = {};
            	$('#modalActionGrupoInvestacion').modal('show');
            	break;
            case 'edit':
                $scope.form_title = "Editar Grupo de Investigación";
                $scope.id = id;
                $http.get(API_URL + 'gruposinvestigaciones/'  + id).success(function(response){
                	$scope.grupoinvestigacion = response;     
                	$('#modalActionGrupoInvestigacion').modal('show');
                });

                break;
            case 'info':
            	$http.get(API_URL + 'gruposinvestigaciones/'  + id ).success(function(response){
                	    $scope.grupoinvestigacion = response; 
                	   
                        $('#modalInfoGrupoInvestigacion').modal('show');
                    });

                break;

            default:
                break;
        }   	
    	
    };

    $scope.Save = function (){
    		
    	console.log("entro");
    	var url = API_URL + "gruposinvestigaciones";
    	
        if ($scope.modalstate === 'edit'){
            url += "/" + $scope.id ;
        }
       
        if ($scope.modalstate === 'add'){
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            $http.post(url,$scope.grupoinvestigacion ).success(function (data) {
                $scope.initLoad();
                $('#modalActionGrupoInvestigacion').modal('hide');
                $scope.message = 'Se insertó correctamente el Grupo de Investigación...';
                $('#modalMessage').modal('show');
                setTimeout("$('#modalMessage').modal('hide')",3000);

            });
        } else {
        	 console.log($scope.grupoinvestigacion);
                $http.put(url, $scope.grupoinvestigacion ).success(function (data) {
                $scope.initLoad();
                $('#modalActionGrupoInvestigacion').modal('hide');
                $scope.message = 'Se Modifico correctamente el Grupo de Investigación...';
                $('#modalMessage').modal('show');
                setTimeout("$('#modalMessage').modal('hide')",3000);
            });
            
        }   	
    };

    $scope.showModalConfirm = function (grupoinvestigacion) {
        $scope.idgrupoinvestigacion_del  = grupoinvestigacion.id;
        $scope.grupoinvestigacion_name = grupoinvestigacion.nombre;
        $('#modalConfirmDelete').modal('show');
    };


    $scope.delete = function(){
        $http.delete(API_URL + 'gruposinvestigaciones/' + $scope.idgrupoinvestigacion_del ).success(function(response) {
            if(response.success == true){
                $scope.initLoad();
                $('#modalConfirmDelete').modal('hide');
                $scope.idcargo_del = 0;
                $scope.message = 'Se eliminó correctamente el Grupo de Investigación...';
                $('#modalMessage').modal('show');
                $scope.hideModalMessage();

            } else {
                $scope.message_error = 'El Grupo de Investigación no puede ser eliminada porque esta asignado a una Persona...';
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


