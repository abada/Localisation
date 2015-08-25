<?php
namespace Modules\Localisation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Localisation\Repositories\CountryRepository;
use Modules\Localisation\Repositories\ZoneRepository;

class LocalisationDatabaseSeeder extends Seeder {

  /**
   * @var PageRepository
   */
  private $country;
  private $zone;

  public function __construct(CountryRepository $country, ZoneRepository $zone) {
    $this -> country = $country;
    $this -> zone = $zone;
  }

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    Model::unguard();

    $data = 
    			 [
    				'id'=>1,
            'iso_code_2' => 'EG',
            'iso_code_3' => 'EGY',
            'en' => [
                'title' => 'Egypt',
             ],
             'ar' => [
                'title' => 'مصر',
             ]
       
    			];
        $this->country->create($data);
				
				
				$data = [
    			
    				'country_id'=>1,
            'en' => [
                'title' => 'Luxor',
             ],
             'ar' => [
                'title' => 'الأقصر',
             ]
        ];
        $this->zone->create($data);
				
  }

}
