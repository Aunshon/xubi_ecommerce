<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    function deshboard()
    {
        return view('deshboard.index');
    }
    function manage_categories()
    {
        $allCaregories = category::all();
        return view('deshboard.manage_categories',compact('allCaregories'));
    }
    function saveNewCategory(Request $request)
    {
        // print_r($request->all());
        $request->validate([
            'category_name' => 'required',
            'activation' => 'required|numeric',
            'aditional_information' => 'required',
        ]);

        category::insert([
            'category_name' => $request->category_name,
            'activation' => $request->activation,
            'aditional_information' => $request->aditional_information,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('greenStatus','New Category Added 👍');
    }
    function deleteCategory($id)
    {
        category::findOrFail($id)->delete();
        return back()->with('greenStatus','Category Deleted Successfully');
    }
    function changeCategoryActivation($id,$activation)
    {
        if ($activation == 1) {
            category::findOrFail($id)->update([
                'activation' => 0
            ]);
        }
        else {
            category::findOrFail($id)->update([
                'activation' => 1
            ]);
        }
        return back()->with('greenStatus','Category Updated Successfully');
    }
    function editcategory($id)
    {
        $category = category::findOrFail($id);
        // echo $category;
        // print_r($category->all());
        return view('deshboard.editcategory',compact('category','id'));
    }
    function updateCategory(Request $request)
    {
        // print_r($request->all());
        $request->validate([
            'category_name' => 'required',
            'activation' => 'required|numeric',
            'aditional_information' => 'required',
        ]);

        category::findOrFail($request->id)->update([
            'category_name' => $request->category_name,
            'activation' => $request->activation,
            'aditional_information' => $request->aditional_information,
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('greenStatus','Category Updated Successfully 👍');
    }
    function manage_product()
    {
        $allcategory = category::all();
        $allproduct = product::paginate(5);
        // $allproduct = product::all();
        return view('deshboard.manage_product',compact('allcategory','allproduct'));
    }
    function saveNewProduct(Request $request)
    {

        // print_r($request->all());
        // echo $request->photo;
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'category' => 'required|numeric',
            'activation' => 'required|numeric',
            'description' => 'required',
            'point' => 'required|numeric',
            'photo' => 'required',
        ]);

        $lastId = product::insertGetId([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'category' => $request->category,
            'activation' => $request->activation,
            'description' => $request->description,
            'point' => $request->point,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $photoName = $lastId.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(400, 450)->save(base_path( "public/uploads/product/" . $photoName),100);
            product::findOrFail($lastId)->update([
                'photo' => $photoName,
            ]);
        }

        return back()->with('greenStatus','Product Added Successfully 👍');
    }
}
