<div ng-controller="facultadesController">
     <div class="col-xs-12" style="margin-top: 2%;">
 
         <div class="col-sm-6 col-xs-8">
             <div class="form-group has-feedback">
                 <input type="text" class="form-control" id="busqueda" placeholder="BUSCAR..." ng-model="busqueda">
                 <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
             </div>
         </div>
 
         <div class="col-sm-6 col-xs-4">
             <button type="button" class="btn btn-primary" style="float: right;" ng-click="Add('add',0)"
             data-toggle="tooltip" data-placement="bottom" title="Nuevo">
                 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
             </button>
         </div>
 
         <div class="col-xs-12">
             <table class="table table-responsive table-striped table-hover table-condensed">
                 <thead class="bg-primary">
                 <tr>
                     <th style="text-align: center;">ID</th>
                     <th>Nombre</th>
                     <th>Descripción</th>
                     <th style="width: 200px;">Acciones</th>
                 </tr>
                 </thead>
                 <tbody>
                 <tr dir-paginate="item in facultades |itemsPerPage:10 | filter : busqueda" ng-cloak>
                     <td style="text-align: center;">{{item.id}}</td>
                     <td>{{item.nombre}}</td>
                     <td>{{item.descripcion}}</td>
                     <td class="text-center">
                     	<button type="button" class="btn btn-info" ng-click="Add('info',item.id)"
                                     data-toggle="tooltip" data-placement="bottom" title="Información">
                                 <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            </button>
                        <button type="button" class="btn btn-warning" ng-click="Add('edit', item.id)"
                         data-toggle="tooltip" data-placement="bottom" title="Editar">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true" ></span>
                         </button>
                         <button type="button" class="btn btn-danger" ng-click="showModalConfirm(item)"
                         	data-toggle="tooltip" data-placement="bottom" title="Eliminar">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                     </td>
                 </tr>
                 </tbody>
             </table>
 
             <dir-pagination-controls
                 max-size="5"
                 direction-links="true"
                 boundary-links="true" >
             </dir-pagination-controls>
 
 
         </div>
     </div>
 
     <div class="modal fade" tabindex="-1" role="dialog" id="modalActionFacultad">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header modal-header-primary">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">{{form_title}}</h4>
                 </div>
                 <div class="modal-body">
                     <form class="form-horizontal" name="formFacultad" novalidate="">
                        <div class="form-group error">
                             <label for="t_name_facultad" class="col-sm-4 control-label">Nombre de Facultad:</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" name="nombre" ng-pattern="RE" id="nombre" ng-model="facultad.nombre" placeholder="Nombre Facultad"
                                        ng-required="true" ng-maxlength="64">
                                 <span class="help-block error"
                                      ng-show="formFacultad.nombre.$invalid && formFacultad.nombre.$touched" style="color:red">El nombre de la Facultad es requerido </span>
                                 <span class="help-block error"
                                       ng-show="formFacultad.nombre.$invalid && formFacultad.nombre.$error.maxlength" style="color:red">La longitud máxima es de 64 caracteres</span>
                                 <span ng-show="formFacultad.nombre.$error.pattern" style="color:red">Ingrese solo Letras.</span>
                                 
                             </div>
                         </div>
                         <div class="form-group error">
                             <label for="t_descripcion_facultad" class="col-sm-4 control-label">Descripción de Facultad:</label>
                             <div class="col-sm-8">
                             	<textarea name="descripcion" class="form-control" id="descripcion" ng-pattern ="RD" ng-model="facultad.descripcion" placeholder="Descripcion Facultad" ng-required="true"></textarea>
                                 <span class="help-block error"
                                       ng-show="formFacultad.descripcion.$invalid && formFacultad.descripcion.$touched" style="color:red">La descripción de la Facultad es requerida</span>
                                       <span ng-show="formFacultad.descripcion.$error.pattern" style="color:red">No Ingrese Caracteres Especiales.</span>
                             </div>
                         </div>
                     </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">
                         Cancelar <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                     </button>
                     <button type="button" class="btn btn-success" id="btn-save" ng-click="Save()" ng-disabled="formFacultad.$invalid">
                         Guardar <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                     </button>
                 </div>
             </div>
         </div>
     </div>
 
     <div class="modal fade" tabindex="-1" role="dialog" id="modalMessage">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header modal-header-success">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Confirmación</h4>
                 </div>
                 <div class="modal-body">
                     <span>{{message}}</span>
                 </div>
             </div>
         </div>
     </div>
 
     <div class="modal fade" tabindex="-1" role="dialog" id="modalConfirmDelete">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header modal-header-danger">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Confirmación</h4>
                 </div>
                 <div class="modal-body">
                     <span>Realmente desea eliminar la Facultad: <strong>"{{facultad_name}}"</strong>?</span>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">
                         Cancelar <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                     </button>
                     <button type="button" class="btn btn-danger" id="btn-save" ng-click="delete()">
                         Eliminar <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                     </button>
                 </div>
             </div>
         </div>
     </div>
 
     <div class="modal fade" tabindex="-1" role="dialog" id="modalMessageError" style="z-index: 99999;">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header modal-header-success">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Información</h4>
                 </div>
                 <div class="modal-body">
                     <span>{{message_error}}</span>
                 </div>
             </div>
         </div>
     </div>
 
 <div class="modal fade" tabindex="-1" role="dialog" id="modalInfoFacultad">
             <div class="modal-dialog modal-sm" role="document">
                 <div class="modal-content">
                     <div class="modal-header modal-header-primary">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Información de la Facultad </h4>
                     </div>
                     <div class="modal-body">
                        
                         <div class="row text-center">
                            <div class="col-xs-12">
                                 <span style="font-weight: bold">Nombre: </span>{{facultad.nombre}}
                             </div>
                             
                             <div class="col-xs-12">
                                 <span style="font-weight: bold">Descripción: </span>{{facultad.descripcion}}
                             </div>
                             
                            
                         </div>
                     </div>
                 </div>
             </div>
         </div>
 
 </div>