# manija-web #
Esto es una página web básica desarrollada utilizando tecnologías de redes, con PHP como lenguaje primario.

# DESARROLLO #

## Nombre y Descripción
- ManijaWeb es una Aplicación Web simple de formulario login desarrollada como prueba de conocimiento de conceptos básicos de desarrollo web, programación en PHP y JavaScript, utilización de HTML/CSS, integración de Base de Datos, aplicación de librerias y manejo de directorios.
- También incluye un sistema de administracion de productos, donde podemos gestionarlos y listarlos.
- Incluimos tambien configuraciones de accesibilidad, como el tema en modo claro/oscuro y el permitir cambiar la fuente de la página.

## Tecnologias
* PHP, como principal lenguage backend.
* HTML5/CSS
* JavaScript
* MariaDB, como base de datos.

## Autores
* Desarrollo y Mantenimiento por ManijaWeb Team.

Integrantes:
- Ferger, Ariel.
- Gallardo Octavio.
- Krans, Máximo.
- Leonetti, Franco.
- Zaragoza, Juan Ignacio.


# UTILIZACIÓN #

## Login y Registro de cuentas
- Para ingresar a la página, debemos registrar una cuenta nueva.
- Luego, entrar con nuestro usuario y contraseña, también realizando un captcha.
* Por defecto tenemos un usuario público con las siguientes credenciales asignadas:
->usuario: fcytuader
->contraseña: programacionavanzada
- La aplicación unicamente acepta como validos estos parametros, dados por la consigna, como llave de ingreso.
- Si el captcha no se realiza, o se responde incorrectamente, tampoco se permite el ingreso a la página.
- El captcha muestra un código de cinco letras y números. Se valida en PHP con la sesión, acepta mayúsculas o minúsculas y se puede generar otro código desde el formulario. No necesita claves ni servicios externos.

## Administración de Productos
- Al ingresar en la pestaña de administración podremos ver un formulario de creación de productos.
- Al crear un producto con nombre, precio y descripción, podremos darlo de alta en nuestra base de datos.
- Los productos cargados se muestran en esta misma pestaña en un listado.
- Desde esta pestaña se nos permite administrar la lista de productos:
* Podremos editar la información del producto cargado
* Se puede eliminar productos de la lista

## Accesibilidiad y Personalización
- En la pestaña de administración se tiene acceso a opciones de accesibilidad:
* Tema de la página entre claro y oscuro.
* Selección de fuente para facilitar la lectura.


# ENUNCIADOS #

## Contexto ##
Deberán realizar un trabajo práctico con el fin de profundizar los conocimientos adquiridos en la teoría y práctica a fin de resolver problemas reales del desarrollo de sistemas.

Este Trabajo Práctico consiste en desarrollar parte de un software de administración de algún tema que les sea de interés. 

## Los requerimientos iniciales son:

- ENTREGA 1:

* Utilizar PHP como lenguaje backend.
* Utilizar HTML5/CSS.
* Desarrollar un formulario de Login (usuario y contraseña) para autenticar el ingreso a su aplicación.
* Desarrollar un script en javascript que valide que estos datos no estén vacíos. Recién pasada esta validación se deberá habilitar el botón de envío de datos del formulario.
* Desarrollar un script PHP denominado "procesoLogin.php" el cual debe validar los datos enviados por el Form y comprobar el correcto ingreso con el usuario y contraseña:
->usuario: fcytuader.
->contraseña: programacionavanzada.

Si es correcta la autenticación mostrar el texto "ingreso correctamente" en caso contrario informarlo y volver al Form inicial.
* Crear la estructura de directorios necesarias para alojar imágenes, script en javascript, php, css, etc.
* Programación de la cabecera (header)  y del pie (footer) de la aplicación.

Adjuntar un comprimido en el formato que desee, conteniendo todo el código fuente funcional y un archivo con el nombre del grupo y los integrantes.
El TP se evalúa con una nota de 0 a 100, dependiendo del cumplimiento del requerimiento del mismo, contemplando los detalles en su desarrollo.

- ENTREGA 2:

* Captcha con su respectiva validación al formulario de login.
* Utilización de sesiones y verificación.
* Redirección luego de un correcto login  a una página inicio.php la cual deberá mostrar una bienvenida a nuestro sitio.
* En caso de que el login no sea correcto, informarlo y volver al Form inicial.
* El proceso de login deberá contemplar que el usuario ingrese correctamente el valor del captcha. 

* Una vez realizada la autenticación se deberá:
-> Crear una session y almacenar el nombre del usuario en la misma. 
-> Redireccionar la navegacion a un script inicio.php el cual deberá tener incluidos el header y footer. El header deberá mostrar la leyenda "Logueado como: <<nombreDelUsuario>>.
-> Solamente podremos acceder al script inicio.php si está creada la session (si el usuario se ha logueado correctamente). De no ser así se deberá redirigir la navegacion al formulario de login.

- ENTREGA 3:

* Incorporar un ABM (Alta, Baja y Modificación) al sistema desarrollado hasta al momento y que dicho ABM persista en una Base de Datos.
* Autenticar el usuario y la contraseña con la BD. 
* Crear una base de datos en el SGBD, que contemple como mínimo una tabla para el/los usuario/s y contraseña/s,  y otra para almacenar los datos del producto elegido para el ABM.
* Validar la conexión a la base de datos, identificando si esta falla, y mostrando un texto amigable al usuario.
* Incluir código JavaScript al menos en las validaciones del login.
* Incluir y utilizar al menos una librería JavaScript ( ej: DataTables).
* Sera contemplado la incorporación de una estructura MVC (Modelo, Vista, Controlador) y/o similares.

## MVC sencillo

La vista `pages/administracion.php` carga el controlador `controladores/productos.php`. El controlador revisa sesión, formulario y datos; después llama a las funciones de `modelos/producto.php`. El modelo usa `config/conexion.php` y ejecuta las consultas. La vista muestra los resultados.

El login sigue el mismo reparto: `pages/login.php` muestra el formulario, `php/procesoLogin.php` lo procesa y `modelos/usuario.php` busca al usuario. No usamos un framework ni un sistema de rutas nuevo.

## Si falla la base

Si MySQL está apagado o la configuración es incorrecta, aparece un mensaje que explica que no se pudo acceder a la base. En Administración no se muestra el formulario para guardar hasta recuperar la conexión. El detalle técnico va al registro de PHP, no a la pantalla.