<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $quote
 * @property string $cover
 * @property int $published
 * @property string $published_at
 * @property int $category_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereQuote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\User $user
 * @property int $image_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageId($value)
 * @property-read \App\Models\Image $image
 */


class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public static function uploadImage($image){
        $path = Storage::disk('public')->putFile('assets/img/post', $image);
        $exploded = explode('/', $path);
        return $exploded[count($exploded) - 1];
    }

    public static function deleteImage($image){
        Storage::disk('public')->delete('assets/img/post' . $image);
    }

    public static function getBlogs()
    {
        return self::with('image','category');
    }

    public static function getBlog($id)
    {
        return ['blog'=>self::with('user','category','image')->where('published','=',1)->find($id)];
    }

    public static function getFilterSearchAndPage(Request $request){
        $queryBlogs = self::with('user')->with('category')->with('image');

        /** search */
        if($request->has('keyword') && $request->keyword != ""){
            $keyword = $request->keyword;
            $queryBlogs = $queryBlogs->where('title','LIKE','%'.$keyword."%");
        }

        /** filter by category */
        if($request->has('categories') && count($request->categories) != 0){
            $queryBlogs = $queryBlogs->whereIn('category_id', $request->categories);
        }

        return $queryBlogs;
    }

    public static function latestFiveNonPublishedPosts(){
        return self::with('image')->with('category')->with('user')->where('published','=','0')->orderByDesc('created_at')->take(5)->get();
    }

    public static function getRandomPosts()
    {
        return self::with('image')->with('category')->with('user')->inRandomOrder()->where('published', '=',1)->take(5)->get();
    }
}
