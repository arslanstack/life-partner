<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class EmailVerifiedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = User::find($event->user->id);
        $user->verify_status = 1;
        $user->status = 1;
        $user->membership_type = 0;
        $user->membership_price = 'Free';
        $user->membership_start = now();
        $user->membership_end = NULL;
        $user->membership_status = 0;
        $user->privacy_status = 1;
        $user->show_last_login = 1;
        $user->block_male_msg = 0;
        $user->block_female_msg = 0;
        $user->block_trans_msg = 0;
        $user->block_all_email = 0;
        $user->block_money_making_opp_email = 0;
        $user->block_local_event_meet_up_email = 0;
        $user->block_like_favorite_email = 0;
        $user->timezone = 'No time zone selected';
        $user->last_login = now();
        $user->save(); 
    }
}
