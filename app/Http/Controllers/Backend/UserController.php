<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Userinfor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Aler;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::all();
        if(Gate::allows('update-user',$user))
        {
            return view('backend.users.index' ,[
                'user' => $user,
            ]);
        }else{
            // $request = session()->flash('error','Bạn không có quyền truy nhập');
            alert()->info('Lỗi','Bạn không có quyền truy nhập');
            return redirect()->route('admin.index');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        if(Gate::allows('update-user',$user))
        {
            return view('backend.users.create');
        }else{
            // $request = session()->flash('error','Bạn không có quyền truy nhập');
            alert()->info('Lỗi','Bạn không có quyền truy nhập');
            return redirect()->route('admin.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');
        $save = $user->save();

        if($user)
        {
            $infor = new Userinfor();

            $infor->user_id = $user->id;
            $infor->phone = $request->get('phone');
            $infor->address = $request->get('address');
            $infor->save();
        }

        if($save)
        {
            Alert()->success('Thành Công','Tạo mới người dùng thành công');
        }else{
            dd('fail');
        }

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('backend.users.detail',[
            'vale' => $user,
        ]);
    }

    public function showProducts($id)
    {
        $showProduct = Product::where('user_id',$id)->get();

        return view('backend.users.showProduct',[
            'showProducts' => $showProduct,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit',[
            'user' => $user,
        ]);
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
        $user = User::find($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $file = $request->file('image'); 

        if($request->hasFile('image'))
        {
        $name = $file->getClientOriginalName();
        $path = Storage::disk('public')    //->Lưu vào trong thư mục public
                ->putFileAs('avtar-user', $file, $name); 
        
        $user->avatar = $path;
        }

        $save = $user->save();

        
            $infor = Userinfor::where('user_id',Auth::user()->id)->first();

            $infor->phone = $request->get('phone');
            $infor->address = $request->get('address');

        $infor->save();

        if($save)
        {
            alert()->success('Thành Công','Cập nhật thành công');
        }
        
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id); 
        
        $delete = $user->delete();
        
        $user_infor = Userinfor::where('user_id' , $id);
        
        $user_infor->delete();

       
        $product = Product::where('user_id' , $id)->get();
         foreach($product as $value)
         {
            echo $value->user_id = 1;
            $value->save();
         }

        if($delete)
        {
            // $request = session()->flash('success','Xóa thàng công');
            alert()->success('Thành Công','Xóa thành công');
        }
        return redirect()->route('user.index');
    }

    public function decentralization($id)
    {
        $pq = User::find($id);
        return view('backend.users.pquser',[
            'pq' => $pq,
        ]);
    }

    public function updatepq(Request $request, $id)
    {
        $pq = User::find($id);
        
        $pq->role = $request->get('role');
        $save = $pq->save();

        if($save)
        {
            alert()->success('Cập nhập' ,'Phân quyền người dùng thành công');
        }
        return redirect()->route('user.index');
    }

    public function search(Request $request)
    {
        $user = User::query()->where('name','like','%' .$request->name. '%')->get();
        return view('backend.users.index' ,[
                'user' => $user,
        ]);
    }

    public function searchCode(Request $request)
    {
        $user = User::all()->where('id' ,$request->id);

        if(!$user->first())
        {
            session()->flash('error',"Mã người dùng này không tồn tại");
        }
        return view('backend.users.index' ,[
                'user' => $user,
        ]);
        
    }

    public function searchRole(Request $request)
    {
        $user = User::where('role' ,$request->role)->get();
        return view('backend.users.index' ,[
                'user' => $user,
        ]);


    }
}
