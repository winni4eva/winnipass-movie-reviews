<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->string('slug');
            $table->unsignedBigInteger('rating_id');
            $table->foreign('rating_id', 'films_rating_id_fk')
                ->references('id')
                ->on('ratings')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->decimal('ticket_price', 13, 2);
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id', 'films_country_id_fk')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('genre_id');
            $table->foreign('genre_id', 'films_genre_id_fk')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamp('release_date');
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
        Schema::dropIfExists('films');
    }
}
