<?php

class UserController extends BaseController {

    public function index() {
        return View::make('user.index');
    }

    public function create() {
        return View::make('user.create');
    }

    public function store() {
        return 'code to store user';
    }

    public function edit() {
        return 'launch edit page';
    }

    public function update() {
        return 'update user\'s detail';
    }

    public function destroy() {
        return 'delete user';
    }

}
