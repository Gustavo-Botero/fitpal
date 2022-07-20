Objetivo:
Crear un API que permita administrar la oferta de clases de Fitpal.

Caso de estudio
Se requiere desarrollar un API con sus respectivos Endpoints los cuales permitan
gestionar toda la creación, consulta, actualización y eliminación de clases y horarios de
Fitpal.
El candidato deberá usar el framework Laravel en conjunto con una base de datos Mysql.
Requerimientos específicos
● Cada clase puede estar disponible varias veces en la semana a diferente hora.
● Al momento de consultar las clases disponibles el sistema solo deberá retornar
clases que inicien máximo 8 días después.
● El llamado de clases debe estar paginado.

Instrucciónes para correr el proyecto
- Instalar composer para poder correro el proyecto (esta en laravel)
- Crear el archivo .env a partir del .env.example
- Configurar la base de datos en el archivo .env creado
- correr el comando en la terminal php artisan migrate:fresh --seed
- Correr el comando php artisan server

Consumo de los Endpoint

- Get: api/v1/horarioClase - Consultar el listado de horarios de las clases disponibles no mayor a 8 días
- Post: api/v1/horarioClase - Crear un horario para las clases, los datos a enviar: 
        - clase_id
        - horario (2022-07-18 19:21:32)
        - nombre del instructor
- Get: api/v1/horarioClase/{horarioClase} - Consultar un horario de la clase por id (horarioClase)
- Put: api/v1/horarioClase/{horarioClase} - Actualizar el horario para las clases, los datos a enviar:
        - clase_id
        - horario (2022-07-18 19:21:32)
        - nombre del instructor
- Delete: api/v1/horarioClase/{horarioClase} - Eliminar el horario de clase por id (horarioClase)
