<?php
// locations_api.php

header('Content-Type: application/json');

// Base de datos expandida con estructura administrativa real
$locations = [
    'Colombia' => [
        'Antioquia' => [
            'Medellín',
            'Bello',
            'Envigado',
            'Itagüí',
            'Rionegro',
            'Apartadó',
            'Turbo',
            'Caucasia',
            'Copacabana',
            'Sabaneta'
        ],
        'Cundinamarca' => [
            'Bogotá',
            'Soacha',
            'Facatativá',
            'Zipaquirá',
            'Fusagasugá',
            'Chía',
            'Mosquera',
            'Madrid',
            'Funza',
            'Cajicá'
        ],
        'Valle del Cauca' => [
            'Cali',
            'Buenaventura',
            'Palmira',
            'Tuluá',
            'Cartago',
            'Jamundí',
            'Yumbo',
            'Guadalajara de Buga',
            'Candelaria',
            'Florida'
        ],
        'Quindio' => [
            'Salento',
            'Filandia',
            'Armenia',
            'Buenavista',
            'Pijao',
        ],
        'Santander' => [
            'Bucaramanga',
            'Floridablanca',
            'Girón',
            'Piedecuesta',
            'Barrancabermeja',
            'San Gil',
            'Socorro',
            'Barbosa',
            'Málaga',
            'Lebrija'
        ]
    ],
    'Perú' => [
        'Lima' => [
            'Lima',
            'San Juan de Lurigancho',
            'San Martín de Porres',
            'Ate',
            'Comas',
            'Villa El Salvador',
            'Villa María del Triunfo',
            'Miraflores',
            'La Victoria',
            'San Borja'
        ],
        'Arequipa' => [
            'Arequipa',
            'Cayma',
            'Cerro Colorado',
            'Paucarpata',
            'Alto Selva Alegre',
            'Socabaya',
            'Mariano Melgar',
            'Miraflores',
            'José Luis Bustamante y Rivero'
        ],
        'La Libertad' => [
            'Trujillo',
            'El Porvenir',
            'Víctor Larco Herrera',
            'La Esperanza',
            'Huanchaco',
            'Florencia de Mora',
            'Laredo',
            'Moche',
            'Salaverry'
        ],
        'Cusco' => [
            'Cusco',
            'San Jerónimo',
            'San Sebastián',
            'Santiago',
            'Wanchaq',
            'Calca',
            'Urubamba',
            'Pisac',
            'Ollantaytambo',
            'Machu Picchu'
        ]
    ],
    'Chile' => [
        'Región Metropolitana' => [
            'Santiago',
            'Puente Alto',
            'Maipú',
            'La Florida',
            'Las Condes',
            'Peñalolén',
            'Vitacura',
            'Providencia',
            'Ñuñoa',
            'La Reina'
        ],
        'Valparaíso' => [
            'Valparaíso',
            'Viña del Mar',
            'Quilpué',
            'Villa Alemana',
            'San Antonio',
            'Quillota',
            'San Felipe',
            'Los Andes',
            'Limache',
            'La Calera'
        ],
        'Biobío' => [
            'Concepción',
            'Talcahuano',
            'Chillán',
            'Los Ángeles',
            'Coronel',
            'San Pedro de la Paz',
            'Hualpén',
            'Chiguayante',
            'Tomé',
            'Lota'
        ]
    ],
    'Argentina' => [
        'Buenos Aires' => [
            'La Plata',
            'Mar del Plata',
            'Quilmes',
            'Lanús',
            'Morón',
            'Florencio Varela',
            'Lomas de Zamora',
            'Avellaneda',
            'San Isidro'
        ],
        'Córdoba' => [
            'Córdoba',
            'Villa María',
            'Río Cuarto',
            'San Francisco',
            'Alta Gracia',
            'Jesús María',
            'La Calera',
            'Villa Carlos Paz',
            'Río Tercero'
        ],
        'Santa Fe' => [
            'Rosario',
            'Santa Fe',
            'Rafaela',
            'Venado Tuerto',
            'Reconquista',
            'Villa Gobernador Gálvez',
            'Santo Tomé',
            'San Lorenzo',
            'Casilda'
        ],
        'Mendoza' => [
            'Mendoza',
            'Godoy Cruz',
            'San Rafael',
            'Maipú',
            'Luján de Cuyo',
            'Las Heras',
            'Guaymallén',
            'Tunuyán',
            'Rivadavia'
        ]
    ],
    'Brasil' => [
        'São Paulo' => [
            'São Paulo',
            'Guarulhos',
            'Campinas',
            'São Bernardo do Campo',
            'Santo André',
            'Osasco',
            'Santos',
            'Diadema',
            'Jundiaí'
        ],
        'Rio de Janeiro' => [
            'Rio de Janeiro',
            'São Gonçalo',
            'Duque de Caxias',
            'Nova Iguaçu',
            'Niterói',
            'Belford Roxo',
            'Campos dos Goytacazes',
            'São João de Meriti'
        ],
        'Minas Gerais' => [
            'Belo Horizonte',
            'Uberlândia',
            'Contagem',
            'Juiz de Fora',
            'Betim',
            'Montes Claros',
            'Ribeirão das Neves',
            'Uberaba'
        ]
    ],
    'Ecuador' => [
        'Pichincha' => [
            'Quito',
            'Cayambe',
            'Mejía',
            'Pedro Moncayo',
            'Rumiñahui',
            'San Miguel de los Bancos',
            'Puerto Quito',
            'Pedro Vicente Maldonado'
        ],
        'Guayas' => [
            'Guayaquil',
            'Durán',
            'Samborondón',
            'Daule',
            'Milagro',
            'El Empalme',
            'Naranjal',
            'Yaguachi',
            'Playas',
            'Balzar'
        ],
        'Azuay' => [
            'Cuenca',
            'Gualaceo',
            'Paute',
            'Sigsig',
            'Santa Isabel',
            'Girón',
            'Nabón',
            'Chordeleg',
            'Oña',
            'Pucará'
        ]
    ],
    'Bolivia' => [
        'La Paz' => [
            'La Paz',
            'El Alto',
            'Viacha',
            'Achocalla',
            'Achacachi',
            'Copacabana',
            'Coroico',
            'Patacamaya',
            'Sorata'
        ],
        'Santa Cruz' => [
            'Santa Cruz de la Sierra',
            'Montero',
            'Warnes',
            'La Guardia',
            'Cotoca',
            'Mineros',
            'El Torno',
            'Portachuelo'
        ],
        'Cochabamba' => [
            'Cochabamba',
            'Quillacollo',
            'Sacaba',
            'Tiquipaya',
            'Cliza',
            'Punata',
            'Villa Tunari',
            'Tarata'
        ]
    ],
    'Paraguay' => [
        'Central' => [
            'Asunción',
            'San Lorenzo',
            'Lambaré',
            'Fernando de la Mora',
            'Luque',
            'Capiatá',
            'Limpio',
            'Ñemby',
            'Mariano Roque Alonso'
        ],
        'Alto Paraná' => [
            'Ciudad del Este',
            'Presidente Franco',
            'Hernandarias',
            'Minga Guazú',
            'Santa Rita',
            'Juan León Mallorquín'
        ],
        'Itapúa' => [
            'Encarnación',
            'Coronel Bogado',
            'Hohenau',
            'Obligado',
            'Bella Vista',
            'Trinidad',
            'Jesús',
            'San Pedro del Paraná'
        ]
    ],
    'Uruguay' => [
        'Montevideo' => [
            'Montevideo Centro',
            'Pocitos',
            'Carrasco',
            'Prado',
            'Ciudad Vieja',
            'Malvín',
            'Buceo',
            'Punta Gorda'
        ],
        'Canelones' => [
            'Ciudad de la Costa',
            'Las Piedras',
            'Pando',
            'La Paz',
            'Progreso',
            'Santa Lucía',
            'Sauce',
            'Toledo'
        ],
        'Maldonado' => [
            'Maldonado',
            'Punta del Este',
            'San Carlos',
            'Pan de Azúcar',
            'Piriápolis',
            'Aiguá',
            'Solís Grande'
        ]
    ],
    'Venezuela' => [
        'Distrito Capital' => [
            'Caracas',
            'Chacao',
            'Baruta',
            'Sucre',
            'El Hatillo'
        ],
        'Miranda' => [
            'Los Teques',
            'Guatire',
            'Guarenas',
            'Cúa',
            'Ocumare del Tuy',
            'Charallave',
            'Santa Teresa',
            'San Antonio de los Altos'
        ],
        'Zulia' => [
            'Maracaibo',
            'Cabimas',
            'Ciudad Ojeda',
            'Machiques',
            'Santa Rita',
            'San Francisco',
            'La Villa del Rosario'
        ]
    ]
];

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'getCountries':
            echo json_encode(array_keys($locations));
            break;

        case 'getDepartments':
            $country = $_GET['country'] ?? '';
            if (isset($locations[$country])) {
                echo json_encode(array_keys($locations[$country]));
            } else {
                echo json_encode([]);
            }
            break;

        case 'getMunicipalities':
            $country = $_GET['country'] ?? '';
            $department = $_GET['department'] ?? '';
            if (isset($locations[$country][$department])) {
                echo json_encode($locations[$country][$department]);
            } else {
                echo json_encode([]);
            }
            break;

        default:
            echo json_encode(['error' => 'Invalid action']);
    }
}
