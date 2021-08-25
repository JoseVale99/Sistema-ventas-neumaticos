<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



## Configuración

### Configurar el archivo .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR DATABASE
DB_USERNAME=YOUR USERNAME
DB_PASSWORD=YOUR PASSWORD
```
## Actualizar dependecias
```
 composer update ; Descarga las depencias necesarias para ejecutar el sistema. 
```

### Comandos
```bash
   - php artisan migrate -> Migrar las tablas 
   - php artisan migrate --seed -> Migrar las tablas  y seeders.
   - php artisan migrate:fresh -> Sí ya antes se migraron las tablas ejecutar este comando para realizar los cambios realizados.
   - php artisan migrate:fresh  --seed ->  Sí ya antes se migraron las tablas ejecutar este comando para realizar los cambios y enviar los seeders.
   - php artisan storage:link  -> Una vez que se ha almacenado un archivo y se ha creado el enlace simbólico, puede crear una URL a los archivos utilizando el asistente de activos.
```


