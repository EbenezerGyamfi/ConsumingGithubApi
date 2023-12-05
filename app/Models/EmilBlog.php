<?php

namespace App\Models;

use App\DataTransferObjects\EmailStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmilBlog extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => EmailStatus::class
    ];
}
