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
        //Sellers table alteration
        Schema::table('marketplace_sellers', function (Blueprint $table) {
            $table->dropUnique('marketplace_sellers_url_unique');
            $table->integer('company_id')->nullable()->unsigned()->after('id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unique(['url', 'company_id']);
        });

        Schema::table('marketplace_seller_reviews', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('customer_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        //Orders table alteration
        Schema::table('marketplace_orders', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('order_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('marketplace_order_items', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('order_item_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        //Transactions table alteration
        Schema::table('marketplace_transactions', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('marketplace_seller_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        //Products table alteration
        Schema::table('marketplace_products', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('product_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('marketplace_product_images', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('marketplace_product_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        //Shipments table alteration
        Schema::table('marketplace_shipments', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('shipment_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('marketplace_shipment_items', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('marketplace_shipment_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        //Invoices table alteration
        Schema::table('marketplace_invoices', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('invoice_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('marketplace_invoice_items', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('marketplace_invoice_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        //Refunds table alteration
        Schema::table('marketplace_refunds', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('refund_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('marketplace_refund_items', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('marketplace_refund_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        //product video alteration
        Schema::table('marketplace_product_videos', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('marketplace_product_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        //Seller Flag alteration
        Schema::table('marketplace_seller_flags', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned()->after('seller_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('marketplace_seller_flag_reasons', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table(
            'seller_categories',
            function (Blueprint $table) {
                $table->integer('company_id')->nullable()->unsigned()->after('seller_id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            }
        );

        Schema::table(
            'payment_requests',
            function (Blueprint $table) {
                $table->integer('company_id')->nullable()->unsigned()->after('seller_id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            }
        );

        Schema::table('cart_items', function (Blueprint $table) {
            if (!Schema::hasColumn('cart_items', 'company_id')) {
                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            }
        });

        Schema::table('mp_product_downloadable_links', function (Blueprint $table) {
            if (!Schema::hasColumn('mp_product_downloadable_links', 'company_id')) {
                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Sellers table alteration
        Schema::table('marketplace_sellers', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table('marketplace_seller_reviews', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        //Orders table alteration
        Schema::table('marketplace_orders', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table('marketplace_order_items', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        //Transactions table alteration
        Schema::table('marketplace_transactions', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        //Products table alteration
        Schema::table('marketplace_products', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table('marketplace_product_images', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        //Shipments table alteration
        Schema::table('marketplace_shipments', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table('marketplace_shipment_items', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        //Invoices table alteration
        Schema::table('marketplace_invoices', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table('marketplace_invoice_items', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        //Refunds table alteration
        Schema::table('marketplace_refunds', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table('marketplace_refund_items', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table('marketplace_product_videos', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table('marketplace_seller_flags', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table('marketplace_seller_flag_reasons', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table(
            'seller_categories',
            function (Blueprint $table) {
                $table->dropForeign(['company_id']);

                $table->dropColumn('company_id');
            }
        );

        Schema::table('payment_requests', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->dropColumn('company_id');
        });

        Schema::table('cart_items', function (Blueprint $table) {
            if (Schema::hasColumn('cart_items', 'company_id')) {
                $table->dropForeign(['company_id']);

                $table->dropColumn('company_id');
            }
        });

        Schema::table('mp_product_downloadable_links', function (Blueprint $table) {
            if (Schema::hasColumn('mp_product_downloadable_links', 'company_id')) {
                $table->dropForeign(['company_id']);

                $table->dropColumn('company_id');
            }
        });
    }
};
