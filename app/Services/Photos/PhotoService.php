<?php
namespace App\Services\Photos;

use App\Models\Photos\Photo;

class PhotoService
{
    public function getPhotos($request)
    {
        $builder = Photo::query();
        if (!empty($request->filterTags)) {
            $builder->whereHas("tags", function ($q) use ($request) {
                $q->whereIn("tags.id", $request->filterTags);
            });
        }

        return $builder->paginate($request->itemsPerPage);

    }
}

