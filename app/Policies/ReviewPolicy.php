<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function deleteReview(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }

    public function updateReview(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }
}
