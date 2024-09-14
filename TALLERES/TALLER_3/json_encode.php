<?php
// 1. Modificar el array $peliculaFavorita con la información de una película real
$peliculaFavorita = [
    "titulo" => "Inception",
    "director" => "Christopher Nolan",
    "año" => 2010,
    "actores" => ["Leonardo DiCaprio", "Joseph Gordon-Levitt", "Elliot Page"]
];
$jsonPelicula = json_encode($peliculaFavorita);
echo "Información de mi película favorita en JSON:</br>$jsonPelicula</br>";

// 2. Crear un array y un objeto complejo y convertirlos a JSON

// Array complejo
$equipo = [
    "nombre" => "Equipo A",
    "miembros" => [
        [
            "nombre" => "Alice",
            "rol" => "Líder",
            "habilidades" => ["estrategia", "negociación"]
        ],
        [
            "nombre" => "Bob",
            "rol" => "Técnico",
            "habilidades" => ["programación", "diseño"]
        ],
        [
            "nombre" => "Charlie",
            "rol" => "Analista",
            "habilidades" => ["análisis de datos", "presentaciones"]
        ]
    ],
    "proyectos" => [
        "desarrollo_web" => [
            "estado" => "en progreso",
            "fecha_inicio" => "2024-01-15",
            "fecha_fin" => "2024-12-31"
        ],
        "consultoría" => [
            "estado" => "completado",
            "fecha_inicio" => "2023-06-01",
            "fecha_fin" => "2023-11-30"
        ]
    ]
];
$jsonEquipo = json_encode($equipo, JSON_PRETTY_PRINT);
echo "</br>Array complejo en JSON:</br>$jsonEquipo</br>";

class Proyecto {
    public $nombre;
    public $presupuesto;
    public $fechaInicio;
    public $fechaFin;
    
    public function __construct($nombre, $presupuesto, $fechaInicio, $fechaFin) {
        $this->nombre = $nombre;
        $this->presupuesto = $presupuesto;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }
}

class Empresa {
    public $nombre;
    public $sector;
    public $proyectos;
    
    public function __construct($nombre, $sector, $proyectos) {
        $this->nombre = $nombre;
        $this->sector = $sector;
        $this->proyectos = $proyectos;
    }
}

$proyectos = [
    new Proyecto("Desarrollo de App", 50000, "2024-02-01", "2024-10-01"),
    new Proyecto("Investigación de Mercado", 20000, "2024-03-01", "2024-08-01")
];

$empresa = new Empresa("Tech Solutions", "Tecnología", $proyectos);
$jsonEmpresa = json_encode($empresa, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
echo "</br>Objeto Empresa en JSON:</br>$jsonEmpresa</br>";


$datosConCaracteresEspeciales = [
    "nombre" => "José María",
    "descripción" => "Le gusta el café y el té"
];
$jsonSinEscaparUnicode = json_encode($datosConCaracteresEspeciales, JSON_UNESCAPED_UNICODE);
echo "</br>JSON sin escapar caracteres Unicode:</br>$jsonSinEscaparUnicode</br>";

$jsonBonito = json_encode($datosConCaracteresEspeciales, JSON_PRETTY_PRINT);
echo "</br>JSON con formato bonito:</br>$jsonBonito</br>";


$jsonConOpcionesCombinadas = json_encode($datosConCaracteresEspeciales, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
echo "</br>JSON con opciones combinadas (bonito y sin escapar Unicode):</br>$jsonConOpcionesCombinadas</br>";
?>
