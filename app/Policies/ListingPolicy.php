<?php

namespace App\Policies;

use App\{User, Listing};
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }

    public function update(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }

    public function destory(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }
}