<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $original_url = $request->input('original_url');
        $short_url = Str::random(12);

        $url = Url::firstOrCreate(
            ['original_url' => $original_url],
            ['short_url' => $short_url]
        );

        return redirect()->route('index')->with('short_url', $url->short_url);
    }

    public function redirect($short_url)
    {
        $url = Url::where('short_url', $short_url)->firstOrFail();
        return redirect($url->original_url);
    }
}
