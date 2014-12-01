<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    protected $fillable = ['username', 'email', 'contact','password'];
    public static $rules = [
        'username' => 'required',
        'email' => 'required',
        'contact' => 'required',
        'password'=> 'required'
    ];
    
    public static $loginRules = [
        'email' => 'required',
        'password'=> 'required'
    ];
    public $errors;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = array('password', 'remember_token');

    public function isValid() {
        $validation = Validator::make($this->attributes, User::$rules);
        if ($validation->passes()) {
            return true;
        }
        $this->errors = $validation->messages();
    }

}
