<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Faq;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
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
            $data = Faq::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('question', function ($data) {
                    $en = Str::limit($data->getTranslation('question', 'en'), 30);
                    $ar = Str::limit($data->getTranslation('question', 'ar'), 30);
                    return '<div>' . e($en) . (strlen($data->getTranslation('question', 'en')) > 30 ? '...' : '') . '</div>' .
                        '<div dir="rtl">' . e($ar) . (strlen($data->getTranslation('question', 'ar')) > 30 ? '...' : '') . '</div>';
                })
                ->addColumn('answer', function ($data) {
                    $en = Str::limit($data->getTranslation('answer', 'en'), 30);
                    $ar = Str::limit($data->getTranslation('answer', 'ar'), 30);
                    return '<div>' . e($en) . (strlen($data->getTranslation('answer', 'en')) > 30 ? '...' : '') . '</div>' .
                        '<div dir="rtl">' . e($ar) . (strlen($data->getTranslation('answer', 'ar')) > 30 ? '...' : '') . '</div>';
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
                                <a href="' . route('faq.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['question','answer', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.faq.index');
    }

    /**
     * Show the form for creating a new dynamic page content.
     *
     * @return View
     */
    public function create(): View
    {
        return view('backend.layouts.faq.create');
    }

    /**
     * Store a newly created dynamic page content in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */

    public function store(Request $request): RedirectResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'question_en'          => 'required|string|max:255',
                'question_ar'          => 'required|string|max:255',
                'answer_en'            => 'required|string|max:500',
                'answer_ar'            => 'required|string|max:500',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = new Faq();
            $data->setTranslations('question', [
                'en' => $request->question_en,
                'ar' => $request->question_ar
            ]);

            $data->setTranslations('answer', [
                'en' => $request->answer_en,
                'ar' => $request->answer_ar
            ]);

            $data->save();

            return redirect()->route('faq.index')->with('t-success', 'FAQ Create successfully !!');
        } catch (\Exception $e) {
            return redirect()->route('faq.index')->with('t-error', 'FAQ failed created.' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified dynamic page content.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $data = Faq::find($id);
        return view('backend.layouts.faq.edit', compact('data'));
    }

    /**
     * Update the specified dynamic page content in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'question_en'          => 'nullable|string|max:255',
                'question_ar'          => 'nullable|string|max:255',
                'answer_en'            => 'nullable|string|max:500',
                'answer_ar'            => 'nullable|string|max:500',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data                   = Faq::findOrFail($id);

            $data->setTranslations('question', [
                'en' => $request->question_en,
                'ar' => $request->question_ar
            ]);

            $data->setTranslations('answer', [
                'en' => $request->answer_en,
                'ar' => $request->answer_ar
            ]);

            $data->update();

            return redirect()->route('faq.index')->with('t-success', 'FAQ Updated Successfully.');
        } catch (\Exception) {
            return redirect()->route('faq.index')->with('t-success', 'FAQ failed to update');
        }
    }

    /**
     * Change the status of the specified dynamic page content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse
    {
        $data = Faq::findOrFail($id);
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

    /**
     * Remove the specified dynamic page content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $data = Faq::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'FAQ deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the FAQ.',
            ]);
        }
    }
}
