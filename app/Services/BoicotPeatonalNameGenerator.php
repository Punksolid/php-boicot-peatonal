<?php

namespace App\Services;

class BoicotPeatonalNameGenerator
{
    public static function generate(mixed $name)
    {
        return self::randomAnimal() . ' ' . self::randomColor() . ' ' . self::randomPersonality();
    }

    private static function randomAnimal(): string
    {
        $animales = [
            'Águila',
            'Aguilucho',
            'Albatros',
            'Alce',
            'Alondra',
            'Alpaca',
            'Araña',
            'Ardilla',
            'Avestruz',
            'Ballena',
            'Búho',
            'Burro',
            'Caballo',
            'Cabra',
            'Caimán',
            'Camaleón',
            'Camello',
            'Canguro',
            'Caracol',
            'Cebra',
            'Cerdo',
            'Chacal',
            'Chimpancé',
            'Chinchilla',
            'Cigüeña',
            'Ciervo',
            'Cocodrilo',
            'Colibrí',
            'Conejo',
            'Cóndor',
            'Corzo',
            'Cotorra',
            'Coyote',
            'Cuervo',
            'Delfín',
            'Diamante',
            'Dinosaurio',
            'Elefante',
            'Escarabajo',
            'Escorpión',
            'Esfinge',
            'Estrella',
            'Foca',
            'Foca marina',
            'Foca monje',
            'Foca orejuda',
            'Foca pescadora',
            'Foca roja',
            'Foca voladora',
            'Foca de Weddell',
            'Foca gris',
            'Foca de las islas Shetland',
            'Foca de las islas Orcadas',
            'Foca de las islas Malvinas',
            'Foca de las islas Galápagos',
            'Foca de las islas Falkland',
            'Foca de las islas Canarias',
            'Foca de las islas Azores',
            'Foca de las islas Aleutianas',
            'Foca de las islas Aland',
            'Foca de las islas Andaman',
            'Foca de las islas Antártidas',
            'Foca de las islas Antípodas',
            'Ardilla',
            'Ballena',
            'Búho',
            'Caballo',
            'Cangrejo',
            'Cerdo',
            'Cisne',
            'Cocodrilo',
            'Conejo',
            'Delfín',
            'Elefante',
            'Gorila',
            'Jirafa',
            'León',
            'Loro',
            'Mapache',
            'Mono',
            'Oso',
            'Osa',
            'Pavo',
            'Perro',
            'Gato',
            'Pingüino',
            'Pájaro',
            'Serpiente',
            'Tigre',
            'Tortuga',
            'Urraca',
            'Venado',
            'Zorro',
        ];
        $animal = $animales[array_rand($animales)];
//        check if female
        if (in_array($animal, ['Araña', 'Avestruz', 'Ballena', 'Burro', 'Cabra', 'Caimán', 'Camaleón', 'Camello', 'Canguro', 'Caracol', 'Cerdo', 'Chacal', 'Chimpancé', 'Chinchilla', 'Cigüeña', 'Ciervo', 'Cocodrilo', 'Colibrí', 'Conejo', 'Cóndor', 'Corzo', 'Cotorra', 'Coyote', 'Cuervo', 'Delfín', 'Elefante', 'Escarabajo', 'Escorpión', 'Esfinge', 'Estrella', 'Foca', 'Foca marina', 'Foca monje', 'Foca orejuda', 'Foca pescadora', 'Foca roja', 'Foca voladora', 'Foca de Weddell', 'Foca gris', 'Foca de las islas Shetland', 'Foca de las islas Orcadas', 'Foca de las islas Malvinas', 'Foca de las islas Galápagos', 'Foca de las islas Falkland', 'Foca de las islas Canarias', 'Foca de las islas Azores', 'Foca de las islas Aleutianas', 'Foca de las islas Aland', 'Foca de las islas Andaman', 'Foca de las islas Antártidas', 'Foca de las islas Antípodas', 'Ardilla', 'Ballena', 'Búho', 'Caballo', 'Cangrejo', 'Cerdo', 'Cisne', 'Cocodrilo', 'Conejo', 'Delfín', 'Elefante', 'Gorila', 'Jirafa', 'León', 'Loro', 'Mapache', 'Mono', 'Oso', 'Osa', 'Pavo', 'Perro', 'Gato', 'Pingüino', 'Pájaro', 'Serpiente', 'Tigre', 'Tortuga', 'Urraca', 'Venado', 'Zorro'])) {
            $animal = 'La ' . $animal; // female
        } else {
            $animal = 'El ' . $animal; // male
        }

        return $animal;
    }

    private static function randomColor(): string
    {
        $colores = [
            'Azul',
            'Beige',
            'Blanco',
            'Gris',
            'Marrón',
            'Naranja',
            'Negro',
            'Oro',
            'Verde',
            'Morado',
            'Rojo',
            'Rosa',
            'Plateado',
            'Turquesa',
            'Amarillo',
            'Crema',
            'Verde oliva',
            'Rojo vino',
            'Azul marino',
            'Café',
        ];

        return $colores[array_rand($colores)];
    }

    private static function randomPersonality(): string
    {
        $personalidades = [
            'Amigable',
            'Confiado',
            'Creativo',
            'Curioso',
            'Decidido',
            'Empático',
            'Enérgico',
            'Extrovertido',
            'Flexible',
            'Genuino',
            'Impaciente',
            'Introvertido',
            'Intuitivo',
            'Organizado',
            'Paciente',
            'Persistente',
            'Practico',
            'Responsable',
            'Sensible',
            'Tímido',
        ];

        return $personalidades[array_rand($personalidades)];
    }
}
