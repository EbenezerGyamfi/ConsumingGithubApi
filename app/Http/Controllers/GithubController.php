<?php

namespace App\Http\Controllers;

use App\Interface\GithubInterface;
use Illuminate\Http\Request;

class GithubController extends Controller
{
    //

    public function show(GithubInterface $githubInterface, string $name = 'EbenezerGyamfi', string $repo = "hello-world",)
    {
        $reponse = response()->json(
            $githubInterface->getRepo($name, $repo)
        );

        try {
            return $reponse;
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
        }
    }
}
