<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'master_key' => 'config',
                'config_key' => 'config_company_name'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_company_mobile_number_footer'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_company_address'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_google_map_address_link'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_getting_inquiry_form_email'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_getting_contact_details_email'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_general_email'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_general_phone_number'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_admission_email'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_admission_phone_number'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_management_email'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_management_phone_number'
            ],            
            [
                'master_key' => 'config',
                'config_key' => 'company_logo'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'company_fav_logo'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'company_vepl_footer_logo'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'company_brochure'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_facebook'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_instagram'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_linkedin'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_twitter'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_you_tube'
            ],            
            [
                'master_key' => 'config',
                'config_key' => 'config_whatsapp_number'
            ],            
            [
                'master_key' => 'config',
                'config_key' => 'config_career_inquiry_details_email'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'is_banner_active'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_home_meta_title'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_home_meta_keyword'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_home_meta_description'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_home_schema_tag'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_about_meta_title'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_about_meta_keyword'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_about_meta_description'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_about_schema_tag'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_inquiry_form_meta_title'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_inquiry_form_meta_keyword'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_inquiry_form_meta_description'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_inquiry_form_schema_tag'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_reach_us_meta_title'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_reach_us_meta_keyword'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_reach_us_meta_description'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_reach_us_schema_tag'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_awards_winning'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_happy_clients'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_engineer_members'
            ],
            [
                'master_key' => 'config',
                'config_key' => 'config_getting_our_product_inquiry_form_email'
            ],
        ]);
    }
}
