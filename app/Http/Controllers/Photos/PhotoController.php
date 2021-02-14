<?php

namespace App\Http\Controllers\Photos;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Models\Photos\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Photos\PhotoService;

class PhotoController extends Controller
{
    public function index(Request $request, PhotoService $service)
    {
        return response()->json(["photos" => $service->getPhotos($request)]);
    }

    public function store(PhotoRequest $request)
    {
        $photo = new Photo();
        $photo->title = $request->title;
        $photo->image = str_replace("public", "storage", $request->image->store(Photo::IMAGE_PATH));
        $photo->save();

        foreach ($request->tags as $tag) {
            $photo->tags()->attach($tag);
        }

        return response()->json(["photo" => $photo])->setStatusCode(201);
    }
}
