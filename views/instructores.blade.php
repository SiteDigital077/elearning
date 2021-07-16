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


 <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page">

        <div class="page__header flush-shadow">
                <div class="container-fluid page__heading-container">
                    <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                        <h1 class="m-lg-0">Instructores </h1>
                        <button type="button" class="btn btn-success ml-lg-3" data-toggle="modal" data-target="#exampleModal">Crear Instructor <i class="material-icons">add</i></button>
                    </div>
                </div>
            </div> <!-- // END page__header -->


            <div class="page__header page__header-nav">
                <div class="container-fluid page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex" id="secondaryNavbar">
                        <ul class="nav navbar-nav">
                           <li class="nav-item dropdown">
                                <a href="/gestion/elearning" class="nav-link">Cursos</a> 
                            </li>
                            <li class="nav-item dropdown">
                                <a href="/gestion/elearning/instructores" class="nav-link">Instructores</a> 
                            </li>
                            <li class="nav-item dropdown">
                                <a href="/gestion/elearning/version" class="nav-link">Versión</a> 
                            </li>
                            <li class="nav-item dropdown">
                                <a href="/gestion/elearning/competencias" class="nav-link">Competencias</a> 
                            </li>
                            <li class="nav-item dropdown">
                                <a href="/gestion/elearning/programas" class="nav-link">Programas</a> 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
</div>

<!-- Button trigger modal -->

<!-- Button trigger modal -->
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


<div class="container">
  

 <div class="block full">
  <div class="block-title">
   <h4>Instructores Registrados</h4>
  </div>
            
  <div class="table-responsive">
   <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
     <tr>
      <th class="text-center">ID</th>
      <th class="text-center">Nombre</th>
      <th class="text-center">Apellido</th>
      <th class="text-center">Profesión</th>
      
      <th class="text-center">Acciones</th>
      
     </tr>
    </thead>
    
    <tbody>
    
     @foreach($instructores as $instructores)
     <tr>
      <td class="text-center">{{$instructores->id}}</td>
      <td class="text-center">{{$instructores->nombres}}</td>
      <td>{{$instructores->apellidos}}</td>
      <td>{{$instructores->profesion}}</td>
      
      <td class="text-center">
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


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <script src="/adminsite/js/pages/tablesDatatables.js"></script>
  <script>$(function(){ TablesDatatables.init(); });</script>

@stop