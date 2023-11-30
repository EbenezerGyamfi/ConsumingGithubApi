<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\CreateRepo;
use App\DataTransferObjects\NewRepoData;
use App\DataTransferObjects\Repo;
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

    public function getLanguages( GithubInterface $githubInterface, string $repoName = "juniper", string $userName = "EbenezerGyamfi",){


       $response =  $githubInterface->getLanguages(name: $userName, repoName: $repoName);
      
       return array_keys($response);
    }

    public function store(Request $request){
        


      $response = app(GithubInterface::class)->createRepo( new NewRepoData($request->name));

      return response()->json(
        $response
      );

    }
}
