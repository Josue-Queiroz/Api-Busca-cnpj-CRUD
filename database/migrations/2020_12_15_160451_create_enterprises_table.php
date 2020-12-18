<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->char('cnpj', 14)->unique();
            $table->string('razao_social');
            $table->string('name')->nullable();
            $table->integer('cep');
            $table->string('Logradouro');
            $table->integer('number');
            $table->char('phone', 11);
            $table->string('email');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->char('uf', 2);
            $table->string('segmento');
            $table->foreign('segmento')->references('id')->on('segmentos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('inscricao_municipal');
            $table->string('inscricao_estadual')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enterprises');
    }
}
