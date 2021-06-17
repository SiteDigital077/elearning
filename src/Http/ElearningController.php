<?php


namespace DigitalsiteSaaS\Elearning\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use DigitalsiteSaaS\Elearning\Cursos;
use DigitalsiteSaaS\Elearning\Lecciones;
use DigitalsiteSaaS\Elearning\Version;
use DigitalsiteSaaS\Elearning\Contenido_general;
use DigitalsiteSaaS\Elearning\Instructor;
use DigitalsiteSaaS\Elearning\Competencia;
use Input;

use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Repositories\HostnameRepository;
use Hyn\Tenancy\Repositories\WebsiteRepository;



class ElearningController extends Controller{

 protected $tenantName = null;

 public function __construct(){
  $this->middleware('auth');
  $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
   if($hostname){
    $fqdn = $hostname->fqdn;
    $this->tenantName = explode(".", $fqdn)[0];
   }
  }

 
 public function index(){
  if(!$this->tenantName){
  $cursos = Cursos::all();
  }else{
  $cursos = \DigitalsiteSaaS\Elearning\Tenant\Cursos::all();
  }
  return view('elearning::index')->with('cursos', $cursos);
 }

 public function create(){
  $competencias = Input::get('competencia');
  $data = json_encode($competencias, true);
  $vowels = array('"', '[', ']');
  $onlyconsonants = str_replace($vowels, '', $data);
  if(!$this->tenantName){
   $crearcurso = new Cursos;
  }else{
   $crearcurso = new \DigitalsiteSaaS\Elearning\Tenant\Cursos;
  }
   $crearcurso->nombre = Input::get('nombre');
   $crearcurso->descripcion = Input::get('descripcion');
   $crearcurso->estado = Input::get('estado');
   $crearcurso->lecciones = Input::get('lecciones');
   $crearcurso->producto = Input::get('producto');
   $crearcurso->vista = Input::get('vista');
   $crearcurso->modalidad = Input::get('modalidad');
   $crearcurso->lugar = Input::get('lugar');
   $crearcurso->inversion = Input::get('inversion');
   $crearcurso->horario = Input::get('horario');
   $crearcurso->duracion = Input::get('duracion');
   $crearcurso->telefono = Input::get('telefono');
   $crearcurso->correo = Input::get('correo');
   $crearcurso->competencia = $onlyconsonants;
   $crearcurso->imagen = Input::get('imagen');
   $crearcurso->fecha = Input::get('fecha');
   $crearcurso->save();
   return Redirect('gestion/elearning')->with('status', 'ok_create');
  }


  public function edit($id){
   if(!$this->tenantName){
   $cursos = Cursos::where('id', '=', $id)->get();
   $competencias = Competencia::all();
   foreach($cursos as $curso){
   $ideman = $curso->competencia;
   $id_str = explode(',', $ideman);
   $registro = Competencia::whereIn('id', $id_str)->get();
   }

   }else{
   $cursos = \DigitalsiteSaaS\Elearning\Tenant\Cursos::where('id', '=', $id)->get();
   $competencias = \DigitalsiteSaaS\Elearning\Tenant\Competencia::all();
   foreach($cursos as $curso){
   $ideman = $curso->competencia;
   $id_str = explode(',', $ideman);
   $registro = \DigitalsiteSaaS\Elearning\Tenant\Competencia::whereIn('id', $id_str)->get();
   }
   }
   return view('elearning::editar-curso')->with('cursos', $cursos)->with('competencias', $competencias)->with('registro', $registro);
  }

  public function update($id){
  $input = Input::all();
  if(!$this->tenantName){
  $updatecursos = Cursos::find($id);
  }else{
  $updatecursos = \DigitalsiteSaaS\Elearning\Tenant\Cursos::find($id);	
  }
  $updatecursos->nombre = Input::get('nombre');
  $updatecursos->descripcion = Input::get('descripcion');
  $updatecursos->estado = Input::get('estado');
  $updatecursos->lecciones = Input::get('lecciones');
  $updatecursos->tiempo = Input::get('tiempo');
  $updatecursos->producto = Input::get('producto');
  $updatecursos->save();
  return Redirect('gestion/elearning')->with('status', 'ok_update');
}

public function delete($id) {
 if(!$this->tenantName){
 $user = Cursos::find($id);
 }else{
 $user = \DigitalsiteSaaS\Elearning\Tenant\Cursos::find($id);
 }
 $user->delete();
 return Redirect('gestion/elearning')->with('status', 'ok_delete');
}

 public function crearcursos() {
  if(!$this->tenantName){
   $competencias = Competencia::all();
  }else{
   $competencias = \DigitalsiteSaaS\Elearning\Tenant\Competencia::all();
  }
  return view('elearning::crear-curso')->with('competencias', $competencias);
 }

 public function lecciones() {
 return view('elearning::lecciones');
}

 public function crearlecciones($id) {
 if(!$this->tenantName){
 $version = Version::all();
 $curso = Contenido_general::where('id','=', $id)->take(1)->get();
 }else{
 $curso = \DigitalsiteSaaS\Elearning\Tenant\Contenido_general::where('id','=', $id)->take(1)->get();
 }
 return view('elearning::crear-leccion')->with('curso', $curso)->with('version', $version);
}

 public function general($id) {
 if(!$this->tenantName){
  $contenido = Contenido_general::where('curso_id','=', $id)->get();
  $lecciones = Lecciones::all();
  }else{
  $contenido = \DigitalsiteSaaS\Elearning\Tenant\Contenido_general::where('curso_id','=', $id)->get();
  $lecciones = \DigitalsiteSaaS\Elearning\Tenant\Lecciones::all();
  }
 return view('elearning::tema-general')->with('contenido', $contenido)->with('lecciones', $lecciones);
}


public function crearleccion(){
  if(!$this->tenantName){
   $crearcurso = new Lecciones;
  }else{
   $crearcurso = new \DigitalsiteSaaS\Elearning\Tenant\Lecciones;
  }
   $crearcurso->titulo = Input::get('titulo');
   $crearcurso->descripcion = Input::get('descripcion');
   $crearcurso->estado = Input::get('estado');
   $crearcurso->url_video = Input::get('url_video');
   $crearcurso->version = Input::get('version');
   $crearcurso->curso_id = Input::get('curso_id');
   $crearcurso->leccion_id = Input::get('leccion_id');
   $crearcurso->save();
   return Redirect('gestion/elearning/general/'.$crearcurso->curso_id)->with('status', 'ok_create');
  }


public function contenidogeneral(){
  if(!$this->tenantName){
   $crearcurso = new Contenido_general;
  }else{
   $crearcurso = new \DigitalsiteSaaS\Elearning\Tenant\Contendio_general;
  }
   $crearcurso->titulo = Input::get('titulo');
   $crearcurso->slug = Str::slug($crearcurso->titulo);
   $crearcurso->descripcion = Input::get('descripcion');
   $crearcurso->estado = Input::get('estado');
   $crearcurso->curso_id = Input::get('curso_id');
   $crearcurso->save();
   return Redirect('gestion/elearning/general/'.$crearcurso->curso_id)->with('status', 'ok_create');
  }

  public function version() {
  if(!$this->tenantName){
  $version = Version::all();
  }else{
  $version = \DigitalsiteSaaS\Elearning\Tenant\Version::all();
  }
  return view('elearning::version')->with('version', $version);
  }


  public function instructores() {
  if(!$this->tenantName){
  $instructores = Instructor::all();
  }else{
  $instructores = \DigitalsiteSaaS\Elearning\Tenant\Instructor::all();
  }
  return view('elearning::instructores')->with('instructores', $instructores);
  }

  public function competencias() {
  if(!$this->tenantName){
  $competencias = Competencia::all();
  }else{
  $competencias = \DigitalsiteSaaS\Elearning\Tenant\Competencia::all();
  }
  return view('elearning::competencias')->with('competencias', $competencias);
  }

   public function crearcompetencia(){
  if(!$this->tenantName){
   $crearcompetencia = new Competencia;
  }else{
   $crearcompetencia = new \DigitalsiteSaaS\Elearning\Tenant\Competencia;
  }
   $crearcompetencia->competencia = Input::get('competencia');
   $crearcompetencia->descripcion = Input::get('descripcion');
   $crearcompetencia->save();
   return Redirect('/gestion/elearning/competencias')->with('status', 'ok_create');
  }


   public function crearinstructor(){
  if(!$this->tenantName){
   $crearinstructor = new Instructor;
  }else{
   $crearinstructor = new \DigitalsiteSaaS\Elearning\Tenant\Instructor;
  }
   $crearinstructor->nombres = Input::get('nombre');
   $crearinstructor->apellidos = Input::get('apellido');
   $crearinstructor->profesion = Input::get('profesion');
   $crearinstructor->descripcion = Input::get('descripcion');
   $crearinstructor->save();
   return Redirect('/gestion/elearning/instructores')->with('status', 'ok_create');
  }



  public function crearversion(){
  if(!$this->tenantName){
   $crearversion = new Version;
  }else{
   $crearversion = new \DigitalsiteSaaS\Elearning\Tenant\Version;
  }
   $crearversion->producto = Input::get('producto');
   $crearversion->version = Input::get('version');
   $crearversion->save();
   return Redirect('gestion/elearning/version/')->with('status', 'ok_create');
  }

}


