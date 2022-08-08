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

    public function create($data) {
        $post           = new $this->model;
        $post->title    = $data['title'];
        $post->body     = $data['body'];
        $post->image    = isset($data['image']) ? Helper::saveFile($data['image'], 'posts') : null;
        $post->save();
        return $post;
    }

    public function update($id, $data) {
        $post           = $this->model->find($id);
        $post->title    = $data['title'];
        $post->body     = $data['body'];
        $post->image    = isset($data['image']) ? Helper::saveFile($data['image'], 'posts') : null;
        $post->save();
        return $post;
    }

}