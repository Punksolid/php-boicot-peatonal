<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class UrlShortener extends Controller
{
    public function redirect(Request $request)
    {

        $slug = $request->path();
        $link = Link::where('slug', $slug)->firstOrFail();

        $link->clicks++;
        $link->save();

        return redirect($link->url);
    }

}
