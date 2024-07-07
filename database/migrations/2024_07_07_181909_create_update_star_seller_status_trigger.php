<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER `UpdateStarSellerStatus` AFTER INSERT ON `purchases`
            FOR EACH ROW
            BEGIN
                DECLARE total_sales INT;
                DECLARE seller_id BIGINT;

                SELECT pr.seller_id
                INTO seller_id
                FROM purchases p
                JOIN products pr ON p.product_id = pr.id
                WHERE p.transaction_id = NEW.transaction_id
                LIMIT 1;

                IF seller_id IS NOT NULL THEN
                    -- Hitung total transaksi penjualan yang dilakukan oleh seller
                    SELECT COUNT(*)
                    INTO total_sales
                    FROM transactions t
                    JOIN purchases p ON t.id = p.transaction_id
                    JOIN products pr ON p.product_id = pr.id
                    WHERE pr.seller_id = seller_id;

                    IF total_sales >= 100 THEN
                        UPDATE user_details
                        SET status_user = "star seller"
                        WHERE user_id = seller_id;
                    END IF;

                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `UpdateStarSellerStatus`');
    }
};
