<?php

namespace App\Http\Controllers;

use App\Interfaces\GithubInterface;
use Illuminate\Http\Request;

class GithubController extends Controller
{
    //

    public function getRepo( GithubInterface $githubInterface, string $repoName = 'paylater', string $owner = 'EbenezerGyamfi',)
    {


        $response = $githubInterface->getRepo(repoName: $repoName, owner: $owner);


        return response()->json([
            $response
        ]);
    }
}
