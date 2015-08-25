<?php namespace Modules\Localisation\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Localisation\Entities\Country;
use Modules\Localisation\Repositories\CountryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CountryController extends AdminBaseController
{
    /**
     * @var CountryRepository
     */
    private $country;

    public function __construct(CountryRepository $country)
    {
        parent::__construct();

        $this->country = $country;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $countries = $this->country->all();
				

        return view('localisation::admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('localisation::admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->country->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('localisation::countries.title.countries')]));

        return redirect()->route('admin.localisation.country.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Country $country
     * @return Response
     */
    public function edit(Country $country)
    {
        return view('localisation::admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Country $country
     * @param  Request $request
     * @return Response
     */
    public function update(Country $country, Request $request)
    {
        $this->country->update($country, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('localisation::countries.title.countries')]));

        return redirect()->route('admin.localisation.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Country $country
     * @return Response
     */
    public function destroy(Country $country)
    {
        $this->country->destroy($country);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('localisation::countries.title.countries')]));

        return redirect()->route('admin.localisation.country.index');
    }
}
