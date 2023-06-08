<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class LinkController extends Controller
{
    function index()
    {
        $listLink = Link::where('user_id', auth()->user()->id)->get();

        // $listLink = Link::all();
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
        $userId = auth()->user()->id;

        $linkBaru = $request->validate([
            'original' => 'required|unique:links',
            'short' => 'required|unique:links',
        ]);
        $linkBaru['user_id'] = $userId;

        $insert = Link::create($linkBaru);

        if (!$insert) {
            return redirect('/')->with('error', 'Gagal membuat shortlink');
        }
        return redirect('/')->with('success', 'Shortlink berhasil dibuat');
    }

    function redirect($shortLink)
    {
        $link = Link::where('short', $shortLink)->first();

        if (!$link) {
            return redirect('/')->with('error', 'Link tidak ditemukan');
        }

        $link->visit = $link->visit + 1;
        $link->save();

        $originalLink = $link->original;

        return redirect()->away($originalLink);
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

    function update(Request $request, Link $link)
    {


        $validate = $request->validate([
            'original' => 'required',
            'short' => 'required'
        ]);

        $sameOriginalLink =  $validate['original'] === $link->original;
        $sameShortLink =  $validate['short'] === $link->short;
        $noChanges = $sameOriginalLink && $sameShortLink;
        $allChanged = !$sameOriginalLink && !$sameShortLink;

        if ($noChanges) {
            return back()->with('warning', 'Tidak ada perubahan disimpan');
        }

        if ($allChanged) {
            Link::where('id', $link)->update(['short' => $validate['short'], 'original' => $validate['original']]);
            return redirect('/')->with('success', 'Berhasil Edit Link');
        }

        if (!$sameOriginalLink) {
            Link::where('id', $link)->update(['original' => $validate['original']]);
            return redirect('/')->with('success', 'Berhasil Edit Original Link');
        }

        Link::where('id', $link)->update(['short' => $validate['short']]);
        return redirect('/')->with('success', 'Berhasil Edit Short Link');
    }

    function show($link)
    {
        $link = Link::find($link);

        $pageData = [
            "title" => "Detail Link",
            "link" => $link,
            "baseUrl" => App::make('url')->to('/'),


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
