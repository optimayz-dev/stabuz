<?php

namespace App\Imports;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class BrandImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $batchSize = 1000;
        $chunks = $collection->chunk($batchSize);
        foreach ($chunks as $chunk)
        {

            foreach ($chunk as $row)
            {


                $locale = app()->getLocale();
                $translationData = [
                    'title' => $row[$locale.'_title'],
                    'descr' => $row[$locale.'_descr'],
                ];
                $brand = new Brand([
                    'file_url' => $this->uploadLogo($row['file_url'])
                ]);
                $brand->translateOrNew($locale)->fill($translationData);
                $brand->save();
            }
        }
    }

    public function uploadLogo($logoFile)
    {
//        // Задаем уникальное имя логотипа
//       $uniqueFIleName = Str::random(10).'.'.$logoFile->getClientOriginalExtension();
//        // Сохраняем файл логотипа в нужной директории
//       $logoFile->storeAs('brand_logos', $uniqueFIleName, 'public');
//
//        // Получаем URL логотипа для хранения в поле 'file_url' модели Brand
//       return '/storage/brand_logos/'.$uniqueFIleName;

        $fileContent = Storage::get($logoFile);

        // Задаем уникальное имя логотипа
        $uniqueFileName = Str::random(10) . '.' . pathinfo($logoFile, PATHINFO_EXTENSION);

        // Сохраняем файл логотипа в нужной директории
        Storage::put('brand_logos/' . $uniqueFileName, $fileContent, 'public');

        // Получаем URL логотипа для хранения в поле 'file_url' модели Brand
        return '/storage/brand_logos/' . $uniqueFileName;
    }
}
