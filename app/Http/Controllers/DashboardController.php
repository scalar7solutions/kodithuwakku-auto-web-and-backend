<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\FrontendUser;
use App\Models\Inquiry;
use App\Models\Offer;
use App\Models\Property;
use App\Models\Partner;
use App\Models\Rate;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle_count = Vehicle::count();
        $customer_count = Customer::count();
        $inquiry_count = Inquiry::count();
        $testimonial_count = Testimonial::count();

        // dd($customer_count);
        return Inertia::render('Dashboard/Index',['vehicle_count' => $vehicle_count, 'customer_count' => $customer_count, 'inquiry_count' => $inquiry_count, 'testimonial_count' => $testimonial_count]);

    }
}
