<?php namespace Modules\Localisation\Repositories\Cache;

use Modules\Localisation\Repositories\CountryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCountryDecorator extends BaseCacheDecorator implements CountryRepository
{
    public function __construct(CountryRepository $country)
    {
        parent::__construct();
        $this->entityName = 'localisation.countries';
        $this->repository = $country;
    }
}
