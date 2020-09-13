<?php

namespace App\Http\Controllers;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class MasterlistController extends Controller
{
    //
    public function masterlists()
    {

        $users = User::with('added_by')->get();
        $categories = Category::get();
        return view('masterlists',array(
            'subheader' => 'Masterlists',
            'header' => 'Settings',
            'users' => $users,
            'categories' => $categories
        ));
    }
    

    public function new_account(Request $request)
    {
        // dd($request->all());
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|min:8|confirmed',
            ]    
        );
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_admin = $request->role;
        // $user->add_by = auth()->user()->id;
        $user->save();
        
        $request->session()->flash('status','Successfully Added.');
        return back(); 
    }
    public function reset_account(Request $request, $id)
    {
        
        $data =  User::find($id);
        $data->password = bcrypt('12345678');
        $data->save();
        $request->session()->flash('status',$data->email . ' new password was 12345678 ');
        return back();
        
    }
    public function edit_user  (Request $request, $id)
    {
        $this->validate(request(),[
            'name' => 'required|string|max:255||regex:/^[\pL\s\-]+$/u',
            'email' => 'unique:users,email,'.$id,
            ]    
        ); 
        
        $data =  User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->is_admin = $request->input('role');
        $data->save();
        $request->session()->flash('status',$data->name . ' Successfully Changed!');
        return back();
    }
    public function new_category(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->created_by = auth()->user()->id;
        $category->save();

        $request->session()->flash('status','Successfully Added.');
        return back(); 
        
    }

    public function edit_category (Request $request,$id)
    {
        $category = Category::findOrfail($id);
        $category->name = $request->name;
        $category->save();

        $request->session()->flash('status','Successfully changed.');
        return back(); 
    }

    public function delete_category(Request $request , $id)
    {

        $category = Category::find($id);
        $category->delete();

        $request->session()->flash('status','Category deleted.');
        return back(); 

    }
}
