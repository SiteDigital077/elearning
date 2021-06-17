@extends ('adminsite.lms')

@section('ContenidoSite-01')

<!-- Header Layout Content -->
        <div class="mdk-header-layout__content page">

<div class="page__header flush-shadow">
                <div class="container-fluid page__heading-container">
                    <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                        <h1 class="m-lg-0">Cursos </h1>
                        <a href="/gestion/elearning/crear-curso" class="btn btn-success ml-lg-3">Nuevo curso <i class="material-icons">add</i></a>
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



<div class="container mt-5">
	<div class="row">
@foreach($cursos as $cursos)

  <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex flex-column flex-sm-row">
                                    <a href="#" class="avatar mb-3 w-xs-plus-down-100 mr-sm-3">
                                        <img src="http://portal.local/lms/dist/assets/images/logos/vuejs.svg" alt="Card image cap" class="avatar-course-img">
                                    </a>
                                    <div class="flex" style="min-width: 200px;">

                                        <div class="d-flex">
                                            <div>
                                                <h4 class="card-title mb-1"><a href="fluid-instructor-course-edit.html">{{$cursos->nombre}}</a></h4>
                                                <p class="text-muted">{{$cursos->descripcion}}</p>
                                            </div>
                                            <div class="dropdown ml-auto">
                                                <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="/gestion/elearning/editarcurso/{{$cursos->id}}">Editar Curso</a>
                                                    <a class="dropdown-item" href="/gestion/elearning/general/{{$cursos->id}}">Contenido</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="/gestion/elearning/eliminar/{{$cursos->id}}">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-end">
                                            <div class="d-flex flex flex-column mr-3">
                                                <div class="d-flex align-items-center py-2 border-bottom">
                                                    <span class="mr-2">&dollar;1,230/mo</span>
                                                    <small class="text-muted ml-auto">{{$cursos->lecciones}} Lecciones - {{$cursos->tiempo}}</small>
                                                </div>
                                                <div class="d-flex align-items-center py-2">
                                                    <span class="badge badge-vuejs mr-2">VUEJS</span>
                                                    <span class="badge badge-soft-secondary">INTERMEDIATE</span>
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
</div>
                                
   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
@stop