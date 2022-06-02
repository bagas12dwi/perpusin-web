<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('
            CREATE TRIGGER generate_booking_number BEFORE INSERT ON bookings FOR EACH ROW 
                BEGIN
                    INSERT INTO sequence_booking_number VALUES (NULL);
                    SET NEW.trx_number = CONCAT("BOOK/",DATE_FORMAT(CURDATE(), "%Y%m%d"),"/",LPAD(LAST_INSERT_ID(), 5, "0")); 
                END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::unprepared('DROP TRIGGER "generate_booking_number"');
    }
};
