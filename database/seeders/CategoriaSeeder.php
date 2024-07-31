<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $categorias = [
            [
                'nombre' => 'Escritura y Papelería',
                'descripcion' => 'Encontrarás una variedad de herramientas de escritura y papelería, desde bolígrafos y lápices hasta marcadores y correctores. Ideal para todas tus necesidades de escritura y corrección en la oficina o en el hogar.',
            ],
            [
                'nombre' => 'Papel y Cartón',
                'descripcion' => 'Explora nuestra amplia gama de papeles y cartones, incluyendo hojas bond en varios tamaños, cartulinas y papeles para impresora. Perfecto para tus proyectos de impresión y manualidades.',
            ],
            [
                'nombre' => 'Organización y Archivo',
                'descripcion' => 'Descubre soluciones para mantener tu espacio ordenado, como carpetas de anillas, archivadores y organizadores de escritorio. Mantén tus documentos y materiales organizados y accesibles.',
            ],
            [
                'nombre' => 'Cuadernos y Agendas',
                'descripcion' => 'Encuentra cuadernos de distintos tamaños y tipos, así como agendas y planificadores. Ideal para tomar notas, planificar tu día y mantener un registro de tus tareas.',
            ],
            [
                'nombre' => 'Artículos de Oficina',
                'descripcion' => 'Aquí encontrarás todos los accesorios esenciales para tu oficina, incluyendo grapadoras, clips, cinta adhesiva y perforadoras. Todo lo que necesitas para el día a día en el trabajo.',
            ],
            [
                'nombre' => 'Mobiliario de Oficina',
                'descripcion' => 'Ofrecemos una selección de mobiliario para oficina, como sillas ergonómicas, escritorios y mesas auxiliares. Diseñado para crear un espacio de trabajo cómodo y funcional.',
            ],
            [
                'nombre' => 'Material de Oficina en General',
                'descripcion' => 'Disponemos de una variedad de suministros generales para oficina, como calculadoras, etiquetas y relojes de pared. Todo lo necesario para completar tu equipamiento de oficina.',
            ],
            [
                'nombre' => 'Suministros de Impresión',
                'descripcion' => 'Encuentra todo lo que necesitas para la impresión, desde cartuchos de tinta y tóner hasta papel fotográfico. Asegura la calidad y eficiencia en tus impresiones diarias.',
            ],
        ];
        foreach ($categorias as $categoriaData) {
            $existingCategoria = Categoria::where('nombre', $categoriaData['nombre'])->first();

            if (!$existingCategoria) {
                Categoria::create($categoriaData);
            }
        }
    }
}
