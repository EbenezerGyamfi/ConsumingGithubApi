<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\CreateRepo;
use App\DataTransferObjects\NewRepoData;
use App\DataTransferObjects\Repo;
use App\DataTransferObjects\UpdateRepo;
use App\Interface\GithubInterface;
use App\Services\GithubService;
use Illuminate\Http\Request;
use Saloon\RateLimitPlugin\Exceptions\RateLimitReachedException;

class GithubServiceController extends Controller
{


  public function show(GithubInterface $githubInterface, string $name = 'EbenezerGyamfi', string $repoName = 'hello-world',)
  {

    try {
      $response = $githubInterface->getRepo($name, $repoName);
    } catch (RateLimitReachedException $exception) {
       \Log::error($exception->getLimit()->getRemainingSeconds());
    }


    return response()->json($response);
  }

  public function getLanguages(GithubInterface $githubInterface, string $repoName = "juniper", string $userName = "EbenezerGyamfi",)
  {


    $response =  $githubInterface->getLanguages(name: $userName, repoName: $repoName);

    return array_keys($response);
  }

  public function store(Request $request)
  {



    $response = app(GithubInterface::class)->createRepo(new NewRepoData($request->name));

    return response()->json(
      $response
    );
  }

  public function update(Request $request, GithubInterface $githubInterface, string $repoName = "ChangeRepoNameTest2", string $owner = "EbenezerGyamfi")
  {


    $response = $githubInterface->updateRepo($repoName, owner: $owner, updateRepo: new UpdateRepo($request->name));

    return response()->json($response);
  }
}
