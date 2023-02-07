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
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('prospects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProspectRequest $request): \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
    {
        $prospect = new Prospect($request->except(['cover-photo']));
        $prospect->image_url = $request->file('cover-photo')->store('public');
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
