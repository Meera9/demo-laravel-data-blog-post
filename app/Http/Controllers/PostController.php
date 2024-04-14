<?php

namespace App\Http\Controllers;

use App\Data\PostData;
use App\Models\Post;

class PostController extends Controller
{

    private $detailWith = ['blog', 'blog.categories', 'comments', 'comments.children', 'comments.author', 'comments.children.author', 'author'];

    public function show(Post $post)
    {
        $entity = PostData::from($post->load($this->detailWith));

        $related_posts = PostData::collect(relatedPosts($entity->id));

        return view('posts.show', compact('entity', 'related_posts'));
    }
}
