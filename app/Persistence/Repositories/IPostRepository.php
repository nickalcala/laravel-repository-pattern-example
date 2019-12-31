<?php

namespace App\Persistence\Repositories;

use App\Post;
use Illuminate\Support\Collection;

interface IPostRepository extends IRepository
{
    /**
     * @param int $userId
     * @return Post[]|Collection
     */
    public function getAuthorPosts(int $userId);
}