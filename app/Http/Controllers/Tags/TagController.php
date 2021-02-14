<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tags\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(["tags" => Tag::all()]);
    }

    public function store(TagRequest $request)
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        return response()->json(["tag" => $tag])->setStatusCode(201);
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        return response()->json(["success" => true]);

    }

}
