<?php namespace Modules\Localisation\Repositories\Cache;

use Modules\Localisation\Repositories\ZoneRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheZoneDecorator extends BaseCacheDecorator implements ZoneRepository
{
    public function __construct(ZoneRepository $zone)
    {
        parent::__construct();
        $this->entityName = 'localisation.zones';
        $this->repository = $zone;
    }
}
