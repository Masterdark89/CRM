# laravelProyect

## Descripción del proyecto
Aplicación web desarrollada con Laravel para gestionar contactos, personal, stock y artículos.

## Requisitos para ejecutarlo
- PHP 8.1 o superior
- Composer
- Node.js (16+) y NPM o Yarn
- MySQL o MariaDB
- Servidor local (XAMPP, WAMP) o entorno equivalente
- Extensiones PHP: `pdo`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo`

## Pasos básicos de instalación
1. Clona el repositorio:

```
git clone <repo-url>
cd laravelProyect
```

2. Instala dependencias PHP:

```
composer install
cp .env.example .env
```

3. Configura el archivo `.env` (datos de base de datos) y genera la clave de la aplicación:

```
php artisan key:generate
```

4. Ejecuta migraciones y seeders (si procede):

```
php artisan migrate
php artisan db:seed
```

5. Instala dependencias JS y compila assets:

```
npm install
npm run dev
```

6. Levanta el servidor de desarrollo:

```
php artisan serve
```

Nota: con XAMPP pon el `DocumentRoot` en la carpeta `public`.

## Usuario y contraseña de prueba (si procede)
- Usuario: `admin@example.com`
- Contraseña: `password`

Si los seeders del proyecto crean un usuario de prueba, ejecuta `php artisan db:seed`. Si no, crea el usuario manualmente.

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
