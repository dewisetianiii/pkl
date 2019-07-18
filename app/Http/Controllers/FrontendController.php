<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use App\Tag;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //WEB
    public function index()
    {
        // $artikel = Artikel::orderBy('created_at', 'desc')->take(3)->get();

        return view('welcome', compact('artikel', 'kategori'));
    }

    public function catagory()
    {
        return view('catagory');
    }

    public function singlepost()
    {
        return view('single-post');
    }

    public function aboutus()
    {
        return view('about-us');
    }

    // public function contact()
    // {
    //     return view('contact');
    // }

    public function detailberita(Artikel $artikel)
    {
        // $kategori = Kategori::all();

        $tag = Tag::all();
        return view('frontend.detail-berita', compact('artikel', 'tag'));
    }

    public function berita()
    {
        $artikel = Artikel::orderBy('created_at', 'desc')->paginate(3);
        return view('berita', compact('artikel'));
    }


    //API
    public function tampilberita()
    {
        $artikel = Artikel::orderBy('created_at', 'desc')->paginate(3);
        // $kategori = Kategori::all();
        $response = [
            'success' => true,
            'data' => [
                'artikel' => $artikel,
                // 'kategori' => $kategori,
            ],
            'message' => "Berhasil"
        ];
        return response()->json($response, 200);
    }

    public function beritapopuler()
    {
        $artikel = Artikel::take(2)->get();
        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => " Berhasil"
        ];
        return response()->json($response, 200);
    }
    public function kategori()
    {

        $kategori = Kategori::all();

        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => "Berhasil"
        ];
        return response()->json($response, 200);
    }

    public function latest()
    {
        $artikel = Artikel::take(3)->get();
        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => "Berhasil"
        ];
        return response()->json($response, 200);
    }

    // public function berita(Artikel $artikel)
    // {
    //     $kategori = Kategori::take(3)->get();
    //     $top = Artikel::where('headline', 0)->orderBy('created_at', 'desc')->take(5)->get();
    //     $headline = Artikel::where('headline', 1)->orderBy('created_at', 'desc')->take(3)->get();
    //     $artikel = Artikel::select('artikel.title', 'artikel.slug', 'headline', 'image', 'kategori.title as kategori', 'user.name as author')
    //         ->join('users', 'users.id', '=', 'Artikels.user_id')
    //         ->join('categories', 'categories.id', '=', 'Artikels.category_id')
    //         ->paginate(2);
    //     $trending = Artikel::inRandomOrder()->take(3)->get();
    //     $latest = Artikel::orderBy('created_at', 'desc')->take(4)->get();
    //     $response = [
    //         'success' => true,
    //         'data' => ['kategori' => $kategori, 'top' => $top, 'headline' => $headline, 'article' => $article, 'trending' => $trending, 'latest' => $latest],
    //         'message' => 'Berhasil.'
    //     ];
    //     return view('frontend.berita', compact ('kategori','top','headline','artikel'));
    // }

    public function news()
    {
        $kategori = Kategori::take(3)->get();
        $top = Artikel::where('headline', 0)->orderBy('created_at', 'desc')->take(5)->get();
        $headline = Artikel::where('headline', 1)->orderBy('created_at', 'desc')->take(3)->get();
        $artikel = Artikel::select('artikel.title', 'artikel.slug', 'headline', 'image', 'kategori.title as kategori', 'user.name as author')
            ->join('users', 'users.id', '=', 'Artikels.user_id')
            ->join('categories', 'categories.id', '=', 'Artikels.category_id')
            ->paginate(2);
        $trending = Artikel::inRandomOrder()->take(3)->get();
        $latest = Artikel::orderBy('created_at', 'desc')->take(4)->get();
        $response = [
            'success' => true,
            'data' => ['kategori' => $kategori, 'top' => $top, 'headline' => $headline, 'article' => $article, 'trending' => $trending, 'latest' => $latest],
            'message' => 'Berhasil.'
        ];
        return response()->json($response, 200);
    }

    public function contact()
    {
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
