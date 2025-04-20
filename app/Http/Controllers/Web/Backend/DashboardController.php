<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $total_users = User::where('status', 'active')->count();
        $total_blog = Blog::where('status', 'active')->count();


        /*For user count start  */
        $newUsers = User::whereYear('created_at', now()->year)->get();

        // Define all months of the year
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        // Group the users by the month they were created
        $userCountsByMonth = array_fill_keys($months, null); // Initialize all months with null (no bar)

        $usersGroupedByMonth = $newUsers->groupBy(function ($user) {
            return $user->created_at->format('F'); // Group by month name
        });

        // Populate the count of users in the correct month
        foreach ($usersGroupedByMonth as $month => $users) {
            $userCountsByMonth[$month] = count($users); // Set actual count where users exist
        }

        // Prepare chart data with usernames and types
        $chartData = [
            'labels' => $months, // Show all months as labels
            'data' => array_values($userCountsByMonth),
            'usernames' => $usersGroupedByMonth->map(function ($users) {
                return $users->map(fn($user) => [
                    'full_name' => $user->name,
                    'type' => $user->type,
                ])->all();
            }),
        ];
        /*For user count end  */
       


        return view('backend.layouts.dashboard', compact('total_users','total_blog', 'chartData'));
    }
}
