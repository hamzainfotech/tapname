<?php

namespace App\Policies;

use App\Models\NfcCard;
use App\Models\User;

class NfcCardPolicy
{
    public function view(User $user, NfcCard $card): bool
    {
        return $user->id === $card->user_id;
    }

    public function update(User $user, NfcCard $card): bool
    {
        return $user->id === $card->user_id;
    }

    public function delete(User $user, NfcCard $card): bool
    {
        return $user->id === $card->user_id;
    }
}