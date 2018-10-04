<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecursosfisicosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'recursosfisicos';

    /**
     * Run the migrations.
     * @table recursosfisicos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('RecFisID');
            $table->integer('RecFisCod')->nullable()->default(null);
            $table->string('RecFisTipo', 45)->nullable()->default(null);
            $table->timestamp('RecFis_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('RecFis_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('RecFis_usuario', 45)->nullable()->default(null);
            $table->tinyInteger('RecFis_Estado')->nullable()->default('1');
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
