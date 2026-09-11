<?php

namespace App\Http\Controllers;

use App\Support\MockUsers;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    /**
     * Render the "User Management - Edit Users" screen.
     *
     * The table is seeded server-side (real Laravel data flow: controller
     * -> Blade components) and then progressively enhanced in the
     * browser for instant search/filter/sort/pagination/CRUD, since no
     * database is required for this build.
     */
    public function index(): View
    {
        $users = MockUsers::all();

        $regions   = collect($users)->pluck('region')->unique()->sort()->values()->all();
        $divisions = collect($users)->pluck('division')->unique()->sort()->values()->all();
        $statuses  = ['Active', 'Pending', 'Disabled'];

        return view('pages.user-management', [
            'users'     => $users,
            'regions'   => $regions,
            'divisions' => $divisions,
            'statuses'  => $statuses,
        ]);
    }
}
