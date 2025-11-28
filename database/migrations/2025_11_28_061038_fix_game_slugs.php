<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $games = \Illuminate\Support\Facades\DB::table('games')->get();
        foreach ($games as $game) {
            \Illuminate\Support\Facades\DB::table('games')
                ->where('id', $game->id)
                ->update(['slug' => \Illuminate\Support\Str::slug($game->name)]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
