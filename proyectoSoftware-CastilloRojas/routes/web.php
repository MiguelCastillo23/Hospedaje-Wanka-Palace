<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Bienvenido a la página principal";
});


//Agregando nueva ruta
Route::get('practicas-preprofesionales', function () {
    return "Bienvenido a la Gestión de Práctica Preprofesionales";
});

//Agregando ruta para CREAR un nuevo registro
Route::get('practicas/create', function () {
    return "En esta página podrás crear un nuevo registro";
});

/*
//Agregando nueva ruta con variable
Route::get('practicas/{procedimiento}', function ($procedimiento) {
    return "Bienvenido al procedimiento: $procedimiento";
});

//Agregando nueva ruta con 2 variables
Route::get('practicas/{procedimiento}/{registro}', function ($procedimiento, $registro) {
    return "Bienvenido al registro: $registro, del procedimiento: $procedimiento";
});
*/

//Mejorando el código con las rutas: 1 variable y 2 variables
Route::get('practicas/{procedimiento}/{registro?}', function($procedimiento, $registro = null) {
    if($registro) { //condicional si se indica un registro
        return "Bienvenido al registro: $registro, del procedimiento: $procedimiento";
    } else {        //en caso no se indique un registro
        return "Bienvenido al procedimiento: $procedimiento";
    }
});

//PRACTICA

//PROCESO DE GESTIÓN DE PROGRAMACIÓN ACADÉMICA
Route::get('GestionProgramacionAcademica', function(){
    return "Gestion Programación Académica: <br><br> a. Elaborar distribución académica. <br> b. Elaborar horarios.
    <br> c. Publicar horarios. <br> d. Actualizar carpetas académicas.";
});
//RUTA: http://localhost/proyectoSoftware-CastilloRojas/public/GestionProgramacionAcademica

//Agregando nueva ruta con variable
Route::get('GestionProgramacionAcademica/{procedimiento}', function ($procedimiento) {
    return "Gestión de Programación Académica:<br><br> Procedimiento: $procedimiento";
});
//RUTA: http://localhost/proyectoSoftware-CastilloRojas/public/GestionProgramacionAcademica/Publicar-horarios

//FIN PROCESO DE GESTIÓN DE PROGRAMACIÓN ACADÉMICA

