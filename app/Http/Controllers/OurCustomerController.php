<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use App\Models\OurCustomer;
use App\Models\VehicleModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Yajra\DataTables\Facades\DataTables;

class OurCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Inertia component: resources/js/Pages/OurCustomer/Index.vue
        return Inertia::render('OurCustomer/Index');
    }

    public function getData()
    {
        $customers = OurCustomer::with(['media', 'manufacture', 'vehicleModel'])->get();

        return DataTables::of($customers)
            ->addColumn('check', function ($row) {
                return '<div class="custom-control custom-checkbox item-check">
                    <input type="checkbox" class="form-check-input" id="' . $row->id . '" value="' . $row->id . '">
                    <label class="form-check-label form-check-label" for="' . $row->id . '"></label>
                </div>';
            })
            ->addColumn('customer_name', function ($row) {
                return e($row->customer_name);
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 1) {
                    return '<span class="badge bg-success">Active</span>';
                }

                return '<span class="badge bg-warning">Inactive</span>';
            })
            ->addColumn('image', function ($row) {
                $mainImage = $row->media->filter(function ($media) {
                    return isset($media->custom_properties['type']) &&
                        $media->custom_properties['type'] === 'ourcustomer_main';
                })->first();

                if ($mainImage) {
                    return '<img src="' . $mainImage->original_url . '" height="50"/>';
                }

                return 'No Image';
            })
            ->addColumn('action', function ($row) {
                $action_html = '';

                if (auth()->user()->can('ourcustomer.view') || auth()->user()->can('ourcustomer.edit')) {
                    $action_html .= '<a class="dropdown-item action_edit" style="font-size: 14px;padding: 5px 13px;" data-item-id="' . $row->id . '" href="javascript:void(0)">
                        <i class="fas fa-edit mr-2"></i> View / Edit
                    </a>';
                }

                if (auth()->user()->can('ourcustomer.edit')) {
                    $action_html .= '<a class="dropdown-item ' . ($row->status == 1 ? 'text-warning' : 'text-success') . ' action_status_change" style="font-size: 14px;padding: 5px 13px;" data-item-id="' . $row->id . '" data-status="' . $row->status . '" href="javascript:void(0)">
                        <i class="fas fa-power-off mr-2"></i>' . ($row->status == 1 ? ' Deactivate' : ' Activate') . '
                    </a>';
                }

                $action_html .= '<div class="dropdown-divider"></div>';

                if (auth()->user()->can('ourcustomer.delete')) {
                    $action_html .= '<a class="dropdown-item text-danger action_delete" data-bs-toggle="modal" data-bs-target="#deleteConfirm" style="font-size: 14px;padding: 5px 13px;" data-item-id="' . $row->id . '" href="javascript:void(0)">
                        <i class="fas fa-trash mr-2"></i> Delete
                    </a>';
                }

                return '<div class="btn-group">
                    <button type="button" class="btn btn-main btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu" style="min-width: 10rem;">
                        ' . $action_html . '
                    </div>
                </div>';
            })
            ->rawColumns(['check', 'status', 'image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $manufacture = Manufacture::all();

        if ($request->manufacture_id) {
            $model = VehicleModel::where([
                'manufacture_id' => $request->manufacture_id,
                'status' => 1,
            ])->get();
        } else {
            $model = collect([]);
        }

        return Inertia::render('OurCustomer/CreateUpdate', [
            'ourcustomer' => null,
            'manufacture' => $manufacture,
            'model'       => $model,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name'    => ['required', 'string', 'max:255'],
            'manufacture_name' => ['required', 'exists:manufactures,id'],
            'model'            => ['required', 'exists:vehicle_models,id'],
            'status'           => ['required'],
            'customer_image'   => ['nullable', 'mimes:jpeg,jpg,png,webp', 'max:10000'],
        ]);

        try {
            DB::beginTransaction();

            $customer = new OurCustomer();
            $customer->customer_name   = $request->customer_name;
            $customer->manufacture_id  = $request->manufacture_name;
            $customer->vehicle_model_id = $request->model;
            $customer->status          = $request->status;
            $customer->image_count     = 0;
            $customer->save();

            if ($request->hasFile('customer_image')) {
                $customer
                    ->addMediaFromRequest('customer_image')
                    ->withCustomProperties(['type' => 'ourcustomer_main'])
                    ->toMediaCollection('OurCustomer_Images');

                $customer->image_count = 1;
                $customer->save();
            }

            DB::commit();

            return redirect()->route('ourcustomer.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);

            return abort(500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
        $ourcustomer = OurCustomer::with('media')->findOrFail($id);

        $manufacture = Manufacture::all();

        if ($request->manufacture_id) {
            $model = VehicleModel::where('manufacture_id', $request->manufacture_id)->get();
        } else {
            // Allow selecting any model in edit mode
            $model = VehicleModel::all();
        }

        return Inertia::render('OurCustomer/CreateUpdate', [
            'ourcustomer' => $ourcustomer,
            'manufacture' => $manufacture,
            'model'       => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id'              => ['required', 'exists:our_customers,id'],
            'customer_name'   => ['required', 'string', 'max:255'],
            'manufacture_name'=> ['required', 'exists:manufactures,id'],
            'model'           => ['required', 'exists:vehicle_models,id'],
            'status'          => ['required'],
            'customer_image'  => ['nullable', 'mimes:jpeg,jpg,png,webp', 'max:10000'],
        ]);

        try {
            DB::beginTransaction();

            $customer = OurCustomer::findOrFail($request->id);

            $customer->customer_name    = $request->customer_name;
            $customer->manufacture_id   = $request->manufacture_name;
            $customer->vehicle_model_id = $request->model;
            $customer->status           = $request->status;

            $customer->save();

            if ($request->hasFile('customer_image')) {
                // delete current main image if any
                $mainImage = $customer->media()
                    ->where('collection_name', 'OurCustomer_Images')
                    ->whereJsonContains('custom_properties->type', 'ourcustomer_main')
                    ->first();

                if ($mainImage) {
                    Storage::disk('public')->delete($mainImage->getPath());
                    $mainImage->delete();
                }

                $customer
                    ->addMedia($request->file('customer_image'))
                    ->withCustomProperties(['type' => 'ourcustomer_main'])
                    ->toMediaCollection('OurCustomer_Images');

                $customer->image_count = 1;
                $customer->save();
            }

            DB::commit();

            return redirect()->route('ourcustomer.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);

            return abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            OurCustomer::destroy($request->ids);

            return redirect()->route('ourcustomer.index');
        } catch (Exception $ex) {
            Log::error($ex);

            return abort(500);
        }
    }

    public function removeImage(Request $request)
    {
        $urlParts = explode('/', $request->imageUrl);
        $uuid     = $urlParts[count($urlParts) - 2] ?? null;
        $fileName = $urlParts[count($urlParts) - 1] ?? null;

        $media = Media::where('uuid', $uuid)
            ->where('file_name', $fileName)
            ->first();

        if ($media) {
            $media->delete();
        }

        return redirect()->back();
    }

    public function updateStatus(Request $request)
    {
        try {
            $customer = OurCustomer::findOrFail($request->id);

            if ($request->status == 0) {
                $customer->status = 1;
            } else {
                $customer->status = 0;
            }

            $customer->save();

            return redirect()->route('ourcustomer.index');
        } catch (Exception $ex) {
            Log::error($ex);

            return abort(500);
        }
    }
}
