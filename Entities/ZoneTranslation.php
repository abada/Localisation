<?php namespace Modules\Localisation\Entities;

use Illuminate\Database\Eloquent\Model;

class ZoneTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','zone_id'];
    protected $table = 'localisation__zone_translations';
}
