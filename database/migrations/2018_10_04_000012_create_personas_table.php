<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'personas';

    /**
     * Run the migrations.
     * @table personas
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('PersonasID');
            $table->string('PersonasNombreCompleto', 45)->nullable()->default(null);
            $table->string('PersonasPriApellido', 45)->nullable()->default(null);
            $table->string('PersonasSegApellido', 45)->nullable()->default(null);
            $table->string('PersonasPrimNombre', 45)->nullable()->default(null);
            $table->string('PersonasSegNombre', 45)->nullable()->default(null);
            $table->string('PersonasDocumento', 20)->nullable()->default(null);
            $table->string('PersonasTipoDoc', 2)->nullable()->default('CC');
            $table->string('PersonasTel', 15)->nullable()->default(null);
            $table->string('PersonasEspecialidad', 45)->nullable()->default(null);
            $table->string('PersonasActivo', 45)->nullable()->default('ACTIVO');
            $table->string('PersonasTitulo', 80)->nullable()->default(null);
            $table->date('PersonasFechaIngreso')->nullable()->default(null);
            $table->date('PersonasFechaRetiro')->nullable()->default(null);
            $table->dateTime('Personas_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('Personas_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('PersonasUsuario', 45)->nullable()->default(null);
            $table->tinyInteger('PersonasEstado')->nullable()->default('1');
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
