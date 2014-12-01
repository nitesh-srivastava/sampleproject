<?php

class UserController extends BaseController {

    public function __construct(User $user) {
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('csrf', array('on' => 'put'));
        $this->user = $user;
    }

    public function index() {
        if (!Auth::check()) {
            return Redirect::to('/')->with('password', 'Please login to access View feature');
        }
        $users = User::all();
        $data['sidebar1'] = View::make('partials.sidebar1');
        return View::make('user.index', ['users' => $users, 'data' => $data]);
    }

    public function create() {
        return View::make('user.create', ['method' => 'post']);
    }

    public function store() {
        $input = Input::all();
        if (!$this->user->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }
        $checkExistingRecord = User::whereEmail($this->user->email)->first();
        if (empty($checkExistingRecord)) {
            $user = new User();
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->contact = Input::get('contact');
            $user->is_employe = 0;
            $user->password = Hash::make(Input::get('password'));
            $user->save();
        } else {
            return Redirect::back()->withInput()->with('registrationError', 'This email is already registered');
        }
        return Redirect::route('user.index');
    }

    public function edit($username) {
        if (!Auth::check()) {
            return Redirect::to('/')->with('password', 'Please login to edit detail');
        }
        $user = User::whereUsername($username)->first();
        return View::make('user.create', ['user' => $user, 'method' => 'put']);
    }

    public function update() {
        if (!Auth::check()) {
            return Redirect::to('/')->with('password', 'Please login to update user\'s detail');
        }
        $validation = Validator::make(Input::all(), ['username' => 'required', 'email' => 'required', 'contact' => 'required']);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->errors);
        }
        $user = User::find(Input::get('_id'));
        if (!empty($user)) {
            $checkExistingRecord = User::whereEmail(Input::get('email'))->first();
            if (empty($checkExistingRecord) || (Input::get('email') == $user->email)) {
                $user->username = Input::get('username');
                $user->email = Input::get('email');
                $user->contact = Input::get('contact');
                $user->save();
            } else {
                return Redirect::back()->withInput()->with('registrationError', 'This email is already linked with anyother user');
            }
        }
        return Redirect::route('user.index');
    }

    public function show($username) {
        if (!Auth::check()) {
            return Redirect::to('/')->with('password', 'Please login to check user\'s detail');
        }
        $user = User::whereUsername($username)->first();
        return View::make('user.detail', ['user' => $user]);
    }

    public function destroy() {
        return 'delete user';
    }

    public function login() {
        $input = Input::all();
        $validation = Validator::make($input, User::$loginRules);
        $credentials = array('email' => $input['email'], 'password' => $input['password']);

        if ($validation->passes()) {
            if (Auth::attempt($credentials)) {
                var_dump('logged in');
                return Redirect::intended('user');
            } else {
                return Redirect::to('/')->with('password', 'Invalid Credentials');
            }
        } else {
            return Redirect::back()->withErrors($validation->messages());
        }

        return 'performs login task';
    }

}
