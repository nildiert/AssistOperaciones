<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProylinnegTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'proylinneg';

    /**
     * Run the migrations.
     * @table proylinneg
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('proyLinNegID');
            $table->unsignedInteger('lineanegocio_linNegID');
            $table->unsignedInteger('proyecto_ProyID');
            $table->string('proyLinNegTipo', 45)->nullable()->default(null);
            $table->string('proyLinNeg_Usuario', 45)->nullable()->default(null);
            $table->tinyInteger('proyLinNegEstado')->nullable()->default('1');

            $table->index(["proyecto_ProyID"], 'fk_proyLinNeg_proyecto1_idx');

            $table->index(["lineanegocio_linNegID"], 'fk_proyLinNeg_lineanegocio1_idx');
            $table->nullableTimestamps();


            $table->foreign('lineanegocio_linNegID', 'fk_proyLinNeg_lineanegocio1_idx')
                ->references('linNegID')->on('lineanegocio')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('proyecto_ProyID', 'fk_proyLinNeg_proyecto1_idx')
                ->references('id')->on('proyecto')
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
