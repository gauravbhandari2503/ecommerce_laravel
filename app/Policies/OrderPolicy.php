<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, $order)
    {
        return $user->id === $order->customer_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
    }

    public function cancelOrder(User $user, $orderId)
    {
        return $user->id === $orderId->customer_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
    }

}
