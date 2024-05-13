<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Code16\OzuClient\Support\Database\MigratesOzuTable;

return new class extends Migration
{
    use MigratesOzuTable;

    public function up(): void
    {
        $this->createOzuTable('pages');

        Schema::table('pages', function (Blueprint $table) {
            $table->string('key')->unique();
        });
    }
};
