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

/*$route['private/listadoRutas/add'] = 'ruta/modificarRuta';
$route['private/listadoRutas/insert'] = 'ruta/modificarRuta';
$route['private/listadoRutas/insert_validation'] = 'ruta/modificarRuta';
$route['private/listadoRutas/success/:num'] = 'ruta/modificarRuta';
$route['private/listadoRutas/delete/:num'] = 'ruta/modificarRuta';
$route['private/listadoRutas/read/:num'] = 'ruta/modificarRuta';
$route['private/listadoRutas/edit/:num'] = 'ruta/modificarRuta';
$route['private/listadoRutas/update_validation/:num'] = 'ruta/modificarRuta';
$route['private/listadoRutas/update/:num'] = 'ruta/modificarRuta';
$route['private/listadoRutas/ajax_list_info'] = 'ruta/modificarRuta';
$route['private/listadoRutas/ajax_list'] = 'ruta/modificarRuta';*/

