<?php

namespace App\Http\Controllers;

use App\Events\ProspectStoreEvent;
use App\Http\Requests\StoreProspectRequest;
use App\Models\Prospect;
use App\Services\GetFeaturedProspectOfTheMonth;
use App\Services\UrlShortenerGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $prospects = Prospect::notFeatured()->get();
        $mostVotedProspect = (new GetFeaturedProspectOfTheMonth())->__invoke();
        $mostVotedProspectId = $mostVotedProspect?->id;

        return view('prospects.index')
            ->with('prospects', $prospects)
            ->with('mostVotedProspectId', $mostVotedProspectId);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $uuid = Str::uuid();
        return view('prospects.create')->with('uuid', $uuid);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProspectRequest $request): RedirectResponse|Response
    {
        $prospect = new Prospect($request->except(['cover-photo']));
        $files = Storage::disk('temporary')->files($request->get('uuid'));
        foreach ($files as $file) {
            $prospect->addMediaFromDisk($file, 'temporary')->toMediaCollection();
        }
        $prospect->google_maps_link = $request->get('google_maps_link')
            ? UrlShortenerGenerator::generate($request->get('google_maps_link'))
            : $prospect->google_maps_link;

        $prospect->facebook_link = $request->get('facebook_link')
            ? UrlShortenerGenerator::generate($request->get('facebook_link'))
            : $prospect->facebook_link;

        $prospect->reporter_email = $request->user()->email;
        $prospect->save();
        ProspectStoreEvent::dispatch($prospect);
        return redirect()->route('prospects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prospect $prospect): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $votes = $prospect->getCountVotes();
        $cost_of_next_vote = auth()->user()->getNextVoteCost($prospect);
        return view('prospects.show')
            ->with('prospect', $prospect)
            ->with('cost_of_next_vote', $cost_of_next_vote)
            ->with('votes', $votes);

    }

    public function destroy(Prospect $prospect)
    {
        if ($prospect->reporter_email !== auth()->user()->email) {
            return redirect()->route('prospects.index');
        }

        $prospect->delete();
        return redirect()->route('prospects.index')->with('success', 'Prospect deleted successfully');
    }

}
