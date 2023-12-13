<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\NewRepoData;
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

    public function getLanguages(GithubInterface $githubInterface, string $repoName = 'paylater', string $owner = 'EbenezerGyamfi'){

        $response = $githubInterface->getRepoLanguages(repoName: $repoName, owner: $owner);


        return response()->json($response);
    }


    public function store(GithubInterface $githubInterface, Request $request){
        $response = $githubInterface->createRepo(new NewRepoData($request->name, $request->private, $request->description));

     return response()->json($response);
    }
}
