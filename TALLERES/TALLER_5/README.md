
# Sistema de Gestión de Información de Estudiantes

Este proyecto consiste en un sistema funcional para la gestión de información de estudiantes, utilizando PHP y conceptos avanzados de programación orientada a objetos (POO) y manejo de arreglos. El sistema permite agregar, buscar, filtrar, y generar reportes de estudiantes, así como realizar operaciones como la graduación de estudiantes y el cálculo de promedios.

## Características

 Gestión de estudiantes: Agrega estudiantes con sus materias y calificaciones
romedios y rendimiento**: Calcula el promedio y rendimiento de los estudiantes 
Búsqueda avanzada: búsqueda de estudiantes por nombre o carrera, incluyendo búsquedas parciales e insensibles a mayúsculas.
Graduación de estudiantes: posibilidad de graduar estudiantes, eliminándolos del sistema y archivándolos.
Ranking de estudiantes: generación de un ranking de los mejores estudiantes basado en su promedio.
Estadísticas por carrera: cálculo de estadísticas, como el promedio general de una carrera o el mejor estudiante de la misma.

## Estructura del Proyecto

El proyecto consta de dos clases principales:

### Clase `Estudiante`

Esta clase representa a un estudiante y tiene los siguientes atributos:

- `id`: identificador único del estudiante.
- `nombre`: nombre completo del estudiante.
- `edad`: edad del estudiante.
- `carrera`: carrera a la que pertenece el estudiante.
- `materias`: un arreglo asociativo que contiene las materias del estudiante y sus respectivas calificaciones.

#### Métodos

__construct(int $id, string $nombre, int $edad, string $carrera): Constructor para inicializar los atributos del estudiante.
agregarMateria(string $materia, float $calificacion): Añade una materia y su calificación.
obtenerPromedio(): Calcula y retorna el promedio de calificaciones del estudiante.
obtenerDetalles(): Retorna un arreglo asociativo con todos los detalles del estudiante.
__toString(): Método mágico para convertir el objeto en una cadena de texto que incluye el nombre y el promedio del estudiante.

### Clase `SistemaGestionEstudiantes`

Esta clase gestiona un grupo de estudiantes y provee funcionalidades para agregar estudiantes, buscar, filtrar y generar reportes.

#### Métodos

agregarEstudiante(Estudiante $estudiante): Añade un nuevo estudiante al sistema.
obtenerEstudiante(int $id): Obtiene un estudiante por su ID.
listarEstudiantes(): Retorna un arreglo con todos los estudiantes registrados.
calcularPromedioGeneral(): Calcula el promedio general de todos los estudiantes en el sistema.
obtenerEstudiantesPorCarrera(string $carrera): Retorna una lista de estudiantes de una carrera específica.
obtenerMejorEstudiante(): Encuentra al estudiante con el promedio más alto.
generarReporteRendimiento(): Genera un reporte por materia, indicando el promedio, la calificación más alta y la más baja.
graduarEstudiante(int $id): Gradúa a un estudiante, eliminándolo del sistema.
generarRanking(): Genera un ranking de los estudiantes, ordenados por su promedio.
buscarEstudiantes(string $query): Busca estudiantes por nombre o carrera, con soporte para búsquedas parciales.
generarEstadisticasPorCarrera(): Genera estadísticas como el promedio general y el mejor estudiante por carrera.

