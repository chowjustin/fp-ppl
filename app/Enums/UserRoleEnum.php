<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case ADMIN = "admin";
    case STUDENT = "student";
    case DEPARTMENT = "department";
    case ORGANIZER = "organizer";
}
