<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LinkController extends Controller
{
    function index()
    {
        // $listLink = Link::where('user_id', auth()->user()->id)->get();

        $listLink = Link::all();

        $pageData = [
            "title" => "Shortlink",
            "listLink" => $listLink,

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

        return "Berhasil buat link";

        return redirect('/link');
    }

    function edit($link)
    {
        $baseUrl = App::make('url')->to('/');
        $pageData = [
            'title' => "Edit Link",
            'link' => Link::find($link),
            "baseUrl" => $baseUrl,
        ];
        return view('link.edit', $pageData);
    }

    // function updateLink(Request $request, $link)
    // {
    //     $validate = $request->validate([
    //         'original' => 'unique:link',
    //         'short' => 'unique:link'
    //     ]);

    //     if (!$validate) {
    //         return redirect('/link');
    //     } else {
    //         Link::where('id', $link)->update($validate);
    //         return redirect('/link')->with('success', 'Link Berhasil Di Edit');
    //     }
    // }

    function show($link)
    {
        $link = Link::find($link);

        $pageData = [
            "title" => "Detail Link",
            "link" => $link,

        ];
        // dd($listLink);
        return view('link.show', $pageData);
    }

    function destroyLink($link)
    {
        Link::destroy($link);
        return back();
    }
}
