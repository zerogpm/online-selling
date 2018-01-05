<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\{Area , Category};


class CreateListingComposer
{
    public function compose(View $view)
    {
        $categories = Category::get()->toTree();
        $areas = Area::get()->toTree();

        $view->with(compact('categories', 'areas'));
    }
}