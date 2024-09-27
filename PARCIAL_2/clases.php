<?php
// Interfaz llamada prestable
interface Prestable {
    public function obtenerDetallesPrestamo(): string;
}

// Esta es la clase que implementa Prestable
abstract class RecursoBiblioteca implements Prestable {
    protected $id;
    protected $titulo;
    protected $autor;
    protected $anioPublicacion;
    protected $estado;
    protected $fechaAdquisicion;

    public function __construct($id, $titulo, $autor, $anioPublicacion, $estado, $fechaAdquisicion) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anioPublicacion = $anioPublicacion;
        $this->estado = $estado;
        $this->fechaAdquisicion = $fechaAdquisicion;
    }

    abstract public function obtenerDetallesPrestamo(): string;
}

// Aqui coloco la herencia de RecursoBiblioteca
class Libro extends RecursoBiblioteca {
    private $isbn;

    public function __construct($id, $titulo, $autor, $anioPublicacion, $estado, $fechaAdquisicion, $isbn) {
        parent::__construct($id, $titulo, $autor, $anioPublicacion, $estado, $fechaAdquisicion);
        $this->isbn = $isbn;
    }

    public function obtenerDetallesPrestamo(): string {
        return "Libro: {$this->titulo}, ISBN: {$this->isbn}";
    }
}

// Otra herencia de RecursoBiblioteca
class Revista extends RecursoBiblioteca {
    private $numeroEdicion;

    public function __construct($id, $titulo, $autor, $anioPublicacion, $estado, $fechaAdquisicion, $numeroEdicion) {
        parent::__construct($id, $titulo, $autor, $anioPublicacion, $estado, $fechaAdquisicion);
        $this->numeroEdicion = $numeroEdicion;
    }

    public function obtenerDetallesPrestamo(): string {
        return "Revista: {$this->titulo}, Número de Edición: {$this->numeroEdicion}";
    }
}

// Clase DVD que hereda  RecursoBiblioteca
class DVD extends RecursoBiblioteca {
    private $duracion;

    public function __construct($id, $titulo, $autor, $anioPublicacion, $estado, $fechaAdquisicion, $duracion) {
        parent::__construct($id, $titulo, $autor, $anioPublicacion, $estado, $fechaAdquisicion);
        $this->duracion = $duracion;
    }

    public function obtenerDetallesPrestamo(): string {
        return "DVD: {$this->titulo}, Duración: {$this->duracion} minutos";
    }
}

//  En esta clase se gestionan todos los recursos
class GestorBiblioteca {
    private $recursos = [];

    public function __construct($archivoJSON) {
        $this->cargarRecursosDesdeJSON($archivoJSON);
    }

    // Aqui se cargan todos los datos desde el archivo .json
    private function cargarRecursosDesdeJSON($archivoJSON) {
        $datos = json_decode(file_get_contents($archivoJSON), true);
        foreach ($datos as $dato) {
            switch ($dato['tipo']) {
                case 'Libro':
                    $this->recursos[] = new Libro($dato['id'], $dato['titulo'], $dato['autor'], $dato['anioPublicacion'], $dato['estado'], $dato['fechaAdquisicion'], $dato['isbn']);
                    break;
                case 'Revista':
                    $this->recursos[] = new Revista($dato['id'], $dato['titulo'], $dato['autor'], $dato['anioPublicacion'], $dato['estado'], $dato['fechaAdquisicion'], $dato['numeroEdicion']);
                    break;
                case 'DVD':
                    $this->recursos[] = new DVD($dato['id'], $dato['titulo'], $dato['autor'], $dato['anioPublicacion'], $dato['estado'], $dato['fechaAdquisicion'], $dato['duracion']);
                    break;
            }
        }
    }

    // Agregar recurso
    public function agregarRecurso(RecursoBiblioteca $recurso) {
        $this->recursos[] = $recurso;
        $this->guardarEnJSON();
    }

    // Eliminar recurso 
    public function eliminarRecurso($id) {
        $this->recursos = array_filter($this->recursos, function ($recurso) use ($id) {
            return $recurso->id !== $id;
        });
        $this->guardarEnJSON();
    }

    // Actualizar recurso
    public function actualizarRecurso(RecursoBiblioteca $recurso) {
        foreach ($this->recursos as $key => $r) {
            if ($r->id === $recurso->id) {
                $this->recursos[$key] = $recurso;
                $this->guardarEnJSON();
                break;
            }
        }
    }

    // Actualizar estado
    public function actualizarEstadoRecurso($id, $nuevoEstado) {
        foreach ($this->recursos as $recurso) {
            if ($recurso->id == $id) {
                $recurso->estado = $nuevoEstado;
                $this->guardarEnJSON();
                break;
            }
        }
    }

    // Aqui se separan los recursos en base al estado
    public function buscarRecursosPorEstado($estado) {
        return array_filter($this->recursos, function ($recurso) use ($estado) {
            return $recurso->estado === $estado;
        });
    }

    // Recursos con su respectivo filtro y orden
    public function listarRecursos($filtroEstado = '', $campoOrden = 'id', $direccionOrden = 'ASC') {
        $recursos = $this->recursos;

        // Filtrar por estado
        if ($filtroEstado) {
            $recursos = $this->buscarRecursosPorEstado($filtroEstado);
        }

        // Ordenar
        usort($recursos, function ($a, $b) use ($campoOrden, $direccionOrden) {
            if ($direccionOrden === 'ASC') {
                return $a->$campoOrden <=> $b->$campoOrden;
            } else {
                return $b->$campoOrden <=> $a->$campoOrden;
            }
        });

        return $recursos;
    }

    // Guardado en el archivo .json
    private function guardarEnJSON() {
        $jsonData = array_map(function ($recurso) {
            return (array) $recurso;
        }, $this->recursos);

        file_put_contents('biblioteca.json', json_encode($jsonData, JSON_PRETTY_PRINT));
    }
}
?>
