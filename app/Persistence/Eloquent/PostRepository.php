<?php

namespace App\Persistence\Eloquent;

use App\Persistence\Repositories\IPostRepository;
use App\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class PostRepository extends Repository implements IPostRepository
{
    protected function getQueryBuilder(): Builder
    {
        return Post::query();
    }

    /**
     * @param int $userId
     * @return Post[]|Collection
     */
    public function getAuthorPosts(int $userId)
    {
        return $this->findBy(['user_id' => $userId]);
    }
}