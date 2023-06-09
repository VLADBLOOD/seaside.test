<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'cover',
        'images',
        'name',
        'price',
        'description',
        'category_id',
        'size',
    ];

    public static function createFromRequest(Request $request) : static
    {
        $productData = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category,
            'size' => $request->size
        ];

        $newProduct = new self($productData);
        $newProduct->save();

        $newProduct->setCoverAndSave($request->cover);
        $newProduct->setImagesAndSave($request->images);

        return $newProduct;
    }

    public function setCoverAndSave($cover) : void
    {
        $fileName = $cover->getClientOriginalName();

        $this->cover = "assets/images/products/{$this->id}/$fileName";
        $cover->move(public_path("assets/images/products/{$this->id}/"), $fileName);

        $this->save();
    }

    public function setImagesAndSave($images) : void
    {
        foreach ($images as $key => $image)
        {
            $fileName = $image->getClientOriginalName();

            $this->images .= "assets/images/products/{$this->id}/$fileName;";
            $image->move(public_path("assets/images/products/{$this->id}/"), $fileName);
        }

        $this->save();
    }
}
