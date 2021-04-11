<?php

namespace App\Models\Methods;
use Illuminate\Support\Str;

trait ProductMethod
{
	public function getProducImageData($image): ?array
    {
		$extension = $image->getClientOriginalExtension();

		if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
			$extension        = $image->getClientOriginalExtension();
			$originalFilename = $image->getClientOriginalName();
			$fileName         = Str::random() . ".$extension";

			$datas = [
				'original_name' => $originalFilename,
				'file_name'     => $fileName,
			];

			$filename = $image->getClientOriginalName();

			if ( ! $this->original_name || ($filename !== $this->image_name)) {
				$fileFullName = Str::random() . ".$extension";
				$image->move(storage_path('app/public/products/'), $fileFullName);
				$datas['file_name'] = $fileFullName;
			}
		}

		return $datas ?? null;
	}
}
