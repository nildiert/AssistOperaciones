<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersempTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'persemp';

    /**
     * Run the migrations.
     * @table persemp
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('PersEmpId');
            $table->unsignedInteger('personas_PersonasID')->unsigned();
            $table->unsignedInteger('empresa_EmpId')->unsigned();
            $table->date('PersEmpFechaIni')->nullable()->default(null);
            $table->date('PersEmpFechaFin')->nullable()->default(null);
            $table->string('PersEmpUsuario', 45)->nullable()->default(null);
            $table->tinyInteger('PersEmpEstado')->nullable()->default('1');

            $table->index(["personas_PersonasID"], 'fk_persEmp_personas1_idx');

            $table->index(["empresa_EmpId"], 'fk_persEmp_empresa1_idx');
            $table->nullableTimestamps();


            $table->foreign('empresa_EmpId', 'fk_persEmp_empresa1_idx')
                ->references('EmpId')->on('empresa')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('personas_PersonasID', 'fk_persEmp_personas1_idx')
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
