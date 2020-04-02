<?php


use App\Enums\RoleUser;
use App\Enums\IsActive;

//      This Function To Return Users Role As String Not Intger

function getUserRole($user_role)
{
    switch ($user_role) {
        case RoleUser::User:
            return "User";
        case RoleUser::Admin:
            return "Admin";
        case RoleUser::Doctor;
            return "Doctor";
        case RoleUser::Hospital:
            return "Hospital";
        case RoleUser::Receptionist:
            return "Resceptionist";
        case RoleUser::Tecnical_Support:
            return "Tecincal Support";
        default:
            return "This User Is Not Eligible For Have a Role";
    }
}

// function getActive($isActive)
// {
//     switch ($isActive) {
//         case IsActive::Active:
//             return "Active";
//         case IsActive::NotActive;
//             return "NotActive";
//         case IsActive::Blocked:
//             return "This User Blocked";
//         case IsActive::NotInBlock:
//         return "Not Blocked. Allowed";
//         case IsActive::Deleted:
//             return "This User Deleted";
//         case IsActive::NotDeleted:
//             return "Allowed User Not Deleted";
//     }


// }
