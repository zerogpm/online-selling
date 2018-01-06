<?php

namespace App\Http\Controllers\Listing;

use App\{Area, Listing};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function show(Area $area, Listing $listing)
    {
        $this->checkAuthorization($listing);

        return view('listings.payment.show', compact('listing'));
    }

    public function store(Request $request, Area $area, Listing $listing)
    {
        $this->checkAuthorization($listing);
    }

    private function checkAuthorization(Listing $listing)
    {
        $this->authorize('touch', $listing);

        if ($listing->live()) {
            return back();
        }
    }

}
