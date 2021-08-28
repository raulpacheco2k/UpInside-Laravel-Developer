<?php

namespace App\Services;


use Illuminate\Http\Request;

class ImageService
{
    /**
     * @param  Request  $request
     * @param  string  $parameter
     * @return void
     */
    final public function saveImage(Request $request, string $parameter): void
    {
        if ($request->hasFile($parameter)) {
            $request->merge([$parameter => $request->file($parameter)->store('products')]);
        } else {
            $request->offsetUnset($parameter);
        }
    }
}