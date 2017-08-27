<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Area;

class AreaComposer
{
    private $area;

    public function compose(View $view)
    {
        //us in config
        if (!$this->area) {
            $this->area = Area::where('slug', session()->get('area', config()->get('fresh.defaults.area')))->first();
        }

        return $view->with('area', $this->area);
    }
}