<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
	protected $hidden = [
		'password',
		'remember_token'
	];

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function achievements()
	{
		return $this->hasMany(Achievement::class);
	}

	public function wins()
	{
		return $this->hasMany(Win::class);
	}
	
	public function feedbacks()
	{
		return $this->hasMany(Feedback::class);
	}

	public function withdraws()
	{
		return $this->hasMany(Withdraw::class);
	}

	public function confirmation_codes()
	{
		return $this->hasMany(WithdrawCode::class);
	}

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function children()
	{
		return User::where(['parent'=>$this->code, 'is_paid'=>1])->get();
	}

	public function subchildren()
	{
		$subchildren = collect();
		foreach ($this->children() as $child) 
			$subchildren = $subchildren->concat($child->children());

		return $subchildren;
	}

	public function parent()
	{
		return User::firstWhere('code', $this->parent);
	}
}
