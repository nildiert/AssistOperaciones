<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePershabilTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'pershabil';

    /**
     * Run the migrations.
     * @table pershabil
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('PersHabilID');
            $table->unsignedInteger('Habilidadess_HabilidadesID')->unsigned();
            $table->unsignedInteger('personas_PersonasID')->unsigned();
            $table->string('PersHabilCertificacion', 45)->nullable()->default('NO');
            $table->string('PersHabilNivExp', 45)->nullable()->default('BAJO');
            $table->dateTime('PersHabil_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('PersHabil_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('PersHabilUsuario', 45)->nullable()->default(null);
            $table->tinyInteger('PersHabilEstado')->nullable()->default('1');

            $table->index(["Habilidadess_HabilidadesID"], 'fk_Personas_has_Herramientas_Herramientas1_idx');

            $table->index(["personas_PersonasID"], 'fk_pershabil_personas1_idx');


            $table->foreign('Habilidadess_HabilidadesID', 'fk_Personas_has_Herramientas_Herramientas1_idx')
                ->references('HabilidadesID')->on('habilidades')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('personas_PersonasID', 'fk_pershabil_personas1_idx')
                ->references('PersonasID')->on('personas')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
