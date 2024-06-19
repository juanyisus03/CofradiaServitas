<?php

namespace Database\Seeders;

use App\Models\Noticia;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Noticia::create([
            "titulo"=> "Celebracion III Centenario Servitas",
            "contenido"=>"<p>Por la celebración del 'III Centenario Servitas 1724-2024', la archicofradía del Santísimo Sacramento a tenido a bien invitarnos a participar en la eucaristía del tercer día de triduo.   La sagrada eucaristía tendrá lugar el Sábado 1 de Junio comenzando a las 19:30h con la exposición del Santísimo Sacramento y rezo del santo rosario, continuando a las 20:00 con el ejercicio del triduo, meditación, bendición y reserva y finalizando a las 20:30 con la celebración de la Santa Misa presidida por el Ilmo. Sr. D. Jesús María Moriana Elvira, Vicario episcopal de la campiña y conciliario de nuestra cofradía. Desde estás líneas os invitamos a todos los hermanos a ser partícipes de esta invitación.</p>",
            "fecha"=>Carbon::parse("2024-06-01"),
            "img"=>"noticias/noticia1.jpg",
            "soloHermano"=>0
        ]);
        Noticia::create([
            "titulo"=> "Conferencia 'El nacimiento de las congregaciones Servitas en Andalucia, caso Lucena'",
            "contenido"=>"<p>El dia 6 de Junio se tendrá lugar la conferencia titulada 'El nacimiento de las Congregaciones Servitas en Andalucia. El caso de Lucena' a cargo de N.H.D. LuisFernando Palma Robles. Se celebrará en la Sala Entrepatios de la Casa de los Mora a las 21:00.</p>",
            "fecha"=>Carbon::parse("2024-06-06"),
            "img"=>"noticias/noticia2.jpg",
            "soloHermano"=>1
        ]);

        Noticia::create([
            "titulo"=> "Recogida de Tunicas Año 2024",
            "contenido"=>"<p>Buenas tardes, se les comunica las fechas para la recogida de túnica para aquellos hermanos que realicen la estación de penitencia el martes santo: <br> <strong>DÍAS 4 y 6 de MARZO</strong>: aquellas personas que el año pasado realizasteis la estación de penitencia el martes santo. <br> <strong> DIAS 11y 13 de MARZO </strong> : Aquellas personas que realizan por primera vez la estación de penitencia o para aquellos que por circunstancias el año pasado no la hicieron.</p>",
            "fecha"=>Carbon::parse("2024-06-01"),
            "img"=>"noticias/noticia3.jpg",
            "soloHermano"=>1
        ]);
        Noticia::create([
            "titulo"=> "Solicitud de estancia en la capilla",
            "contenido"=>"<p>El pasado sábado día 27 de Abril, con motivo del XXIX ENCUENTRO DE PASCUA SERVITA, y aprovechando la visita de nuestro Sr. Obispo D. Demetrio Fernández González para oficiar la misa de dicho acto, se procedió a bendecir la capilla itinerante de Ntra. Sra. De los Dolores 'Servitas'. Todo lo recaudado en dicha capilla ira destinado a obras de caridad.Cualquier hermano puede solicitar la estancia de dicha capilla durante 1 semana. Se podrá visitar desde el 12 de mayo hasta el 21 del mismo mes</p>",
            "fecha"=>Carbon::parse("2024-06-01"),
            "img"=>"noticias/noticia4.jpg",
            "soloHermano"=>1
        ]);
        Noticia::create([
            "titulo"=> "Invitación a Toda la Comunidad a Participar en Procesión Religiosa",
            "contenido"=>"<p>El evento está programado para el día 30 de Junio y comenzará con una emotiva ceremonia en nuestra venerable Iglesia San Mateo, a las 18:00. Desde allí, recorreremos las calles principales de nuestra ciudad, portando símbolos sagrados y entonando cánticos espirituales.<br>Este acto de fe y devoción no solo busca fortalecer nuestros lazos comunitarios, sino también celebrar juntos la importancia de la religión en nuestras vidas. Invitamos a todos los interesados a unirse a nosotros en este momento de reflexión y espiritualidad. <br> Al concluir la procesión, se llevará a cabo una ceremonia especial en la Iglesia San Mateo, donde se impartirán bendiciones y se compartirá un momento de comunión espiritual entre todos los participantes.</p>",
            "fecha"=>Carbon::parse("2024-06-30"),
            "img"=>"noticias/noticia5.jpg",
            "soloHermano"=>0
        ]);
    }
}
