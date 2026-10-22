# ManijaWeb - Entrega 3

Grupo 12 - ManijaWeb Team. Los integrantes están en `GRUPO12.md`.

Es la segunda entrega con usuarios y productos guardados en MySQL. Se mantienen el diseño, el captcha, las sesiones, el modo oscuro y la elección de fuente.

## Para ejecutarlo

Necesitás Apache, PHP 8.2 o superior con mysqli y mbstring, y MySQL 8.0 o superior. No hace falta Composer, Node ni conexión a Internet: las librerías vienen en la carpeta `librerias`.

1. Copiá la carpeta `manija-web` dentro de `htdocs`. En XAMPP para Windows suele ser `C:\xampp\htdocs`; en Linux, `/opt/lampp/htdocs`.
2. Iniciá Apache y **MySQL**. XAMPP trae MariaDB; si usás MySQL aparte, no inicies ambos en el mismo puerto.
3. Desde tu administrador de MySQL, importá `database/manija_web.sql`. Crea la base, las dos tablas y el usuario de prueba. El archivo no borra los productos si lo importás otra vez.
4. Como administrador de MySQL, ejecutá también `database/usuario_mysql.sql`. Crea una cuenta para que PHP acceda a la base. Si ya tenés una cuenta propia, podés usarla en el paso siguiente.
5. Revisá `config/conexion.php`: servidor `127.0.0.1`, usuario de MySQL `manija`, contraseña `manija123`, base `manija_web` y puerto `3306`. Cambiá esos valores si tu instalación usa otros.
6. Abrí `http://localhost/manija-web/`.

Para importar con la consola, desde la carpeta del proyecto:

```sh
mysql -u root -p < database/manija_web.sql
mysql -u root -p < database/usuario_mysql.sql
```

## Ingreso de prueba

- Usuario de la página: `fcytuader`
- Contraseña de la página: `programacionavanzada`
- Captcha: escribí el código que aparece en el formulario.

La cuenta `manija` es la conexión de PHP con MySQL. La cuenta `fcytuader` es la que se escribe en el login. Son cuentas distintas.

La contraseña del login se guarda como un hash creado con `password_hash`. `password_verify` comprueba lo escrito contra ese hash. No se compara con una contraseña fija en el código PHP.

## Qué guarda cada carpeta

| Carpeta | Contenido |
| --- | --- |
| `config` | La conexión a MySQL. Es el archivo que se cambia si el servidor tiene otro usuario o contraseña. |
| `database` | El SQL para crear la base, sus tablas y el usuario de conexión. |
| `modelos` | Las consultas a la base: buscar un usuario, listar, buscar, agregar, modificar y eliminar productos. |
| `controladores` | El control del ABM: recibe el formulario, revisa los datos, llama al modelo y prepara la lista para mostrar. |
| `pages` | Las pantallas de login, bienvenida y administración. Son las vistas. |
| `php` | El proceso del login, el cierre de sesión y la comprobación de sesión. |
| `php/includesBasics` | Partes compartidas: cabecera, pie, formulario y tabla de productos. También son vistas. |
| `js` | Validaciones del login y productos, confirmación de baja, configuración visual e inicio de DataTables. |
| `styles` | Los estilos propios de la página. |
| `image` | Las imágenes y el icono que ya tenía la segunda entrega. |
| `librerias` | Bootstrap, jQuery y DataTables descargados, para usarlos sin Internet. |

`index.php` redirige a inicio. Si no existe una sesión, inicio manda al login.

## Cómo funciona el ABM

1. En Administración, completá nombre, precio y descripción y presioná **Guardar producto**. Se ejecuta un `INSERT`.
2. **Editar** carga el producto en el mismo formulario. **Guardar cambios** ejecuta un `UPDATE`; **Cancelar edición** vuelve al alta.
3. **Eliminar** pide confirmación y envía un formulario que ejecuta un `DELETE`.
4. Cada envío vuelve a la lista. Actualizar el navegador no repite el alta.
5. DataTables permite buscar, ordenar por columnas y cambiar de página. Los productos se leen de MySQL, no de localStorage.

El precio acepta cero y hasta dos decimales, con un máximo de 99999999.99. El nombre admite 120 caracteres y la descripción 1000. PHP vuelve a validar los datos aunque se desactive JavaScript.

## MVC sencillo

La vista `pages/administracion.php` carga el controlador `controladores/productos.php`. El controlador revisa sesión, formulario y datos; después llama a las funciones de `modelos/producto.php`. El modelo usa `config/conexion.php` y ejecuta las consultas. La vista muestra los resultados.

El login sigue el mismo reparto: `pages/login.php` muestra el formulario, `php/procesoLogin.php` lo procesa y `modelos/usuario.php` busca al usuario. No usamos un framework ni un sistema de rutas nuevo.

## Si falla la base

Si MySQL está apagado o la configuración es incorrecta, aparece un mensaje que explica que no se pudo acceder a la base. En Administración no se muestra el formulario para guardar hasta recuperar la conexión. El detalle técnico va al registro de PHP, no a la pantalla.

## Requisitos incluidos

- Alta, baja, modificación y listado de productos persistentes en MySQL.
- Login autenticado con la tabla `usuarios` y contraseña con hash.
- Tablas `usuarios` y `productos`, con identificador propio y precio decimal.
- Mensajes amigables ante errores de conexión o consulta.
- Validación JavaScript del login y los productos.
- DataTables utilizado en la tabla, más Bootstrap y jQuery locales.
- Separación simple entre modelo, vista y controlador.
- Sesiones, captcha y protección de las pantallas internas de la segunda entrega.
- Consultas preparadas, escape de texto al mostrarlo y token de sesión en los formularios del ABM.

Los productos que antes estaban en localStorage no se importan automáticamente, porque pertenecen a cada navegador. La base entregada empieza sin productos para que puedan cargar los suyos.

## Registro de usuarios

Desde el login, **Crear cuenta** abre `pages/registro.php`. Se pide un usuario, contraseña de al menos 8 caracteres y su repetición. JavaScript revisa los datos y PHP vuelve a validarlos. Los nombres de usuario no se pueden repetir, tampoco cambiando sólo las mayúsculas.

`php/procesoRegistro.php` procesa el formulario y `modelos/usuario.php` guarda la cuenta con `password_hash`. Después vuelve al login con un mensaje de éxito. El registro usa la tabla `usuarios` existente: no hay que modificar ni volver a importar la base.

`js/validarRegistro.js` contiene las validaciones del formulario. Si MySQL está apagado, se muestra un mensaje amigable. Las cuentas registradas pueden iniciar sesión y usar el mismo ABM compartido que el usuario original.
