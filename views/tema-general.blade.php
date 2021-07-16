@extends ('adminsite.lms')
@section('ContenidoSite-01')
<link href="/chosen/component-chosen.min.css" rel="stylesheet">
<!-- Header Layout Content -->
        <div class="mdk-header-layout__content page">

        <div class="page__header flush-shadow">
                <div class="container-fluid page__heading-container">
                    <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                        <h1 class="m-lg-0">Cursos </h1>
                        <button type="button" class="btn btn-success ml-lg-3" data-toggle="modal" data-target="#exampleModal">Crear Tema General <i class="material-icons">add</i></button>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

       <div class="card">
        <div class="card-header card-header-large bg-light d-flex align-items-center">
         
         <div class="flex">
          <h4 class="card-header__title">Crear contenido </h4>
         </div>
        
        </div>
        
        <div class="card-body">
         <div class="col-lg-12 card-form__body card-body">
          {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/elearning/contenidogeneral'))) }}
                                
          <div class="form-group">
           <label for="exampleInputEmail1">Titulo Lección:</label>
           {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
          </div>

          <div class="form-group">
           <label for="exampleInputEmail1">Descripción Lección:</label>
            {{Form::textarea('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción', 'maxlength' => '159'))}}
          </div>

         

          <div class="form-group">
                                 <label for="exampleInputEmail1">Versión</label>
                                 
                                   <div id="output"></div>
                                    <select id="optgroup" class="form-control form-control-chosen" name="version[]" data-placeholder="Seleccione Competencia" multiple>
                                    @foreach($version as $version)
                                    <option value="{{$version->version}}">{{$version->version}} {{$version->producto}}</option>
                                    @endforeach
                                    </select>
                                  </div>


          <div class="form-group">
           <label for="exampleInputEmail1">Estado Lección:</label>
            {{ Form::select('estado', [
             '1' => 'Activo',
             '2' => 'Inactivo',
             '3' => 'Suspendido'
             ], null, array('class' => 'form-control')) }}
          </div>

          {{Form::hidden('curso_id', Request::segment(4), array('class' => 'form-control','placeholder'=>'Ingrese descripción', 'maxlength' => '159'))}}
           
        
          
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


 <div class="container page__container">
  <div class="row">
   <div class="col-md-12">
                   
    <div class="container page__container">
     <div class="row">
      <div class="col-md-12">
       <div id="accordion">
        @foreach($contenido as $contenido)
        <div class="card">

         <div class="card-header bg-primary text-light" id="headingOne">
          <h5 class="mb-0">
           <button class="btn text-light" data-toggle="collapse" data-target="#{{$contenido->slug}}" aria-expanded="true" aria-controls="collapseOne">
            {{$contenido->titulo}}
           </button>
           <a href="/gestion/elearning/crear-leccion/{{$contenido->id}}" class="pull-right"> +agregar</a>
          </h5>
         </div>

         <div id="{{$contenido->slug}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
           @foreach($lecciones as $leccionesa)
            @if($contenido->id == $leccionesa->leccion_id)
             <li>{{$leccionesa->titulo}}</li>
            @else
            @endif
           @endforeach
          </div>
         </div>

        </div>
        @endforeach
       </div>
      </div>
     </div>
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