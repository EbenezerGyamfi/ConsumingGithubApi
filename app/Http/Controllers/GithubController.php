<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\NewRepoData;
use App\DataTransferObjects\UpdateRepoData;
use App\Interfaces\GithubInterface;
use Illuminate\Http\Request;

class GithubController extends Controller
{
    //

    public function getRepo(GithubInterface $githubInterface, string $repoName = 'paylater', string $owner = 'EbenezerGyamfi',)
    {


        $response = $githubInterface->getRepo(repoName: $repoName, owner: $owner);


        return response()->json([
            $response
        ]);
    }

    public function getLanguages(GithubInterface $githubInterface, string $repoName = 'paylater', string $owner = 'EbenezerGyamfi')
    {

        $response = $githubInterface->getRepoLanguages(repoName: $repoName, owner: $owner);


        return response()->json($response);
    }


    public function store(GithubInterface $githubInterface, Request $request)
    {
        $response = $githubInterface->createRepo(new NewRepoData($request->name, $request->private, $request->description));

        return response()->json($response);
    }

    public function update(GithubInterface $githubInterface, Request $request, string $owner = 'EbenezerGyamfi', $repo = 'test-1212')
    {

        $response = $githubInterface->updateRepo(
                repoName: $repo,
                owner: $owner,
                updateRepoData: new UpdateRepoData(
                        repoName: $request->name,
                        private: $request->private,
                        description: $request->description
                    )
            );


        return response()->json($response);
    }


    public function delete(GithubInterface $githubInterface, string $repoName = 'LoginActivity', string $owner = 'EbenezerGyamfi'){

        $response = $githubInterface->deleteRepo($repoName, $owner);


        return response()->json([
           "message " => "Repo Deleted",
           $response
        ]);
    }
}
