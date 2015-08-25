<?php namespace Modules\Localisation\Entities;

use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
    'country_id',
    'title',
   
    ];
    protected $table = 'localisation__country_translations';
}
