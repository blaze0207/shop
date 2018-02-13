<?php

namespace App\Http\Controllers;

use App\Merchandise;
use App\Http\Requests\MerchandiseRequest;
use Image;

class MerchandiseController extends Controller
{
    public function merchandiseCreate()
    {
        $Merchandise_data = [
            'status' => 'C',
            'name' => '',
            'name_en' => '',
            'introduction' => '',
            'introduction_en' => '',
            'photo' => '',
            'price' => 0,
            'remain_count' => 0,
        ];

        $merchandise = Merchandise::create($Merchandise_data);

        return redirect('merchandise/' . $merchandise->id . '/edit');
    }

    public function merchandiseItemEdit($merchandise_id)
    {
        $merchandise = Merchandise::findOrFail($merchandise_id);

        return view('merchandises.edit', ['title' => '編輯', 'merchandise' => $merchandise]);
    }

    public function merchandiseItemUpdate(MerchandiseRequest $request)
    {
        $merchandise = Merchandise::findOrFail($request->id);

        if (isset($request->photo)) {
            $fileExtension = $request->photo->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $fileExtension;
            $filePath = public_path('assets/images/merchandise/' . $fileName);
            $image = Image::make($request->photo)->fit(450, 300)->save(public_path('assets/images/merchandise/' . $fileName));
        }

        $merchandise->update([
            'status' => $request->status,
            'name' => $request->name,
            'name_en' => $request->name_en,
            'introduction' => $request->introduction,
            'introduction_en' => $request->introduction_en,
            'photo' => url('assets/images/merchandise/' . $fileName),
            'price' => $request->price,
            'remain_count' => $request->remain_count,
        ]);

        return redirect('merchandise/' . $merchandise->id . '/edit');
    }
}
