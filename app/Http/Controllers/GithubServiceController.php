<?php

namespace App\Http\Controllers;

use App\Interface\GithubInterface;
use App\Services\GithubService;
use Illuminate\Http\Request;

class GithubServiceController extends Controller
{


    public function show(GithubInterface $githubInterface, string $name = 'EbenezerGyamfi', string $repoName = 'hello-world', )
    {

        $response = $githubInterface->getRepo($name, $repoName);


        return response()->json($response);
    }
}
