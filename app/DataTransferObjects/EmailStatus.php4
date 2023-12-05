<?php

namespace App\DataTransferObjects;

enum EmailStatus : string{
    case Pending = 'pending';
    case Delivered ='delivered';
    case TemporaryFail = 'temporary_failed';
    case PermanentFail = 'permanent_fail';
}