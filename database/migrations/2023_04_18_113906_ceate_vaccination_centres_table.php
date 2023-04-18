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
        $sql = <<<'SQL'
        CREATE TABLE vaccination_centres (
            id                              BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            name                            CITEXT,
            code                            CITEXT,
            status                          BOOLEAN default true,
            created_at                      TIMESTAMP DEFAULT NOW(),
            updated_at                      TIMESTAMP,
            created_by                      CITEXT,
            updated_by                      CITEXT

        );
    SQL;
        DB::statement($sql);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccination_centres');
    }
};
