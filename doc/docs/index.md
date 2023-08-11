# Laravel

Laravel es un Framework de php 

## Instalar herramientas para usar Laravel

Composer

https://getcomposer.org/


Node.js

https://nodejs.org/en/


Visual Studio Code - Code Editing. Redefined

https://code.visualstudio.com/


https://github.com/platzi/introduccion-laravel-9/commit/fd3e85bf35da3c64217a5e45b84dfcb5c0b79d8f

https://github.com/platzi/introduccion-laravel-9/commit/fd3e85bf35da3c64217a5e45b84dfcb5c0b79d8f


Laravel - The PHP Framework For Web Artisans

https://laravel.com/

## Instalar Laravel en apache 

https://ubunlog.com/laravel-framework-php-ubuntu/

## Para instalar en apache con enlace símbolico hacer lo siguiente:

Crear un proyecto en un directorio común ejemplo home/documentos/laravel

El enlace simbólico lo vamos a crear a la carpeta public de laravel para eso es necesario darle permisos 777 recursivo a el directorio storage de laravel

Luego en el directorio de apache crear el enlace simbólico de la siguiente manera

ln -s home/documentos/laravel/public nombredelacarpetaenapache(cualquiera) 

A continuación creamos un virtual host y recargamos la configuración de apache y listo 

## Estructura de carpetas

APP : Aqui vivira todo nuestro codigo principal.

Bootstrap: Utilizada por laravel para mejorar el rendimiento

config: Cada paquete que se instale. Se genera un archivo que se puede editar y modificar.

Database : Carpeta principal de las bases de datos

a. migrations : Archivos con la estructura principal para desarrollar tablas.

b. factories: nos permite desarrollar datos falsos para probar aplicacion

c. seeders: encargada de ejecutar los factories que desarrollemos

lang: idioma

public: punto de acceso a web.

resources: archivos originales css,javascript y vistas

routes: configuramos rutas del trabaja principalmente en web.php

storage: elementos generados por laravel. cache o si usuario guarda muchos archivos se pueden guardar hay.
11 test: Pruebas

vendor: Nose toca esta carpeta. Hay se ve todo lo que se instala con composer.

## Comando artisan 

Ingrese en la consola **php artisan** y vea la lista de comandos de artisan 

Para saber más sobre el comando puede usar php artisan --help 

**Ejemplo:**

php artisan make:controller nameController 
php artisan make:model nameModel

## Modelos en Laravel

Un modelo es una clase, que representa una tabla ejemplo el modelo usuarios

## Controlador 

Manejo de peticiones

Un controlador es una clase que permite gestionar las diferentes solicitudes de los usuarios.

Los controladores es el componente donde nos permite agrupar de una mejor manera las peticiones http, es el intermediario entre las vistas y los modelos, se encarga de realizar la lógica del negocio y controles necesarios de las solicitudes que llegan.

## Routes 

Las rutas se gestionan en el directorio routes/web.php


## Usando Post

Post::get();-> Trae todos los registros de la base de datos
Post::frist();-> Trae el primer registro de la base de datos
Post::find(id); -> Busca un registro en la base de datos por medio de su id
Post::latest(); -> Trae todos los registros de la base de datos, y los ordena de forma descendente

adicional, podemos utilizar el método paginate(), para realizar la paginación, solo no nos debemos de incluir en nuestras vistas la propiedad links() para que podamos visualizar los controles de paginación

## Eloquent

Se uitliza  para administración de base de datos en laravel, la sintaxis eloquent nos permite realizar  consultas sin usar  código sql.

Laravel incluye Eloquent, un mapeador relacional de objetos (ORM) que hace que sea agradable interactuar con su base de datos. Al usar Eloquent, cada tabla de la base de datos tiene un "Modelo" correspondiente que se usa para interactuar con esa tabla. Además de recuperar registros de la tabla de la base de datos, los modelos Eloquent también le permiten insertar, actualizar y eliminar registros de la tabla

## Comando artisan

Para ver los comandos artisan ejecuta php artisan --help, lista de comando con php artisan list

## Rutas

Para la gestión de rutas podemos usar las siguientes sentencias 

Route::get    | Consultar 
Route::post   | Guardar
Route::delete | Eliminar
Route::put    | Actualizar


## Crear datos de prueba 

Para crear datos de pruebas se requiere hacerlos en los factories en DataBase. Se requiere crear un archivo con el nombre del modelo y definir la estructura de esos datos de prueba. Antes debe existir una migración que crear la estructura de base de datos.  Luego en el seeder archivo SEED de la Base de datos se define la ejecución de esos datos. Recordemos que un modelo representa una tabla en base datos por lo que la relación entre modelo, controlador, factories y database es fundamental.

Crear archivos con datos de prueba y seed o registros iniciales no es obligatorio.

Un modelo representa una tabla de base de datos en laravel. Para correr un factory es obligatorio tener un modelo

## Crear una SPA con laravel jetstream e inertia

# Lista de comandos

Jetstream es un componente que nos permite incorporar el inicio de sesión, registro, verificación de email, etc, dentro de Laravel.

Y además podemos utilizar un sistema llamado Inertia.js que usa como motor de vista componentes de Vue.js. Todo diseñado con el Framework CSS de Tailwind.

composer create-project laravel/laravel LaravelSPA

composer require laravel/jetstream

En este caso vamos a usar inertia para uar vuejs

php artisan jetstream:install inertia


# Lenguaje 

En laravel 10 se añade con el comando php atisan lang:publish

En la versión 10 no es visible el directorio lang, ejecutando el siguiente comando se genera ese directorio.

# Conveción para los modelos 

Cuando creamos una migraciones establecemos el nombre de la tabla en base de datos en ingles y plural, para gestionar un modelo utilizamos el nombre en ingles y singular de esta forma laravel comprende la tabla que va a gestionar a través de laravel.

# Algunas convenciones de Eloquent 

$posts = Post::get(); Todos los registros
$post  = Post::first(); El primer registro
$post  = Post::find(25); Busqueda por id

dd($post); es una función que permite visualizar los registros en pantalla en otro formato

# Eloquent 

A través de Eloquent podemos realizar relación de tablas, por ejemplo si tenemos un registro de usuarios que gestionan comentarios, entonces los comentarios se encuentra relacionados con un usuario, es decir un usuario en particular registra sus comentarios. 

**Ejemplo de un tipo de campo:**

Para crear un campo sin signo es decir que solo acepta números positivos y acpete de tiṕo enteros se establece de la siguiente manera:

$table->unsignedBigInteger('user_id');

**Campo foraneo para realizar relaciones**

$table->foreign('user_id')->references('id')->on('users');

Con esta última sentencia decimos: Una vez creado el campo user_id entonces seleccionamos dicho campo como un campo foraneo, la referencia por el id, en la tabla users.

Luego de ejecutar los seeders y las migraciones tenemos el campo sobre nuestros regsitros de base de datos para posts, sin embargo; se le debe especificar a laravel a través del modelo de dicha relación para tener activo el objeto del usuario con dicho id. 

A través de la llave foranea tenemos el objeto user completo en cada registro de publicación 

Es importante resaltar que el metodo a declarar en modelo debe ser el nombre en singular del objeto con el cual se va a relacionar. ejemplo user.

# Brezze

Es un componente de laravel para incorporar por defecto las utilidades como iniciar sesión, cambiar contraseña, confirmar correo electrónico etc.

**Instalar Laravel Brezze**

composer require laravel/breeze --dev

php artisan breeze:install

Para el caso de Breeze tambien podemos usar vuejs y react 

# Jetstream 

Es un componente de laravel para incorporar por defecto las utilidades como iniciar sesión, cambiar contraseña, confirmar correo electrónico etc.

Adicional podemos especificar que vamos a usar si inertia o liveware. Por su parte si se desea usar vuejs se recomienda usar inertia para aprovechar de su potencial.

# csrf_token

CSRF (Cross-site request forgery) es un tipo de ataque que consiste en que un usuario puede intentar hacer muchas peticiones en nombre de otro. Para esto Laravel genera con cada sesión un token que se usará para validar que exista el usuario en el sistema y que sea él quien está haciendo la petición.

# Otras rutas

El archivo web.php incluye la mayoría de rutas sin embargo algunas otras se pueden registrar en otros archivos ejemplo:

auth.php

# Listar una lista de rutas 

Usar el comando 

php artisan route:list

# Que es resource

Resource trae una pila de metodos es decir:


Route::resource('posts', PostController::class);

 GET|HEAD        posts ................................................................... posts.index › PostController@index
  POST            posts ................................................................... posts.store › PostController@store
  GET|HEAD        posts/create .......................................................... posts.create › PostController@create
  GET|HEAD        posts/{post} .............................................................. posts.show › PostController@show
  PUT|PATCH       posts/{post} .......................................................... posts.update › PostController@update
  DELETE          posts/{post} ........................................................ posts.destroy › PostController@destroy
  GET|HEAD        posts/{post}/edit ......................................................... posts.edit › PostController@edit
  
# Importante  para las rutas 

Si requiero conustar un registro lo puedo hacer como  $variable = Modelo::find(parametro enviado)

ejemplo

public function show($id){
 	$variable = Modelo::find(parametro enviado)
}

Esto lo hago cunado envio el parametro y lo especifico en la ruta 

Sin embargo actualmente odemos enviar el registro completo, especificar en la ruta el parametro de busqueda como  {registro:id}
y en controlador colocar como parametro el modelo y la variable como (Registro registro)

Ejemplo 1:

route('post', $post['id'])

Route::get('/post/{id}', 'show')->name('post');

public function show($id)
    {
        $post = Post::find($id);
        
        return $post;
    }


EJmeplo 2 simplicado :

route('post', $post)

Route::get('/post/{post:id}', 'show')->name('post');

public function show(Post $post)
    {
        return $post;
    }


Importante para filtrar registros 

Si están usando PostgreSQL y usan el where que usó el profe solo les va a mostrar los posts cuyas coincidencias son exactas, por ejemplo, si sus posts son “Ricas empanadas” y “Empanadas de pollo” y buscan “empanadas” solo les va a aparecer “Ricas empanadas” y NO “Empanadas de pollo” porque tiene una mayúscula.
Para que PostgreSQL ignore las mayúsculas y minúsculas hay que usar ILIKE en vez de LIKE


Iconos para tu aplicación 

https://github.com/tailwindlabs/heroicons

https://heroicons.com/

Paquetes para cualquier framework 

https://packagist.org/ 

Optimar el proyecto a través de un debug 

instalar un nuevo componente

composer require barryvdh/laravel-debugbar

Esto habilitará una barra de depuración, se recomienda usar esta solo en desarrollo.  para activar o desactivar esta. Se realiza a través del .env cambiando el valor booleano de APP_DEBUG

APP_DEBUG=true

Para optimizar una aplicación, una de las cosas mas importantes es no realizar una consulta desde la vista, es primordial hacerla desde el controlador,  a través del debug podemos ver este tipo de detalles.

Redireccionar 

Es posible crear una redirección en las rutas, en el archivo web.php

ejemplo:  Route::redirect('dashboard', 'posts')->name('dashboard');

De esta forma aunque la ruta sea dashboard, lo redirige a la ruta posts, directamente al index


# Conceptos importantes 

Concepto importantes a tener en cuenta:

Modelo == Tabla (o Entidad) en una database
Controlador == a un Archivo que se encarga de coordinar las diferentes solicitudes del usuario.
Factories == una estructura de datos falsos con la que vamos a probar la app.
Migración == estructura de una tabla que la vamos a tener dentro de Laravel, y luego creamos una tabla (o entidad) en la database.

# Ayuda de un comando  make

php artisan make --help

# Comando completo de inicialización para un CRUD

php artisan make:model nombredelmodelo en singular -rfm

r corresponde a resource de un controlador
f factory 
m migration 































  
  
  
  
  
  
  
