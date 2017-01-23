
<div ng-controller="areasconocimientosController">
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
                <tr dir-paginate="item in areasconocimientos |itemsPerPage:10 | filter : busqueda" ng-cloak>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalActionAreaConocimiento">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{form_title}}</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="formAreaConocimiento" novalidate="">
                        <div class="form-group error">
                            <label for="t_name_areaconocimiento" class="col-sm-4 control-label">Nombre del Área de Conocimiento:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nombre" id="nombre" ng-pattern="RE" ng-model="areaconocimiento.nombre" placeholder="Nombre Área del Conocimiento"
                                       ng-required="true" ng-maxlength="64">
                                <span class="help-block error"
                                      ng-show="formAreaConocimiento.nombre.$invalid && formAreaConocimiento.nombre.$touched" style="color:red">El nombre del Área de Conocimiento es requerido</span>
                                <span class="help-block error"
                                      ng-show="formAreaConocimiento.nombre.$invalid && formAreaConocimiento.nombre.$error.maxlength" style="color:red">La longitud máxima es de 64 caracteres</span>
                                <span ng-show="formAreaConocimiento.nombre.$error.pattern" style="color:red">Ingrese solo Letras.</span>
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="t_descripcion_areaconocimiento" class="col-sm-4 control-label">Descripción del Área de Conocimiento:</label>
                            <div class="col-sm-8">
                            	<textarea name="descripcion" class="form-control" id="descripcion" ng-pattern ="RD" ng-model="areaconocimiento.descripcion" placeholder="Descripcion del Área de Conocimiento" ng-required="true"></textarea>
                                <span class="help-block error"
                                      ng-show="formAreaConocimiento.descripcion.$invalid && formAreaConocimiento.descripcion.$touched" style="color:red">La descripción del Área de Conocimiento es requerida</span>
                                <span ng-show="formAreaConocimiento.descripcion.$error.pattern" style="color:red">No Ingrese Caracteres Especiales.</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-success" id="btn-save" ng-click="Save()" ng-disabled="formAreaConocimiento.$invalid">
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
                    <span>Realmente desea eliminar el Área de Conocimiento: <strong>"{{areaconocimiento_name}}"</strong>?</span>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modalInfoAreaConocimiento">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Información del Área de Conocimiento </h4>
                    </div>
                    <div class="modal-body">
                       
                        <div class="row text-center">
                            <div class="col-xs-12">
                                <span style="font-weight: bold">Nombre: </span>{{areaconocimiento.nombre}}
                            </div>
                            
                            <div class="col-xs-12">
                                <span style="font-weight: bold">Descripción: </span>{{areaconocimiento.descripcion}}
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

