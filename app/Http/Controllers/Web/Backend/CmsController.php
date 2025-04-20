<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helpers\Helper;
use App\Models\CMS;
use App\Models\Shop;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use PHPUnit\TextUI\Help;
use Yajra\DataTables\DataTables;

class CmsController
{
    // Home Content One Start
    public function HomeContentOneEdit()
    {
        $data = CMS::find(1);
        return view('backend.layouts.cms.home-content-one', compact('data'));
    }

    public function HomeContentOneUpdate(Request $request)
    {

        // Validate the request
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'button_title_one' => 'nullable|string',
            'button_subtitle_one' => 'nullable|string',
            'button_title_two' => 'nullable|string',
            'button_subtitle_two' => 'nullable|string',
            'button_title_three' => 'nullable|string',
            'button_subtitle_three' => 'nullable|string',
            'image_one' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:5120',
            'image_two' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:5120',
            'image_three' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:5120',
        ]);

        $data = CMS::find(1);

        if (!$data) {
            return redirect()->back()->with('t-error', 'Home Content One not found');
        }

        // Update the data
        $updated = $data->update([
            'title' => $request->title,
            'description' => $request->description,

            'button_title_one' => $request->button_title_one,
            'button_subtitle_one' => $request->button_subtitle_one,

            'button_title_two' => $request->button_title_two,
            'button_subtitle_two' => $request->button_subtitle_two,

            'button_title_three' => $request->button_title_three,
            'button_subtitle_three' => $request->button_subtitle_three,
        ]);

        $bannerFields = [
            'image_one',
            'image_two',
            'image_three',
        ];

        foreach ($bannerFields as $field) {
            if ($request->hasFile($field)) {
                // delete old image
                if (file_exists($data->{$field})) {
                    Helper::fileDelete($data->{$field});
                }
                // new image upload
                $imagePath = Helper::fileUpload($request->file($field), 'HomeContentOne', time() . '_' . $request->file($field)->getClientOriginalName());
                $data->{$field} = $imagePath;
            }
        }

        $data->save();

        return redirect()->route('home.content.one.edit')->with(
            $updated ? 't-success' : 't-error',
            $updated ? 'Data Updated Successfully' : 'Data update failed!'
        );
    }

    // Home Content One End

    // Home Content Two Start
    public function HomeContentTwoEdit()
    {
        $data = CMS::find(2);
        return view('backend.layouts.cms.home-content-two', compact('data'));
    }

    public function HomeContentTwoUpdate(Request $request)
    {

        // Validate the request
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'button_title_one' => 'nullable|string',
        ]);

        $data = CMS::find(2);

        if (!$data) {
            return redirect()->back()->with('t-error', 'Home Content One not found');
        }

        // Update the data
        $updated = $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'button_title_one' => $request->button_title_one
        ]);

        $data->save();

        return redirect()->route('home.content.two.edit')->with(
            $updated ? 't-success' : 't-error',
            $updated ? 'Data Updated Successfully' : 'Data update failed!'
        );
    }

    // Home Content Two End

    // Home Content Three Start
    public function HomeContentThreeEdit()
    {
        $data = CMS::find(3);
        return view('backend.layouts.cms.home-content-three', compact('data'));
    }

    public function HomeContentThreeUpdate(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'button_title_one' => 'nullable|string',
            'button_title_two' => 'nullable|string',
            'image_one' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:5120',
        ]);

        $data = CMS::find(3);

        if (!$data) {
            return redirect()->back()->with('t-error', 'Home Content One not found');
        }

        // Update the data
        $updated = $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'button_title_one' => $request->button_title_one,
            'button_title_two' => $request->button_title_two
        ]);

        if ($request->hasFile('image_one')) {
            // delete old image
            if (file_exists($data->image_one)) {
                Helper::fileDelete($data->image_one);
            }
            // new image upload
            $imagePath = Helper::fileUpload($request->file('image_one'), 'HomeContentThree', time() . '_' . $request->file('image_one')->getClientOriginalName());
            $data->image_one = $imagePath;
        }

        $data->save();

        return redirect()->route('home.content.three.edit')->with(
            $updated ? 't-success' : 't-error',
            $updated ? 'Data Updated Successfully' : 'Data update failed!'
        );
    }

    // Home Content Three End

    // Home Content Four Start
    public function HomeContentFourEdit()
    {
        $data = CMS::find(4);
        return view('backend.layouts.cms.home-content-four', compact('data'));
    }

    public function HomeContentFourUpdate(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'title' => 'nullable|string',
                'description' => 'nullable|string',
                'button_title_one' => 'nullable|string',
                'button_title_two' => 'nullable|string',
                'button_title_three' => 'nullable|string',
                'image_one' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:5120',
                'explore_title_one' => 'nullable|string',
                'explore_description_one' => 'nullable|string',
                'explore_title_two' => 'nullable|string',
                'explore_description_two' => 'nullable|string',
                'explore_title_three' => 'nullable|string',
                'explore_description_three' => 'nullable|string',
            ]);

            $data = CMS::find(4);

            if (!$data) {
                return redirect()->back()->with('t-error', 'Home Content One not found');
            }

            // Update the data
            $updated = $data->update([
                'title' => $request->title,
                'description' => $request->description,
                'button_title_one' => $request->button_title_one,
                'button_title_two' => $request->button_title_two,
                'button_title_three' => $request->button_title_three,

                'explore_title_one' => $request->explore_title_one,
                'explore_description_one' => $request->explore_description_one,
                'explore_title_two' => $request->explore_title_two,
                'explore_description_two' => $request->explore_description_two,
                'explore_title_three' => $request->explore_title_three,
                'explore_description_three' => $request->explore_description_three
            ]);

            if ($request->hasFile('image_one')) {
                // delete old image
                if (file_exists($data->image_one)) {
                    Helper::fileDelete($data->image_one);
                }
                // new image upload
                $imagePath = Helper::fileUpload($request->file('image_one'), 'HomeContentFour', time() . '_' . $request->file('image_one')->getClientOriginalName());
                $data->image_one = $imagePath;
            }

            $data->save();

            return redirect()->route('home.content.four.edit')->with(
                $updated ? 't-success' : 't-error',
                $updated ? 'Data Updated Successfully' : 'Data update failed!'
            );
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Data update failed!' . $e->getMessage());
        }
    }

    // Home Content Four End

    // Home Content Five Start
    public function HomeContentFiveEdit()
    {
        $data = CMS::find(5);
        return view('backend.layouts.cms.home-content-five', compact('data'));
    }

    public function HomeContentFiveUpdate(Request $request)
    {
        try {
            // Validate the request
            $request->validate([

                'button_text' => 'nullable|string',
                'title' => 'nullable|string',

                'explore_title_one' => 'nullable|string',
                'explore_description_one' => 'nullable|string',

                'explore_title_two' => 'nullable|string',
                'explore_description_two' => 'nullable|string',

                'explore_title_three' => 'nullable|string',
                'explore_description_three' => 'nullable|string',

                'image_one' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:5120',
                'image_two' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:5120',

                'button_title_one' => 'nullable|string',


            ]);

            $data = CMS::find(5);

            if (!$data) {
                return redirect()->back()->with('t-error', 'Home Content One not found');
            }

            // Update the data
            $updated = $data->update([

                'button_text' => $request->button_text,
                'title' => $request->title,

                'explore_title_one' => $request->explore_title_one,
                'explore_description_one' => $request->explore_description_one,

                'explore_title_two' => $request->explore_title_two,
                'explore_description_two' => $request->explore_description_two,

                'explore_title_three' => $request->explore_title_three,
                'explore_description_three' => $request->explore_description_three,

                'button_title_one' => $request->button_title_one,
            ]);

            if ($request->hasFile('image_one')) {
                // delete old image
                if (file_exists($data->image_one)) {
                    Helper::fileDelete($data->image_one);
                }
                // new image upload
                $imagePath = Helper::fileUpload($request->file('image_one'), 'HomeContentFour', time() . '_' . $request->file('image_one')->getClientOriginalName());
                $data->image_one = $imagePath;
            }
            if ($request->hasFile('image_two')) {
                // delete old image
                if (file_exists($data->image_two)) {
                    Helper::fileDelete($data->image_two);
                }
                // new image upload
                $imagePath = Helper::fileUpload($request->file('image_two'), 'HomeContentFive', time() . '_' . $request->file('image_two')->getClientOriginalName());
                $data->image_two = $imagePath;
            }

            $data->save();

            return redirect()->route('home.content.five.edit')->with(
                $updated ? 't-success' : 't-error',
                $updated ? 'Data Updated Successfully' : 'Data update failed!'
            );
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Data update failed!' . $e->getMessage());
        }
    }

    // Home Content Five End

    // Home Content six Start
    public function HomeContentSixEdit()
    {
        $data = CMS::find(6);
        return view('backend.layouts.cms.home-content-six', compact('data'));
    }

    public function HomeContentSixUpdate(Request $request)
    {
        try {
            // Validate the request
            $request->validate([

                'button_text' => 'nullable|string',
                'title' => 'nullable|string',
                'description' => 'nullable|string',
            ]);

            $data = CMS::find(6);

            if (!$data) {
                return redirect()->back()->with('t-error', 'Home Content One not found');
            }

            // Update the data
            $updated = $data->update([

                'button_text' => $request->button_text,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $data->save();

            return redirect()->route('home.content.six.edit')->with(
                $updated ? 't-success' : 't-error',
                $updated ? 'Data Updated Successfully' : 'Data update failed!'
            );
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Data update failed!' . $e->getMessage());
        }
    }

    // Home Content six End


    // Home Content Seven Start
    public function HomeContentSevenEdit()
    {
        $data = CMS::find(7);
        return view('backend.layouts.cms.home-content-seven', compact('data'));
    }

    public function HomeContentSevenUpdate(Request $request)
    {
        try {
            // Validate the request
            $request->validate([

                'title' => 'nullable|string',
                'description' => 'nullable|string',

                'button_text' => 'nullable|string',
                'button_title_one' => 'nullable|string',
                'explore_description_two' => 'nullable|string',
            ]);

            $data = CMS::find(7);

            if (!$data) {
                return redirect()->back()->with('t-error', 'Home Content One not found');
            }

            // Update the data
            $updated = $data->update([

                'title' => $request->title,
                'description' => $request->description,
                'button_text' => $request->button_text,
                'button_title_one' => $request->button_title_one,
                'explore_description_two' => $request->explore_description_two,

            ]);

            $data->save();

            return redirect()->route('home.content.seven.edit')->with(
                $updated ? 't-success' : 't-error',
                $updated ? 'Data Updated Successfully' : 'Data update failed!'
            );
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Data update failed!' . $e->getMessage());
        }
    }

    // Home Content seven End

    // Home Content eight Start
    public function HomeContentEightEdit()
    {
        $data = CMS::find(8);
        return view('backend.layouts.cms.home-content-eight', compact('data'));
    }

    public function HomeContentEightUpdate(Request $request)
    {
        try {
            // Validate the request
            $request->validate([

                'title' => 'nullable|string',
                'description' => 'nullable|string',
                'image_one' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:5120',
            ]);

            $data = CMS::find(8);

            if (!$data) {
                return redirect()->back()->with('t-error', 'Home Content One not found');
            }

            // Update the data
            $updated = $data->update([

                'title' => $request->title,
                'description' => $request->description,

            ]);

            if ($request->hasFile('image_one')) {
                // delete old image
                if (file_exists($data->image_one)) {
                    Helper::fileDelete($data->image_one);
                }
                // new image upload
                $imagePath = Helper::fileUpload($request->file('image_one'), 'HomeContentEight', time() . '_' . $request->file('image_one')->getClientOriginalName());
                $data->image_one = $imagePath;
            }

            $data->save();

            return redirect()->route('home.content.eight.edit')->with(
                $updated ? 't-success' : 't-error',
                $updated ? 'Data Updated Successfully' : 'Data update failed!'
            );
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Data update failed!' . $e->getMessage());
        }
    }

    // Home Content eight End

    // Home Content nine Start
    public function HomeContentNineEdit()
    {
        $data = CMS::find(9);
        return view('backend.layouts.cms.home-content-nine', compact('data'));
    }

    public function HomeContentNineUpdate(Request $request)
    {

        try {
            // Validate the request
            $validatedData = $request->validate([

                'button_title_one' => 'nullable|string',
                'button_title_two' => 'nullable|string',
                'button_title_three' => 'nullable|string',
                'title' => 'nullable|string',
                'description' => 'nullable|string',
                'image_one' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:5120',
            ]);

            $data = CMS::find(9);

            if (!$data) {
                return redirect()->back()->with('t-error', 'Loan Banner not found');
            }

            // Update the data
            $updated = $data->update([
                'button_title_one' => $request->button_title_one,
                'button_title_two' => $request->button_title_two,
                'button_title_three' => $request->button_title_three,
                'title' => $request->title,
                'description' => $request->description,

            ]);
            if ($request->hasFile('image_one')) {
                // delete old image
                if (file_exists($data->image_one)) {
                    Helper::fileDelete($data->image_one);
                }
                // new image upload
                $imagePath = Helper::fileUpload($request->file('image_one'), 'LoanBanner', time() . '_' . $request->file('image_one')->getClientOriginalName());
                $data->image_one = $imagePath;
            }

            // dd($data);

            $data->save();

            return redirect()->route('home.content.nine.edit')->with(
                $updated ? 't-success' : 't-error',
                $updated ? 'Data Updated Successfully' : 'Data update failed!'
            );
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Data update failed!' . $e->getMessage());
        }
    }

    // Home Content nine End

    // Home Content ten Start
    public function HomeContentTenEdit()
    {
        $data = CMS::find(10);
        return view('backend.layouts.cms.home-content-ten', compact('data'));
    }

    public function HomeContentTenUpdate(Request $request)
    {

        try {
            // Validate the request
            $validatedData = $request->validate([

                'button_title_one' => 'nullable|string',
                'button_title_two' => 'nullable|string',
                'title' => 'nullable|string',
                'description' => 'nullable|string',
                'image_one' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:5120',
            ]);

            $data = CMS::find(10);

            if (!$data) {
                return redirect()->back()->with('t-error', 'Loan cms one not found');
            }

            // Update the data
            $updated = $data->update([
                'button_title_one' => $request->button_title_one,
                'button_title_two' => $request->button_title_two,
                'title' => $request->title,
                'description' => $request->description,

            ]);
            if ($request->hasFile('image_one')) {
                // delete old image
                if (file_exists($data->image_one)) {
                    Helper::fileDelete($data->image_one);
                }
                // new image upload
                $imagePath = Helper::fileUpload($request->file('image_one'), 'loanPageCMSOne', time() . '_' . $request->file('image_one')->getClientOriginalName());
                $data->image_one = $imagePath;
            }

            $data->save();

            return redirect()->route('home.content.ten.edit')->with(
                $updated ? 't-success' : 't-error',
                $updated ? 'Data Updated Successfully' : 'Data update failed!'
            );
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Data update failed!' . $e->getMessage());
        }
    }

    // Home Content ten End




}
