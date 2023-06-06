<?php

namespace App\Http\Controllers;

use App\Models\resto;
use App\Models\like;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $district = 'All Places in Bandung';
            $resto = resto::where('namaresto','LIKE','%'.$request->search.'%')->paginate(6);
            $rekomen = resto::where('rekomen','ya')->where('status','approved')->get();
            $url = "https://kanglerian.github.io/api-wilayah-indonesia/api/districts/3273.json";
            $data = json_decode(file_get_contents($url), true);
        }elseif(session('rekomen_kopi')){
            $district = 'All Places in Bandung';
            $resto = resto::where('rekomen_kopi',session('rekomen_kopi'))->where('rekomen_makanan',session('rekomen_makanan'))->where('status','approved')->paginate(6);
            $rekomen = resto::where('rekomen','ya')->where('status','approved')->get();
            $url = "https://kanglerian.github.io/api-wilayah-indonesia/api/districts/3273.json";
            $data = json_decode(file_get_contents($url), true);
        }else{
            $district = 'All Places in Bandung';
            $resto = resto::where('status', 'approved')->paginate(6);
            $rekomen = resto::where('rekomen','ya')->where('status','approved')->get();
            $url = "https://kanglerian.github.io/api-wilayah-indonesia/api/districts/3273.json";
            $data = json_decode(file_get_contents($url), true);
        }
        return view('foryou', compact('resto','district','rekomen','data'));
    }

    public function indexDistrict($district)
    {
        $resto = resto::where('district','=', $district)->paginate(6);
        $rekomen = resto::where('rekomen','ya')->where('status','approved')->get();
        $url = "https://kanglerian.github.io/api-wilayah-indonesia/api/districts/3273.json";
        $data = json_decode(file_get_contents($url), true);
        return view('foryou', compact('resto','district','rekomen','data'));
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
        $thumb = $request->foto_thumb->getClientOriginalName() . '-' . time()
                    . '.' . $request->foto_thumb->extension();
        $request->foto_thumb->move(public_path('gambar_resto'), $thumb);

        if($request->hasfile('foto_slide')){
            foreach($request->file('foto_slide') as $image_content){
                $name_content = $image_content->getClientOriginalName(). '-'. time();
                $image_content->move(public_path().'/gambar_resto/gambar_slide/',$name_content);
                $data_content[] = $name_content;
            }
        }

        if($request->hasfile('foto_menu')){
            foreach($request->file('foto_menu') as $image_menu){
                $name_menu = $image_menu->getClientOriginalName(). '-'. time();
                $image_menu->move(public_path().'/gambar_resto/gambar_menu',$name_menu);
                $data_menu[] = $name_menu;
            }
        }

        $resto = new resto();
        $resto->namaresto = $request->nama_cafe;
        $resto->district = $request->kawasan;
        $resto->address = $request->lokasi_cafe;
        $resto->open = $request->waktubuka;
        $resto->close = $request->waktututup;
        $resto->price = $request->harga1;
        $resto->upto = $request->harga2;
        $resto->thumbnail = $thumb;
        $resto->content = json_encode($data_content);
        $resto->menu = json_encode($data_menu);
        $resto->category = 'gratis';
        $resto->status = 'approved';
        $resto->rekomen = 'tidak';
        $resto->rekomen_kopi = $request->rekomen_kopi;
        $resto->rekomen_makanan = $request->rekomen_makanan;
        $resto->jumlah_klik = 0;
        $resto->save();

        return redirect('/admin');
    }

    public function storeUser(Request $request)
    {
        $thumb = $request->foto_thumb->getClientOriginalName() . '-' . time()
                    . '.' . $request->foto_thumb->extension();
        $request->foto_thumb->move(public_path('gambar_resto'), $thumb);

        // $slide = $request->foto_slide->getClientOriginalName() . '-' . time()
        //             . '.' . $request->foto_slide->extension();
        // $request->foto_slide->move(public_path('gambar_resto'), $slide);

        // $menu = $request->foto_menu->getClientOriginalName() . '-' . time()
        //             . '.' . $request->foto_menu->extension();
        // $request->foto_menu->move(public_path('gambar_resto'), $menu);

        if($request->hasfile('foto_slide')){
            foreach($request->file('foto_slide') as $image_content){
                $name_content = $image_content->getClientOriginalName(). '-'. time();
                $image_content->move(public_path().'/gambar_resto/gambar_slide/',$name_content);
                $data_content[] = $name_content;
            }
        }

        if($request->hasfile('foto_menu')){
            foreach($request->file('foto_menu') as $image_menu){
                $name_menu = $image_menu->getClientOriginalName(). '-'. time();
                $image_menu->move(public_path().'/gambar_resto/gambar_menu',$name_menu);
                $data_menu[] = $name_menu;
            }
        }


        $resto = new resto();
        $resto->namaresto = $request->nama_cafe;
        $resto->district = $request->kawasan;
        $resto->address = $request->lokasi_cafe;
        $resto->open = $request->waktubuka;
        $resto->close = $request->waktututup;
        $resto->price = $request->harga1;
        $resto->upto = $request->harga2;
        $resto->thumbnail = $thumb;
        $resto->content = json_encode($data_content);
        $resto->menu = json_encode($data_menu);
        $resto->category = $request->kategori;
        $resto->status = 'waiting';
        if($request->kategori == 'gratis'){
            $resto->rekomen = 'tidak';
        }elseif($request->kategori){
            $resto->rekomen = 'ya';
        }
        $resto->rekomen_kopi = $request->rekomen_kopi;
        $resto->rekomen_makanan = $request->rekomen_makanan;
        $resto->jumlah_klik = 0;
        $resto->save();

        return redirect('/foryou');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\resto  $resto
     * @return \Illuminate\Http\Response
     */
    public function show(resto $resto)
    {
        // $iklanBerbayar = Resto::where('category', 'berbayar')->where('status','approved')->get();
        $iklan_terbanyak = Resto::where('status', 'approved')->orderBy('jumlah_klik', 'desc')->paginate(16);
        $iklan = Resto::where('status', 'approved')->get();
        // $iklan = Resto::where('status', 'waiting')->get();
        return view('explore',compact('iklan_terbanyak','iklan'));
    }

    public function showDetail(Request $request, $id){
        $resto = resto::all();
        $detailResto = resto::find($id);
        $review = Review::where('resto_id',$id)->get();
        $rating = Review::sum('rating');

        $detailResto->jumlah_klik = $detailResto->jumlah_klik + 1;
        $detailResto->save();
        return view('detailResto',compact('detailResto','resto','review','rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\resto  $resto
     * @return \Illuminate\Http\Response
     */
    public function edit(resto $resto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\resto  $resto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resto $resto, $id)
    {
        $resto = resto::find($id);
        if($request->foto_thumb){
            $thumb = $request->foto_thumb->getClientOriginalName() . '-' . time()
                    . '.' . $request->foto_thumb->extension();
            $request->foto_thumb->move(public_path('gambar_resto'), $thumb);
        }elseif($request->foto_thumb == null){
            $thumb = $resto->thumbnail;
        }

        if($request->hasfile('foto_slide')){
            foreach($request->file('foto_slide') as $image_content){
                $name_content = $image_content->getClientOriginalName(). '-'. time();
                $image_content->move(public_path().'/gambar_resto/gambar_slide/',$name_content);
                $data_content[] = $name_content;
            }
        }elseif($resto->foto_slide == null){
            $data_slide = $resto->content;
        }

        if($request->hasfile('foto_menu')){
            foreach($request->file('foto_menu') as $image_menu){
                $name_menu = $image_menu->getClientOriginalName(). '-'. time();
                $image_menu->move(public_path().'/gambar_resto/gambar_menu',$name_menu);
                $data_menu[] = $name_menu;
            }
        }elseif($request->foto_menu == null){
            $data_menu = $resto->menu;
        }


        $resto->namaresto = $request->nama_cafe;
        $resto->district = $request->kawasan;
        $resto->address = $request->lokasi_cafe;
        $resto->open = $request->waktubuka;
        $resto->close = $request->waktututup;
        $resto->price = $request->harga1;
        $resto->upto = $request->harga2;
        $resto->thumbnail = $thumb;
        $resto->content = $data_slide;
        $resto->menu = $data_menu;
        $resto->rekomen = $request->rekomen;
        $resto->save();

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\resto  $resto
     * @return \Illuminate\Http\Response
     */
    public function destroy(resto $resto)
    {
        //
    }

    public function formIklan()
    {
        $url = "https://kanglerian.github.io/api-wilayah-indonesia/api/districts/3273.json";
        $data = json_decode(file_get_contents($url), true);
        return view('formIklan', compact('data'));
    }

    public function ubahStatusPost($id){
        $resto = Resto::find($id);
        $resto->status = 'approved';
        $resto->save();
        return redirect('/admin');
    }
    public function ubahStatusDecline($id){
        $resto = Resto::find($id);
        $resto->status = 'declined';
        $resto->save();
        return redirect('/admin');
    }

    public function deleteResto($id)
    {
        $resto = Resto::find($id);
        $resto->delete();

        return back();
    }

    public function showLike()
    {
        $resto = like::where('user_id',Auth::user()->id)->get();
        return view('like',compact('resto'));
    }

    public function like($id)
    {

        $like = new like();
        $like->user_id = Auth::user()->id;
        $like->resto_id = $id;
        $like->liked = 'yes';
        $like->save();

        return redirect('/detail/'.$id);

    }

    public function unlike($id)
    {
        $like = like::find($id);
        $like->delete();

        return back();
    }

    public function addReview(Request $request, $id)
    {
        if($request->hasfile('review_img')){
            foreach($request->file('review_img') as $image_content){
                $name_content = $image_content->getClientOriginalName(). '-'. time();
                $image_content->move(public_path().'/gambar_resto/gambar_review/',$name_content);
                $data_content[] = $name_content;
            }
        }

        $review = new Review();
        $review->resto_id = $id;
        $review->user_id = Auth::user()->id;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->review_img = json_encode($data_content);
        $review->save();

        return redirect('/detail/'.$id);
    }

    // public function total_klik($id)
    // {
    //     $resto = resto::find($id);
    //     $resto->jumlah_klik = $resto->jumlah_klik + 1;
    //     $resto->save();
    // }
}
