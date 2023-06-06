<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LinkController extends Controller
{
    function index()
    {
        return 'index';
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
        $linkBaru = $request->validate([
            'original' => 'required|unique:links',
            'short' => 'required|unique:links',
        ]);

        // $insert = Link::create($linkBaru);

        // if (!$insert) {
        //     return "Gagal buat link baru";
        // }

        return "Berhasil buat link";

        return redirect('/link');
    }
}
