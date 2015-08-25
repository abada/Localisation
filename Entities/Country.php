<?php namespace Modules\Localisation\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Translatable;

    protected $table = 'localisation__countries';
    public $translatedAttributes = [
    'country_id',
    'title',
    ];
    protected $fillable = [
    
		'iso_code_2',
		'iso_code_3',
		'status',
		
      // Translatable fields   
    'country_id',
    'title',
    ];
}
