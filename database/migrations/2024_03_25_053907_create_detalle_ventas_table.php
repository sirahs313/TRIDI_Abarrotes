<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Venta')->unsigned();
            $table->bigInteger('Producto')->unsigned();
            $table->float('Subtotal');
            $table->integer('Cantidad');
            $table->timestamps();

            $table->foreign('Venta')->references('id')->on('ventas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
