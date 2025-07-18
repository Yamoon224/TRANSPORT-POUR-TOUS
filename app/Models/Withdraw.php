<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Withdraw
 * 
 * @property int $id
 * @property float $amount
 * @property string|null $description
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Withdraw extends Model
{

	protected $casts = [
		'amount' => 'float',
		'user_id' => 'int'
	];

	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function method()
	{
		return $this->belongsTo(Method::class);
	}
}
