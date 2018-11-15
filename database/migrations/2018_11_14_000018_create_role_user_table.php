<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'role_user';

    /**
     * Run the migrations.
     * @table role_user
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('roluserid');
            $table->unsignedInteger('roles_id');
            $table->unsignedInteger('users_id');

            $table->index(["roles_id"], 'fk_role_user_roles1_idx');

            $table->index(["users_id"], 'fk_role_user_users1_idx');
            $table->nullableTimestamps();


            $table->foreign('roles_id', 'fk_role_user_roles1_idx')
                ->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_role_user_users1_idx')
                ->references('id')->on('users')
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
