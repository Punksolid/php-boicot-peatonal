<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ProspectVotesController extends Controller
{
    public function store(Prospect $prospect, Request $request)
    {
        /** @var User $user */
        $user = auth()->user();
        $credits = $user->getNextVoteCost($prospect);
        try {
            $user->voteOn($prospect, $credits);
        } catch (Exception $exception) {
            return redirect()->back()->withError('No tienes suficientes créditos para votar.');
        }

        return redirect()->back()->withSuccess('Tu voto ha sido registrado.');
    }

    public function downvote(Prospect $prospect)
    {
        /** @var User $user */
        $user = auth()->user();

        try {
            $user->downVote($prospect);
        } catch (Exception $exception) {
            return redirect()->back()->withError('Hubo un problema para reducir tu voto.');
        }

        return redirect()->back()->withSuccess('Tu voto ha sido registrado.');
    }
}
