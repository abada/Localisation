<?php namespace Modules\Localisation\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('localisation::abcs.title.abcs'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('localisation::countries.title.countries'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.localisation.country.create');
                    $item->route('admin.localisation.country.index');
                    $item->authorize(
                        $this->auth->hasAccess('localisation.countries.index')
                    );
                });
                $item->item(trans('localisation::zones.title.zones'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(1);
                    $item->append('admin.localisation.zone.create');
                    $item->route('admin.localisation.zone.index');
                    $item->authorize(
                        $this->auth->hasAccess('localisation.zones.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
