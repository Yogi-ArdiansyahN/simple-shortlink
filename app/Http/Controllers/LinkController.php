<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{
    function index()
    {
        // $listLink = Link::whe('user_id', auth()->user()->id)->get();

        $listLink = Link::all();
        $baseUrl = App::make('url')->to('/');

        $pageData = [
            "title" => "Shortlink",
            "listLink" => $listLink,
            "baseUrl" => $baseUrl,

        ];

        return view('link.index', $pageData);
    }

    function create()
    {
        $baseUrl = App::make('url')->to('/');

        $pageData = [
            "title" => "Shortlink baru",
            "baseUrl" => $baseUrl,

        ];

        return view('link.create', $pageData);
    }

    function store(Request $request)
    {
        // $userId = auth()->user()->id;
        $userId = 1;


        $linkBaru = $request->validate([
            'original' => 'required|unique:links',
            'short' => 'required|unique:links',
        ]);
        $linkBaru['user_id'] = $userId;

        $insert = Link::create($linkBaru);

        if (!$insert) {
            return "Gagal buat link baru";
        }

        return redirect('/link');
    }

    function redirect($shortLink)
    {
        $link = Link::where('short', $shortLink)->first();

        $originalLink = $link->original;

        return redirect()->away($originalLink);
    }
}
