
app.controller('misPublicacionesController', function($scope, $http, API_URL) {
    $scope.publicaciones = [
    	{'cedula':'0602545097','nombre':'HANNIBAL LORENZO BRITO MOINA','titulo':'GENERADOR DE BIOGAS A PARTIR DE ESTIERCOL DE GANADO A NIVEL DE FINCA EN EL ORIENTE ECUATORIANO','tipo':'Revista' },
    	{'cedula':'0601741754','nombre':'MAGDY MILENI ECHEVERRIA GUADALUPE','titulo':'GENERADOR DE BIOGAS A PARTIR DE ESTIERCOL DE GANADO A NIVEL DE FINCA EN EL ORIENTE ECUATORIANO','tipo':'Libro' },
    	{'cedula':'0602061913','nombre':'CELSO GUILLERMO RECALDE MORENO','titulo':'EMPRENDIMIENTOS Y LAS MICRO PEQUE?AS Y MEDIANAS EMPRESAS CON VALOR AGREGADO TECNOL?GICO Y S','tipo':'Revista' },
    	{'cedula':'0601409469','nombre':'FAUSTO MANOLO YAULEMA GARCES','titulo':'GENERADOR DE BIOGAS A PARTIR DE ESTIERCOL DE GANADO A NIVEL DE FINCA EN EL ORIENTE ECUATORIANO','tipo':'Capitulo Libro' },
    	{'cedula':'1802286599','nombre':'LUIS GERARDO FLORES MANCHENO','titulo':'DETERMINACION DEL VALOR ANTIBIOTICO DE LOS PROPOLEOS APICOLAS EN EL CONTROL DE METRITIS BOVINA','tipo':'Revista' },
    	{'cedula':'1802286599','nombre':'LUIS GERARDO FLORES MANCHENO','titulo':'DEGRADABILIDAD IN SITU DE GRASAS DE SOBREPASO ELABORADAS CON RESIDUOS DE ACEITE DE PALMA Y SEBO OVINO','tipo':'Revista' },
    	{'cedula':'1802286599','nombre':'LUIS GERARDO FLORES MANCHENO','titulo':'EFECTO DE UN PREPARADO MICROBIANO Y UN ANTIBIOTICO PROMOTOR DE CRECIMIENTO EN LA RESPUESTA PRODUCTIVA Y SANITARIA DE CERDOS EN CRECIMIENTO-CEBA','tipo':'Congreso' },
    	{'cedula':'1801689033','nombre':'FREDY BLADIMIR PROA?O ORTIZ','titulo':'DETERMINACION DEL VALOR ANTIBIOTICO DE LOS PROPOLEOS APICOLAS EN EL CONTROL DE METRITIS BOVINA','tipo':'Revista' },
    	{'cedula':'1801689033','nombre':'FREDY BLADIMIR PROA?O ORTIZ','titulo':'EFECTO DE UN PREPARADO MICROBIANO Y UN ANTIBIOTICO PROMOTOR DE CRECIMIENTO EN LA RESPUESTA PRODUCTIVA Y SANITARIA DE CERDOS EN CRECIMIENTO-CEBA','tipo':'Conferencia' },
    	{'cedula':'0602206476','nombre':'JOS? ENRIQUE GUERRA SALAZAR','titulo':'MOBILE OBJECTS OF LEARNING AND ITS IMPACT ON THE ACADEMIC PERFORMANCE','tipo':'Revista' },
    	{'cedula':'1802286599','nombre':'LUIS GERARDO FLORES MANCHENO','titulo':'DETERMINACION DEL VALOR ANTIBIOTICO DE LOS PROPOLEOS APICOLAS EN EL CONTROL DE METRITIS BOVINA','tipo':'Revista' },
    	{'cedula':'0601741754','nombre':'MAGDY MILENI ECHEVERRIA GUADALUPE','titulo':'GENERADOR DE BIOGAS A PARTIR DE ESTIERCOL DE GANADO A NIVEL DE FINCA EN EL ORIENTE ECUATORIANO','tipo':'Libro' },
    	{'cedula':'1801689033','nombre':'FREDY BLADIMIR PROA?O ORTIZ','titulo':'EFECTO DE UN PREPARADO MICROBIANO Y UN ANTIBIOTICO PROMOTOR DE CRECIMIENTO EN LA RESPUESTA PRODUCTIVA Y SANITARIA DE CERDOS EN CRECIMIENTO-CEBA','tipo':'Conferencia' },
    	
    ];
    
    $scope.Add = function () {
        $('#modalActionCargo').modal('show');
    };
   
});

