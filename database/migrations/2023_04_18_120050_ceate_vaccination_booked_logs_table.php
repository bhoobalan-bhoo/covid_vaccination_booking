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
        CREATE TABLE vaccination_booked_logs (
                id                              BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
                user_id                         BIGINT references users(id),
                vaccination_centre_id           BIGINT references vaccination_centres(id),
                available_timings_id            BIGINT references available_timings(id),
                slot_id                         BIGINT references slots(id),
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
        Schema::dropIfExists('vaccination_booked_logs');
    }
};
