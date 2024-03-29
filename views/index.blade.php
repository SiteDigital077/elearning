@extends ('adminsite.lms')

@section('ContenidoSite-01')

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
                            
                        <a href="/gestion/elearning/crear-curso" class="btn btn-dark ml-lg-3">Nuevo curso <i class="material-icons">add</i></a>
                           
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





<div class="container mt-5">
 

  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Curso registrada con exito</strong> SD ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Curso eliminada con exito</strong> DS ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Curso actualizada con exito</strong> SD ...
      </div>
    @endif
   

	<div class="row">
@foreach($cursos as $curso)

  <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex flex-column flex-sm-row">
                                    <a href="#" class="avatar mb-3 w-xs-plus-down-100 mr-sm-3">
                                        <img src="{{$curso->imagen}}" alt="Card image cap" class="avatar-course-img">
                                    </a>
                                    <div class="flex" style="min-width: 200px;">

                                        <div class="d-flex">
                                            <div>
                                                <h5 class="card-title mb-1"><b>{{$curso->nombre}}</b></h5>
                                                <p style="text-transform: capitalize; text-align: justify; color: red">{!!substr($curso->descripcion, 0, 160)!!} ...</p>
                                            </div>
                                            <div class="dropdown ml-auto">
                                                <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="/gestion/elearning/editarcurso/{{$curso->id}}">Editar Curso</a>
                                                    <a class="dropdown-item" href="/gestion/elearning/general/{{$curso->id}}">Contenido</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="/gestion/elearning/eliminar/{{$curso->id}}">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-end">
                                            <div class="d-flex flex flex-column mr-3">
                                                <div class="d-flex align-items-center py-2 border-bottom">
                                                    @if($curso->inversion == '')
                                                    <span class="badge badge-vuejs mr-2">GRATIS</span>
                                                    @else
                                                    <span class="badge badge-dark mr-2">$ {{ number_format($curso->inversion, 2) }}</span>
                                                    @endif
                                                    <small class="text-muted ml-auto">{{$curso->lecciones}} Lecciones - {{$curso->tiempo}}</small>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

</div>
</div>
</div>


@endforeach

</div>
<div class="text-center">
  {{ $cursos->links() }}
</div>
</div>
                                
   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
@stop