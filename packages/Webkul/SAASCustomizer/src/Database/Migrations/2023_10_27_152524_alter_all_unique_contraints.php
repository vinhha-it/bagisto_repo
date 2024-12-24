<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class AlterAllUniqueContraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Migration Package: Address
         */

        // addresses Table's Foreign Key Added.
        if (! Schema::hasColumn('addresses', 'company_id')) {
            Schema::table('addresses', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('address_type');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: Attribute
         */

        // attributes Table's Unique Constraint Changed & Foreign Key Added.
        if (! Schema::hasColumn('attributes', 'company_id')) {
            DB::table('attributes')->delete();
            Schema::table('attributes', function (Blueprint $table) {
                $table->dropUnique('attributes_code_unique');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unique(['code', 'company_id'], 'attribute_company_code_unique_index');
            });
        }

        // attribute_families Table's Foreign Key Added.
        if (! Schema::hasColumn('attribute_families', 'company_id')) {
            Schema::table('attribute_families', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // attribute_groups Table's Unique Constraint Changed & Foreign Key Added.
        if (! Schema::hasColumn('attribute_groups', 'company_id')) {
            Schema::table('attribute_groups', function (Blueprint $table) {
                $table->dropForeign(['attribute_family_id']);
                $table->dropUnique('attribute_groups_attribute_family_id_name_unique');
                
                $table->foreign('attribute_family_id')->references('id')->on('attribute_families')->onDelete('cascade');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

                $table->unique(['attribute_family_id', 'name', 'company_id'], 'attribute_family_id_name_company_id_unique_index');
            });
        }

        /**
         * Migration Package: CartRule
         */

        // cart_rules Table's Foreign Key Added.
        if (! Schema::hasColumn('cart_rules', 'company_id')) {
            Schema::table('cart_rules', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // cart_rule_coupons Table's Foreign Key Added.
        if (! Schema::hasColumn('cart_rule_coupons', 'company_id')) {
            Schema::table('cart_rule_coupons', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: CatalogRule
         */

        // catalog_rules Table's Foreign Key Added.
        if (! Schema::hasColumn('catalog_rules', 'company_id')) {
            Schema::table('catalog_rules', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // catalog_rule_products Table's Foreign Key Added.
        if (! Schema::hasColumn('catalog_rule_products', 'company_id')) {
            Schema::table('catalog_rule_products', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // catalog_rule_product_prices Table's Foreign Key Added.
        if (! Schema::hasColumn('catalog_rule_product_prices', 'company_id')) {
            Schema::table('catalog_rule_product_prices', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: Category
         */

        // categories Table's Foreign Key Added.
        if (! Schema::hasColumn('categories', 'company_id')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // category_translations Table's Unique Constraint Changed & Foreign Key Changed.
        if (! Schema::hasColumn('category_translations', 'company_id')) {
            Schema::table('category_translations', function (Blueprint $table) {
                $table->dropForeign(['category_id']);
                $table->dropUnique('category_translations_category_id_slug_locale_unique');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->unique(['category_id', 'slug', 'locale', 'company_id'], 'id_slug_locale_company_id_unique_index');
            });
        }

        /**
         * Migration Package: Checkout
         */

        // cart Table's Foreign Key Added.
        if (! Schema::hasColumn('cart', 'company_id')) {
            Schema::table('cart', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: Checkout
         */
        // cart items Table's Foreign Key Added.
        if (! Schema::hasColumn('cart_items', 'company_id')) {
            Schema::table('cart_items', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }
        
        /**
         * Migration Package: CMS
         */

        // cms_pages Table's Foreign Key Added.
        if (! Schema::hasColumn('cms_pages', 'company_id')) {
            Schema::table('cms_pages', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // cms_page_translations Table's Foreign Key Added.
        if (! Schema::hasColumn('cms_page_translations', 'company_id')) {
            Schema::table('cms_page_translations', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('cms_page_id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: Core
         */

        // channels Table's Foreign Key Added.
        if (! Schema::hasColumn('channels', 'company_id')) {
            Schema::table('channels', function (Blueprint $table) {
                $table->unique(['hostname'], 'channels_hostname_unique');

                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // channel_translations Table's Foreign Key Added.
        if (! Schema::hasColumn('channel_translations', 'company_id')) {
            Schema::table('channel_translations', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('channel_id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // core_config Table's Foreign Key Added.
        if (! Schema::hasColumn('core_config', 'company_id')) {
            Schema::table('core_config', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // currencies Table's Foreign Key Added.
        if (! Schema::hasColumn('currenciescurrencies', 'company_id')) {
            Schema::table('currencies', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // currency_exchange_rates Table's Unique Constraint & Foreign Key Changed.
        if (! Schema::hasColumn('currency_exchange_rates', 'company_id')) {
            Schema::table('currency_exchange_rates', function(Blueprint $table) {
                $table->dropForeign(['target_currency']);
                $table->dropUnique('currency_exchange_rates_target_currency_unique');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->foreign('target_currency')->references('id')->on('currencies')->onDelete('cascade');
                $table->unique(['target_currency', 'company_id'], 'target_currency_company_id_unique_id');
            });
        }

        // locales Table's Unique Constraint Changed & Foreign Key Added.
        if (! Schema::hasColumn('locales', 'company_id')) {
            Schema::table('locales', function(Blueprint $table) {
                $table->dropUnique('locales_code_unique');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unique(['code', 'company_id'], 'code_company_id_unqiue_index');
            });
        }

        // subscribers_list Table's Foreign Key Added.
        if (! Schema::hasColumn('subscribers_list', 'company_id')) {
            Schema::table('subscribers_list', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: Customer
         */

        // customers Table's Unique Constraint Changed & Foreign Key Added.
        if (! Schema::hasColumn('customers', 'company_id')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->dropUnique('customers_email_unique');
                $table->dropUnique('customers_phone_unique');

                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unique(['email', 'company_id']);
                $table->unique(['phone', 'company_id']);
            });
        }

        // customer_groups Table's Foreign Key Added.
        if (! Schema::hasColumn('customer_groups', 'company_id')) {
            Schema::table('customer_groups', function (Blueprint $table) {
                $table->dropUnique('customer_groups_code_unique');

                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unique(['code', 'company_id']);
            });
        }

        // wishlist Table's Foreign Key Added.
        if (! Schema::hasColumn('wishlist_items', 'company_id')) {
            Schema::table('wishlist_items', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: Inventory
         */

        // inventory_sources Table's Unique Constraint Changed & Foreign Key Added.
        if (! Schema::hasColumn('inventory_sources', 'company_id')) {
            Schema::table('inventory_sources', function (Blueprint $table) {
                $table->dropUnique('inventory_sources_code_unique');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unique(['code', 'company_id'], 'code_company_id_unique');
            });
        }

        /**
         * Migration Package: Marketing
         */

        // marketing_templates Table's Foreign Key Added.
        if (! Schema::hasColumn('marketing_templates', 'company_id')) {
            Schema::table('marketing_templates', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // marketing_events Table's Foreign Key Added.
        if (! Schema::hasColumn('marketing_events', 'company_id')) {
            DB::table('marketing_events')->delete();
            Schema::table('marketing_events', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // marketing_campaigns Table's Foreign Key Added.
        if (! Schema::hasColumn('marketing_campaigns', 'company_id')) {
            Schema::table('marketing_campaigns', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: Product
         */

        // products Table's Unique Constraint Changed & Foreign Key Added.
        if (! Schema::hasColumn('products', 'company_id')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropUnique('products_sku_unique');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unique(['sku', 'company_id'], 'sku_company_id_unique');
            });
        }

        // product_flat Table's Unique Constraint Changed & Foreign Key Added.
        if (! Schema::hasColumn('product_flat', 'company_id')) {
            Schema::table('product_flat', function (Blueprint $table) {
                $table->dropForeign(['product_id']);
                $table->dropUnique('product_flat_unique_index');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
                $table->unique(['product_id', 'channel', 'locale', 'company_id'], 'product_flat_unique_index');
            });
        }

        // product_attribute_values Table's Unique Constraint Changed & Foreign Key Added.
        if (! Schema::hasColumn('product_attribute_values', 'company_id')) {
            Schema::table('product_attribute_values', function (Blueprint $table) {
                $table->dropUnique('chanel_locale_attribute_value_index_unique');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unique(['channel', 'locale', 'attribute_id', 'product_id', 'company_id'], 'channel_locale_attr_id_product_id_company_unique');
            });
        }

        // product_inventories Table's Foreign Key Added.
        if (! Schema::hasColumn('product_inventories', 'company_id')) {
            Schema::table('product_inventories', function (Blueprint $table) {
                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // product_reviews Table's Foreign Key Added.
        if (! Schema::hasColumn('product_reviews', 'company_id')) {
            Schema::table('product_reviews', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: Sales
         */
        
        // orders Table's Foreign Key Added.
        if (! Schema::hasColumn('orders', 'company_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // order_items Table's Foreign Key Added.
        if (! Schema::hasColumn('order_items', 'company_id')) {
            Schema::table('order_items', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // order_payment Table's Foreign Key Added.
        if (! Schema::hasColumn('order_payment', 'company_id')) {
            Schema::table('order_payment', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // order_transactions Table's Foreign Key Added.
        if (! Schema::hasColumn('order_transactions', 'company_id')) {
            Schema::table('order_transactions', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('order_id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // invoices Table's Foreign Key Added.
        if (! Schema::hasColumn('invoices', 'company_id')) {
            Schema::table('invoices', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // invoice_items Table's Foreign Key Added.
        if (! Schema::hasColumn('invoice_items', 'company_id')) {
            Schema::table('invoice_items', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // shipments Table's Foreign Key Added.
        if (! Schema::hasColumn('shipments', 'company_id')) {
            Schema::table('shipments', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // refunds Table's Foreign Key Added.
        if (! Schema::hasColumn('refunds', 'company_id')) {
            Schema::table('refunds', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // refund_items Table's Foreign Key Added.
        if (! Schema::hasColumn('refund_items', 'company_id')) {
            Schema::table('refund_items', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // downloadable_link_purchased Table's Foreign Key Added.
        if (! Schema::hasColumn('downloadable_link_purchased', 'company_id')) {
            Schema::table('downloadable_link_purchased', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: Shop
         */

        // theme_customizations Table's Foreign Key Added.
        if (! Schema::hasColumn('theme_customizations', 'company_id')) {
            DB::table('theme_customizations')->delete();
            Schema::table('theme_customizations', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // sitemaps Table's Foreign Key Added.
        if (! Schema::hasColumn('sitemaps', 'company_id')) {
            Schema::table('sitemaps', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('path');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: Tax
         */

        // tax_categories Table's Unique Constraint Changed & Foreign Key Added.
        if (! Schema::hasColumn('tax_categories', 'company_id')) {
            Schema::table('tax_categories', function (Blueprint $table) {
                $table->dropUnique('tax_categories_code_unique');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unique(['code', 'company_id'], 'tax_categories_code_unique');
            });
        }

        // tax_rates Table's Unique Constraint Changed & Foreign Key Added.
        if (! Schema::hasColumn('tax_rates', 'company_id')) {
            Schema::table('tax_rates', function (Blueprint $table) {
                $table->dropUnique('tax_rates_identifier_unique');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unique(['identifier', 'company_id'], 'tax_rates_identifier_unique');
            });
        }

        // roles Table's Foreign Key Added.
        if (! Schema::hasColumn('roles', 'company_id')) {
            Schema::table('roles', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: User
         */

        // admins Table's Foreign Key Added.
        if (! Schema::hasColumn('admins', 'company_id')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->dropUnique('admins_email_unique');

                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unique(['email', 'company_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('cart_rules', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('cart_rule_coupon', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('catalog_rules', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('catalog_rules_products', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('catalog_rules_product_prices', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('cms_pages', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('cms_page_translations', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('channels', function (Blueprint $table) {
            $table->dropUnique('channels_hostname_unique');
        });

        Schema::table('channel_translations', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('marketing_templates', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('marketing_events', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('marketing_campaigns', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('order_transactions', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('refunds', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('refund_items', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('downloadable_link_purchased', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('sitemaps', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
    }
}