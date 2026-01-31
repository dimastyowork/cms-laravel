<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'url',
        'post_id',
        'page_id',
        'parent_id',
        'order',
        'is_active',
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getLinkAttribute()
    {
        if ($this->page_id && $this->page) {
            return route('page.show', $this->page->slug);
        }

        if ($this->post_id && $this->post) {
            return route('post.show', $this->post->slug);
        }

        return $this->url ?? '#';
    }
}
