<img src="../extras/notas/imagenes/breeze.png">

# Laravel Breeze  

> Laravel Breeze es un kit de inicio minimalista, para una sencillísima implementacion de las características de autenticación de Laravel.   
> Incluye un sistema de login, un sistema de registro, uno de reseteo de contraseña, verificación de email y confirmación de contraseña. 
> Laravel Breeze implementa una capa predeterminada de vistas compuesta por plantillas Blade utilizando los estilos de Tailwind CSS.   
> Breeze provee un maravilloso punto de inicio para comenzar un nuevo proyecto Laravel.

- [ ] Crear proyecto nuevo  

        composer create-project laravel/laravel login

- [ ] Crear nueva base de datos

> Usando mySQL Workbench, phpMyAdmin o similar, crear una nueva base de datos  

- [ ] Configuramos el .env de nuestro proyecto para que apunte a esa nueva base de datos  

- [ ] Correr las migraciones     
  
        php artisan migrate    

- [ ] Descargamos Breeze usando composer    

        composer require laravel/breeze --dev  

> Luego que composer termina de descargar el package de Laravel Breeze, debemos terminar su instalación

- [ ]  Instalamos breeze    

        php artisan breeze:install    

> Este comando genera las vistas de autenticación, las routes, los controllers, y otros recursos de la instalación

- [ ] Instalar TailwindCSS y algo de Javascript    

        npm install
        npm run dev

> Breeze scaffolding installed successfully.

