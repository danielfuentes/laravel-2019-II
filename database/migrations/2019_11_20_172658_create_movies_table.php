<?php
// Amigas  y amigos este lo cree sólo para que lo tengan como ejemplo y sepan como trabajan las migration. Por ejemplo aquí cree la tabla movies dentro de la base de datos que se disponga en el archivo .env y claro luego de correr el comando php artisan migrate, lo que hace Laravel es buscar en la carpeta database --- migratios y ejecuta los archivos que allí estenó aquellos que fueron creados nuevos después de haber una migration nueva.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title');
            $table->decimal('rating',3,1);
            $table->integer('awards');
            $table->dateTime('release_date');
            $table->integer('length');
            $table->integer('genre_id');
            $table->timestamps();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
