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

    function updateLink(Request $request, $link)
    {
        $validate = $request->validate([
            'original' => 'unique:link',
            'short' => 'unique:link'
        ]);

        $data = Link::find($link);

        if ($validate['original'] === $data->original) {
            if ($validate['short'] === $data->short) {
                return back();
            } else {
                // update shortlink
                // dd($validate);
                Link::where('id', $link)->update(['short' => $validate['short']]);
                return redirect('/')->with('success', 'Berhasil Edit Short Link');
            }
        } else {
            if ($validate['short'] === $data->short) {
                // update original link
                Link::where('id', $link)->update(['original' => $validate['original']]);
                return redirect('/')->with('success', 'Berhasil Edit Original Link');
            } else {
                // update shortlink and original link
                Link::where('id', $link)->update(['short' => $validate['short'], 'original' => $validate['original']]);
                return redirect('/')->with('success', 'Berhasil Edit Link');
            }
        }
    }

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
