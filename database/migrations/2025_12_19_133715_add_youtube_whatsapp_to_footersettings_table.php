<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('footersettings', function (Blueprint $table) {
            $table->string('youtube')->nullable()->after('rss');
            $table->string('whatsapp')->nullable()->after('youtube');
        });
    }

    public function down()
    {
        Schema::table('footersettings', function (Blueprint $table) {
            $table->dropColumn(['youtube', 'whatsapp']);
        });
    }
};
