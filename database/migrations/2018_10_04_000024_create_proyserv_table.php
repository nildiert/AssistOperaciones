<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyservTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'proyserv';

    /**
     * Run the migrations.
     * @table proyserv
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ProyServId');
            $table->integer('servicios_ServId')->unsigned();
            $table->unsignedInteger('proyecto_ProyID')->unsigned();
            $table->timestamp('ProyServ_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ProyServ_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('ProyServUsuario', 45)->nullable();
            $table->tinyInteger('ProyecServEstado')->nullable()->default('1');

            $table->index(["proyecto_ProyID"], 'fk_proyserv_proyecto1_idx');

            $table->index(["servicios_ServId"], 'fk_proyserv_servicios1_idx');


            $table->foreign('servicios_ServId', 'fk_proyserv_servicios1_idx')
                ->references('ServId')->on('servicios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('proyecto_ProyID', 'fk_proyserv_proyecto1_idx')
                ->references('ProyID')->on('proyecto')
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
