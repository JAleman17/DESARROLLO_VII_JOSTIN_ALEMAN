<?php

class Estudiante
{
    private int $id;
    private string $nombre;
    private int $edad;
    private string $carrera;
    private array $materias;

    public function __construct(int $id, string $nombre, int $edad, string $carrera)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->carrera = $carrera;
        $this->materias = [];
    }

    public function agregarMateria(string $materia, float $calificacion): void
    {
        $this->materias[$materia] = $calificacion;
    }

    public function obtenerPromedio(): float
    {
        $totalCalificaciones = array_sum($this->materias);
        $numeroMaterias = count($this->materias);
        
        return $numeroMaterias > 0 ? $totalCalificaciones / $numeroMaterias : 0;
    }

    public function obtenerDetalles(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            'carrera' => $this->carrera,
            'promedio' => $this->obtenerPromedio(),
            'materias' => $this->materias
        ];
    }

    public function __toString(): string
    {
        return "Nombre: {$this->nombre}, Promedio: {$this->obtenerPromedio()}";
    }
}

class SistemaGestionEstudiantes
{
    private array $estudiantes;
    private array $graduados;

    public function __construct()
    {
        $this->estudiantes = [];
        $this->graduados = [];
    }

    public function agregarEstudiante(Estudiante $estudiante): void
    {
        $this->estudiantes[$estudiante->obtenerDetalles()['id']] = $estudiante;
    }

    public function obtenerEstudiante(int $id): ?Estudiante
    {
        return $this->estudiantes[$id] ?? null;
    }

    public function listarEstudiantes(): array
    {
        return $this->estudiantes;
    }

    public function calcularPromedioGeneral(): float
    {
        if (empty($this->estudiantes)) {
            return 0; // Evita división por cero si no hay estudiantes
        }

        $totalPromedios = array_reduce($this->estudiantes, function ($carry, Estudiante $estudiante) {
            return $carry + $estudiante->obtenerPromedio();
        }, 0);
        
        $cantidadEstudiantes = count($this->estudiantes);

        return $cantidadEstudiantes > 0 ? $totalPromedios / $cantidadEstudiantes : 0;
    }

    public function obtenerEstudiantesPorCarrera(string $carrera): array
    {
        return array_filter($this->estudiantes, function (Estudiante $estudiante) use ($carrera) {
            return strcasecmp($estudiante->obtenerDetalles()['carrera'], $carrera) === 0;
        });
    }

    public function obtenerMejorEstudiante(): ?Estudiante
    {
        if (empty($this->estudiantes)) {
            return null; // Evita devolver null si no hay estudiantes
        }

        return array_reduce($this->estudiantes, function (?Estudiante $mejor, Estudiante $actual) {
            return ($mejor === null || $actual->obtenerPromedio() > $mejor->obtenerPromedio()) ? $actual : $mejor;
        });
    }

    public function generarReporteRendimiento(): array
    {
        $reporte = [];

        foreach ($this->estudiantes as $estudiante) {
            foreach ($estudiante->obtenerDetalles()['materias'] as $materia => $calificacion) {
                if (!isset($reporte[$materia])) {
                    $reporte[$materia] = [
                        'promedio' => 0,
                        'calificacion_max' => PHP_FLOAT_MIN,
                        'calificacion_min' => PHP_FLOAT_MAX,
                        'total' => 0
                    ];
                }

                $reporte[$materia]['promedio'] += $calificacion;
                $reporte[$materia]['calificacion_max'] = max($reporte[$materia]['calificacion_max'], $calificacion);
                $reporte[$materia]['calificacion_min'] = min($reporte[$materia]['calificacion_min'], $calificacion);
                $reporte[$materia]['total'] += 1;
            }
        }

        foreach ($reporte as $materia => &$datos) {
            $datos['promedio'] /= $datos['total'];
        }

        return $reporte;
    }

    public function graduarEstudiante(int $id): void
    {
        if (isset($this->estudiantes[$id])) {
            $this->graduados[] = $this->estudiantes[$id];
            unset($this->estudiantes[$id]);
        }
    }

    public function generarRanking(): array
    {
        if (empty($this->estudiantes)) {
            return []; // Evita trabajar con un array vacío
        }

        $estudiantesOrdenados = $this->estudiantes;
        usort($estudiantesOrdenados, function (Estudiante $a, Estudiante $b) {
            return $b->obtenerPromedio() <=> $a->obtenerPromedio();
        });

        return $estudiantesOrdenados;
    }

    public function buscarEstudiantes(string $query): array
    {
        return array_filter($this->estudiantes, function (Estudiante $estudiante) use ($query) {
            return stripos($estudiante->obtenerDetalles()['nombre'], $query) !== false ||
                   stripos($estudiante->obtenerDetalles()['carrera'], $query) !== false;
        });
    }

    public function generarEstadisticasPorCarrera(): array
    {
        $estadisticas = [];

        foreach ($this->estudiantes as $estudiante) {
            $carrera = $estudiante->obtenerDetalles()['carrera'];
            if (!isset($estadisticas[$carrera])) {
                $estadisticas[$carrera] = [
                    'numero_estudiantes' => 0,
                    'promedio_general' => 0,
                    'mejor_estudiante' => null,
                ];
            }

            $estadisticas[$carrera]['numero_estudiantes'] += 1;
            $estadisticas[$carrera]['promedio_general'] += $estudiante->obtenerPromedio();

            if ($estadisticas[$carrera]['mejor_estudiante'] === null || 
                ($estadisticas[$carrera]['mejor_estudiante'] instanceof Estudiante && 
                 $estudiante->obtenerPromedio() > $estadisticas[$carrera]['mejor_estudiante']->obtenerPromedio())) {
                $estadisticas[$carrera]['mejor_estudiante'] = $estudiante;
            }
        }

        foreach ($estadisticas as &$carrera) {
            $carrera['promedio_general'] /= $carrera['numero_estudiantes'];
        }

        return $estadisticas;
    }
}

// Pruebas del sistema

$sistema = new SistemaGestionEstudiantes();

$est1 = new Estudiante(1, "Carlos Pérez", 21, "Ingeniería en Sistemas");
$est1->agregarMateria("Matemáticas", 85);
$est1->agregarMateria("Computadoras", 90);

$est2 = new Estudiante(2, "Ana Gómez", 22, "Ingeniería en Sistemas");
$est2->agregarMateria("Matemáticas", 88);
$est2->agregarMateria("Computadoras", 92);

$sistema->agregarEstudiante($est1);
$sistema->agregarEstudiante($est2);

echo "Promedio general del sistema: " . $sistema->calcularPromedioGeneral() . PHP_EOL;
$mejorEstudiante = $sistema->obtenerMejorEstudiante();
if ($mejorEstudiante !== null) {
    echo "Mejor estudiante: " . $mejorEstudiante . PHP_EOL;
} else {
    echo "No hay estudiantes registrados." . PHP_EOL;
}
