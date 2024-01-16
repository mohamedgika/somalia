<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Dashboard\User\StoreRequest;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }

    public function index(){
        $user = User::all();
        return view('backend.User.dashboard_user',['user'=>$user]);
    }

    public function store(StoreRequest $request){
        try{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'country'=>$request->country,
                'state'=>$request->state,
                'city'=>$request->city,
                'status'=>$request->status,
                'password' => Hash::make($request->password),
            ]);

            session()->flash('store_user','Add User Successfully');
            return redirect()->route('user.index');

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    public function edit(Request $request,User $user){
        try{
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'country'=>$request->country,
                'state'=>$request->state,
                'city'=>$request->city,
                'status'=>$request->status,
            ]);

            session()->flash('edit_user','Edit User Successfully');
            return redirect()->route('user.index');

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    public function del(User $user){

            try{
                $user->delete();

                session()->flash('delete_user','Deleted User Successfully');
                return redirect()->route('user.index');

            }
            catch(\Exception $e){
                return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
            }
        }
}
