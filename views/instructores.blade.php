@extends ('adminsite.lms')

@section('ContenidoSite-01')
    


     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 topper">

  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página registrada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página eliminada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página actualizada con exito</strong> US ...
      </div>
    @endif
   
 </div>

 <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex" id="secondaryNavbar">
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a href="/gestion/elearning" class="nav-link">Cursos</a> 
                            </li>
                            <li class="nav-item {{ Request::getRequestUri() === '/gestion/elearning/instructores' ? 'active' : null }}">
                                <a href="/gestion/elearning/instructores" class="nav-link">Instructores </a> 
                            </li>
                            <li class="nav-item {{ Request::getRequestUri() === '/gestion/elearning/version' ? 'active' : null }}">
                                <a href="/gestion/elearning/version" class="nav-link">Versión</a> 
                            </li>
                            <li class="nav-item {{ Request::getRequestUri() === '/gestion/elearning/competencias' ? 'active' : null }}">
                                <a href="/gestion/elearning/competencias" class="nav-link">Competencias</a> 
                            </li>
                            
                         <button type="button" class="btn btn-dark ml-lg-3" data-toggle="modal" data-target="#exampleModal">Crear Instructor <i class="material-icons">add</i></button>
                           
                            <!--
  <li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Administrator</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="fixed-app-trello.html">Dashboard</a>
      <a class="dropdown-item" href="fixed-app-trello.html">Review Courses</a>
      <a class="dropdown-item" href="fixed-app-trello.html">Support Tickets</a>
      <a class="dropdown-item" href="fixed-app-trello.html">Reports</a>
      <a class="dropdown-item" href="fixed-app-trello.html">Website Settings</a> 
    </div>
  </li>
  -->
                            
            
                        </ul>
                    </div>
                </div>
            </div>



 


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Versión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

       <div class="card">
        <div class="card-body">
         <div class="col-lg-12 card-form__body card-body">
          {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/elearning/crearinstructor'))) }}
                                
          <div class="form-group">
           <label for="exampleInputEmail1">Nombres:</label>
            {{Form::text('nombre', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese producto','maxlength' => '150', 'min' => '0'))}}
          </div>                                
          
          <div class="form-group">
           <label for="exampleInputEmail1">Apellidos:</label>
           {{Form::text('apellido', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese versión','maxlength' => '150', 'min' => '0'))}} 
          </div>

          <div class="form-group">
           <label for="exampleInputEmail1">Profesión:</label>
           {{Form::text('profesion', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese versión','maxlength' => '150', 'min' => '0'))}} 
          </div>

          <div class="form-group">
           <label for="exampleInputEmail1">Descripción:</label>
           {{Form::textarea('descripcion', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese versión','maxlength' => '150', 'min' => '0'))}} 
          </div>

         </div>  
        </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="ubmit" class="btn btn-primary">Save changes</button>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
</div>


<br>
<br>
<div class="container page__container">
                <div class="card card-form">
                    <div class="row no-gutters">
                        
                        <div class="col-lg-12 card-form__body">


                            <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

                                <table class="table mb-0 thead-border-top-0">
                                    <thead>
                                        <tr>
                                         <th style="width: 18px;">
                                          <div class="custom-control custom-checkbox">
                                           <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#staff" id="customCheckAll" data-domfactory-upgraded="toggle-check-all">
                                           <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                          </div>
                                         </th>
                                         <th>Nombres</th>
                                         <th style="width: 37px;">Profesion</th>
                                         <th style="width: 120px;">Creación</th>
                                         <th style="width: 51px;">Acciones</th>   
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="staff">
                                      @foreach($instructores as $instructores)
                                        <tr>

                                            <td style="background: #fff">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck3_2" data-domfactory-upgraded="check-selected-row">
                                                    <label class="custom-control-label" for="customCheck3_2"><span class="text-hide">Check</span></label>
                                                </div>
                                            </td>

                                            <td width="40%" style="background: #fff">

                                                <div class="media align-items-center">

                                                    <div class="avatar avatar-xs mr-2">
                                                        <img src="https://lema.frontted.com/assets/images/avatar/green.svg" alt="Avatar" class="avatar-img rounded-circle">
                                                    </div>
                                                    <div class="media-body">

                                                        <span class="js-lists-values-employee-name">{{$instructores->nombres}} {{$instructores->apellidos}}</span>

                                                    </div>
                                                </div>

                                            </td>


                                            <td style="background: #fff"><span class="badge badge-primary">{{$instructores->profesion}}</span></td>
                                            <td style="background: #fff"><small class="text-muted">{{$instructores->created_at}}</small></td>
                                            <td style="background: #fff">
                                            <a href="<?=URL::to('gestion/comercial/editar-recepcion/');?>/"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Editar usuario" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
       <script language="JavaScript">
        function confirmar ( mensaje ) {
        return confirm( mensaje );}
        </script>
        <a href="<?=URL::to('gestion/comercial/eliminar');?>/" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar usuario" class="btn btn-danger" disabled="true"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>

                                            </td>
                                            
                                        </tr>
                                          @endforeach
                                      </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>

                
                
            </div>



<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <script src="/adminsite/js/pages/tablesDatatables.js"></script>
  <script>$(function(){ TablesDatatables.init(); });</script>

@stop