<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SocialMedia
 *
 * @property int $id
 * @property string $path
 * @property string $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class SocialMedia extends Model
{
    use HasFactory;
}
