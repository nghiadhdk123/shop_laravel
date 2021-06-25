<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('backend.product.index',[
            'cate' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->get('name');
        $category->slug = $request->get('slug');
        $category->parent_id = 1;
        $category->depth = 1;
        $save = $category->save();
        // dd($category);
        if($save)
        {
            $request->session()->flash('success' , 'Thêm mới danh mục thành công');
        }else{
            $request->session()->flash('error' , 'Thêm mới danh mục thất bại');
        }

        Cache::forget('categories');

        Alert()->success('Success',"Tạo mới danh mục thành công");

        return redirect()->route('category.admin');
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

    public function showProducts($category_id)
    {
            $cate = Category::find($category_id);

            $product = $cate->products;

            echo "San pham co danh muc :" .$cate->name ."<br>";
            foreach($product as $value)
            {
                echo "Name:" . $value->name;
                echo  "&nbsp&nbsp&nbsp&nbsp" ."ID :" . $value->id;
                echo "&nbsp&nbsp&nbsp&nbspSlug :" . $value->slug;
                echo "<br>";
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        
        return view('backend.category.update',[
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->slug = $request->get('slug');
        $save = $category->save();

        if($save)
        {
            $request->session()->flash('success' , 'Update danh mục thành công');
        }else{
            $request->session()->flash('error' , 'Update danh mục thất bại');
        }

        Cache::forget('categories');

        Alert()->success('Success',"Cập nhật danh mục thành công");

        return redirect()->route('category.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Cache::forget('categories');

        Alert()->success("Success","Xoa thanh cong");

        return redirect()->route('category.admin');

    }

}
