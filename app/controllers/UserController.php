<?php

class UserController extends BaseController {

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index() {
        $users = User::all();
        $data['sidebar1'] = View::make('partials.sidebar1'); 
        return View::make('user.index', ['users' => $users,'data'=>$data]);
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
            $this->user->save();
        } else {
            
        }
        return Redirect::route('user.index');
    }

    public function edit($username) {
        $user = User::whereUsername($username)->first();
        return View::make('user.create', ['user' => $user, 'method' => 'put']);
    }

    public function update() {
        $input = Input::all();
        if (!$this->user->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }
        $user = User::find(Input::get('_id'));
        if (!empty($user)) {
            $checkExistingRecord = User::whereEmail($this->user->email)->first();
            if (empty($checkExistingRecord) || ($this->user->email == $user->email) ) {
                $user->username = $this->user->username;
                $user->email = $this->user->email;
                $user->contact = $this->user->contact;
                $user->save();
            } else {
                
            }
        }
        return Redirect::route('user.index');
    }

    public function show($username) {
        $user = User::whereUsername($username)->first();
        return View::make('user.detail', ['user' => $user]);
    }

    public function destroy() {
        return 'delete user';
    }

}
