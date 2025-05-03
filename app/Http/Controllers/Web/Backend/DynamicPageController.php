<?php

namespace App\Http\Controllers\Web\Backend;

use Exception;
use App\Helpers\Helper;
use Illuminate\View\View;
use App\Models\DynamicPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class DynamicPageController
{
    /**
     * Display a listing of dynamic page content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse
    {
        if ($request->ajax()) {
            $data = DynamicPage::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('page_title', function ($row) {
                    $en = $row->getTranslation('page_title', 'en');
                    $ar = $row->getTranslation('page_title', 'ar');

                    $en_short = Str::limit(strip_tags($en), 50, '...');
                    $ar_short = Str::limit(strip_tags($ar), 50, '...');

                    return '' . e($en_short) . '<br>'
                         . '<span dir="rtl">' . e($ar_short) . '</span>';
                })

                ->addColumn('page_content', function ($row) {
                    $en = $row->getTranslation('page_content', 'en');
                    $ar = $row->getTranslation('page_content', 'ar');

                    $en_short = Str::limit(strip_tags($en), 100, '...');
                    $ar_short = Str::limit(strip_tags($ar), 100, '...');

                    return '<div><br>' . $en_short . '</div>'
                         . '<div dir="rtl"><br>' . $ar_short . '</div>';
                })

                ->addColumn('status', function ($data) {
                    $backgroundColor  = $data->status == "active" ? '#4CAF50' : '#ccc';
                    $sliderTranslateX = $data->status == "active" ? '26px' : '2px';
                    $sliderStyles     = "position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background-color: white; border-radius: 50%; transition: transform 0.3s ease; transform: translateX($sliderTranslateX);";

                    $status = '<div class="form-check form-switch" style="margin-left:40px; position: relative; width: 50px; height: 24px; background-color: ' . $backgroundColor . '; border-radius: 12px; transition: background-color 0.3s ease; cursor: pointer;">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status" style="position: absolute; width: 100%; height: 100%; opacity: 0; z-index: 2; cursor: pointer;">';
                    $status .= '<span style="' . $sliderStyles . '"></span>';
                    $status .= '<label for="customSwitch' . $data->id . '" class="form-check-label" style="margin-left: 10px;"></label>';
                    $status .= '</div>';

                    return $status;
                })

                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('dynamic.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['page_title', 'page_content', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.dynamic.index');
    }

    public function edit($id)
    {
        $data = DynamicPage::findOrFail($id);
        return view('backend.layouts.dynamic.edit', compact('data'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {

        // Validate
        $data = $request->validate([
            'page_title_en'   => 'required|string|max:255',
            'page_title_ar'   => 'required|string|max:255',
            'page_content_en' => 'required|string',
            'page_content_ar' => 'required|string'
        ]);

        try {
            $page = DynamicPage::findOrFail($id);

            // Translations set
            $page->setTranslations('page_title', [
                'en' => $data['page_title_en'],
                'ar' => $data['page_title_ar'],
            ]);
            $page->setTranslations('page_content', [
                'en' => $data['page_content_en'],
                'ar' => $data['page_content_ar'],
            ]);

            // Save & Redirect
            $page->save();

            return redirect()
                ->route('dynamic.index')
                ->with('t-success', 'Page updated successfully.');
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->with('t-error', 'Something went wrong. Please try again later.');
        }
    }


    /* dynamic Status start */
    public function status(int $id): JsonResponse
    {
        $data = DynamicPage::findOrFail($id);
        if ($data->status == 'active') {
            $data->status = 'inactive';
            $data->save();

            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data'    => $data,
            ]);
        } else {
            $data->status = 'active';
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data'    => $data,
            ]);
        }
    }
    /* dynamic Status end */
}
