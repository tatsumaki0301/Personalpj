<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Reserve;
Use App\Models\User;
use App\Models\Area;
use App\Models\Genru;
use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genrus = Genru::all();
        $shops = Shop::with('area', 'genru')->get();

        $param = [
            'shops' => $shops,
            'areas' => $areas,
            'genrus' => $genrus,
            'input' => $request->input,
        ];

        return view('index', $param, ['shops' => $shops],['input' => '']);
    }


    public function search(Request $request)
    {
        $areas = Area::get();
        $genrus = Genru::get();
        $shops = Shop::get();

        $query = Shop::query();

        if($request->input){
            $query->where('shop_name', 'LIKE BAINARY', "%{$request->input}%");
        }
        if($request->area_id){
            $query->where('area_id', $request->area_id)
            ->orwhere('genru_id', $request->genru_id);
        }
        if($request->genru_id ||$request->area_id){
            $query->where('genru_id', $request->genru_id)
            ->orwhere('area_id', $request->area_id);
        }
        if($request->area_id && $request->genru_id){
            $query->where('area_id', $request->area_id && 'genru_id', $request->genru_id);
        }

        $shops = $query->get();

        $param = [
            'input' => $request->input,
            'areas' => $areas,
            'genrus' => $genrus,
            'shops' => $shops,
        ];

        return view('index', $param);
    }
    
    public function done()
    {
        return view('done');
    }
    public function thanks()
    {
        return view('thanks');
    }



    public function file(Request $request)
    {

        $shops = Shop::all();
        $areas = Area::all();
        $genrus = Genru::all();
        $shops = Shop::with('area', 'genru')->get();
        
        $param = [
            'shops' => $shops,
            'areas' => $areas,
            'genrus' => $genrus,
        ];
        return view('file', $param, ['shops' => $shops],);
    }
    public function create(ShopRequest $request)
    {

        $image_path = $request->file('image_path');
        $path = $image_path->store('img','public');
        
        $form = [
            'shop_name' => $request->shop_name,
            'shop_content' => $request->shop_content,
            'image_path' => $path,
            'area_id' => $request->area_id,
            'genru_id' => $request->genru_id,
        ];
        unset($form['_token']);
        Shop::create($form);

        return redirect('/file');
    }
}
