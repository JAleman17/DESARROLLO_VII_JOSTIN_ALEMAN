# TALLER 8: Sistema de Gestión de Biblioteca

## Configuración

1. Crea una base de datos llamada `biblioteca`.
2. Importa el archivo SQL proporcionado para crear las tablas necesarias.
3. Configura los archivos `config.php` en las carpetas `mysqli/` y `pdo/` con los detalles de tu servidor MySQL.

## Estructura del Proyecto

- `mysqli/`: Contiene la versión del sistema que usa MySQLi para la conexión y manejo de la base de datos.
- `pdo/`: Contiene la versión del sistema que usa PDO para la conexión y manejo de la base de datos.
- `index.php`: La página principal que lista libros, usuarios, y préstamos con paginación.
  
## Experiencia usando MySQLi vs PDO

Como estudiante, me pareció que PDO ofrece más flexibilidad, especialmente al trabajar con diferentes bases de datos, ya que es más abstracto. Además, el manejo de excepciones en PDO hace que el código sea más robusto y fácil de depurar. Sin embargo, MySQLi tiene la ventaja de ser más sencillo y directo cuando solo se trabaja con MySQL, lo que lo hace más fácil de aprender inicialmente.
