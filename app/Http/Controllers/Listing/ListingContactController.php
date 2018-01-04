<?php

namespace App\Http\Controllers\Listing;

use App\{
    Http\Requests\StoreListingContactFormRequest,
    Listing,
    Area
};
use App\Http\Controllers\Controller;

class ListingContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(StoreListingContactFormRequest $request, Area $area, Listing $listing)
    {
        dd($listing);
    }
}
