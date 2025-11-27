<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\LiveAuctionManufacturer;
use App\Models\Manufacture;
use App\Models\Settings;
use App\Models\Type;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Services\ApiClient\ApiClient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function maintain()
    {
        return Inertia::render('Home/maintain');
    }
    public function index(Request $request)
    {

        $requestData = $request->all();

        // dd('fffffff');
        // Vehicle data for firstSection.vue (lease cars)
        $vehicleTypes = Type::where(['status' => 1])->with('media')->get();
        $manufactures = Manufacture::where(['status' => 1])->with('media')->get();
        if ($request->brand) {
            // dd($request->brand);
            $models = VehicleModel::where(['manufacture_id' => $request->brand, 'status' => 1])->get();
        } else {
            $models = VehicleModel::where(['status' => 1])->get();
        }

        $vehicles = Vehicle::where(['status' => 1]);
        $vehicles = $vehicles->with('media', 'vehicleType', 'manufacture', 'vehicleModel')->get();
        $countries = Country::all();

        $category_manufactures = LiveAuctionManufacturer::where(['status' => 1])->get();
        $live_auction_vehicles_list = [];
        
        // Auction filter data (separate from manufactures above)
        $auction_manufactures = json_decode((Settings::where('key', 'manufactures')->first())->value);
        $auction_models = json_decode((Settings::where('key', 'models')->first())->value);

        $year_from = (Settings::where('key', 'year_from')->first())->value;
        $year_to = (Settings::where('key', 'year_to')->first())->value;


        $query = "SELECT * FROM main WHERE 1=1 ";

        if (count($auction_manufactures) > 0) {
            foreach ($auction_manufactures as $key => $value) {
                if ($key == 0) {
                    $query .= "AND marka_name = '" . $value . "' ";
                } else {
                    $query .= "OR marka_name = '" . $value . "' ";
                }
            }
        }

        if (count($auction_models) > 0) {
            if ($key == 0) {
                $query .= "AND model_name = '" . $value . "' ";
            } else {
                $query .= "OR model_name = '" . $value . "' ";
            }
        }

        if ($year_from && $year_to) {
            $query .= "AND year >= '" . $year_from . "' AND year <= '" . $year_to . "' ";
        }


        $query .= ' ORDER BY year DESC ';

 $live_auction_vehicles_list = ApiClient::callAuctionApi($query) ?? [];

if (!is_array($live_auction_vehicles_list)) {
    $live_auction_vehicles_list = [];
}

foreach ($live_auction_vehicles_list as $key => $value) {
    $images = explode('#', $value['IMAGES'] ?? '');
    $live_auction_vehicles_list[$key]['media'] = $images;

    foreach ($live_auction_vehicles_list[$key]['media'] as $k => $url) {
        $url = str_replace('&h=50', '', $url);
        $live_auction_vehicles_list[$key]['media'][$k] = $url;
    }
}


       
        // /////////////////////////////////

        $currentYear = date('Y');
        $baseYear = $currentYear - 5;

        $latest_cars = Vehicle::where(['availability' => 'Available', 'status' => 1, 'featured' => 1])->whereBetween('year', [$baseYear, $currentYear])->with('media', 'manufacture', 'vehicleModel')->latest()->get();

        // dd($latest_cars);

        if ($request->manufacture_id) {
            $vehicles = $vehicles->where('manufacture_id', $request->manufacture_id);
        }

        if ($request->vehicle_type_id) {
            $vehicles = $vehicles->where('vehicle_type_id', $request->vehicle_type_id);
        }

        if ($request->model_id) {
            $vehicles = $vehicles->where('vehicle_model_id', $request->model_id);
        }


        $minYear = clone $vehicles;
        $minYear = $minYear->min('year');
        $maxYear = clone $vehicles;
        $maxYear = $maxYear->max('year');

        $minMileage = clone $vehicles;
        $minMileage = $minMileage->min('mileage');
        $maxMileage = clone $vehicles;
        $maxMileage = $maxMileage->max('mileage');

        $years = range($minYear, $maxYear);
        $years = array_filter($years);

        $featuredVehicles = Vehicle::where(['status' => 1, 'featured' => 1])->with('media', 'manufacture', 'vehicleModel')->get();
        // dd($featuredVehicles);
        $requestData = $request->all();


        $auctionDatesQuery = "SELECT auction_date FROM main GROUP BY DATE_FORMAT(auction_date,'%Y-%m-%d')";
        $auctionDates = ApiClient::callAuctionApi($auctionDatesQuery);

       $manufcturesQuery = "SELECT DISTINCT marka_name FROM main ORDER BY marka_name ASC";


$auctionManufactureNames = ApiClient::callAuctionApi($manufcturesQuery, true) ?? [];

if (!is_array($auctionManufactureNames)) {
    $auctionManufactureNames = [];
}




        $models = [];
        if ($request->manufacturer) {
            $modelQuery = "SELECT DISTINCT MODEL_NAME FROM main WHERE marka_name='" . $request->manufacturer . "' ORDER BY MODEL_NAME ASC";
            $models = ApiClient::callAuctionApi($modelQuery, true);
        }

        $years = [];
        $chassisNumbers = [];
        $engineCapacity = [];
        $colorQuery = [];
        $ConditionQuery = [];
        $PriceQuery = [];
        $Mileages = [];

        if ($request->manufacturer && $request->model) {
            // get years
            $yearsQuery = "SELECT DISTINCT year FROM main WHERE marka_name='" . $request->manufacturer . "' AND MODEL_NAME='" . $request->model . "' ORDER BY year DESC";
            $years = ApiClient::callAuctionApi($yearsQuery, true);

            // get chassis number
            $chassisNoQuery = "SELECT DISTINCT kuzov FROM main WHERE marka_name='" . $request->manufacturer . "' AND MODEL_NAME='" . $request->model . "' ";

            // get engine capacity
            $engineCapacityQuery = "SELECT DISTINCT eng_v FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";

            // get colors
            $vColorQuery = "SELECT DISTINCT COLOR FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";

            // get condition
            $vConditionQuery = "SELECT DISTINCT rate FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";

            // get price
            $vPriceQuery = "SELECT DISTINCT AVG_PRICE FROM main WHERE marka_name='" . $request->manufacturer . "' AND model_name='" . $request->model . "' ";

            // get Mileage
            $vMileageQuery = "SELECT DISTINCT MILEAGE FROM main WHERE marka_name='" . $request->manufacturer . "' AND MODEL_NAME='" . $request->model . "' ORDER BY MILEAGE ASC";

            if ($request->year_from == $request->year_to && $request->year_from != 0 && $request->year_to != 0) {
                //   dd($request->year_from);
                if ($request->mileage_from == $request->mileage_to) {
                    $vMileageQuery .= "AND MILEAGE = '" . $request->year_from . "' ";
                }
                $chassisNoQuery .= "AND year = '" . $request->year_from . "' ";

                $engineCapacityQuery .= "AND year = '" . $request->year_from . "' ";

                $vColorQuery .= "AND year = '" . $request->year_from . "' ";

                $vConditionQuery .= "AND year = '" . $request->year_from . "' ";

                $vPriceQuery .= "AND year = '" . $request->year_from . "' ";
            } else if ($request->year_from && $request->year_to) {

                if ($request->mileage_from == $request->mileage_to) {
                    $vMileageQuery .= "AND MILEAGE = '" . $request->year_from . "' ";
                }
                $chassisNoQuery .= "AND year BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";

                $engineCapacityQuery .= "AND year BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";

                $vColorQuery .= "AND year BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";

                $vConditionQuery .= "AND year BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";

                $vPriceQuery .= "AND year BETWEEN '" . $request->year_from . "' AND '" . $request->year_to . "' ";
            }

            $chassisNoQuery .= "ORDER BY kuzov ASC";

            $chassisNumbers = ApiClient::callAuctionApi($chassisNoQuery, true);

            $Mileages = ApiClient::callAuctionApi($vMileageQuery, true);


            $engineCapacityQuery .= "order by eng_v ASC";

            $engineCapacity = ApiClient::callAuctionApi($engineCapacityQuery, true);

            if ($request->chassis) {
                $engineCapacityQuery .= "AND kuzov = '" . $request->chassis . "' ";

                $vColorQuery .= "AND kuzov = '" . $request->chassis . "' ";

                $vConditionQuery .= "AND kuzov = '" . $request->chassis . "' ";

                $vPriceQuery .= "AND kuzov = '" . $request->chassis . "' ";
            }

            if ($request->engine) {
                $vColorQuery .= "AND eng_v = '" . $request->engine . "' ";

                $vConditionQuery .= "AND eng_v = '" . $request->engine . "' ";

                $vPriceQuery .= "AND eng_v = '" . $request->engine . "' ";
            }


            $vColorQuery .= " order by COLOR ASC";
            $colorQuery = ApiClient::callAuctionApi($vColorQuery, true);

            $vConditionQuery .= "order by rate ASC";
            $ConditionQuery = ApiClient::callAuctionApi($vConditionQuery, true);

            $vPriceQuery .= "order by AVG_PRICE ASC";
            $PriceQuery = ApiClient::callAuctionApi($vPriceQuery, true);
        } elseif (!$request->manufacturer && !$request->model) {
            $engineCapacityQuery = "SELECT DISTINCT eng_v FROM main";
            $engineCapacity = ApiClient::callAuctionApi($engineCapacityQuery, true);
            // dd($engineCapacity);
        }

        // $vehiclesList = [];
        // if($request->search == 'true') {
        // dd( $requestData);
        $vehiclesList = $this->getVehicleList($request);
        //  dd($countries);

        // 1) your 8 brands
        $brandList = [
        'HONDA','BMW','TOYOTA','AUDI',
        'NISSAN','SUZUKI','TESLA','MITSUBISHI'
        ];

        if ($request->has('tabBrand') && in_array($request->tabBrand, $brandList)) {
        $brand = $request->tabBrand;
        $japanSql = "
          SELECT *
            FROM main
           WHERE marka_name = '{$brand}'
        ORDER BY year DESC
           LIMIT 8
        ";
        $japanAuctionVehicles = ApiClient::callAuctionApi($japanSql, true);
    }
    // 3️⃣ otherwise: default “one per brand” fetch (no LIMIT issues)
    else {
        $japanAuctionVehicles = [];
    foreach ($brandList as $b) {
        $sql = "SELECT * FROM main
                  WHERE marka_name = '{$b}'
               ORDER BY year DESC
                  LIMIT 1";
        $rows = ApiClient::callAuctionApi($sql, true);
        if (! empty($rows)) {
            $japanAuctionVehicles[] = $rows[0];
        }
    }
    }
    $tabBrand = $request->tabBrand ?? null;


        // dd(array_count_values(array_column($japanAuctionVehicles,'MARKA_NAME')));

        return Inertia::render('Home/index', [
            'countries' => $countries,
            'requestQuery' => $requestData,
            'vehicleTypes' => $vehicleTypes,
            'manufactures' => $manufactures, // For firstSection.vue (Database models)
            /*'auctionManufactureNames' => $auctionManufactureNames, */
            'vehicles' => $vehicles, // For firstSection.vue (Database vehicles with relationships)
            'models' => $models, // For firstSection.vue (Database models)
            'category_manufactures' => $category_manufactures,
            'auction_manufactures' => $auctionManufactureNames, // For Filter.vue (JSON from settings)
            'auction_models' => $auction_models, // For Filter.vue (JSON from settings)
            'years' => $years,
            'minMileage' => $minMileage,
            'maxMileage' => $maxMileage,
            'featuredVehicles' => $featuredVehicles,
            // 'in_stock' => $in_stock,
            'latest_cars' => $latest_cars,
            'auctionDates' => $auctionDates,
            'chassisNumbers' => $chassisNumbers,
            'engineCapacity' => $engineCapacity,
            'colorQuery' => $colorQuery,
            'vehiclesList' => $vehiclesList,
            'live_auction_vehicles_list' => $live_auction_vehicles_list,
            'Condition' => $ConditionQuery,
            'PriceQuery' => $PriceQuery,
            'Mileage' => $Mileages,


            'brandList'               => $brandList,
            'japanAuctionVehicles'    => $japanAuctionVehicles,
             'tabBrand'             => $request->tabBrand ?? null,
        ]);
    }
    public function newcar()
    {
        return Inertia::render('Home/newcar');
    }
    public function getVehicleList(Request $request)
    {
        $query = "SELECT * FROM main WHERE 1=1 ";

        if ($request->search == 'true') {
            if ($request->manufacturer) {
                $query .= "AND marka_name = '" . $request->manufacturer . "' ";
            }

            if ($request->model) {
                $query .= "AND model_name = '" . $request->model . "' ";
            }

            // if ($request->year_to == 0 && $request->year_from != 0) {
            //     $query .= "AND year >= '" . $request->year_from . "' ";
            // } else if ($request->year_from == 0 && $request->year_to != 0) {
            //     $query .= "AND year <= '" . $request->year_to . "' ";
            // } else if ($request->year_from != 0 && $request->year_to != 0) {
            //     $query .= "AND year >= '" . $request->year_from . "' AND year <= '" . $request->year_to . "' ";
            // }

            // if ($request->chassis) {
            //     $query .= "AND kuzov = '" . $request->chassis . "' ";
            // }

            // if ($request->engine) {
            //     $query .= "AND eng_v = '" . $request->engine . "' ";
            // }

            // if ($request->color) {
            //     $query .= "AND COLOR = '" . $request->color . "' ";
            // }

            // if ($request->lot_no) {
            //     $query .= "AND LOT = '" . $request->lot_no . "' ";
            // }

            // if ($request->available_days) {
            //     $query .= "AND AUCTION_DATE LIKE = '%" . $request->available_days . "%' ";
            //     // TODO: filter auctio for multiple available dates
            // }
        }

        $page = $request->page ?? 1;
        $pageOffset = ($page - 1) * 10;

        $query .= ' ORDER BY year DESC LIMIT ' . $pageOffset . ',10';

        $vehiclesList = ApiClient::callAuctionApi($query);

        return $vehiclesList;
    }

    public function seemore(Request $request)
    {

        $requestData = $request->all();

        // dd('fffffff');
        $vehicleTypes = Type::where(['status' => 1])->with('media')->get();
        $manufactures = Manufacture::where(['status' => 1])->with('media')->get();
        $models = VehicleModel::where(['status' => 1])->get();
        $vehicles = Vehicle::where(['status' => 1]);
        $vehicles = $vehicles->with('media', 'vehicleType', 'manufacture', 'vehicleModel')->get();
        $countries = Country::all();



        //  dd($countries);

        return Inertia::render('Home/seemore', [
            'countries' => $countries,
            'requestQuery' => $requestData,
            'vehicleTypes' => $vehicleTypes,
            'manufactures' => $manufactures,
            'vehicles' => $vehicles,
            'models' => $models,
        ]);
    }
}
