<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateSuperCmsPageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('super_cms_page_translations')) {
            Schema::create('super_cms_page_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('page_title');
                $table->string('url_key');
                $table->longText('html_content')->nullable();
                $table->text('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->string('locale');

                $table->integer('super_cms_page_id')->unsigned();
                $table->unique(['super_cms_page_id', 'url_key', 'locale'], 'pageid_urlkey_locale_unique_index');
                $table->foreign('super_cms_page_id')->references('id')->on('super_cms_pages')->onDelete('cascade');
            });

            $now = Carbon::now();

            DB::table('super_cms_page_translations')
                ->insert([
                    [
                        'locale'            => 'en',
                        'super_cms_page_id' => 1,
                        'url_key'           => 'about-us',
                        'html_content'      => '<div class="static-container"><div class="mb-5">About us page content</div></div>',
                        'page_title'        => 'About Us',
                        'meta_title'        => 'about us',
                        'meta_description'  => '',
                        'meta_keywords'     => 'aboutus',
                    ], [
                        'locale'            => 'en',
                        'super_cms_page_id' => 2,
                        'url_key'           => 'return-policy',
                        'html_content'      => '<div class="static-container"><div class="mb-5">Return policy page content</div></div>',
                        'page_title'        => 'Return Policy',
                        'meta_title'        => 'return policy',
                        'meta_description'  => '',
                        'meta_keywords'     => 'return, policy',
                    ], [
                        'locale'            => 'en',
                        'super_cms_page_id' => 3,
                        'url_key'           => 'refund-policy',
                        'html_content'      => '<div class="static-container"><div class="mb-5">Refund policy page content</div></div>',
                        'page_title'        => 'Refund Policy',
                        'meta_title'        => 'Refund policy',
                        'meta_description'  => '',
                        'meta_keywords'     => 'refund, policy',
                    ], [
                        'locale'            => 'en',
                        'super_cms_page_id' => 4,
                        'url_key'           => 'terms-conditions',
                        'html_content'      => '<div class="static-container"><div class="mb-5">Terms & conditions page content</div></div>',
                        'page_title'        => 'Terms & Conditions',
                        'meta_title'        => 'Terms & Conditions',
                        'meta_description'  => '',
                        'meta_keywords'     => 'term, conditions',
                    ], [
                        'locale'            => 'en',
                        'super_cms_page_id' => 5,
                        'url_key'           => 'terms-of-use',
                        'html_content'      => '<div class="static-container"><div class="mb-5">Terms of use page content</div></div>',
                        'page_title'        => 'Terms of use',
                        'meta_title'        => 'Terms of use',
                        'meta_description'  => '',
                        'meta_keywords'     => 'term, use',
                    ], [
                        'locale'            => 'en',
                        'super_cms_page_id' => 6,
                        'url_key'           => 'contact-us',
                        'html_content'      => '<div class="static-container"><div class="mb-5">Contact us page content</div></div>',
                        'page_title'        => 'Contact Us',
                        'meta_title'        => 'Contact Us',
                        'meta_description'  => '',
                        'meta_keywords'     => 'contact, us',
                    ], [
                        'locale'            => 'en',
                        'super_cms_page_id' => 7,
                        'url_key'           => 'customer-service',
                        'html_content'      => '<div class="static-container"><div class="mb-5">Customer service  page content</div></div>',
                        'page_title'        => 'Customer Service',
                        'meta_title'        => 'Customer Service',
                        'meta_description'  => '',
                        'meta_keywords'     => 'customer, service',
                    ], [
                        'locale'            => 'en',
                        'super_cms_page_id' => 8,
                        'url_key'           => 'whats-new',
                        'html_content'      => '<div class="static-container"><div class="mb-5">What\'s New page content</div></div>',
                        'page_title'        => "What's New",
                        'meta_title'        => "What's New",
                        'meta_description'  => '',
                        'meta_keywords'     => 'new',
                    ], [
                        'locale'            => 'en',
                        'super_cms_page_id' => 9,
                        'url_key'           => 'payment-policy',
                        'html_content'      => '<div class="static-container"><div class="mb-5">Payment Policy page content</div></div>',
                        'page_title'        => 'Payment Policy',
                        'meta_title'        => 'Payment Policy',
                        'meta_description'  => '',
                        'meta_keywords'     => 'payment, policy',
                    ], [
                        'locale'            => 'en',
                        'super_cms_page_id' => 10,
                        'url_key'           => 'shipping-policy',
                        'html_content'      => '<div class="static-container"><div class="mb-5">Shipping Policy  page content</div></div>',
                        'page_title'        => 'Shipping Policy',
                        'meta_title'        => 'Shipping Policy',
                        'meta_description'  => '',
                        'meta_keywords'     => 'shipping, policy',
                    ], [
                        'locale'            => 'en',
                        'super_cms_page_id' => 11,
                        'url_key'           => 'privacy-policy',
                        'html_content'      => '<div class="static-container"><div class="mb-5">Privacy Policy  page content</div></div>',
                        'page_title'        => 'Privacy Policy',
                        'meta_title'        => 'Privacy Policy',
                        'meta_description'  => '',
                        'meta_keywords'     => 'privacy, policy',
                    ],
                ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('super_cms_page_translations');
    }
}
