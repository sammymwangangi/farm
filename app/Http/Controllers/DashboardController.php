<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\User;
use App\Comment;
use App\Farmer;
use Auth;
use Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $farmers = DB::table('farmers')->get()->count();
        $employees = DB::table('employees')->get()->count();
        $deliveries = DB::table('deliveries')->get()->count();
        $comments = DB::table('comments')->get()->count();
        
        return view('dashboard.index')->with(['farmers' => $farmers, 'employees' => $employees, 'comments' => $comments, 'deliveries' => $deliveries,]);
    }

    public function users()
    {
        $users = User::all();
        $roles = Role::all();
        return view('dashboard.users', ['users' => $users, 'roles' => $roles]);
    }

    public function comments()
    {
        $comments = Comment::where('user_id', Auth::id())->get();
        $farmer = Farmer::all();
        return view('dashboard.comments', ['comments' => $comments, 'farmer' => $farmer,]);
    }

    public function addcomment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:comments|max:255',
            'body' => 'required',
            'audio' => 'mimetypes:audio/mp4,audio/mpeg,audio/ogg',
        ]);

        if($request->hasFile('audio')) {
            $filenameWithExt = $request->file('audio')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('audio')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('audio')->move(public_path('comments'), $fileNameToStore);
        }
        // Create Comment
        $comment = new Comment;
        $comment->title = $request->input('title');
        $comment->body = $request->input('body');
        $comment->audio = $request->input('audio');
        $comment->user_id = auth()->user()->id;
        $comment->audio = $fileNameToStore;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function adduser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('success', 'User succesfully created!');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $role_users = $user->roles()->pluck('id', 'id')->toArray();
        return view('dashboard.edituser', ['user' => $user, 'roles' => $roles, 'role_users' => $role_users]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->update(array_merge($request->all()));
        $roles = $request->roles;
        DB::table('role_user')->where('user_id', $id)->delete();
        if ($roles == "") {
            return redirect()->back()->with('info', 'User details have been updated!');
        } else {
            foreach ($roles as $key => $value) {
                $user->attachRole($value);
            }
            return redirect()->back()->with('info', 'Role updated!');
        }
    }

    public function delete_user($id)
    {
        $user = User::find($id);
        DB::table('role_user')->where('user_id', $id)->delete();
        $user->delete();
        return redirect()->back()->with('info', 'User has been deleted!');

    }

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {

    }
}
