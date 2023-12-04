<?php

namespace App\Http\Controllers;

use App\Exceptions\Integrations\Github\GithubExceptions;
use App\Interface\GithubInterface;
use App\Services\GithubService;
use Illuminate\Http\Request;

class GithubServiceController extends Controller
{

  public function index(string $name = 'EbenezerGyami'){

    

try {
  $response = app(GithubInterface::class)->getRepos($name);
} catch (GithubExceptions $githubException) {
  
    \Log::error($githubException->getMessage());
}

    return response()->json([
       'response' => $response
    ]);

  }


  public function show(GithubInterface $githubInterface, string $name = 'EbenezerGyamfi', string $repoName = 'Taste-Repo-11',)
  {

    $response = $githubInterface->getRepo($name, $repoName);



    try {
      $response;
    } catch (\Throwable $th) {
      \Log::error($th->getMessage());
    }
    return response()->json($response);
  }
}
