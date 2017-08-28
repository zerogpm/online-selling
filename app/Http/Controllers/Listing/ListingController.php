<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Area, Category, Listing};

class ListingController extends Controller
{
    public function index(Area $area, Category $category)
    {
        $listings = Listing::with(['user', 'area'])->IsLive()->InArea($area)->FromCategory($category)->LatestFirst()->paginate(10);

        return view('listings.index', compact('listings', 'category'));
    }
}
