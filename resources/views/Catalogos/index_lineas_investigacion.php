
<div ng-controller="lineasinvestigacionController">
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
                <tr dir-paginate="item in lineasinvestigaciones |itemsPerPage:10 | filter : busqueda" ng-cloak>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalActionLineasInvestigacion">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{form_title}}</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="formLineasInvestigacion" novalidate="">
                        <div class="form-group error">
                            <label for="t_name_lineasinvestigacion" class="col-sm-4 control-label">Nombre Líneas de Investigación:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nombre" id="nombre" ng-model="lineasinvestigacion.nombre" placeholder="Nombre Líneas de Investigación"
                                       ng-required="true" ng-maxlength="64">
                                <span class="help-block error"
                                      ng-show="formLineasInvestigacion.nombre.$invalid && formLineasInvestigacion.nombre.$touched">El nombre de la Línea de Investigación es requerido</span>
                                <span class="help-block error"
                                      ng-show="formLineasInvestigacion.nombre.$invalid && formLineasInvestigacion.nombre.$error.maxlength">La longitud máxima es de 64 caracteres</span>
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="t_descripcion_lineasinvestigacion" class="col-sm-4 control-label">Descripción de la Líneas de Investigación:</label>
                            <div class="col-sm-8">
                            	<textarea name="descripcion" class="form-control" id="descripcion" ng-model="lineasinvestigacion.descripcion" placeholder="Descripcion de las Líneas de Investigación" ng-required="true"></textarea>
                                <span class="help-block error"
                                      ng-show="formLineasInvestigacion.descripcion.$invalid && formLineasInvestigacion.descripcion.$touched">La descripción de las Líneas de Investigación es requerida</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-success" id="btn-save" ng-click="Save()" ng-disabled="formLineasInvestigacion.$invalid">
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
                    <span>Realmente desea eliminar la Línea de Investigación: <strong>"{{lineasinvestigacion_name}}"</strong>?</span>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modalInfoLineasInvestigacion">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Información de las Líneas de Investigación </h4>
                    </div>
                    <div class="modal-body">
                       
                        <div class="row text-center">
                            <div class="col-xs-12">
                                <span style="font-weight: bold">Nombre: </span>{{lineasinvestigacion.nombre}}
                            </div>
                            
                            <div class="col-xs-12">
                                <span style="font-weight: bold">Descripción: </span>{{lineasinvestigacion.descripcion}}
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

