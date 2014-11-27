<?php

class UserController extends BaseController {

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index() {
        $users = User::all();
        return View::make('user.index', ['users' => $users]);
    }

    public function create() {
        return View::make('user.create');
    }

    public function store() {
        $input = Input::all();
        if (!$this->user->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }
        $this->user->save();
        return Redirect::route('user.index');
    }

    public function edit() {
        return View::make('user.edit');
    }

    public function update() {
        return 'update user\'s detail';
    }

    public function show() {
        return 'show user\'s detail';
    }

    public function destroy() {
        return 'delete user';
    }

}
