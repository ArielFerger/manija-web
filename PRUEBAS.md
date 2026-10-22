# Comprobaciones de la entrega

Pruebas realizadas con PHP 8.2.12, Apache y MySQL Community Server 8.4.13.

- Correcto: Pantalla protegida sin sesión.
- Correcto: Login rechaza campos vacíos.
- Correcto: Captcha incorrecto rechazado.
- Correcto: Contraseña incorrecta rechazada.
- Correcto: Usuario con intento de SQL no entra.
- Correcto: Login correcto desde la base.
- Correcto: Alta persistida y mensaje de éxito.
- Correcto: Texto escapado al mostrar.
- Correcto: Recarga mantiene el alta.
- Correcto: Formulario de edición precargado.
- Correcto: Modificación y precio cero.
- Correcto: PHP rechaza precio negativo.
- Correcto: PHP rechaza precio fuera del formato.
- Correcto: PHP rechaza nombre vacío.
- Correcto: Formulario sin token válido rechazado.
- Correcto: Edición de producto inexistente rechazada.
- Correcto: DataTables incluido en pantalla.
- Correcto: Caída de MySQL muestra error amigable en ABM.
- Correcto: Formulario para guardar no disponible durante la caída.
- Correcto: Caída de MySQL muestra error amigable en login.
- Correcto: Producto persiste después de reiniciar MySQL.
- Correcto: Baja elimina el producto de la base.
- Correcto: La baja persiste al recargar.
- Correcto: Cerrar sesión vuelve a proteger el ABM.

También se revisó en el navegador: botón de login deshabilitado con campos pendientes; validación del formulario de productos; alta; formulario de edición precargado; DataTables con búsqueda y paginación. Se quitaron los productos de prueba después de verificar el sistema.

Los 15 archivos PHP pasaron php -l.

## Registro de usuarios

- Correcto: Login incluye acceso al registro.
- Correcto: Acceso GET al proceso vuelve al formulario.
- Correcto: Registro rechaza usuario vacío.
- Correcto: Registro rechaza caracteres inválidos.
- Correcto: Registro rechaza contraseña corta.
- Correcto: Registro rechaza contraseña demasiado larga.
- Correcto: Registro rechaza contraseñas distintas.
- Correcto: Registro rechaza token incorrecto.
- Correcto: Registro crea usuario y vuelve al login.
- Correcto: Registro rechaza usuario duplicado.
- Correcto: Registro rechaza duplicado con mayúsculas.
- Correcto: Contraseña guardada como hash.
- Correcto: Usuario registrado puede iniciar sesión.
- Correcto: Usuario registrado accede al ABM.
- Correcto: Registro redirige usuarios autenticados.

Después de agregar el registro, los 17 archivos PHP pasaron la revisión de sintaxis. Las cuentas creadas durante las pruebas fueron eliminadas.
