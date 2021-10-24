<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Role;
use \App\Models\Provincia;
use \App\Models\Canton;
use \App\Models\User;
use \App\Models\TipoDonacion;
use \App\Models\Donante;
use \App\Models\Distribuidor;
use \App\Models\Equipo;
use \App\Models\Pieza;
use \App\Models\DetalleDonacion;
use \App\Models\Beneficiario;
use \App\Models\Tecnico;
use \App\Models\Administrador;
use \App\Models\Historia;
use \App\Models\Charla;
use \App\Models\DetalleRecepcionTecnico;
use \App\Models\Diagnostico;
use \App\Models\DetalleEntregaDonacion;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(5)->create();
        Provincia::factory()->create(['descripcion'=>'Azuay']);
        Provincia::factory()->create(['descripcion'=>'Bolivar']);
        Provincia::factory()->create(['descripcion'=>'Cañar']);
        Provincia::factory()->create(['descripcion'=>'Carchi']);
        Provincia::factory()->create(['descripcion'=>'Cotopaxi']);
        Provincia::factory()->create(['descripcion'=>'Chimborazo']);
        Provincia::factory()->create(['descripcion'=>'El Oro']);
        Provincia::factory()->create(['descripcion'=>'Esmeraldas']);
        Provincia::factory()->create(['descripcion'=>'Guayas']);
        Provincia::factory()->create(['descripcion'=>'Imbabura']);
        Provincia::factory()->create(['descripcion'=>'Loja']);
        Provincia::factory()->create(['descripcion'=>'Los Ríos']);
        Provincia::factory()->create(['descripcion'=>'Manabí']);
        Provincia::factory()->create(['descripcion'=>'Morona Santiago']);
        Provincia::factory()->create(['descripcion'=>'Napo']);
        Provincia::factory()->create(['descripcion'=>'Pastaza']);
        Provincia::factory()->create(['descripcion'=>'Pichincha']);
        Provincia::factory()->create(['descripcion'=>'Tungurahua']);
        Provincia::factory()->create(['descripcion'=>'Zamora Chinchipe']);
        Provincia::factory()->create(['descripcion'=>'Galápagos']);
        Provincia::factory()->create(['descripcion'=>'Sucumbíos']);
        Provincia::factory()->create(['descripcion'=>'Orellana']);
        Provincia::factory()->create(['descripcion'=>'Santo Domingo de los Tsachilas']);
        Provincia::factory()->create(['descripcion'=>'Santa Elena']);

        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Cuenca']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Gualaceo']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Nabón']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Paute']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Pucara']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'San Fernando']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Santa Isabel']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Sigsig']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Oña']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Chordeleg']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'El pan']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Sevilla de oro']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Guachapala']);
        Canton::factory()->create(['provincia_id'=>'1','descripcion'=>'Camilo Ponce Enríquez']);

        Canton::factory()->create(['provincia_id'=>'2','descripcion'=>'Guaranda']);
        Canton::factory()->create(['provincia_id'=>'2','descripcion'=>'Chillanes']);
        Canton::factory()->create(['provincia_id'=>'2','descripcion'=>'Chimbo']);
        Canton::factory()->create(['provincia_id'=>'2','descripcion'=>'Echeandía']);
        Canton::factory()->create(['provincia_id'=>'2','descripcion'=>'San Miguel']);
        Canton::factory()->create(['provincia_id'=>'2','descripcion'=>'Caluma']);
        Canton::factory()->create(['provincia_id'=>'2','descripcion'=>'Las Naves']);

        Canton::factory()->create(['provincia_id'=>'3','descripcion'=>'Azogues']);
        Canton::factory()->create(['provincia_id'=>'3','descripcion'=>'Biblián']);
        Canton::factory()->create(['provincia_id'=>'3','descripcion'=>'Cañar']);
        Canton::factory()->create(['provincia_id'=>'3','descripcion'=>'La Troncal']);
        Canton::factory()->create(['provincia_id'=>'3','descripcion'=>'El Tambo']);
        Canton::factory()->create(['provincia_id'=>'3','descripcion'=>'Déleg']);
        Canton::factory()->create(['provincia_id'=>'3','descripcion'=>'Suscal']);

        Canton::factory()->create(['provincia_id'=>'4','descripcion'=>'Tulcán']);
        Canton::factory()->create(['provincia_id'=>'4','descripcion'=>'Bolívar']);
        Canton::factory()->create(['provincia_id'=>'4','descripcion'=>'Espejo']);
        Canton::factory()->create(['provincia_id'=>'4','descripcion'=>'Mira']);
        Canton::factory()->create(['provincia_id'=>'4','descripcion'=>'Montúfar']);
        Canton::factory()->create(['provincia_id'=>'4','descripcion'=>'San Pedro de Huacas']);

        Canton::factory()->create(['provincia_id'=>'5','descripcion'=>'Latacunga']);
        Canton::factory()->create(['provincia_id'=>'5','descripcion'=>'La Maná']);
        Canton::factory()->create(['provincia_id'=>'5','descripcion'=>'Pangua']);
        Canton::factory()->create(['provincia_id'=>'5','descripcion'=>'Pujilí']);
        Canton::factory()->create(['provincia_id'=>'5','descripcion'=>'Salcedo']);
        Canton::factory()->create(['provincia_id'=>'5','descripcion'=>'Saquisilí']);
        Canton::factory()->create(['provincia_id'=>'5','descripcion'=>'Sigchos']);

        Canton::factory()->create(['provincia_id'=>'6','descripcion'=>'Riobamba']);
        Canton::factory()->create(['provincia_id'=>'6','descripcion'=>'Alausí']);
        Canton::factory()->create(['provincia_id'=>'6','descripcion'=>'Colta']);
        Canton::factory()->create(['provincia_id'=>'6','descripcion'=>'Chambo']);
        Canton::factory()->create(['provincia_id'=>'6','descripcion'=>'Chunchi']);
        Canton::factory()->create(['provincia_id'=>'6','descripcion'=>'Guamote']);
        Canton::factory()->create(['provincia_id'=>'6','descripcion'=>'Guano']);
        Canton::factory()->create(['provincia_id'=>'6','descripcion'=>'Pallatanga']);
        Canton::factory()->create(['provincia_id'=>'6','descripcion'=>'Penipe']);
        Canton::factory()->create(['provincia_id'=>'6','descripcion'=>'Cumandá']);

        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Machala']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Arenillas']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Atahualpa']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Balsas']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Chilla']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'El Guabo']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Huaquillas']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Marcabelí']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Pasaje']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Piñas']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Portovelo']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Santa Rosa']);
        Canton::factory()->create(['provincia_id'=>'7','descripcion'=>'Zaruma']);
        
        Canton::factory()->create(['provincia_id'=>'8','descripcion'=>'Esmeraldas']);
        Canton::factory()->create(['provincia_id'=>'8','descripcion'=>'Eloy Alfaro']);
        Canton::factory()->create(['provincia_id'=>'8','descripcion'=>'Muisne']);
        Canton::factory()->create(['provincia_id'=>'8','descripcion'=>'Quinindé']);
        Canton::factory()->create(['provincia_id'=>'8','descripcion'=>'San Lorenzo']);
        Canton::factory()->create(['provincia_id'=>'8','descripcion'=>'Atacames']);
        Canton::factory()->create(['provincia_id'=>'8','descripcion'=>'Rioverde']);
        Canton::factory()->create(['provincia_id'=>'8','descripcion'=>'La Concordia']);

        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Guayaquil']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Alfredo Baquerizo Moreno (Juján)']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Balao']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Balzar']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Colimes']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Daule']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Durán']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'El Empalme']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'El Triunfo']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Milagro']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Naranjal']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Naranjito']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Palestina']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Pedro Carbo']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Samborondón']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Santa Lucía']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Salitre']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'San Jacinto de Yaguachi']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Playas']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Simón Bolívar']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Coronel Marcelino Maridueña']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Lomas de Sargentillo']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Nobol']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'General Antonio Elizalde']);
        Canton::factory()->create(['provincia_id'=>'9','descripcion'=>'Isidro Ayora']);

        Canton::factory()->create(['provincia_id'=>'10','descripcion'=>'Ibarra']);
        Canton::factory()->create(['provincia_id'=>'10','descripcion'=>'Antonio Ante']);
        Canton::factory()->create(['provincia_id'=>'10','descripcion'=>'Cotacahi']);
        Canton::factory()->create(['provincia_id'=>'10','descripcion'=>'Otavalo']);
        Canton::factory()->create(['provincia_id'=>'10','descripcion'=>'Pimampiro']);
        Canton::factory()->create(['provincia_id'=>'10','descripcion'=>'San Miguel de Urcuqui']);
        
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Loja']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Calvas']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Catamayo']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Celica']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Chaguarpamba']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Espíndola']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Gonzanamá']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Macará']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Paltas']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Puyango']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Saraguro']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Sozoranga']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Zapotillo']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Pindal']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Quilanga']);
        Canton::factory()->create(['provincia_id'=>'11','descripcion'=>'Olmedo']);

        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Babahoyo']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Baba']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Montalvo']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Pueblo Viejo']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Quevedo']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Urdaneta']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Ventanas']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Vínces']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Palenque']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Buena Fe']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Valencia']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Mocache']);
        Canton::factory()->create(['provincia_id'=>'12','descripcion'=>'Quinsaloma']);

        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Portoviejo']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Bolívar']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Chone']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'El Carmen']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Flavio Alfaro']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Jipijapa']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Junín']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Manta']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Montecristi']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Paján']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Pichincha']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Rocafuerte']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Santa Ana']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Sucre']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Tosagua']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'24 de Mayo']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Pedernales']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Olmedo']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Puerto López']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Jama']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'Jaramijó']);
        Canton::factory()->create(['provincia_id'=>'13','descripcion'=>'San Vicente']);

        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Morona']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Gualaquiza']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Limón Indanza']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Palora']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Santiago']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Sucúa']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Huamboya']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'San Juan Bosco']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Taisha']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Logroño']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Pablo Sexto']);
        Canton::factory()->create(['provincia_id'=>'14','descripcion'=>'Tiwintza']);

        Canton::factory()->create(['provincia_id'=>'15','descripcion'=>'Tena']);
        Canton::factory()->create(['provincia_id'=>'15','descripcion'=>'Archidona']);
        Canton::factory()->create(['provincia_id'=>'15','descripcion'=>'El Chaco']);
        Canton::factory()->create(['provincia_id'=>'15','descripcion'=>'Quijos']);
        Canton::factory()->create(['provincia_id'=>'15','descripcion'=>'Carlos Julio Arosemena Tola']);

        Canton::factory()->create(['provincia_id'=>'16','descripcion'=>'Pastaza']);
        Canton::factory()->create(['provincia_id'=>'16','descripcion'=>'Mera']);
        Canton::factory()->create(['provincia_id'=>'16','descripcion'=>'Santa Clara']);
        Canton::factory()->create(['provincia_id'=>'16','descripcion'=>'Arajuno']);

        Canton::factory()->create(['provincia_id'=>'17','descripcion'=>'Quito']);
        Canton::factory()->create(['provincia_id'=>'17','descripcion'=>'Cayambe']);
        Canton::factory()->create(['provincia_id'=>'17','descripcion'=>'Mejía']);
        Canton::factory()->create(['provincia_id'=>'17','descripcion'=>'Pedro Moncayo']);
        Canton::factory()->create(['provincia_id'=>'17','descripcion'=>'Rumiñahui']);
        Canton::factory()->create(['provincia_id'=>'17','descripcion'=>'San Miguel de los Bancos']);
        Canton::factory()->create(['provincia_id'=>'17','descripcion'=>'Pedro Vicente Maldonado']);
        Canton::factory()->create(['provincia_id'=>'17','descripcion'=>'Puerto Quito']);

        Canton::factory()->create(['provincia_id'=>'18','descripcion'=>'Ambato']);
        Canton::factory()->create(['provincia_id'=>'18','descripcion'=>'Baños de Agua Santa']);
        Canton::factory()->create(['provincia_id'=>'18','descripcion'=>'Cevallos']);
        Canton::factory()->create(['provincia_id'=>'18','descripcion'=>'Mocha']);
        Canton::factory()->create(['provincia_id'=>'18','descripcion'=>'Patate']);
        Canton::factory()->create(['provincia_id'=>'18','descripcion'=>'Quero']);
        Canton::factory()->create(['provincia_id'=>'18','descripcion'=>'San Pedro de Pelileo']);
        Canton::factory()->create(['provincia_id'=>'18','descripcion'=>'Santiago de Píllaro']);
        Canton::factory()->create(['provincia_id'=>'18','descripcion'=>'Tisaleo']);

        Canton::factory()->create(['provincia_id'=>'19','descripcion'=>'Zamora']);
        Canton::factory()->create(['provincia_id'=>'19','descripcion'=>'Chinchipe']);
        Canton::factory()->create(['provincia_id'=>'19','descripcion'=>'Nangaritza']);
        Canton::factory()->create(['provincia_id'=>'19','descripcion'=>'Yacuambi']);
        Canton::factory()->create(['provincia_id'=>'19','descripcion'=>'Yantzaza']);
        Canton::factory()->create(['provincia_id'=>'19','descripcion'=>'El Pangui']);
        Canton::factory()->create(['provincia_id'=>'19','descripcion'=>'Centinela del Cóndor']);
        Canton::factory()->create(['provincia_id'=>'19','descripcion'=>'Palanda']);
        Canton::factory()->create(['provincia_id'=>'19','descripcion'=>'Paquisha']);

        Canton::factory()->create(['provincia_id'=>'20','descripcion'=>'San Cristóbal']);
        Canton::factory()->create(['provincia_id'=>'20','descripcion'=>'Isabela']);
        Canton::factory()->create(['provincia_id'=>'20','descripcion'=>'Santa Cruz']);

        Canton::factory()->create(['provincia_id'=>'21','descripcion'=>'Lago Agrio']);
        Canton::factory()->create(['provincia_id'=>'21','descripcion'=>'Gonzalo Pizarro']);
        Canton::factory()->create(['provincia_id'=>'21','descripcion'=>'Putumayo']);
        Canton::factory()->create(['provincia_id'=>'21','descripcion'=>'Shushufindi']);
        Canton::factory()->create(['provincia_id'=>'21','descripcion'=>'Sucumbíos']);
        Canton::factory()->create(['provincia_id'=>'21','descripcion'=>'Cascales']);
        Canton::factory()->create(['provincia_id'=>'21','descripcion'=>'Cuyabeno']);

        Canton::factory()->create(['provincia_id'=>'22','descripcion'=>'Orellana']);
        Canton::factory()->create(['provincia_id'=>'22','descripcion'=>'Aguarico']);
        Canton::factory()->create(['provincia_id'=>'22','descripcion'=>'La Joya de los Sachas']);
        Canton::factory()->create(['provincia_id'=>'22','descripcion'=>'Loreto']);

        Canton::factory()->create(['provincia_id'=>'23','descripcion'=>'Santo Domingo']);

        Canton::factory()->create(['provincia_id'=>'24','descripcion'=>'Santa Elena']);
        Canton::factory()->create(['provincia_id'=>'24','descripcion'=>'La Libertad']);
        Canton::factory()->create(['provincia_id'=>'24','descripcion'=>'Salinas']);

        TipoDonacion::factory(2)->create();

        User::factory(5)->create();

        Donante::factory(5)->create();

        Distribuidor::factory(5)->create();

        Equipo::factory(5)->create();

        Pieza::factory(5)->create();

        DetalleDonacion::factory(5)->create();

        Beneficiario::factory(5)->create();

        Tecnico::factory(5)->create();

        Administrador::factory(5)->create();

        Historia::factory(5)->create();

        Charla::factory(5)->create();

        DetalleRecepcionTecnico::factory(5)->create();

        Diagnostico::factory(5)->create();

        DetalleEntregaDonacion::factory(5)->create();

    }
}

