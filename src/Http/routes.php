<?php


Route::group(['middleware' => ['auths','administrador','admcursos']], function (){

Route::get('/gestion/elearning', 'DigitalsiteSaaS\Elearning\Http\ElearningController@index');

Route::get('/gestion/elearning/crear-curso', 'DigitalsiteSaaS\Elearning\Http\ElearningController@crearcursos');
Route::post('/gestion/elearning/crearcurso', 'DigitalsiteSaaS\Elearning\Http\ElearningController@create');
Route::get('/gestion/elearning/editarcurso/{id}', 'DigitalsiteSaaS\Elearning\Http\ElearningController@edit');
Route::post('/gestion/elearning/update/{id}', 'DigitalsiteSaaS\Elearning\Http\ElearningController@update');
Route::get('/gestion/elearning/eliminar/{id}', 'DigitalsiteSaaS\Elearning\Http\ElearningController@delete');


Route::get('/gestion/elearning/lecciones/{id}', 'DigitalsiteSaaS\Elearning\Http\ElearningController@lecciones');
Route::get('/gestion/elearning/crear-leccion/{id}', 'DigitalsiteSaaS\Elearning\Http\ElearningController@crearlecciones');
Route::post('/gestion/elearning/crearleccion', 'DigitalsiteSaaS\Elearning\Http\ElearningController@crearleccion');


Route::get('/gestion/elearning/general/{id}', 'DigitalsiteSaaS\Elearning\Http\ElearningController@general');
Route::post('/gestion/elearning/contenidogeneral', 'DigitalsiteSaaS\Elearning\Http\ElearningController@contenidogeneral');

Route::get('/gestion/elearning/version', 'DigitalsiteSaaS\Elearning\Http\ElearningController@version');
Route::post('/gestion/elearning/crearversion', 'DigitalsiteSaaS\Elearning\Http\ElearningController@crearversion');

Route::get('/gestion/elearning/instructores', 'DigitalsiteSaaS\Elearning\Http\ElearningController@instructores');
Route::post('/gestion/elearning/crearinstructor', 'DigitalsiteSaaS\Elearning\Http\ElearningController@crearinstructor');
                                                                                                          
Route::get('/gestion/elearning/competencias', 'DigitalsiteSaaS\Elearning\Http\ElearningController@competencias');
Route::post('/gestion/elearning/crearcompetencia', 'DigitalsiteSaaS\Elearning\Http\ElearningController@crearcompetencia');

Route::get('/gestion/elearning/proveedores', 'DigitalsiteSaaS\Elearning\Http\ElearningController@competencias');
Route::post('/gestion/elearning/crearproveedor', 'DigitalsiteSaaS\Elearning\Http\ElearningController@crearcompetencia');

Route::get('/gestion/elearning/programas', 'DigitalsiteSaaS\Elearning\Http\ElearningController@programas');
Route::post('/gestion/elearning/crearprograma', 'DigitalsiteSaaS\Elearning\Http\ElearningController@crearprograma');
});
