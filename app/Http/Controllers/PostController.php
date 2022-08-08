<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PostResource;
use App\Repositories\posts\PostRepository;
use App\Repositories\posts\InterfacePostRepository;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(InterfacePostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index() {
        try {
            return PostResource::collection($this->postRepository->getAll(['id', 'title', 'body'], ['comments']));
        } catch(\Exception $error) {
            Log::error('PostController - (index) : ' . $error->getMessage());
        }
    }

    public function indexByFilter(PostRequest $request) {
        try {
            $data = $request->validated();
            return PostResource::collection($this->postRepository->getByFilter($data));
        } catch(\Exception $error) {
            Log::error('PostController - (index) : ' . $error->getMessage());
        }
    }

    public function show($id, PostRequest $request) {
        try {
            return $this->postRepository->getById($id);
        } catch(\Exception $error) {
            Log::error('PostController - (show) : ' . $error->getMessage());
        }
    }

    public function store(PostRequest $request) {
        try {
            $data = $request->validated();
            $this->postRepository->create($data);
            return response()->json(['message' => "Your post has been created successfully."], 201);
        } catch(\Exception $error) {
            Log::error('PostController - (store) : ' . $error->getMessage());
        }
    }

    public function update($id, PostRequest $request) {
        try {
            $data = $request->validated();
            $this->postRepository->update($id, $data);
            return response()->json(['message' => "Your post has been updated successfully."], 200);
        } catch(\Exception $error) {
            Log::error('PostController - (update) : ' . $error->getMessage());
        }
    }

    public function delete($id, PostRequest $request) {
        try {
            $this->postRepository->delete($id);
            return response()->json(['message' => "Your post has been deleted successfully."], 200);
        } catch(\Exception $error) {
            Log::error('PostController - (delete) : ' . $error->getMessage());
        }
    }


}
