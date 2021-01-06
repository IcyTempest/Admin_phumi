<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        $user = DB::table('users')->get();
        return view("Admin.home",["user"=>$user]);
    }
    public function search(Request $request)
    {
        $datas = DB::table('users')->where('username','LIKE','%'.$request->search_data.'%')->get();
        return view("Admin.home",["user"=>$datas]);
    }
    public function report()
    {
        $users = DB::table('reports')->join('users','reports.user_id', 'users.id')->join('posts', 'posts.id', 'reports.post_id')->select('reports.*','users.username')->get();
        return view("Admin.all_report", ["reports"=>$users]);
    }

    public function show($id)
    {
        $data=DB::table('users')->where("id",$id)->first();
        
        $follow_count = DB::table('follows')->count();
        $post_count = DB::table('posts')->where("user_id",'=',$id)->count();
        $share_count = DB::table('shares')->where("user_id",'=',$id)->count();
        $block_count = DB::table('blocks')->where("user_id",'=',$id)->count();
        $follower_count = DB::table('follows')->where('follow_user_id','=', $id)->count();
        return view("Admin.user_detail",["data" => $data,"follow_count"=>$follow_count, "block_count"=>$block_count, "post_count"=>$post_count, "share_count"=>$share_count, "follower_count"=>$follower_count]);
    }
    public function following($id)
    {
        $follow=DB::table('follows')->join('users','follows.user_id','=','users.id')->where('follows.user_id',$id)->get();
        return view("Admin.home",["user"=>$follow]);
    }

    public function followers($id)
    {
        $followers=DB::table('follows')->join('users','follows.id','=','users.id')->where('follows.id', $id)->get();
        return view("Admin.home",["user"=>$followers]);
    }
    public function delete_posts($id)
    {   
        DB::table('posts')->where('id', $id)->delete();
        return redirect(route('Admin.all_report'))->with('success','Sucessfuly deleted!');
    }
    
    public function delete_accounts($id){
        $user=DB::table('users')->where('id', $id)->delete();
        DB::table('posts')->where('user_id', $id)->delete();
        DB::table('shares')->where('user_id', $id)->delete();
        DB::table('reports')->where('user_id', $id)->delete();
        DB::table('comments')->where('user_id', $id)->delete();
        DB::table('dislikes')->where('user_id', $id)->delete();
        DB::table('follows')->where('user_id', $id)->delete();
        DB::table('like_comments')->where('user_id', $id)->delete();
        DB::table('likes')->where('user_id', $id)->delete();
        DB::table('notifications')->where('user_id', $id)->delete();
        DB::table('reply_comments')->where('user_id', $id)->delete();
        DB::table('shares')->where('user_id', $id)->delete();
        if($user){
            return redirect()->route('admin.index')->with('success',"deleted successfuly");
        }
        return redirect()->route('admin.index')->with('fail',"deleted failed, something went wrong!");
    }

    public function shares($id)
    {
        $share=DB::table('shares')->join('posts','shares.post_id','=','posts.post_id')->where('shares.user_id', $id)->get();
        return view("Admin.home",["user"=>$share]);
    }
    public function change_password($id){
        $user = DB::table('users')->where('id',$id);
        if($user){
            $data = request()->validate([
                'password' => 'required|min:8'
            ]);
            $data = Hash::make($data['password']);
            $user->update(['password'=>$data['password']]);
            return redirect()->back()->with('success','succesfully change');
        }
        return redirect()->back()->with('fail','Fail to change, something went wrong');
    }

    public function posts($id)
    {
        $posts=DB::table('posts')->where('user_id', $id)->get();
        return view("Admin.home",["user"=>$posts]);
    }


    public function login(){
        return view("Admin/login");
    }

    public function logout(){
        session()->flush();
        return redirect(route('admin.login'));
    }
    
    function authLogin()
    {
        $data = request()->validate([
            'username' => 'required',
            'password' => 'required|min:8',
            'company_code' => 'required'
        ]);
        $Admin = DB::table('admins')->where("username",$data["username"])->first();
        if ($Admin) 
        {
            $validPassword = Hash::check($data['password'], $Admin->password);
            if ($validPassword && $data['company_code'] === "189259123") 
            {
                unset($data['company_code']);
                session()->put('admin', $Admin->id);
                return redirect(route('admin.index'))->with('success', "Successfully Login!");
            }
            return back()->with("fail", "Incorrect password or code!")->withInput();
        }
        return back()->with("fail", "Username/Company Code does not exist!")->withInput();
    }
    function register(){

        return view("admin.register");
    }
    function authRegister()
    {
        $data = request()->validate([
            'username' => 'required|min:6|unique:admins',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
            'company_code' => 'required'
        ]);

        if($data['company_code'] === "189259123")
        { 
            $data['password'] = Hash::make($data['password']);
            unset($data['confirm_password']);
            unset($data['company_code']);
            Admin::create($data);
            return redirect(route('admin.login'))->with('success',"Successfully Register!")->withInput();
        }
        return redirect()->back()->with('fail',"Register failed! Please checked again")->withInput();
    }
}
