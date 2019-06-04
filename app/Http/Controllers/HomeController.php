<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

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
        $consumer_id = \Auth::user()->id;

        $data = Post::where('consumer_id',$consumer_id)->paginate(3);

        return view('home',['data' => $data]);
    }

    public function profile_settings(){

        $user = \Auth::user();

        return view('home_profile',['user' => $user]);
    }
    public function profile_settings_update(Request $request){

        $data = User::find(\Auth::user()->id);

        if ($request->hasfile('avatar')) {
            $file1 = $request->file('avatar');
            $name = time() . $file1->getClientOriginalName();
            $file1->move(public_path() . '/storage/users/', $name);
        }
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->avatar = '/users/'.$name;

        $data->update();

        return redirect('/home')->with('status','Ваш профиль успешно обнавился!');
    }

    public function history(){

        return view('history');
    }

    public function support(){

        return view('home_settings');
    }

    public function getAddress(){

        return view('home_address');
    }
}
