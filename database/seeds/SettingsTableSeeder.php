<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([

       		'site_name' 	    => 'Incattech',
       		'contact_address' => 'Arowojobe estate, maryland Lagos, Nigeria',
       		'contact_email'   => 'info@incattech.com.ng',
       	  'contact_number'  => '+2348135282319',
          'facebook'        => 'https://facebook.com/incattech',
          'instagram'       => 'https://instagram.com/incattech',
          'twitter'         => 'https://twitter.com/incattech',
          'youtube'         => 'https://youtube.com/',
          'whatsapp'        => 'https://api.whatsapp.com/send?phone=2348135282319',
          'about_us'        => "At Incattect, we always adapat new technologies and and as well talk on innovative products and solutions to give our client first movers advantage
                                We're committed to serving our customers. We seek to understand their challenges and opportunities, and work together towards viable solutions
                                We spend a fixed revneue on Research. Thats how much we believe in our Products and shaping the future of Geographic Information System (GIS)",
          

       	]);
    }
}
