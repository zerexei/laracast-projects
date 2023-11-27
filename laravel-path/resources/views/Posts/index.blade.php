<div>
    @foreach(\App\Models\Post::all() as $post)
    <a href="{{URL::temporarySignedRoute('posts.preview', $post)}}">
        Preview unpublished post
    </a>
    @endforeach
</div>
