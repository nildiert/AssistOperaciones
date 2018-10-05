<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecfisofcTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'recfisofc';

    /**
     * Run the migrations.
     * @table recfisofc
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('RecFisOfcID');
            $table->unsignedInteger('RecursosFisicos_RecFisID')->unsigned();
            $table->unsignedInteger('oficina_idOfic')->unsigned();
            $table->unsignedInteger('personas_PersonasID')->unsigned();
            $table->date('RecFisFechaInicio')->nullable()->default(null);
            $table->date('RecFisFechaFin')->nullable()->default(null);
            $table->text('RecFisOfcObs')->nullable()->default(null);
            $table->timestamp('RecFisOfc_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('RecFisOfc_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('RecFisOfcUsuario', 45)->nullable()->default(null);
            $table->tinyInteger('RecFisOfc_estado')->nullable()->default('1');

            $table->index(["oficina_idOfic"], 'fk_recfisofc_oficina1_idx');

            $table->index(["personas_PersonasID"], 'fk_recfisofc_personas1_idx');

            $table->index(["RecursosFisicos_RecFisID"], 'fk_RecFisOfc_RecursosFisicos1_idx');


            $table->foreign('RecursosFisicos_RecFisID', 'fk_RecFisOfc_RecursosFisicos1_idx')
                ->references('RecFisID')->on('recursosfisicos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('oficina_idOfic', 'fk_recfisofc_oficina1_idx')
                ->references('idOfic')->on('oficina')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('personas_PersonasID', 'fk_recfisofc_personas1_idx')
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
