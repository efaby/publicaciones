    <div class="row" ng-controller="misPublicacionesController">
    <div class="col-xs-12">    
     <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            
            
            <div class="col-xs-6 col-md-4">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="search" placeholder="BUSCAR..."
                           ng-model="search" ng-change="searchByFilter()">
                    <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>
            <div class="col-xs-3 col-md-2">
                <div class="form-group has-feedback">
                    <select class="form-control" name="proveedor" id="proveedor" ng-model="proveedorFiltro"
                      ng-change="searchByFilter()">
                        <option value="">Tipo Publicacion</option>
						<option >Conferencia</option>    
						<option >Publicacion Revista</option>      
						<option >Capitulo de Libro</option>     
						<option >Libro</option>                           
                        </select>                    
                </div>
            </div>    

            <div class="col-xs-6 col-md-6">
                <button type="button" class="btn btn-primary" style="float: right;" ng-click="Add()">
                   <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </div>

            <div class="box-body">
            
            <table class="table table-responsive table-striped table-hover table-condensed table-bordered">
                <thead>
                <tr>
                	<th>C&eacute;dula</th>                
                  <th>Nombre</th>
                  <th>Titulo</th>
                  <th>Tipo</th>                  
                  <th style="width: 12%">Acci&oacute;n</th>
                </tr>
                </thead>
                <tbody>
                <tr dir-paginate="item in publicaciones | itemsPerPage:10 " >
                  <td>{{ item.cedula }}</td>
                  <td>{{ item.nombre }}</td>
                  <td>{{ item.titulo }}</td>
                  <td>{{ item.tipo }}</td>
                  <td><button type="button" class="btn btn-warning" 
                                    data-toggle="tooltip" data-placement="bottom" title="Editar" >
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-danger"
                                    data-toggle="tooltip" data-placement="bottom" title="Anular"  >
                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-info" 
                                    data-toggle="tooltip" data-placement="bottom" title="Activar"  >
                                <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            </button></td>
                </tr>
                </tbody>
            </table>   
            
            <dir-pagination-controls
                max-size="5"
                direction-links="true"
                boundary-links="true"
                style="float: right;" >
            </dir-pagination-controls>
            
                      
            </div>           
          </div>
     </div>
     </div>
    
    <div class="modal fade" tabindex="-1" role="dialog" id="modalActionCargo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{form_title}}</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="formCargo" novalidate="">
                        <div class="form-group error">
                            <label for="t_name_cargo" class="col-sm-4 control-label">Nombre del Cargo:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nombrecargo" id="nombrecargo" ng-model="nombrecargo" placeholder=""
                                       ng-required="true" ng-maxlength="16">
                                <span class="help-block error"
                                      ng-show="formCargo.nombrecargo.$invalid && formCargo.nombrecargo.$touched">El nombre del Cargo es requerido</span>
                                <span class="help-block error"
                                      ng-show="formCargo.nombrecargo.$invalid && formCargo.nombrecargo.$error.maxlength">La longitud máxima es de 16 caracteres</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-success" id="btn-save" ng-click="Save()" ng-disabled="formCargo.$invalid">
                        Guardar <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    