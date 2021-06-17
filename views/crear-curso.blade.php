@extends ('adminsite.lms')

@section('ContenidoSite-01')
<link href="/chosen/component-chosen.min.css" rel="stylesheet">
<!-- Header Layout Content -->
        <div class="mdk-header-layout__content page">

<div class="page__header flush-shadow">
                <div class="container-fluid page__heading-container">
                    <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                        <h1 class="m-lg-0">Contenidos Curos</h1>
                        <a href="/gestion/elearning/crear-curso" class="btn btn-success ml-lg-3">New Course <i class="material-icons">add</i></a>
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



    <!-- Flatpickr -->
    <link type="text/css" href="/lms/assets/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="/lms/assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="/lms/assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="/lms/assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- DateRangePicker -->
    <link type="text/css" href="/lms/assets/vendor/daterangepicker.css" rel="stylesheet">




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




<div class="container-fluid page__container">
                <div class="card card-form">
                    <div class="row no-gutters">
                        <div class="col-lg-4 card-body">
                            <p><strong class="headings-color">Crear Cursos</strong></p>
                            <p class="text-muted">Stack supports all of Bootstrap's default form styling in addition to a handful of new input types and features. Please <a href="https://getbootstrap.com/docs/4.1/components/forms/" target="_blank">read the official documentation</a> for a full list of options from Bootstrap's core library.</p>
                        </div>
                        <div class="col-lg-8 card-form__body card-body">
                           {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/elearning/crearcurso'))) }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Curso:</label>
                                    {{Form::text('nombre', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado curso:</label>
                                    {{ Form::select('estado', [
                                                 '1' => 'Activo',
                                                 '2' => 'Inactivo',
                                                 '3' => 'Suspendido'
                                                 ], null, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Visualización curso:</label>
                                    {{ Form::select('vista', [
                                                 '1' => 'Privado',
                                                 '2' => 'Público'
                                                 ], null, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Modalidad:</label>
                                    {{ Form::select('modalidad', [
                                                 '1' => 'Vitual',
                                                 '2' => 'Presencial'
                                                 ], null, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lugar Curso:</label>
                                     {{Form::text('lugar', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Inversión Curso:</label>
                                     {{Form::text('inversion', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Horarios Curso:</label>
                                     {{Form::text('horario', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Duración Curso:</label>
                                     {{Form::text('duracion', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Producto:</label>
                                     {{Form::text('producto', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Teléfono:</label>
                                     {{Form::text('telefono', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Email:</label>
                                     {{Form::text('correo', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                </div>

                                <div class="form-group">
                                         <label for="exampleInputEmail1">IMAGEN</label>
                                        
                                           <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="imagen" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                           </div>
                                        
                                        </div>

                                 <div class="form-group">
                                 <label for="exampleInputEmail1">COMPETENCIAS</label>
                                 
                                   <div id="output"></div>
                                    <select id="optgroup" class="form-control form-control-chosen" name="competencia[]" data-placeholder="Seleccione Competencia" multiple>
                                    @foreach($competencias as $competenciass)
                                     <option value="{{$competenciass->id}}">{{$competenciass->competencia}}</option>
                                    @endforeach
                                    </select>
                                   
                                  </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cantidad Lecciones:</label>
                                     {{Form::number('lecciones', '', array('class' => 'form-control','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha Curso:</label>
                                     {{Form::text('fecha', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descripción Curso:</label>
                                    {{Form::textarea('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción', 'maxlength' => '159'))}}
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
</div>

<footer>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('button-image').addEventListener('click', (event) => {
      event.preventDefault();
      window.open('/file-manager/fm-button', 'fm', 'width=900,height=500');
    });
  });
  // set file link
  function fmSetLink($url) {
    document.getElementById('image_label').value = $url;
  }
</script>

    <!-- jQuery -->
    <script src="/lms/assets/vendor/jquery.min.js"></script>
    <!-- Flatpickr -->
    <script src="/lms/assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="/lms/assets/js/flatpickr.js"></script>

    <!-- DateRangePicker -->

     <script src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>

  
    <script type="text/javascript">
document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();
</script>

<script type="text/javascript">
    $('.form-control-chosen').chosen();
</script>
 

   
</footer>

@stop