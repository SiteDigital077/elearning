@extends ('adminsite.lms')
@section('ContenidoSite-01')
<link href="/chosen/component-chosen.min.css" rel="stylesheet">

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
                            
                        <button type="button" class="btn btn-dark ml-lg-3" data-toggle="modal" data-target="#exampleModal">Crear Tema General <i class="material-icons">add</i></button>
                           
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






<br><br>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creación Tema General</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

     
        
        
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
                                    <select id="optgroup" class="form-control form-control-chosen" name="version[]" data-placeholder="Seleccione Versión" multiple>
                                    @foreach($version as $versions)
                                    <option value="{{$versions->version}}">{{$versions->version}} {{$versions->producto}}</option>
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
         
            <div class="container">
              <div class="row">
           
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

           <a class="btn text-light" data-toggle="collapse" data-target="#{{$contenido->slug}}" aria-expanded="true" aria-controls="collapseOne">
            {{$contenido->titulo}} 
           </a>
             </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
          
            <a data-toggle="modal" data-target="#exampleModala" data-id="{{$contenido->id}}"  data-toggle="modal" title="Add this item" class="open-AddBookDialog btn btn-primary" style="background: #1baba3;color: #fff; border:0px;"> <i class="material-icons">create</i></a>
          </div>
           </div>
        </div>
         

         
         </div>

         <div id="{{$contenido->slug}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
          
            


              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Estado</th>
                      <th>Versión</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lecciones as $leccionesa)
            @if($contenido->id == $leccionesa->general_id)
                    <tr>
                      <td>{{$leccionesa->titulo}}</td>
                      <td><span class="badge badge-danger">Inactivo</span></td>
                      <td><span class="badge badge-warning">{{$leccionesa->version}}</span></td>
                      <td><span class="badge badge-warning">Acciones</span></td>
                    </tr>
                     @else
            @endif
           @endforeach
                  </tbody>
                </table>
              </div>



           
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








<!-- Modal -->
<div class="modal fade" id="exampleModala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                 <label for="exampleInputEmail1">Versión</label>
                                 
                                   <div id="output"></div>
                                    <select id="optgroup" class="form-control form-control-chosen" name="version[]" data-placeholder="Seleccione Versión" multiple>
                                    @foreach($version as $version)
                                     <option value="{{$version->version}}">{{$version->version}} {{$version->producto}}</option>
                                    @endforeach
                                    </select>
                                  </div>
                                
                                    
                                    {{Form::hidden('curso_id', Request::segment(4), array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
                                    

                                {{Form::hidden('leccion_id', '', array('class' => 'form-control','id'=>'comisionId', 'placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
           
        
          
      
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













 <footer>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
$(document).on("click", ".open-AddBookDialog", function () {
     var mycomisionId = $(this).data('id');

     $(".modal-body #comisionId").val( mycomisionId );
    $('#exampleModala').modal('show');
});
</script>
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