<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProspectRequest;
use App\Http\Requests\UpdateProspectRequest;
use App\Models\Prospect;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('prospects.index')->with('prospects', Prospect::all());
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

        $prospect->reporter_email = $request->user()->email;
        $prospect->save();

        return redirect()->route('prospects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prospect $prospect): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('prospects.show')->with('prospect', $prospect);
    }

}
