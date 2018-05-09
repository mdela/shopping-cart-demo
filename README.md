# Shopping Cart Demo
Aplicación web de facturación simple con carrito de compras en Laravel

# How do I get set up?

1. Una vez instalado el proyecto a nivel local, ubicar el archivo de configuración del entorno (.env) en la raíz del proyecto para setear la conexión a la base de datos.

2. Ejecutar las migraciones y seeders para poblar las tablas principales del sistema (Productos, stock, facturas, etc.) comando : php artisan migrate --seed

3. Por último, levantar la aplicación con el comando: php artisan serve //localhost:8000

# Features
- Alta de facturas asociadas a cliente 
- Adición de varios items (inlcuso del mismo tipo) al carrito de compras. 
- Almacenamiento en sessión de información de la compra que se desea realizar. 
- Formulario simple para el registros de los datos del cliente y su dirección de envío.
- Plataforma multilenguaje

# TODO
- Sistema de autentícación 
- Control de stock para cada producto facturado 
- Selección mediante dropdown de la cantidad de productos del mismo tipo que se quiere (actualmente debe hacerse click sobre "Añadir a carrito" tantas veces se quiera adquirir un producto) 
- TDD para futuras funcionalidades
