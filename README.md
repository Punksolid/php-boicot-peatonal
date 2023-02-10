BoicotPeatonal.ORG
======================
Codigo fuente del sitio web de Boicot Peatonal.ORG, hecho en Laravel

Requerimientos
--------------
- PHP 8.1 o superior
- Composer
- NodeJS
- NPM
- Git
- SQLite



Instrucciones de instalacion
----------------------------
1. Clonar el repositorio

``` git clone https://github.com/Punksolid/php-boicot-peatonal.git```
2. Instalar dependencias

```composer install```
3. Crear archivo de configuracion

```cp .env.example .env```
4. Generar clave de aplicacion

```php artisan key:generate```

5. Crear base de datos sqlite

    ```touch database/database.sqlite```
5. Configurar base de datos en el archivo .env usando ruta absoluta

```
DB_CONNECTION=sqlite
DB_DATABASE=/home/ps/projects/php-boicot-peatonal/database/database.sqlite
```

6. Correr migraciones

    ```php artisan migrate```

7. Correr servidor de desarrollo

    ```php artisan serve```

8. Instalar y correr npm
    
    ```npm install && npm run dev```
9. Abrir navegador en http://localhost:8000

10. Listo!


Para acceso al repositorio favor de pedirlo en punksolid@twitter o simplemente hacer un fork y hacer un pull request.
