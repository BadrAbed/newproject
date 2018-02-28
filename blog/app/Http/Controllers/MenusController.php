<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Menu;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        //
        $menus=Menu::all();
        return view('Menus',compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('Create');
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
        $input=$request->all();
        if (isset($input['image'])) {
  $input['image']=$this->upload($input['image']);

    }
else {
$input['image']='image/default.jpg';
  }

$input['user_id']=\Auth::user()->id;
//dd($input);
Menu::create($input);
return redirect()->back();
}
    public function upload($file){
      $extension=$file->getClientOriginalExtension();
      $sha1=sha1($file->getClientOriginalName());
      $filename=date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
    //  dd($filename);
      $path=public_path('images/menus');
      $file->move($path,$filename);
      return 'images/menus/'.$filename;
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
      $menu=Menu::findOrfail($id);
      return view('edit',compact('menu'));
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
      $input=$request->all();
      if (isset($input['image']))
$input['image']=$this->upload($input['image']);

  $input['user_id']=\Auth::user()->id;
//dd($input);
Menu::findOrfail($id)->Update($input);
return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu=Menu::findOrfail($id)->delete();
        return redirect()->back();
    }
}
