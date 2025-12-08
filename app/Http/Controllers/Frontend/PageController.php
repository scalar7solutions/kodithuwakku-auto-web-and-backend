<?php

namespace App\Http\Controllers\Frontend;

use App\Exports\VehicleStatsExport;
use App\Http\Controllers\Controller;
// use App\Mail\ContactMailable;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Feature;
use App\Models\Inquiry;
use App\Models\LiveAuctionManufacturer;
use App\Models\Manufacture;
use App\Models\Settings;
use App\Models\Testimonial;
use App\Models\Type;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Services\ApiClient\ApiClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\DB;

use App\Models\OurCustomer;

use Inertia\Inertia;
use Log;
// use Mail;
use ZipArchive;

class PageController extends Controller
{
    public function about()
    {
        // dd('test');
        $image_url = 'images/about.jpg';
        $countries = Country::where(['status' => 1])->get();

        return Inertia::render('About/index', ['image_url' => $image_url, 'countries' => $countries]);
        // return Inertia::render('About/index');
    }


    // public function Live_auction(Request $request)
    // {
    //     $requestData = $request->all();
    //     // dd($requestData);

    //     $auctionDatesQuery = "SELECT auction_date FROM main GROUP BY DATE_FORMAT(auction_date,'%Y-%m-%d')";
    //     $auctionDates = ApiClient::callAuctionApi($auctionDatesQuery);

    //     $manufcturesQuery = "SELECT DISTINCT marka_name FROM main ORDER BY marka_name ASC";
    //     $manufactures = ApiClient::callAuctionApi($manufcturesQuery, true);

    //     $models = [];
    //     if ($request->manufacturer) {
    //         $modelQuery = "SELECT DISTINCT MODEL_NAME FROM main WHERE marka_name='" . $request->manufacturer . "' ORDER BY MODEL_NAME ASC";
    //         $models = ApiClient::callAuctionApi($modelQuery, true);
    //     }

    //     $years = [];
    //     $chassisNumbers = [];
    //     $engineCapacity = [];
    //     $colorQuery = [];
    //     $ConditionQuery = [];
    //     $PriceQuery = [];
    //     $Mileages = [];

    //     if ($request->manufacturer && $request->model) {
    //         // get years
    //         $yearsQuery = "SELECT DISTINCT year FROM main WHERE marka_name='" . $request->manufacturer . "' AND MODEL_NAME='" . $request->model . "' ORDER BY year DESC";
    //         $years = ApiClient::callAuctionApi($yearsQuery, true);

    //         // get chassis number
    //         $chassisNoQuery = "SELECT DISTINCT kuzov FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";

    //         // get engine capacity
    //         $engineCapacityQuery = "SELECT DISTINCT eng_v FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";

    //         // get colors
    //         $vColorQuery = "SELECT DISTINCT COLOR FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";

    //         // get condition
    //         $vConditionQuery = "SELECT DISTINCT rate FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";

    //         // get price
    //         $vPriceQuery = "SELECT DISTINCT AVG_PRICE FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";

    //         // get Mileage
    //         $vMileageQuery = "SELECT DISTINCT MILEAGE FROM main WHERE marka_name='" . $request->manufacturer . "' AND MODEL_NAME='" . $request->model . "' ORDER BY MILEAGE ASC";


    //         // dd($vMileageQuery);

    //         if ($request->year_from == $request->year_to) {
    //             if ($request->year_from != 0) {
    //                 $chassisNoQuery .= "AND year = '" . $request->year_from . "' ";
    //             }
    //             if($request->mileage_from == $request-> mileage_to){
    //                 $vMileageQuery .= "AND MILEAGE = '" . $request->year_from . "' ";
    //             }

    //             $engineCapacityQuery .= "AND year = '" . $request->year_from . "' ";

    //             $vColorQuery .= "AND year = '" . $request->year_from . "' ";

    //             $vConditionQuery .= "AND year = '" . $request->year_from . "' ";

    //             $vPriceQuery .= "AND year = '" . $request->year_from . "' ";

    //         } else if ($request->year_from && $request->year_to) {
    //             if ($request->year_from != 0 && $request->year_to != 0) {

    //                 $chassisNoQuery .= "AND year BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";
    //             }
    //             if($request->mileage_from != 0 && $request->mileage_to != 0){
    //                 $vMileageQuery .= "AND MILEAGE BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";
    //             }

    //             $engineCapacityQuery .= "AND year BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";

    //             $vColorQuery .= "AND year BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";

    //             $vConditionQuery .= "AND year BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";

    //             $vPriceQuery .= "AND year BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";
    //         }

    //         $chassisNoQuery .= "ORDER BY kuzov ASC";

    //         $chassisNumbers = ApiClient::callAuctionApi($chassisNoQuery, true);

    //         $Mileages = ApiClient::callAuctionApi($vMileageQuery, true);


    //         // dd($Mileages);

    //         if ($request->chassis) {
    //             $engineCapacityQuery .= "AND kuzov = '" . $request->chassis . "' ";

    //             $vColorQuery .= "AND kuzov = '" . $request->chassis . "' ";

    //             $vConditionQuery .= "AND kuzov = '" . $request->chassis . "' ";

    //             $vPriceQuery .= "AND kuzov = '" . $request->chassis . "' ";
    //         }

    //         if ($request->engine) {
    //             $vColorQuery .= "AND eng_v = '" . $request->engine . "' ";

    //             $vConditionQuery .= "AND eng_v = '" . $request->engine . "' ";

    //             $vPriceQuery .= "AND eng_v = '" . $request->engine . "' ";
    //         }
    //         if ($request->grade) {

    //             $vPriceQuery .= "AND RATE = '" . $request->grade . "' ";
    //         }

    //         $engineCapacityQuery .= "order by eng_v ASC";
    //         $engineCapacity = ApiClient::callAuctionApi($engineCapacityQuery, true);

    //         $vConditionQuery .= "order by RATE ASC";
    //         $ConditionQuery = ApiClient::callAuctionApi($vConditionQuery, true);

    //         $vPriceQuery .= "order by AVG_PRICE ASC";
    //         $PriceQuery = ApiClient::callAuctionApi($vPriceQuery, true);

    //         $vColorQuery .= " order by COLOR ASC";
    //         $colorQuery = ApiClient::callAuctionApi($vColorQuery, true);

    //     }

    //     // $vehiclesList = [];
    //     // if($request->search == 'true') {
    //     // dd( $ConditionQuery);
    //     $vehiclesList = $this->getVehicleList($request);
    //     $vehiclesListCount = $this->getVehicleListCount($request);
    //     $vehiclesListCount = count($vehiclesListCount) > 0 ? $vehiclesListCount[0]['TAG0'] : 0;
    //     // }


    //     return Inertia::render('Live_auction/index', ['requestQuery' => $requestData, 'auctionDates' => $auctionDates, 'manufactures' => $manufactures, 'models' => $models, 'years' => $years, 'chassisNumbers' => $chassisNumbers, 'engineCapacity' => $engineCapacity, 'colorQuery' => $colorQuery, 'vehiclesList' => $vehiclesList, 'vehiclesListCount' => $vehiclesListCount, 'Condition' => $ConditionQuery, 'PriceQuery' => $PriceQuery, 'Mileage' => $Mileages, ]);
    // }
    public function Live_auction(Request $request)
    {
        //dd('fffffff');
        $countries = Country::where(['status' => 1])->get();

        $requestData = $request->all();
        // dd($request);
        $auctionDatesQuery = "SELECT auction_date FROM main GROUP BY DATE_FORMAT(auction_date,'%Y-%m-%d')";
        $auctionDates = ApiClient::callAuctionApi($auctionDatesQuery);
        $vehicleTypes = Type::where(['status' => 1])->with(relations: 'media')->get();
        $manufacturers = Manufacture::where(['status' => 1])->with('media')->get();
        $models = VehicleModel::where(['status' => 1])->get();
        $vehicles = Vehicle::where(['status' => 1])
            ->with('media', 'vehicleType', 'manufacture', 'vehicleModel')
            ->get();

        $manufcturesQuery = "SELECT DISTINCT marka_name FROM main ORDER BY marka_name ASC";
        $manufactures = ApiClient::callAuctionApi($manufcturesQuery, true);
        // dd($manufactures);

        // rebuild models list if a make is selected
        $models = [];
        if ($request->manufacturer) {
            $modelQuery = "SELECT DISTINCT MODEL_NAME FROM main
                       WHERE marka_name='" . $request->manufacturer . "'
                       ORDER BY MODEL_NAME ASC";
            $models = ApiClient::callAuctionApi($modelQuery, true);
            // dd($models);
        }

        // build a single WHERE clause from any selected filters
        $filterClause = "WHERE 1=1 ";
        if ($request->manufacturer) {
            $filterClause .= " AND marka_name = '{$request->manufacturer}' ";
        }
        if ($request->model) {
            $filterClause .= " AND model_name = '{$request->model}' ";
        }
        if ($request->year_from && $request->year_to && $request->year_from === $request->year_to) {
            $filterClause .= " AND year = '{$request->year_from}' ";
        } elseif ($request->year_from && $request->year_to) {
            $filterClause .= " AND year BETWEEN '{$request->year_from}' AND '{$request->year_to}' ";
        }
        if ($request->chassis) {
            $filterClause .= " AND kuzov = '{$request->chassis}' ";
        }
        if ($request->engine) {
            $filterClause .= " AND eng_v = '{$request->engine}' ";
        }
        if ($request->grade) {
            $filterClause .= " AND rate = '{$request->grade}' ";
        }
        if ($request->mileage_from && $request->mileage_to && $request->mileage_from === $request->mileage_to) {
            $filterClause .= " AND MILEAGE = '{$request->mileage_from}' ";
        } elseif ($request->mileage_from && $request->mileage_to) {
            $filterClause .= " AND MILEAGE BETWEEN '{$request->mileage_from}' AND '{$request->mileage_to}' ";
        }

        // fetch all dependent dropdown data in one go
        $years = ApiClient::callAuctionApi(
            "SELECT DISTINCT year FROM main {$filterClause} ORDER BY year DESC",
            true
        );
        $chassisNumbers = ApiClient::callAuctionApi(
            "SELECT DISTINCT kuzov FROM main {$filterClause} ORDER BY kuzov ASC",
            true
        );
        $engineCapacity = ApiClient::callAuctionApi(
            "SELECT DISTINCT eng_v FROM main {$filterClause} ORDER BY eng_v ASC",
            true
        );
        $ConditionQuery = ApiClient::callAuctionApi(
            "SELECT DISTINCT rate FROM main {$filterClause} ORDER BY rate ASC",
            true
        );
        $colorQuery = ApiClient::callAuctionApi(
            "SELECT DISTINCT COLOR FROM main {$filterClause} ORDER BY COLOR ASC",
            true
        );
        $PriceQuery = ApiClient::callAuctionApi(
            "SELECT DISTINCT AVG_PRICE FROM main {$filterClause} ORDER BY AVG_PRICE ASC",
            true
        );
        $Mileages = ApiClient::callAuctionApi(
            "SELECT DISTINCT MILEAGE FROM main {$filterClause} ORDER BY MILEAGE ASC",
            true
        );

        // preserve the old branches for future reference
        /*
        if ($request->manufacturer && $request->model) {
            // … original per-filter logic …
        }
        elseif ($request->manufacturer && ! $request->model) {
            // Make only: show engine CCs for that Make
            // $engineCapacityQuery = "SELECT DISTINCT eng_v …";
            // $engineCapacity = ApiClient::callAuctionApi($engineCapacityQuery, true);
        }
        elseif (! $request->manufacturer && ! $request->model) {
            // $engineCapacityQuery = "SELECT DISTINCT eng_v FROM main";
            // $engineCapacity = ApiClient::callAuctionApi($engineCapacityQuery, true);
        }
        */

        $vehiclesList = $this->getVehicleList($request);
        $vehiclesListCount = $this->getVehicleListCount($request);
        $vehiclesListCount = count($vehiclesListCount) > 0
            ? $vehiclesListCount[0]['TAG0']
            : 0;

        return Inertia::render('Live_auction/index', [
            'requestQuery' => $requestData,
            'auctionDates' => $auctionDates,
            'manufactures' => $manufactures,
            'models' => $models,
            'years' => $years,
            'chassisNumbers' => $chassisNumbers,
            'engineCapacity' => $engineCapacity,
            'colorQuery' => $colorQuery,
            'vehiclesList' => $vehiclesList,
            'vehiclesListCount' => $vehiclesListCount,
            'Condition' => $ConditionQuery,
            'PriceQuery' => $PriceQuery,
            'Mileage' => $Mileages,
            'vehicleTypes' => $vehicleTypes,
            'manufacturers' => $manufacturers,
            'vehicles' => $vehicles,
            'countries' => $countries,
            'logged_customer' => auth('customer')->user(),
        ]);
    }



    public function service()
    {
        // dd('test');
        return Inertia::render('Services/index');
    }



    public function available(Request $request, $countrySlug = null)
    {
        // Get all filter data
        $requestData = $request->all();
        $vehicleTypes = Type::where(['status' => 1])->with('media')->get();
        $manufacturers = Manufacture::where(['status' => 1])->with('media')->get();
        $models = VehicleModel::where(['status' => 1])->get();
        $countries = Country::where(['status' => 1])->get();

        // Base query
        $vehicles = Vehicle::where(['status' => 1]);

        // Handle country slug from URL
        $selectedCountry = null;
        if ($countrySlug) {
            $selectedCountry = Country::whereRaw("LOWER(REPLACE(name, ' ', '-')) = ?", [strtolower($countrySlug)])->first();
            if ($selectedCountry) {
                $vehicles->whereRaw('JSON_CONTAINS(countries, ?)', [json_encode((string) $selectedCountry->id)]);
            }
        }

        // Additional filters from request (if no slug is provided)
        if (!$countrySlug && $request->country) {
            if (is_array($request->country)) {
                $vehicles->where(function ($query) use ($request) {
                    foreach ($request->country as $countryId) {
                        $query->orWhereRaw('JSON_CONTAINS(countries, ?)', [json_encode((string) $countryId)]);
                    }
                });
            } else {
                $vehicles->whereRaw('JSON_CONTAINS(countries, ?)', [json_encode((string) $request->country)]);
            }
        }

        // Other filters (unchanged)
        if ($request->brand) {
            $vehicles->whereIn('manufacture_id', is_array($request->brand) ? $request->brand : [$request->brand]);
        }

        if ($request->model) {
            $vehicles->whereIn('vehicle_model_id', is_array($request->model) ? $request->model : [$request->model]);
        }

        if ($request->type) {
            $vehicles->whereIn('vehicle_type_id', is_array($request->type) ? $request->type : [$request->type]);
        }

        if ($request->drive_type) {
            $vehicles->whereIn('drive_type', is_array($request->drive_type) ? $request->drive_type : [$request->drive_type]);
        }

        if ($request->engineCC) {
            $vehicles->where('engine_capacity', '>=', $request->engineCC);
        }


        if ($request->sortBy) {
            switch ($request->sortBy) {
                case 'priceLowHigh':
                    $vehicles->orderBy('price', 'asc');
                    break;
                case 'priceHighLow':
                    $vehicles->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $vehicles->orderBy('created_at', 'desc');
                    break;
            }
        }


        if ($request->keyword) {
            $vehicles->where(function ($query) use ($request) {
                $query->where('drive_type', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhereHas('manufacture', function ($q) use ($request) {
                        $q->where('title', 'LIKE', '%' . $request->keyword . '%');
                    })
                    ->orWhereHas('vehicleModel', function ($q) use ($request) {
                        $q->where('title', 'LIKE', '%' . $request->keyword . '%');
                    })
                    ->orWhereHas('vehicleType', function ($q) use ($request) {
                        $q->where('title', 'LIKE', '%' . $request->keyword . '%');
                    });
            });
        }

        $vehicles = $vehicles
            ->with('media', 'vehicleType', 'manufacture', 'vehicleModel')
            ->paginate(12)               // ← show 12 per page
            ->withQueryString();

        return Inertia::render('Available_stock/index', [
            'vehicleTypes' => $vehicleTypes,
            'manufacturers' => $manufacturers,
            'models' => $models,
            'vehicles' => $vehicles,
            'requestQuery' => $requestData,
            'countries' => $countries,
            'selectedCountry' => $selectedCountry ? ['id' => $selectedCountry->id, 'name' => $selectedCountry->name] : null,
        ]);
    }
    public function faq()
    {
        // dd('test');
        return Inertia::render('FAQ/index');
    }
    public function knowledge()
    {
        // dd('test');
        return Inertia::render('Knowledge/index');
    }
    public function testimonials()
    {
        // dd('test');

        $testimonials = Testimonial::where('status', 1)->with('media')->get();
        // dd($testimonials->all());

        return Inertia::render('Testimonials/index', ['testimonials' => $testimonials]);
    }
    public function contact()
    {
        // dd('test');
        $countries = Country::where(['status' => 1])->get();
        return Inertia::render('Contact_us/index', ['countries' => $countries]);
    }


    public function HowtoOrder()
    {
        // dd('test');
        $countries = Country::where(['status' => 1])->get();

        $site_url = 'https://jpnauto.com';

        return Inertia::render('How_to_order/index', ['site_url' => $site_url, 'countries' => $countries]);
    }
    public function login(Request $request)
    {

        if ($request->has('redirect')) {

            session(['url.intended' => $request->redirect]);
        }

        return Inertia::render('Login/index');
    }
    public function register()
    {
        // dd('test');
        return Inertia::render('Register/index');
    }
    public function signup()
    {
        // dd('test');
        return Inertia::render('Login/index');
    }
    public function product(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $countries = Country::where(['status' => 1])->get();

        $vehicle = Vehicle::with('manufacture', 'vehicleModel', 'vehicleType', 'exColor', 'inColor', 'media')->find($request->id);

        $randomVehicles = Vehicle::with('media', 'manufacture', 'vehicleModel')
            ->where('id', '!=', $vehicle->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $features = json_decode($vehicle->features, true);
        //    $features  = json_decode($features, true);
        $features = Feature::whereIn('id', $features ?? [])->get();
        return Inertia::render('Product_view/index', ['vehicle' => $vehicle, 'features' => $features, 'randomVehicles' => $randomVehicles, 'countries' => $countries]);
    }
    public function forgotpassword()
    {
        // dd('test');
        return Inertia::render('Forgot_password/index');
    }
    public function profile()
    {
        $countries = Country::where(['status' => 1])->get();

        $inquires = Inquiry::where('email', auth('customer')->user()?->email)->get();
        $affilates = DB::table('affiliates')->where('affiliate_id', auth('customer')->user()?->enrolled_affiliate_id)->get();
        $affilatesUserIDs = $affilates->pluck('customer_id');
        $affilateUsers = Customer::with('media')->whereIn('id', $affilatesUserIDs)->get();

        $affilateUsersCount = count($affilateUsers);
        $settingsAffiliate = Settings::where(['key' => 'affilate_point_value'])->first()->value ?? 0;
        $affiliatePoints = (int) $affilateUsersCount * (float) $settingsAffiliate;


        return Inertia::render('User_profile/index', ['countries' => $countries, 'inquires' => $inquires, 'affilateUsers' => $affilateUsers, 'affiliatePoints' => $affiliatePoints]);
    }
    public function PrivacyPolicy()
    {
        // dd('test');
        return Inertia::render('PrivacyPolicy/index');
    }
    public function NewPassword(Request $request)
    {
        // dd('test');
        return Inertia::render('NewPassword/index', ['token' => $request->token]);
    }

    public function getVehicleList(Request $request)
    {
        // dd($request);

        $vehiclesList = [];
        $query = "SELECT * FROM main WHERE 1=1 ";



        if ($request->search == 'true') {
            if ($request->manufacturer) {
                $query .= "AND marka_name = '" . $request->manufacturer . "' ";
            }

            if ($request->model) {
                $query .= "AND model_name = '" . $request->model . "' ";
            }

            if ($request->year_to == 0 && $request->year_from != 0) {
                $query .= "AND year >= '" . $request->year_from . "' ";
            } else if ($request->year_from == 0 && $request->year_to != 0) {
                $query .= "AND year <= '" . $request->year_to . "' ";
            } else if ($request->year_from != 0 && $request->year_to != 0) {
                $query .= "AND year >= '" . $request->year_from . "' AND year <= '" . $request->year_to . "' ";
            }

            if ($request->mileage_to == 0 && $request->mileage_from != 0) {
                $query .= "AND MILEAGE >= '" . $request->year_from . "' ";
            } else if ($request->mileage_from == 0 && $request->mileage_to != 0) {
                $query .= "AND MILEAGE <= '" . $request->mileage_to . "' ";
            } else if ($request->mileage_from != 0 && $request->mileage_to != 0) {
                $query .= "AND MILEAGE >= '" . $request->mileage_from . "' AND MILEAGE <= '" . $request->mileage_to . "' ";
            }

            if ($request->chassis) {
                $query .= "AND kuzov = '" . $request->chassis . "' ";
            }


            if ($request->engine) {
                $query .= "AND eng_v = '" . $request->engine . "' ";
            }


            if ($request->color) {
                $query .= "AND COLOR = '" . $request->color . "' ";
            }
            if ($request->grade) {
                $query .= "AND rate = '" . $request->grade . "' ";
            }

            if ($request->start_price) {
                $query .= "AND AVG_PRICE >= '" . $request->start_price . "' ";
            }

            if ($request->lot_no) {
                $query .= "AND LOT = '" . $request->lot_no . "' ";
            }
            // dd(explode(' ', $request->available_days)[0]);
            // if ($request->available_days) {
            //     $query .= "AND AUCTION_DATE LIKE '%" . explode(' ', $request->available_days)[0] . "%' ";
            //     // TODO: filter auctio for multiple available dates
            // }
            $page = $request->page ?? 1;
            $pageOffset = ($page - 1) * 12;

            $query .= ' ORDER BY year DESC LIMIT ' . $pageOffset . ',12';

            $vehiclesList = ApiClient::callAuctionApi($query);
        }


        return $vehiclesList;
    }

    public function getVehicleListCount(Request $request)
    {

        $vehiclesList = [];
        $query = "SELECT COUNT(*) FROM main WHERE 1=1 ";

        if ($request->search == 'true') {
            if ($request->manufacturer) {
                $query .= "AND marka_name = '" . $request->manufacturer . "' ";
            }

            if ($request->model) {
                $query .= "AND model_name = '" . $request->model . "' ";
            }

            if ($request->year_to == 0 && $request->year_from != 0) {
                $query .= "AND year >= '" . $request->year_from . "' ";
            } else if ($request->year_from == 0 && $request->year_to != 0) {
                $query .= "AND year <= '" . $request->year_to . "' ";
            } else if ($request->year_from != 0 && $request->year_to != 0) {
                $query .= "AND year >= '" . $request->year_from . "' AND year <= '" . $request->year_to . "' ";
            }

            if ($request->chassis) {
                $query .= "AND kuzov = '" . $request->chassis . "' ";
            }

            if ($request->engine) {
                $query .= "AND eng_v = '" . $request->engine . "' ";
            }

            // if ($request->color) {
            //     $query .= "AND COLOR = '" . $request->color . "' ";
            // }

            if ($request->lot_no) {
                $query .= "AND LOT = '" . $request->lot_no . "' ";
            }
            // dd(explode(' ', $request->available_days)[0]);
            // if ($request->available_days) {
            //     $query .= "AND AUCTION_DATE LIKE '%" . explode(' ', $request->available_days)[0] . "%' ";
            //     // TODO: filter auctio for multiple available dates
            // }

            $query .= ' ORDER BY year DESC';

            $vehiclesList = ApiClient::callAuctionApi($query);
        }


        return $vehiclesList;
    }

    public function getVehicleStatsList(Request $request)
    {

        $query = "SELECT * FROM stats WHERE 1=1 ";
        if ($request->manufacture) {
            $query .= "AND marka_name = '" . $request->manufacture . "' ";
        }

        if ($request->model) {
            $query .= "AND model_name = '" . $request->model . "' ";
        }

        if ($request->chassis_no) {
            $query .= "AND kuzov = '" . $request->chassis_no . "' ";
        }

        if ($request->engine) {
            $query .= "AND eng_v = '" . $request->engine . "' ";
        }

        if ($request->year) {
            $query .= "AND year = '" . $request->year . "' ";
        }

        if ($request->rate) {
            $query .= "AND rate = '" . $request->rate . "' ";
        }


        // $page = $request->page > 0 ? $request->page : 1;
        // $pageOffset = ($page - 1) * 10;

        // $query .= "ORDER BY auction_date DESC LIMIT " . $pageOffset . ",10";

        $query .= "ORDER BY auction_date DESC";

        // dd($query);

        $vehiclesStatList = ApiClient::callAuctionApi($query);



        return $vehiclesStatList;
    }



    public function AppDownload()
    {
        // dd('test');
        return Inertia::render('Download/AppDownload');
    }

    public function auctionStat(Request $request)
    {
        // dd('test');
        // dd($request->all());

        $countries = Country::where(['status' => 1])->get();
        $id = $request->id;
        $requestData = $request->all();

        if (!$id) {
            return redirect()->back();
        }

        $query = "SELECT * FROM stats WHERE id = '" . $id . "' order by marka_name ASC";
        $details = ApiClient::callAuctionApi($query, true);

        // dd($id);

        $details = count($details) > 0 ? $details[0] : null;

        $images = $details ? explode('#', $details['IMAGES']) : [];

        // stats filter queries
        $statsYearQuery = "SELECT count(year), year FROM stats ";
        $statsChassiesQuery = "SELECT count(kuzov), kuzov FROM stats ";
        $statsConditionQuery = "SELECT count(rate), rate FROM stats ";

        if ($request->manufacture) {
            $statsYearQuery .= "WHERE marka_name = '" . $request->manufacture . "' ";
            $statsChassiesQuery .= "WHERE marka_name = '" . $request->manufacture . "' ";
            $statsConditionQuery .= "WHERE marka_name = '" . $request->manufacture . "' ";
        }

        if ($request->model) {
            $statsYearQuery .= "AND model_name = '" . $request->model . "' ";
            $statsChassiesQuery .= "AND model_name = '" . $request->model . "' ";
            $statsConditionQuery .= "AND model_name = '" . $request->model . "' ";
        }

        if ($request->chassis_no) {
            $statsConditionQuery .= "AND kuzov = '" . $request->chassis_no . "' ";
        }

        if ($request->year) {
            $statsChassiesQuery .= "AND year = '" . $request->year . "' ";
            $statsConditionQuery .= "AND year = '" . $request->year . "' ";
            $statsConditionQuery .= "AND year = '" . $request->year . "' ";
        }

        $statsYearQuery .= "GROUP BY year ORDER BY year DESC";
        $statsChassiesQuery .= 'GROUP BY kuzov ORDER BY kuzov ASC';
        $statsConditionQuery .= 'GROUP BY rate ORDER BY rate ASC';

        $statsYears = ApiClient::callAuctionApi($statsYearQuery);
        $statsChassis = ApiClient::callAuctionApi($statsChassiesQuery, true);
        $statsConditions = ApiClient::callAuctionApi($statsConditionQuery, true);




        $vehicleStatsList = $this->getVehicleStatsList($request);


        $vehicleStatsList = $this->getVehicleStatsList($request);

        return Inertia::render('Auction_view/index', [
            'countries' => $countries,
            'details' => $details,
            'vImages' => $images,
            'statsYears' => $statsYears,
            'statsChassis' => $statsChassis,
            'statsConditions' => $statsConditions,
            'requestQuery' => $requestData,
            'vehicleStatsList' => $vehicleStatsList,
            'logged_customer' => auth('customer')->user(), //




        ]);
    }


    public function careers()
    {
        // dd('test');
        // $image_url = 'images/about.jpg';
        //our_deleveries
        // return Inertia::render('About/index', ['image_url' => $image_url]);
        return Inertia::render('Careers/index');
    }
    public function our_deleveries()
    {
        // dd('test');
        // $image_url = 'images/about.jpg';
        //our_deleveries
        // return Inertia::render('About/index', ['image_url' => $image_url]);
        return Inertia::render('Our_deliveries/index');
    }
    public function find_a_car()
    {
        // dd('test');
        // $image_url = 'images/about.jpg';
        //our_deleveries
        // return Inertia::render('About/index', ['image_url' => $image_url]);
        return Inertia::render('Find_a_car/index');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'enquiry' => 'required'
        ]);

        $countries = Country::where(['status' => 1])->get();

        $contact = Contact::create($validatedData);

        // Mail::to('osura@eweblook.com')->send(new ContactMailable($validatedData));

        return Inertia::render('Contact_us/index', ['contact' => $contact, 'countries' => $countries]);
    }

    public function exportVehicleStatsList()
    {
        set_time_limit(600); // optional: increase execution time

        $limit = 250;
        $offset = 0;
        $batchNumber = 1;
        $tempFiles = [];

        // Clean export folder
        Storage::deleteDirectory('exports');
        Storage::makeDirectory('exports');

        do {
            $query = "SELECT * FROM stats WHERE 1=1 ORDER BY auction_date DESC LIMIT $offset, $limit";
            $batch = ApiClient::callAuctionApi($query);

            if (is_array($batch) && count($batch)) {
                $fileName = "vehicle_stats_batch_{$batchNumber}.xlsx";
                $filePath = "exports/{$fileName}";

                Excel::store(new VehicleStatsExport($batch), $filePath, null, \Maatwebsite\Excel\Excel::XLSX);
                $tempFiles[] = storage_path("app/" . $filePath);

                $offset += $limit;
                $batchNumber++;
            } else {
                break;
            }
        } while (true);

        if (empty($tempFiles)) {
            return back()->with('error', 'No data found.');
        }

        // Zip the files
        $zipPath = storage_path("app/exports/vehicle_stats_batches.zip");
        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($tempFiles as $file) {
                $zip->addFile($file, basename($file));
            }
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

 public function testexcel()
    {
        $query = "SELECT * FROM stats WHERE 1=1 ORDER BY auction_date DESC";

        $vehicles = ApiClient::callAuctionApi($query);

        if (empty($vehicles)) {
            return redirect()->back()->with('error', 'No data found.');
        }

        return Excel::download(new VehicleStatsExport($vehicles), 'vehicle_stats.xlsx');
    }



    public function auction(Request $request)
    {
        //dd('fffffff');
// dd($request->all());


$filterClause = 'WHERE 1=1 ';
if ($make = $request->manufacturer) {
    $filterClause .= " AND marka_name = '{$make}' ";
}
if ($model = $request->model) {
    $filterClause .= " AND model_name = '{$model}' ";
}

        $countries = Country::where(['status' => 1])->get();
        $category_manufactures = LiveAuctionManufacturer::where(['status' => 1])->get();
        $vehicle_types = Type::where(['status' => 1, 'featured' => 1])->get();

        $manufactures   = ApiClient::callAuctionApi("SELECT DISTINCT marka_name FROM main ORDER BY marka_name ASC", true);
        $models         = [];
        if ($request->manufacturer) {
            $models = ApiClient::callAuctionApi(
                "SELECT DISTINCT MODEL_NAME FROM main WHERE marka_name='{$request->manufacturer}' ORDER BY MODEL_NAME ASC",
                true
            );
        }

        $auctionDatesQuery = "
            SELECT auction_date
                FROM main
            GROUP BY DATE_FORMAT(auction_date,'%Y-%m-%d')
            ";
        $auctionDates = ApiClient::callAuctionApi($auctionDatesQuery);


        $years          = ApiClient::callAuctionApi(
            "SELECT DISTINCT year        FROM main {$filterClause} ORDER BY year DESC",
            true
        );
        $chassisNumbers = ApiClient::callAuctionApi(
            "SELECT DISTINCT kuzov       FROM main {$filterClause} ORDER BY kuzov ASC",
            true
        );
        $engineCapacity = ApiClient::callAuctionApi(
            "SELECT DISTINCT eng_v       FROM main {$filterClause} ORDER BY eng_v ASC",
            true
        );
        $colorQuery     = ApiClient::callAuctionApi(
            "SELECT DISTINCT COLOR       FROM main {$filterClause} ORDER BY COLOR ASC",
            true
        );
        $ConditionQuery = ApiClient::callAuctionApi(
            "SELECT DISTINCT rate        FROM main {$filterClause} ORDER BY rate ASC",
            true
        );
        $PriceQuery     = ApiClient::callAuctionApi(
            "SELECT DISTINCT AVG_PRICE   FROM main {$filterClause} ORDER BY AVG_PRICE ASC",
            true
        );
        $Mileages       = ApiClient::callAuctionApi(
            "SELECT DISTINCT MILEAGE     FROM main {$filterClause} ORDER BY MILEAGE ASC",
            true
        );

        // $manufcturesQuery = "SELECT DISTINCT marka_name FROM main ORDER BY marka_name ASC";
        // $manufactures = ApiClient::callAuctionApi($manufcturesQuery, true);

        $models = [];
        if ($request->manufacturer) {
            $modelQuery = "SELECT DISTINCT MODEL_NAME FROM main WHERE marka_name='" . $request->manufacturer . "' ORDER BY MODEL_NAME ASC";
            $models = ApiClient::callAuctionApi($modelQuery, true);
        }
        $engineCapacity = [];
        $chassisNumbers = [];
        $grades = [];
        $auctionGrades = [];

        if ($request->manufacturer && $request->model) {

            $engineCapacityQuery = "SELECT DISTINCT eng_v FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";
            $engineCapacityQuery .= "order by eng_v ASC";
            $engineCapacity = ApiClient::callAuctionApi($engineCapacityQuery, true);

            $chassisNoQuery = "SELECT DISTINCT kuzov FROM main WHERE marka_name='" . $request->manufacturer . "' AND MODEL_NAME='" . $request->model . "' ";
            $chassisNoQuery .= "ORDER BY kuzov ASC";
            $chassisNumbers = ApiClient::callAuctionApi($chassisNoQuery, true);

            $gradeQuery = "SELECT DISTINCT GRADE FROM main WHERE marka_name='" . $request->manufacturer . "' AND MODEL_NAME='" . $request->model . "' ";
            $gradeQuery .= "ORDER BY GRADE ASC";
            $gradesRaw = ApiClient::callAuctionApi($gradeQuery, true);

            $vConditionQuery = "SELECT DISTINCT rate FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";
            $vConditionQuery .= "order by rate ASC";


            $auctionGrades = ApiClient::callAuctionApi($vConditionQuery, true);

            // Decode HTML entities
            $grades = array_map(function ($gradeItem) {
                if (isset($gradeItem['GRADE'])) {
                    $gradeItem['GRADE'] = html_entity_decode($gradeItem['GRADE'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                }
                return $gradeItem;
            }, $gradesRaw);
        }
        $id = $request->id;
        $requestData = $request->all();


    
        if (!$id) {
            return redirect()->back();
        }

        $query = "SELECT * FROM main WHERE id = '" . $id . "' order by marka_name ASC";
        $details = ApiClient::callAuctionApi($query, true);
        // dd($id);
        $details = count($details) > 0 ? $details[0] : null;

        $images = $details ? explode('#', $details['IMAGES']) : [];

        // stats filter queries
        $statsYearQuery = "SELECT count(year), year FROM stats ";
        $statsChassiesQuery = "SELECT count(kuzov), kuzov FROM stats ";
        $statsConditionQuery = "SELECT count(rate), rate FROM stats ";

        if ($request->manufacture) {
            $statsYearQuery .= "WHERE marka_name = '" . $request->manufacture . "' ";
            $statsChassiesQuery .= "WHERE marka_name = '" . $request->manufacture . "' ";
            $statsConditionQuery .= "WHERE marka_name = '" . $request->manufacture . "' ";
        }

        if ($request->model) {
            $statsYearQuery .= "AND model_name = '" . $request->model . "' ";
            $statsChassiesQuery .= "AND model_name = '" . $request->model . "' ";
            $statsConditionQuery .= "AND model_name = '" . $request->model . "' ";
        }

        if ($request->chassis_no) {
            $statsConditionQuery .= "AND kuzov = '" . $request->chassis_no . "' ";
        }

        if ($request->year) {
            $statsChassiesQuery .= "AND year = '" . $request->year . "' ";
            $statsConditionQuery .= "AND year = '" . $request->year . "' ";
            $statsConditionQuery .= "AND year = '" . $request->year . "' ";
        }

        $statsYearQuery .= "GROUP BY year ORDER BY year DESC";
        $statsChassiesQuery .= 'GROUP BY kuzov ORDER BY kuzov ASC';
        $statsConditionQuery .= 'GROUP BY rate ORDER BY rate ASC';

        $statsYears = ApiClient::callAuctionApi($statsYearQuery);
        $statsChassis = ApiClient::callAuctionApi($statsChassiesQuery, true);
        $statsConditions = ApiClient::callAuctionApi($statsConditionQuery, true);

        // A. Define the new queries
        $statsEngineCapacityQuery = "SELECT count(eng_v), eng_v FROM stats ";
        $statsLotQuery = "SELECT count(LOT), LOT FROM stats ";
        $statsAuDateQuery = "SELECT count(auction_date), auction_date FROM stats ";

        // B. Mirror your existing WHERE clauses for manufacture/model/year/rate/chassis/engine
        if ($request->manufacture) {
            $statsEngineCapacityQuery .= "WHERE marka_name = '{$request->manufacture}' ";
            $statsLotQuery .= "WHERE marka_name = '{$request->manufacture}' ";
            $statsAuDateQuery .= "WHERE marka_name = '{$request->manufacture}' ";
        }
        if ($request->model) {
            $statsEngineCapacityQuery .= "AND model_name = '{$request->model}' ";
            $statsLotQuery .= "AND model_name = '{$request->model}' ";
            $statsAuDateQuery .= "AND model_name = '{$request->model}' ";
        }
        if ($request->year) {
            $statsEngineCapacityQuery .= "AND year = '{$request->year}' ";
            $statsLotQuery .= "AND year = '{$request->year}' ";
            $statsAuDateQuery .= "AND year = '{$request->year}' ";
        }
        if ($request->chassis_no) {
            $statsEngineCapacityQuery .= "AND kuzov = '{$request->chassis_no}' ";
            $statsLotQuery .= "AND kuzov = '{$request->chassis_no}' ";
            $statsAuDateQuery .= "AND kuzov = '{$request->chassis_no}' ";
        }
        if ($request->rate) {
            $statsEngineCapacityQuery .= "AND rate = '{$request->rate}' ";
            $statsLotQuery .= "AND rate = '{$request->rate}' ";
            $statsAuDateQuery .= "AND rate = '{$request->rate}' ";
        }
        if ($request->engine) {
            // only lot & date need engine
            $statsLotQuery .= "AND eng_v = '{$request->engine}' ";
            $statsAuDateQuery .= "AND eng_v = '{$request->engine}' ";
        }

        // C. Group & order
        $statsEngineCapacityQuery .= 'GROUP BY eng_v ORDER BY eng_v ASC';
        $statsLotQuery .= 'GROUP BY LOT ORDER BY LOT ASC';
        $statsAuDateQuery .= 'GROUP BY auction_date ORDER BY auction_date ASC';

        // D. Execute
        $statsEngine = ApiClient::callAuctionApi($statsEngineCapacityQuery, true);
        $statsLot = ApiClient::callAuctionApi($statsLotQuery, true);
        $statsAuDate = ApiClient::callAuctionApi($statsAuDateQuery, true);




        $vehicleStatsList = $this->getVehicleStatsList($request);

        return Inertia::render('Auction_view/index', [

            'countries' => $countries,
            'details' => $details,
            'vImages' => $images,
            'statsYears' => $statsYears,
            'statsChassis' => $statsChassis,
            'statsConditions' => $statsConditions,
            'requestQuery' => $requestData,
            'vehicleStatsList' => $vehicleStatsList,
            'statsengine' => $statsEngine,
            'statsslot' => $statsLot,
            'statAuDate' => $statsAuDate,
            'manufactures' => $manufactures,
            'models' => $models,
            'years'                 => $years,
            'colors'            => $colorQuery,
            'Condition'             => $ConditionQuery,
            'PriceQuery'            => $PriceQuery,
            'Mileage'               => $Mileages,
            'engineCapacity' => $engineCapacity,
            'chassisNumbers' => $chassisNumbers,
            'grades' => $grades,
            'auctionGrades' => $auctionGrades,
            'vehicle_types' => $vehicle_types,
            'category_manufactures' => $category_manufactures,
            'auctionDates'          => $auctionDates,   
        ]);
    }

    public function exportView(Request $request)
    {
        $countries = Country::where(['status' => 1])->get();
        $category_manufactures = LiveAuctionManufacturer::where(['status' => 1])->get();
        $vehicle_types = Type::where(['status' => 1, 'featured' => 1])->get();

        $manufcturesQuery = "SELECT DISTINCT marka_name FROM main ORDER BY marka_name ASC";
        $manufactures = ApiClient::callAuctionApi($manufcturesQuery, true);

        $models = [];
        if ($request->manufacturer) {
            $modelQuery = "SELECT DISTINCT MODEL_NAME FROM main WHERE marka_name='" . $request->manufacturer . "' ORDER BY MODEL_NAME ASC";
            $models = ApiClient::callAuctionApi($modelQuery, true);
        }
        $engineCapacity = [];
        $chassisNumbers = [];
        $grades = [];
        $auctionGrades = [];

        if ($request->manufacturer && $request->model) {

            $engineCapacityQuery = "SELECT DISTINCT eng_v FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";
            $engineCapacityQuery .= "order by eng_v ASC";
            $engineCapacity = ApiClient::callAuctionApi($engineCapacityQuery, true);

            $chassisNoQuery = "SELECT DISTINCT kuzov FROM main WHERE marka_name='" . $request->manufacturer . "' AND MODEL_NAME='" . $request->model . "' ";
            $chassisNoQuery .= "ORDER BY kuzov ASC";
            $chassisNumbers = ApiClient::callAuctionApi($chassisNoQuery, true);

            $gradeQuery = "SELECT DISTINCT GRADE FROM main WHERE marka_name='" . $request->manufacturer . "' AND MODEL_NAME='" . $request->model . "' ";
            $gradeQuery .= "ORDER BY GRADE ASC";
            $gradesRaw = ApiClient::callAuctionApi($gradeQuery, true);

            $vConditionQuery = "SELECT DISTINCT rate FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";
            $vConditionQuery .= "order by rate ASC";
            $auctionGrades = ApiClient::callAuctionApi($vConditionQuery, true);

            // Decode HTML entities
            $grades = array_map(function ($gradeItem) {
                if (isset($gradeItem['GRADE'])) {
                    $gradeItem['GRADE'] = html_entity_decode($gradeItem['GRADE'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                }
                return $gradeItem;
            }, $gradesRaw);
        }

        $statsYearsQuery = "SELECT DISTINCT year FROM stats ORDER BY year DESC";
        $statsYears      = ApiClient::callAuctionApi($statsYearsQuery, true);


        $colorQuery = ApiClient::callAuctionApi(
            "SELECT DISTINCT COLOR FROM main ORDER BY COLOR ASC",
            true
        );

        // dd($manufactures);
        return Inertia::render('ExportStats/Index', [
            'manufactures' => $manufactures,
            'models' => $models,
            'engineCapacity' => $engineCapacity,
            'chassisNumbers' => $chassisNumbers,
            'grades' => $grades,
            'auctionGrades' => $auctionGrades,
            'vehicle_types' => $vehicle_types,
            'category_manufactures' => $category_manufactures,
            'countries' => $countries,
            'statsYears' => $statsYears,
            'colors'         => $colorQuery,

        ]);
    }

    public function exportMultipleModelStats(Request $request)
    {
        // Log::info($request->all());
        set_time_limit(600);

        $marka = $request->manufacturer;
        $model = $request->model;
        $eng_v = $request->engine;
        $chassis = $request->chassis;
        $grade = $request->grade;
        $auctiongrade = $request->auctiongrade;

        if (!$marka || !$model || !$eng_v) {
            return back()->with('error', 'Missing required vehicle parameters.');
        }

        $vehicles = [];
        $offset = 0;
        $limit = 250;

        $marka_escaped = addslashes($marka);
        $model_escaped = addslashes($model);
        $eng_v_escaped = addslashes($eng_v);
        $chassis_condition = '';
        $grade_condition = '';
        $auctiongrade_condition = '';

        if ($chassis && $chassis != 'All') {
            $chassis_escaped = addslashes($chassis);
            $chassis_condition = " AND kuzov = '{$chassis_escaped}'";
        }
        if ($grade && $grade != 'All') {
            $grade_escaped = addslashes($grade);
            $grade_condition = " AND GRADE = '{$grade_escaped}'";
        }
        if ($auctiongrade && $auctiongrade != 'All') {
            $auctiongrade_escaped = addslashes($auctiongrade);
            $auctiongrade_condition = " AND rate = '{$auctiongrade_escaped}'";
        }

        while ($offset < 1000) {
            $query = "SELECT * FROM stats
            WHERE marka_name = '{$marka_escaped}'
              AND model_name = '{$model_escaped}'
              AND eng_v = '{$eng_v_escaped}'
                 {$chassis_condition}
                 {$grade_condition}
                 {$auctiongrade_condition}
              AND year BETWEEN 2023 AND 2025
              AND finish > 0
              AND status IN ('SOLD', 'Sold', 'Sold By Nego')
            ORDER BY auction_date DESC
            LIMIT {$offset}, {$limit}";

            $batch = ApiClient::callAuctionApi($query);

            if (empty($batch)) {
                break;
            }

            $vehicles = array_merge($vehicles, $batch);
            Log::info($vehicles);
            if (count($batch) < $limit) {
                break;
            }

            $offset += $limit;
        }

        if (empty($vehicles)) {
            return back()->with('error', 'No data found for the selected combination.');
        }

        $filename = "stats_{$marka}_{$model}_{$eng_v}" . ($chassis ? "_{$chassis}" : "") . ".xlsx";
        return Excel::download(new VehicleStatsExport($vehicles), $filename);
    }



    
    public function viewStats(Request $request)
    {
        Log::info($request->all());
        set_time_limit(600);

        $marka = $request->manufacturer;
        $model = $request->model;
        $eng_v = $request->engine;

        $color      = $request->input('color');

        $chassis = $request->chassis;
        $grade = $request->grade;
        $auctiongrade = $request->auctiongrade;

        if (!$marka || !$model || !$eng_v) {
            return back()->with('error', 'Missing required vehicle parameters.');
        }

        $marka_escaped = addslashes($marka);
        $model_escaped = addslashes($model);
        $eng_v_escaped = addslashes($eng_v);
        $chassis_condition = '';
        $grade_condition = '';
        $auctiongrade_condition = '';

        if ($chassis && $chassis != 'All') {
            $chassis_escaped = addslashes($chassis);
            $chassis_condition = " AND kuzov = '{$chassis_escaped}'";
        }
        if ($grade && $grade != 'All') {
            $grade_escaped = addslashes($grade);
            $grade_condition = " AND GRADE = '{$grade_escaped}'";
        }
        if ($auctiongrade && $auctiongrade != 'All') {
            $auctiongrade_escaped = addslashes($auctiongrade);
            $auctiongrade_condition = " AND rate = '{$auctiongrade_escaped}'";
        }

        $yearStats = [];


        $colorCondition = '';
            if ($request->filled('color')) {
                $c = addslashes($color);
                $colorCondition = " AND COLOR = '{$c}' ";
            }


        // read the user’s chosen range, defaulting back to 2023–2025 if they didn’t pick one
        $start = $request->filled('year_from')
            ? (int)$request->input('year_from')
            : 2023;

        $end   = $request->filled('year_to')
            ? (int)$request->input('year_to')
            : 2025;

        $yearStats = [];

        // loop from start → end instead of those three fixed years
        for ($year = $start; $year <= $end; $year++) {
            $vehicles = [];
            $offset   = 0;
            $limit    = 250;

            // — your existing pagination logic —
            while ($offset < 1000) {
                $query = "SELECT * FROM stats
                    WHERE marka_name   = '{$marka_escaped}'
                    AND model_name   = '{$model_escaped}'
                    AND eng_v        = '{$eng_v_escaped}'
                    {$colorCondition} 
                    {$chassis_condition}
                    {$grade_condition}
                    {$auctiongrade_condition}
                    AND year        = {$year}
                    AND finish > 0
                    AND status IN ('SOLD','Sold','Sold By Nego')
                    ORDER BY auction_date DESC
                    LIMIT {$offset}, {$limit}";

                $batch = ApiClient::callAuctionApi($query);
                if (empty($batch)) break;

                $vehicles = array_merge($vehicles, $batch);
                if (count($batch) < $limit) break;

                $offset += $limit;
            }

            // — your existing stats calculation —
            $totalFinish = array_sum(array_column($vehicles, 'FINISH'));
            $vehicleCount = count($vehicles);
            $average      = $vehicleCount > 0 ? round($totalFinish / $vehicleCount, 2) : 0;
            $prices       = array_column($vehicles, 'FINISH');
            $minPrice     = $prices ? min($prices) : 0;
            $maxPrice     = $prices ? max($prices) : 0;

            $yearStats[$year] = [
                'year'                  => $year,
                'vehicles'              => $vehicleCount,
                'total_finish'          => $totalFinish,
                'average_finish_price'  => $average,
                'min_price'             => $minPrice,
                'max_price'             => $maxPrice,
            ];
        }


        return response()->json([
            'marka' => $marka,
            'model' => $model,
            'engine' => $eng_v,
            'statistics' => array_values($yearStats)
        ]);
    }

    public function ourCustomers()
{
    // Countries are needed for the top nav
    $countries = Country::where('status', 1)->get();

    // Load active customers with their image + car details
    $customers = OurCustomer::where('status', 1)
        ->with(['media', 'manufacture', 'vehicleModel'])
        ->orderByDesc('created_at')
        ->get();

    return Inertia::render('OurCustomer/index', [
        'customers' => $customers,
        'countries' => $countries,
        'logged_customer' => auth('customer')->user(), // so header can still use it
    ]);
}

}
