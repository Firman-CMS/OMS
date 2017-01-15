<?php

namespace Modules\Oms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Oms\Models\Cms_model;
use Response;
use Illuminate\View\View;
use DB;

class OmsController extends Controller {

    /**
     * Validation rules for login
     * @param Request $data
     * @return type
     */
    protected function validator(Request $data) {
        return $this->validate($data, [
                    'email' => 'required|max:255',
                    'password' => 'required|min:6',
                    'captcha' => 'required|captcha'
        ]);
    }

    public function index() {
        return view('oms::login', ['captcha_src' => captcha_src('flat')]);
    }

    public function signout(Request $request) {
        $request->session()->flush();
        return redirect(route('login.oms.form'));
    }
    
    public function loginsubmit(Request $request) {
        $email = $request->email;
        $password = $request->password;
        
        $validator = $this->validator($request);
        
        $webConfig = \Config::get('global');
        $pengacak = $webConfig['hashLogin'];
        
        $enkrip_pass = md5($pengacak . md5($password) . $pengacak);
        $loginUser = Cms_model::getLogin($email,$enkrip_pass);
        
        if(count($loginUser) == 0) {            
            return \Redirect::to(\URL::previous())->withInput()->withErrors('Email or password failed');
        }
        $request->session()->put('userID', $loginUser[0]->user_id);
        $request->session()->put('name', $loginUser[0]->name);
        $request->session()->put('category', $loginUser[0]->category_code);
        $request->session()->put('categoryDescription', $loginUser[0]->privilege_name);
        $this->setPermission($request, $loginUser[0]->user_id);

        $joinDate = substr($loginUser[0]->createdon,8,2).'/'.substr($loginUser[0]->createdon,5,2).'/'.substr($loginUser[0]->createdon,0,4);
        $request->session()->put('joinDate', $joinDate);
        return redirect(route('oms.dashboard'));
    }
    
    protected function setPermission(Request $request, $user_id)
    {
        $permissions = [];
        
        $data = DB::table('oms_role_user')
                ->select('oms_role_permission.permission')
                ->join('oms_role', 'oms_role.id', '=', 'oms_role_user.role_id')
                ->join('oms_role_permission', 'oms_role.id', '=', 'oms_role_permission.role_id')
                ->where('oms_role_user.user_id', $user_id)
                ->groupBy('oms_role_permission.permission')
                ->get();
        
        foreach ($data as $k => $v) {
            $permissions[] = $v->permission;
        }
        
        $request->session()->put('permissions', $permissions);
    }


    /**
     * Refresh captcha on click
     * @param Request $request
     * @return type
     */
    protected function refreshCaptcha(Request $request)
    {
        if ($request->ajax()) {
            return Response::json(array('source' => captcha_src('flat')), 200);
        }
    }
    
    public function compose(View $view)
    {
        $view->with('cms_model', Cms_model::class);
    }
}
