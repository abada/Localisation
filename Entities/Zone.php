<?php namespace Modules\Localisation\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use Translatable;

    protected $table = 'localisation__zones';
    public $translatedAttributes = [
    'zone_id',
    'title',
    ];
    protected $fillable = [
    
		'country_id',
		'status',
		
      // Translatable fields   
    'zone_id',
    'title'
   
    ];
}
