<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group() {
        return $this->belongsTo('App\Models\Group');
    }

    public function modules() {
        return $this->belongsToMany('App\Models\Module')->withTimestamps()->withPivot(['created_at', 'updated_at', 'data', 'complete', 'step', 'completed_at', 'secret']);
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = \Hash::make($password);
    }



    public function isGroup($group) {
        if(is_string($group)) {
            return $this->group->name === $group;
        } else if($group instanceof Group) {
            return $this->group->name === $group->name;
        }
        return false;

    }

    public function isAdmin() {
        return $this->isGroup('Admin') || $this->isGroup('Super Admin');
    }


    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof Module) {
            return new ModuleUserPivot($parent, $attributes, $table, $exists);
        }

        return parent::newPivot($parent, $attributes, $table, $exists);
    }


    public static function emailExists($email) {
        $user = User::where('email', $email)->first();

        if(empty($user)) {
            return false;
        } else {
            if(\Auth::check() && $user->email === \Auth::user()->email) {
                return false;
            }
            return true;
        }
    }



}
