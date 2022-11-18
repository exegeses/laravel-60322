<img src="imagenes/laravel-eloquent-orm.png">

# Eloquent ORM

> Laravel incluye Eloquent, un ORM (object-relational mapper) que simplifica la interacicón con bases de datos.  
> Al utilizar Eloquent, cada tabla de una base de datos tiene su Modelo correspondiente que se emplea para interactuar con dicha tabla.   
> Además de obtener registros de dicha tabla, los modelos de Eloquent posibilitan simplificaciones de inseción, modificación, y eliminación de registros de la tabla en cuestión.   


## Generación de un modelo: 
    php artisan make:model Nombre

## Generación de una controller
    php artisan make:controller NombreController

## Convenciones de nombres de Modelos

> Los nombres de las tablas utilizan un sistema de plurales, si necesitamos modificarlos, tenemos el atributo $table.

    protected $table = 'mi_tabla';  

> Eloquent también assume que cada modelo correspondiente a una tabla de la base de datostiene una primary key column llamada "id". Si necesitamos modificarla, podemos definir un atributo protected $primaryKey con el nombre del campo que sea nuestra primary key.

    protected $primaryKey = 'idProducto';  

> De manera predeterminada, Eloquent espera que todas las tablas de tu base de datos tengan los campos "created_at" y "updated_at"; y por lo tanto el modelo conlleva esta convensión.   
> Cuando se cree o modifique un modelo, Eloquena seteará los valores en estos campos.   
> Si no queremos que Eloquent opere con estos campos, o bien si no queremos modificar la estructura de nuestras tablas,debemos definir el atributo público $timestamps de nuestro modelo con el valor false.

    public $timestamps = false;  

