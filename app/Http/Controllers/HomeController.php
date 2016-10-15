<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\YogaUser;

class HomeController extends Controller
{
    private $_yogaUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->_yogaUsers = YogaUser::all();
    }

    public function user($userId = null)
    {
      if(!isset($userId))return redirect()->back()->withErrors('Отсутсвует Айди!');
      $user = $this->_yogaUsers->first(function ($val) use ($userId) {return $val->id == $userId;});
      if(!isset($user))return redirect()->back()->withErrors('Такого пользователя не существует!');

      return view('user', [
        'user' => $user,
        'yogaUsers' => $this->_yogaUsers
        ]);
    }

    public function users($Case = 'all')
    {
      switch ($Case) {
        case 'unblocked':
          $yogaUsersPaginate = YogaUser::where('is_blocked', '=', 0)->paginate(10);
          break;
        case 'blocked':
          $yogaUsersPaginate = YogaUser::where('is_blocked', '=', 1)->paginate(10);
          break;
        default:
          $yogaUsersPaginate = YogaUser::paginate(10);
          break;
      }

      return view('users', [
        'currentPage' => $Case,
        'users' => $yogaUsersPaginate,
        'yogaUsers' => $this->_yogaUsers
        ]);
    }

    public function action($type, $userId)
    {
        $user = $this->_yogaUsers->first(function ($val) use ($userId) {return $val->id == $userId;});
        if(!isset($user))return redirect()->back()->withErrors('Вы попытались совершить действие с несуществующим пользователем!');

        switch ($type) {
          case 'block':
            $user->is_blocked = 1;
            break;
          case 'unblock':
            $user->is_blocked = 0;
            break;
          default:
            # code...
            break;
        }
        $user->save();
        return redirect()->back();
    }

    public function find()
    {
      $yogaEmails = '[';
      foreach ($this->_yogaUsers as $val) {
        $yogaEmails .= '"' . $val->email . '",';
      }
      $yogaEmails .= ']';
      return view('find', ['currentPage' => 'find', 'yogaUsers' => $this->_yogaUsers, 'yogaEmails' => $yogaEmails]);
    }

    public function findPost(Request $request)
    {
      $user = $this->_yogaUsers->first(function ($val) use ($request) {
        return $val->email == $request->email;
      });

      if(!isset($user))return redirect()->back()->withErrors('Пользователя с таким email не существует!');

      return redirect('/user/' . $user->id);
    }
}
