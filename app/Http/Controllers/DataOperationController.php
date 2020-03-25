<?php

namespace App\Http\Controllers;


use App\Models\Data;
use App\Models\Order;
use App\Models\Service_type;
use App\Orderstatus;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataOperationController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dataDistribution()
    {
        $data = Data::all();
        $service_types = Service_type::all();
        $default_status = Orderstatus::where('status_name','pending')->first();
//        return $default_status;
        $i=0;
        foreach($service_types as $service_type){
//            if($i==0){
//                $i++;
//                continue;
//            }
//            return $service_type;
            $data = Data::where('service_type',$service_type->service_name)->get();
            $suppliers= Supplier::where('service_type_id',$service_type->id)->orderBy('priority','asc')->get();
//            return count($suppliers);
//            return $data;
            $count_supplier = 0;
            foreach($data as $single_data){
//                return $single_data;

                if($count_supplier > count($suppliers)-1){
                    $count_supplier = 0;
                }

                $capacity_count = Order::where('supllier_id',$suppliers[$count_supplier]->id)
                    ->whereDate('created_at', Carbon::today())->count();
//                return $capacity_count;
                if(  $capacity_count < $suppliers[$count_supplier]->capacity){
                    $order = new Order();
                    $order->name = $single_data->name;
                    $order->mobile = $single_data->mobile;

                    $order->service_type_id = $service_type->id;
                    $order->supllier_id = $suppliers[$count_supplier]->id;
                    $order->orderstatus_id = $default_status->id;
                    $order->save();

                    $single_data->forceDelete();

                }

                $count_supplier++;
            }
            $i++;
        }
//        return $service_types;
    }
}
