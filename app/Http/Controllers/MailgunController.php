<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\EmailStatus;
use App\Models\EmilBlog;
use Illuminate\Http\Request;

class MailgunController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, EmailStatus $status)
    {
        //
    }
}
