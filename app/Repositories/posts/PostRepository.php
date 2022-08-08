<?php

namespace App\Repositories\posts;

use App\Models\Post;
use App\Helpers\Helper;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements InterfacePostRepository{

    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function getByFilter($filter) {
        return $this->model->filter($filter)->paginate(Helper::count_per_page);
    }

}