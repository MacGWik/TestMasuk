<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function index(Request $request)
    {
        $status = $this->ceklogin($request,'/teacher/list','/teacher/list');

        if($status['message'] == "error not logged in"){
            return redirect('login?redirect_to='.$status['redirect_to']);
        }
        elseif($status['message'] == "error not have access"){
            return redirect('/error/notauthorize');
        }

        return view('teacher.index');
    }

    public function create(Request $request)
    {
        $status = $this->ceklogin($request,'/teacher/create','/teacher/create');

        if($status['message'] == "error not logged in"){
            return redirect('login?redirect_to='.$status['redirect_to']);
        }
        elseif($status['message'] == "error not have access"){
            return redirect('/error/notauthorize');
        }

        return view('teacher.create');
    }
}