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
                        <h1 class="m-lg-0">Lecciones </h1>
                        <button type="button" class="btn btn-success ml-lg-3" data-toggle="modal" data-target="#exampleModal">Crear Lección <i class="material-icons">add</i></button>
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
                        </ul>
                    </div>
                </div>
            </div>
</div>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Lección</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

       <div class="card">
        
        
        <div class="card-body">
         <div class="col-lg-12 card-form__body card-body">



          {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/elearning/crearleccion'))) }}
                                
          <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo Lección:</label>
                                    {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descripción Lección:</label>
                                    {{Form::textarea('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción', 'maxlength' => '159'))}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado Lección:</label>
                                    {{ Form::select('estado', [
                                                 '1' => 'Activo',
                                                 '2' => 'Inactivo',
                                                 '3' => 'Suspendido'
                                                 ], null, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Url Video:</label>
                                    {{Form::text('url_video', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Versión Lección</label>
                                  <select id="cars" class="form-control" name="version">
                                    @foreach($version as $version)
                                    <option value="{{$version->version}}">{{$version->version}} {{$version->producto}}</option>
                                    @endforeach
                                  </select>
                                </div>

                                
                                    @foreach($curso as $curso)
                                    {{Form::hidden('curso_id', $curso->curso_id, array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
                                    @endforeach
                                

                                {{Form::hidden('leccion_id', Request::segment(4), array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
           
        
          
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





@stop