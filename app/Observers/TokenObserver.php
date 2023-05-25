<?php

namespace App\Observers;

use App\Models\Token;

class TokenObserver
{
    /**
     * Handle the Token "created" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function created(Token $token)
    {
        // TODO: challenge 3.0 create a log when a token is created
    }

    /**
     * Handle the Token "deleted" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function deleted(Token $token)
    {
        // TODO: challenge 3.0 create a log when a token is deleted
    }

}
