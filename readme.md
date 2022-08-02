# Talently Challenge

## Configuración

Este repositorio incluye la configuración inicial para este problema, incluyendo los specs. Usa la librería de [Kahlan](http://kahlan.readthedocs.org/en/latest/), que probablemente no has usado. Pero no te preocupes, no hay mucho que aprender. Revisa los specs y entenderás la sintaxis básica en menos de un minuto.

Tu tarea es:

1. Refactorizar el código en la clase `VillaPeruana.php`.
2. Agregar un nuevo typo de elemento, "Café". Las especificaciones para este elemento están comentadas en el archivo `VillaPeruanaScpec.php`.

## Flujo

Debes tener instalado docker en tu computadora para usar nuestros comandos del flujo de trabajo

- Usa el comando `./start` para inicializar el docker
- Usa el comando `./test` para correr los tests
- Usa el comando `./finish` para desactivar el docker

# Reglas

Hola y bienvenido al equipo La Villa Peruana. Como sabes, somos una pequeña posada, con una excelente ubicación en una ciudad importante, administrada por nuestra amigable Allison. También compramos y vendemos los más finos productos. Desafortunadamente, nuestros productos se van desgradando constantemente en calidad conforme se acercan a su fecha de vencimiento. Tenemos un sistema que actualiza nuestro inventario por nosotros. Fue desarrollado por un desarrollador llamado Elmo, quien ha ido en busca de nuevas aventuras.

Queremos agregar una nueva categoría de productos al sistema y para ello necesitamos tu ayuda.

Primero, una introducción a nuestro sistema:

- Todos los productos tienen un SellIn que denota el número de días que se tienen para vender el producto
- Todos los productos tienen un Quality que denota cuán valioso es el producto
- Al final de cada día, nuestro sistema disminuye los ambos valores para cada producto

Bastante simple, ¿verdad? Bueno, acá se pone interesante:

- Cuando la fecha de venta ha pasado, el Quality se degrada dos veces más rápido
- El Quality de un producto nunca es negativo
- Los productos "Pisco Peruano", en realidad, incrementan en Quality mientras más viejos están
- El Quality de un producto nunca es mayor a 50
- Los productos "Tumi", siendo un producto legendario, nunca debe ser vendido o bajaría su Quality
- Los "Tickets VIP", así como "Pisco Peruano", incrementan su Quality conforme su SellIn se acerca a 0, el Quality incrementa en 2 cuando faltan 10 días o menos y en 3 cuando faltan 5 días o menos, pero el Quality disminuye a 0 después del concierto.

Recientemente hemos firmado un contrato con un proveedor de productos de "Café". Esto require una actualización para nuestro sistema:

- Los productos de "Café" se degradan en Quality el doble que los productos normales

Para dejarlo claro, un producto nunca puede incrementar su Quality mayor a 50, sin embargo "Tumi" es un producto legendario y como tal su Quality es 80 y nunca cambia.

# Entregable o Expectativa del reto

- La limpieza y legibilidad del código será considerada.
- La eficiencia del código en cuestiones de rendimiento sumarán para esta prueba.
- Será indispensable uso de principios S.O.L.I.D.
- Al finalizar el reto, enviar el enlace de la solución a emmanuel.barturen@talently.tech con copia a cristian@talently.tech con título "Reto Talently Backend"

# Preguntas de conocimiento en Laravel

1. Qué paquete o estrategia utilizarías para levantar un sistema de administración rápidamente? (Autenticación y CRUDs)
Para crear un sistema de administración rápido y bien elaborado, llevaría a cabo los siguientes pasos
:
1. Instalaría una extension en mi IDE (Visual Studio Code) , laravel Snippets, para generar código reutilizable con atajos de teclado o prefijos. 
2. Crearía la BD y las migraciones de las tablas correspondientes para el uso de CRUD, con los atajos mencionados. comandos(php artisan make:migration proyecto/php artisan mígrate)

3. Instalaría la interfaz gráfica, con laravel/UI, para la integración de bootstrap y la autenticación del login.(npm Install).
4. Para generar rapidamente funcionalidades de un CRUD  instalaría el paquete de CRUD generator comandos(require ibex/crud-generator --dev)(php artisan vendor:publish --tag=crud)(php artisan make:crud proyecto)
Esto generará varios archivos del MVC de laravel  y sus funciones.
5. Configuramos algunos ajustes de rutas, validaciones del login y registro (utilizando middleware) y por ultimo algunos detalles finales del proyecto. 



2. Una breve explicación de cómo laravel utiliza la injección de dependencias
En el código de una clase normal cada vez que se crea una instancia se puede acceder a los métodos desde la variable de instancia, por ejemplo: $instancia1  = new LaClase(); $instancia2 = new LaClase(),$instancia1->metodo_constructor(), $instancia2->metodo_constructor()...
En cambio al usar el IOC container  de laravel se puede inyectar clases (dependencias) atraves del constructor de un controlador, este resolverá dicha instancia por nosotros y sus dependencias y las dependencias de las dependencias, evitando crear mas instancias y llamadas al constructor de la clase, incluso usando una mejor manera por medio de interfaces. Ejemplo: $instancia_unica = new LaClase; 
$instancia_unica->metodo_clase('Interfaz1', 'Clase1');
$instancia_unica->metodo_clase('Interfaz2', 'Clase2');
$controller = $instancia_unica-> metodo_constructor('ControllerConstructor');

3. En qué casos utilizarías un Query Scope?
Dependiendo de la necesidad del requerimiento se puede usar Global Scope (para múltiples modelos) o local Scope (para un modelo en concreto) que sirva como filtro de los resultados obtenidos de una consulta. 
En el caso de un proyecto se requiera trabajar con los usuarios activos y que no se muestre los usuarios inactivos en ninguna parte del sistema utilizamos Global Scope:  $query->where('active', true);
En cambio el uso de Local Scope lo aplicamos a sentencias que podamos usar frecuentemente pero no como lo hace un Global Scope, por ejemplo en el caso de consultar usuarios del genero femenino registrados en el mes actual:  return $query->where('gender', 'female') ->whereMonth('created_at', now()->month);

4. Qué convenciones utilizas en la creación e implementación de migraciones?
Utilizo las siguientes convenciones para migraciones, siempre procurando usar nombres en Inglés:

PascalCase: para llamar un modelo por ejemplo: el modelo "UserProfile", "ProductCategory", para las propiedades de estos modelos utilizo la convención: 

snake_case: en minusculasas, "$user->name", "$order->created_at"

Para llamar los métodos utilizados en estos modelos utilizo la convención:

camelcase: por ejemplo, "public function index(), public function getUserByEmail()"

* Las tablas de la base de datos son nombradas en plural y utilizando la convención "sanke_case"
users, categories, failed_jobs

* Las relaciones son nombradas en la convención camelcase.
* Las relaciones de tipo hasMany, belongsToMany, morphMany deben indicarse en plural. "$continent->countries()" 
*Las relaciones de tipo hasOne, belongsTo, morphTo deben de indicarse en singular. "$phone->owner()"
*En algunos casos habilito los  timestamps.
