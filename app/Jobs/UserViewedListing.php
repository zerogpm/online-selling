<?php

namespace App\Jobs;

use App\{User, Listing};
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UserViewedListing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public $listing;

    /**
     * UserViewedListing constructor.
     * @param User $user
     * @param Listing $listing
     */
    public function __construct(User $user, Listing $listing)
    {
        $this->user = $user;
        $this->listing = $listing;
    }

    /**
     * if we aleady have view on listing
     * increment + 1
     * insert inital record
     */
    public function handle()
    {
        $viewed = $this->user->viewedListings;

        if ($viewed->contains($this->listing)) {
            $viewed->where('id', $this->listing->id)->first()->pivot->increment('count');
            return;
        }

        $this->user->viewedListings()->attach($this->listing, [
            'count' => 1
        ]);
    }
}
