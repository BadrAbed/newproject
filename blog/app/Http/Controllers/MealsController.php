<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Meal;
use App\MealItem;
use App\Menu;
use APP\Item;
class MealsController extends Controller
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
        $meals=Meal::paginate(3);
        return view('Meals.Meals',compact('meals'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
$menus=Menu::all();
$menu=Menu::lists('title','id');
        return view('Meals.Create',compact('menus','menu'));
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
        //dd($input);
        if (isset($input['image'])) {
  $input['image']=$this->upload($input['image']);

    }
else {
$input['image']='image/default.jpg';
  }

$input['user_id']=\Auth::user()->id;
//dd($input);
$meals=Meal::create($input);
//dd($input['items']);

$menus=Menu::all();

foreach($input['items'] as $item ){
MealItem::create(['meal_id'=>$meals->id,'item_id'=>$item,'discount'=>$input['discount'][$item]]);
}

$mealitems=MealItem::where('meal_id',$meals->id)->get();
$mealitemsid=array();
$meal=array();
foreach ($mealitems as $mealitems) {
  $mealitemsid[]= $mealitems->item_id;
$meal[$mealitems->item_id]=$mealitems->discount;
}


return view('Meals.editmeals',compact('meals','menus','mealitemsid','meal'));
//return  view ('Meals.editmeals',compact('meals','menus'));
}
    public function upload($file){
      $extension=$file->getClientOriginalExtension();
      $sha1=sha1($file->getClientOriginalName());
      $filename=date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
    //  dd($filename);
      $path=public_path('images/Meals');
      $file->move($path,$filename);
      return 'images/Meals/'.$filename;
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
      $meals=Meal::findOrfail($id);
    $menus=Menu::all();

    $mealitems=MealItem::where('meal_id',$meals->id)->get();
    $mealitemsid=array();
    $meal=array();
    foreach ($mealitems as $mealitems) {
      $mealitemsid[]= $mealitems->item_id;
$meal[ $mealitems->item_id]= $mealitems->discount;
    }
      return view('Meals.editmeals',compact('meals','menus','mealitemsid','meal'));
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
//dd($input['items']);
$meal=Meal::findOrfail($id)->Update($input);
MealItem::where('meal_id',$id)->delete();
foreach($input['items'] as $item ){
  //dd($item);
MealItem::create(['meal_id'=>$id,'item_id'=>$item,'discount'=>$input['discount'][$item]]);
}

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
        $meals=Meal::findOrfail($id)->delete();
        return redirect()->back();
    }
}
