<?php namespace Modules\Localisation\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Localisation\Entities\Zone;
use Modules\Localisation\Repositories\ZoneRepository;
use Modules\Localisation\Repositories\CountryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ZoneController extends AdminBaseController
{
    /**
     * @var ZoneRepository
     */
    private $zone;

    public function __construct(ZoneRepository $zone,CountryRepository $countries)
    {
        parent::__construct();

        $this->zone = $zone;
				$this->countries=$countries;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $zones = $this->zone->all();

        return view('localisation::admin.zones.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    		 $countries= $this->countries->all();
        return view('localisation::admin.zones.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->zone->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('localisation::zones.title.zones')]));

        return redirect()->route('admin.localisation.zone.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Zone $zone
     * @return Response
     */
    public function edit(Zone $zone)
    {
    	 $countries= $this->countries->all();
        return view('localisation::admin.zones.edit', compact('zone','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Zone $zone
     * @param  Request $request
     * @return Response
     */
    public function update(Zone $zone, Request $request)
    {
        $this->zone->update($zone, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('localisation::zones.title.zones')]));

        return redirect()->route('admin.localisation.zone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Zone $zone
     * @return Response
     */
    public function destroy(Zone $zone)
    {
        $this->zone->destroy($zone);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('localisation::zones.title.zones')]));

        return redirect()->route('admin.localisation.zone.index');
    }
}
