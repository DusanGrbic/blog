<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
    public function add_comment($body) {
        $comment = new Comment;
        $comment->body = $body;
        $comment->user_id = auth()->id();
        $this->comments()->save($comment);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function scopeFilter($query, $filters) {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        
        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }
    
    public static function archives() {
        $sql = 'year(created_at) AS year, monthname(created_at) AS month, count(*) AS published';
        return self::selectRaw($sql)
                        ->groupBy('year', 'month')
                        ->latest()
                        ->get();
    }
    
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
    
    public function attach_tags($request) {
        $tags = Tag::all();
        foreach ($tags as $tag) {
            if ($request->has($tag->name)) {
                $this->tags()->attach($tag);
            }
        }
    }
    
}
