<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BenefitsPolicy
{
    use HandlesAuthorization;

    //This method checks if the user can request for a child birth benefit
    public function requestForChildBirthBenefit(User $user): Response
    {
        //get the count of the user's childbirth benefits
        $childBirthRequests = $user->benefits()->where('request_type', "Child Birth")->get()->count();

//        dd($childBirthRequests);

        //check if the member's childbirth benefits are 2 or less
        return $childBirthRequests < 2
                ? Response::allow()             //if they are less than 2, meaning 2, then allow the
                : Response::deny();     //if the person has more than 2, then reply with a message

    }

    //This method checks if the user can request for a death of spouse benefit
    public function requestForDeathOfSpouseBenefit(User $user): Response
    {
        //get the count of the user's death of spouse benefits
        $deathOfSpouseBenefits = $user->benefits()->where('request_type', "Death of Spouse")->get()->count();

        //check if the member's death of spouse benefits is less than 1
        return $deathOfSpouseBenefits < 1
            ? Response::allow()             //if they have less than 1, then allow them
            : Response::deny();     //if the person has 1 or more, then deny them

    }

    //This method checks if the user can request for a death of parent benefit
    public function requestForDeathOfParentBenefit(User $user): Response
    {
        //get the count of the user's death of parent benefits
        $childBirthRequests = $user->benefits()->where('request_type', "Death of Parent")->get()->count();

//        dd($childBirthRequests);

        //check if the member's death of parent benefits are 2 or less
        return $childBirthRequests < 2
            ? Response::allow()             //if they are less than 2, meaning 2 or less, then allow them
            : Response::deny();     //if the person has 2 or more, then deny them

    }
}
