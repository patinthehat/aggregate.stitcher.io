<?php

declare(strict_types=1);

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use App\Models\PostState;
use Illuminate\Http\Request;

final class StarPostController
{
    public function __invoke(Request $request, Post $post)
    {
        $post->update([
            'state' => PostState::STARRED,
        ]);

        $returnUrl = $request->query->get(
            'ref',
            action(AdminPostsController::class, request()->query->all())
        );

        return redirect()->to($returnUrl);
    }
}
