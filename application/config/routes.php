<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//$route['gestion'] = 'gestion/index';
$route['registro'] = 'registro/index';
$route['registroUser'] = 'registro/indexRegister';
$route['confirmRegistro/(:any)'] = 'registro/confirmRegistro/$1';

$route['login'] = 'login/index';
$route['loginUser'] = 'login/indexLogin';
$route['cerrarSesion'] = 'login/unset_session_data';//cerrar sesion

$route['private/modifyPerfil'] = 'modifyPerfil/index';
$route['private/coche'] = 'coche/index';
//foto del perfil
$route['private/fotoPerfil'] = 'foto/index';
//borrar foto
$route['private/borrarFoto'] = 'foto/borrarFoto';
//actualizar usuario
$route['updateUser'] = 'modifyPerfil/updateUser';
//insertar coche
$route['insertCar'] = 'coche/indexRegisterCoche';
//insertar foto
$route['insertFoto'] = 'foto/do_upload';
//publicar una ruta
$route['publicarRuta'] = 'ruta/index';
//insertar ruta
$route['insertRuta'] = 'ruta/InsertarRuta';
//buscar ruta
$route['buscarRuta'] = 'ruta/buscarRuta';
//buscar anuncios
$route['private/buscarAnuncios'] = 'ruta/buscarAnuncios';
$route['private/buscarAnuncios/(:num)'] = 'ruta/buscarAnuncios/$1';




//mapa de parking de la ua
$route['public/mapa'] = 'mapa/index';
//cargar cordenadas en base de datos
$route['public/mapaCordenadas'] = 'mapa/cargarCordenadas';
//obtener cordenadas aparcamientos universidad
//cargar cordenadas en base de datos
$route['public/mapaCordenadasUniversidad'] = 'mapa/obtenerCordenadas';
//buscar parking
$route['buscarParking'] = 'mapa/buscarParking';

//encontrar zonas  findZoneParking
$route['findZoneParking'] = 'mapa/findZoneParking';

//poner zona como ocupada
$route['occupyZoneParking'] = 'mapa/occupyZoneParking';

//poner zona como desocupada
$route['desoccupyZoneParking'] = 'mapa/desoccupyZoneParking';

//modificar rutas
//$route['private/viajesPublicados'] = 'ruta/modificarRuta';
//obtener todas las rutas publicadas por un usuario
$route['private/listadoRutas'] = 'ruta/listaRutasUsuario';
$route['private/listadoRutas/(:num)'] = 'ruta/listaRutasUsuario/$1';
//obtener ruta de un usuario dada por su id
$route['private/detalleRuta/(:num)'] = 'ruta/detalle/$1';
//actualizar ruta
$route['private/modifyRuta/(:num)'] = 'ruta/obtenerRutaCoches/$1';
//borraruna ruta
$route['private/borrarRuta/(:num)'] = 'ruta/borrarRutaCoches/$1';

$route['private/updateRuta'] = 'ruta/updateRuta';
//volver de parte privada al home de la pagina
$route['private/home'] = 'home/index';



//private/anuncioUsuario
$route['private/anuncioUsuario/(:any)/(:num)'] = 'anuncio/detalle/$1/$2';

//peticion matricula a traves de ajax
$route['private/matricula/(:any)'] = 'coche/matricula/$1';

//cambiar foto coche
$route['private/cambiarFotoCoche/(:any)'] = 'coche/fotoCoche/$1';

//borrar coche
$route['private/borrarCoche/(:any)/(:any)'] = 'coche/borrarCoche/$1/$2';


//peticion correo a traves de ajax
$route['private/correo/(:any)'] = 'registro/correo/$1';

//buscarusuario
$route['private/perfilUsuarioBuscado'] = 'usuarios/index';

//buscar detalle de un usuario con post
$route['private/buscarDetalleUsuario'] = 'usuarios/detalleUsuario';

//buscar detalle usuario con parametro get
$route['private/DetalleUsuarioPorCorreo/(:any)'] = 'usuarios/detalleUsuarioPorCorreo/$1';



//buscar usuarios por origen
$route['private/buscarUsuariosPorOrigen'] = 'usuarios/buscarUsuariosPorOrigen';
$route['private/buscarUsuariosPorOrigen/(:num)'] = 'usuarios/buscarUsuariosPorOrigen/$1';

//buscar usuarios por nombre
$route['private/buscarUsuariosPorNombre'] = 'usuarios/buscarUsuariosPorNombre';
$route['private/buscarUsuariosPorNombre/(:num)'] = 'usuarios/buscarUsuariosPorNombre/$1';

//comentar usuario
$route['private/comentarUsuario'] = 'usuarios/comentarUsuario';

//ver comentarios de usuario
$route['private/verComentarios/(:any)'] = 'usuarios/comentariosUsuarioPorCorreo/$1';
$route['private/verComentarios/(:any)/(:any)'] = 'usuarios/comentariosUsuarioPorCorreo/$1/$2';

//ver comentarios  recibidos
$route['private/opinionesRecibidas'] = 'usuarios/comentariosRecibidos';
$route['private/opinionesRecibidas/(:any)'] = 'usuarios/comentariosRecibidos/$1';


//ver comentarios hechos
$route['private/opinionesHechas'] = 'usuarios/comentariosHechos';
$route['private/opinionesHechas/(:any)'] = 'usuarios/comentariosHechos/$1';


//modificar password
$route['private/passwordInformation'] = 'usuarios/passwordInformation';
$route['private/modifyPassword'] = 'modifyPerfil/modifyPassword';

$route['public/recoverPass'] = 'modifyPerfil/recoverPassword';
$route['public/updatePass'] = 'modifyPerfil/updatePassword';
$route['private/recoverUpdatePassword/(:any)'] = 'modifyPerfil/recoverUpdatePassword/$1';
//$route['private/recoverUpdatePassword'] = 'modifyPerfil/recoverUpdatePassword';
$route['private/modifyLosedPassword/'] = 'modifyPerfil/modifyLosedPassword';


//parte privada
$route['private'] = 'home/indexPrivada';

//listado usuarios
$route['private/listadoUsuarios'] = 'adminUsuario/usuarios';
$route['private/listadoUsuarios/add'] = 'adminUsuario/usuarios';
$route['private/listadoUsuarios/insert'] = 'ruta/modificarRuta';
$route['private/listadoUsuarios/insert_validation'] = 'adminUsuario/usuarios';
$route['private/listadoUsuarios/success/:any'] = 'adminUsuario/usuarios';
$route['private/listadoUsuarios/delete/:any'] = 'adminUsuario/usuarios';
$route['private/listadoUsuarios/read/:any'] = 'adminUsuario/usuarios';
$route['private/listadoUsuarios/edit/:any'] = 'adminUsuario/usuarios';
$route['private/listadoUsuarios/update_validation/:any'] = 'adminUsuario/usuarios';
$route['private/listadoUsuarios/update/:any'] = 'adminUsuario/usuarios';
$route['private/listadoUsuarios/ajax_list_info'] = 'adminUsuario/usuarios';
$route['private/listadoUsuarios/ajax_list'] = 'adminUsuario/usuarios';

//listado coches

$route['private/listadoCoches'] = 'adminCoche/coches';
$route['private/listadoCoches/add'] = 'adminCoche/coches';
$route['private/listadoCoches/insert'] = 'adminCoche/coches';
$route['private/listadoCoches/insert_validation'] = 'adminCoche/coches';
$route['private/listadoCoches/success/:any'] = 'adminCoche/coches';
$route['private/listadoCoches/delete/:any'] = 'adminCoche/coches';
$route['private/listadoCoches/read/:any'] = 'adminCoche/coches';
$route['private/listadoCoches/edit/:any'] = 'adminCoche/coches';
$route['private/listadoCoches/update_validation/:any'] = 'adminCoche/coches';
$route['private/listadoCoches/update/:any'] = 'adminCoche/coches';
$route['private/listadoCoches/ajax_list_info'] = 'adminCoche/coches';
$route['private/listadoCoches/ajax_list'] = 'adminCoche/coches';

//listado coches
$route['private/listadoRuta'] = 'adminRuta/rutas';
$route['private/listadoRuta/add'] = 'adminRuta/rutas';
$route['private/listadoRuta/insert'] = 'adminRuta/rutas';
$route['private/listadoRuta/insert_validation'] = 'adminRuta/rutas';
$route['private/listadoRuta/success/:num'] = 'adminRuta/rutas';
$route['private/listadoRuta/delete/:num'] = 'adminRuta/rutas';
$route['private/listadoRuta/read/:num'] = 'adminRuta/rutas';
$route['private/listadoRuta/edit/:num'] = 'adminRuta/rutas';
$route['private/listadoRuta/update_validation/:num'] = 'adminRuta/rutas';
$route['private/listadoRuta/update/:num'] = 'adminRuta/rutas';
$route['private/listadoRuta/ajax_list_info'] = 'adminRuta/rutas';
$route['private/listadoRuta/ajax_list'] = 'adminRuta/rutas';



//listado de aparcamientos
$route['private/listadoAparcamiento'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/add'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/insert'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/insert_validation'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/success/:any'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/delete/:any'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/read/:any'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/edit/:any'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/update_validation/:any'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/update/:any'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/ajax_list_info'] = 'adminParking/parkings';
$route['private/listadoAparcamiento/ajax_list'] = 'adminParking/parkings';


//listado de zonas
$route['private/listadoZona'] = 'adminZona/zonas';
$route['private/listadoZona/add'] = 'adminZona/zonas';
$route['private/listadoZona/insert'] = 'adminZona/zonas';
$route['private/listadoZona/insert_validation'] = 'adminZona/zonas';
$route['private/listadoZona/success/:any'] = 'adminZona/zonas';
$route['private/listadoZona/delete/:any'] = 'adminZona/zonas';
$route['private/listadoZona/read/:any'] = 'adminZona/zonas';
$route['private/listadoZona/edit/:any'] = 'adminZona/zonas';
$route['private/listadoZona/update_validation/:any'] = 'adminZona/zonas';
$route['private/listadoZona/update/:any'] = 'adminZona/zonas';
$route['private/listadoZona/ajax_list_info'] = 'adminZona/zonas';
$route['private/listadoZona/ajax_list'] = 'adminZona/zonas';


//listado de comentarios
$route['private/listadoComentario'] = 'adminComentario/comentarios';
$route['private/listadoComentario/add'] = 'adminComentario/comentarios';
$route['private/listadoComentario/insert'] = 'adminComentario/comentarios';
$route['private/listadoComentario/insert_validation'] = 'adminComentario/comentarios';
$route['private/listadoComentario/success/:any'] = 'adminComentario/comentarios';
$route['private/listadoComentario/delete/:any'] = 'adminComentario/comentarios';
$route['private/listadoComentario/read/:any'] = 'adminComentario/comentarios';
$route['private/listadoComentario/edit/:any'] = 'adminComentario/comentarios';
$route['private/listadoComentario/update_validation/:any'] = 'adminComentario/comentarios';
$route['private/listadoComentario/update/:any'] = 'adminComentario/comentarios';
$route['private/listadoComentario/ajax_list_info'] = 'adminComentario/comentarios';
$route['private/listadoComentario/ajax_list'] = 'adminComentario/comentarios';

//listado de historial de aparcamiento
$route['private/listadoAparcaCoche'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/add'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/insert'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/insert_validation'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/success/:any'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/delete/:any'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/read/:any'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/edit/:any'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/update_validation/:any'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/update/:any'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/ajax_list_info'] = 'adminHistorialParking/historialAparcamientos';
$route['private/listadoAparcaCoche/ajax_list'] = 'adminHistorialParking/historialAparcamientos';


//listado de historial de aparcamiento
$route['private/listadoRutaRealizada'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/add'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/insert'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/insert_validation'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/success/:any'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/delete/:any'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/read/:any'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/edit/:any'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/update_validation/:any'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/update/:any'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/ajax_list_info'] = 'adminRutaRealizada/rutaRealizada';
$route['private/listadoRutaRealizada/ajax_list'] = 'adminRutaRealizada/rutaRealizada';