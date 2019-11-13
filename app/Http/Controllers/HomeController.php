<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use App\User;
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
        // $this->middleware(['auth' => 'verified']);
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
    // Category.............................................................
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
    //Product..............................................................................
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
            'point' => 'required|numeric|max:100|min:1',
            // 'photo' => 'required',
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

            // return back()->with('greenStatus','Product Added Successfully 👍');
            return redirect('manage_product')->with('greenStatus','Product Added Successfully 👍');
    }

    function changeProductActivation($id,$activation)
    {
        if ($activation == 1) {
            product::findOrFail($id)->update([
                    'activation' => 0
            ]);
        }
        else {
            product::findOrFail($id)->update([
                'activation' => 1
            ]);
            }
        return back()->with('greenStatus','Product Activation Changed');
    }
    function deleteproduct($id)
    {
        if (product::findOrFail($id)->photo == 'default.png') {
            product::findOrFail($id)->delete();
            return back()->with('greenStatus','Product Deleted');
        }
        else {
            // echo "real Photo";
            $photo = product::findOrFail($id)->photo;
            // echo $photo;
            unlink(base_path("public/uploads/product/".$photo));
            product::findOrFail($id)->delete();
            return back()->with('greenStatus','Product Deleted');
        }
    }
    function editProduct ($productId)
    {
        // echo $productId;
        $productInfo = product::findOrFail($productId);
        $allcategory = category::all();
        // echo $productInfo;
        return view('deshboard.editProduct',compact('allcategory','productInfo'));
    }
    function updateProduct(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'category' => 'required|numeric',
            'activation' => 'required|numeric',
            'description' => 'required',
            'point' => 'required|numeric|min:1|max:100',
        ]);
        product::findOrFail($request->id)->update([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'category' => $request->category,
            'activation' => $request->activation,
            'description' => $request->description,
            'point' => $request->point,
            'updated_at' => Carbon::now(),
        ]);
        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $photoName = $request->id.'.'.$photo->getClientOriginalExtension();
            if (product::findOrFail($request->id)->photo == 'default.png') {
                Image::make($photo)->resize(400, 450)->save(base_path( "public/uploads/product/" . $photoName),100);
                product::findOrFail($request->id)->update([
                    'photo' => $photoName,
                ]);
            }
            else {
                unlink(base_path("public/uploads/product/".$photoName));
                Image::make($photo)->resize(400, 450)->save(base_path( "public/uploads/product/" . $photoName),100);
            }
        }
        return back()->with('greenStatus','Product Updated');
    }
    ////.......Saler......................................................
    function mysaler()
    {
        $allSler = User::where('role',2)->get();
        return view('deshboard.mysaler',compact('allSler'));
    }
    function addNewSaler(Request $request)
    {
        // print_r($request->all());
        $request->validate([
            'user_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'approval' => 'required|integer',
        ]);

        User::insert([
            'name' =>$request->user_name,
            'email' =>$request->email,
            'password' =>$request->password,
            'role' => 2,
            'approval' =>$request->approval,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('greenStatus','New saler Added');
    }
    function salerApproval($id,$approavl)
    {
        User::findOrFail($id)->update([
            'approval'=>$approavl,
        ]);
        return back();
        // if ($approavl == 0) {
        //     User::findOrFail($id)->update([
        //         'approval'=>$approavl,
        //     ]);
        // }
        // elseif ($approavl == 1) {
        //     User::findOrFail($id)->update([

        //     ]);
        // }
        // else {

        // }
    }
}
