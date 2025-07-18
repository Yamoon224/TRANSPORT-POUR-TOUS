<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $code
 * @property string $parent
 * @property string $email
 * @property string $password
 * @property Carbon $email_verified_at
 * @property string|null $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Achievement[] $achievements
 * @property Collection|Code[] $codes
 * @property Collection|Win[] $wins
 * @property Collection|Withdraw[] $withdraws
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $guarded = [];

	public function method()
	{
		return $this->belongsTo(Method::class);
	}
}
