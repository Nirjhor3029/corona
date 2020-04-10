<?php

namespace App\Http\Controllers;

use App\DataTables\SupplierDataTable;
use App\Models\District;
use App\Models\Divisions;
use App\Models\Order;
use App\Models\Orderstatus;
use App\Models\Service_type;
use App\Models\Supplier;
use App\Models\Union;
use App\Models\Upazilla;
use App\Models\User;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class supplierDashboardController extends Controller
{

    /** @var  SupplierRepository */
    private $supplierRepository;


    public function __construct(SupplierRepository $supplierRepo)
    {
        $this->middleware('auth');
        $this->supplierRepository = $supplierRepo;

    }

    public function showDashboard() //settings
    {
        $userId = Auth::user()->id;

        $supplier = Supplier::where('user_id',$userId)->first();
        if (empty($supplier)) {
            Flash::error('You Are Not listes as a Supplier! ');

            return Redirect::to('/home');
        }
//        return $supplier;

        

//        $users = User::all();
        $service_types = Service_type::all();

        $orders = Order::where('supllier_id',$supplier->id)->get();
//        return $orders;

        return view('supplier_views.dashboard',compact('supplier','service_types','orders'));
    }

    public function showDashboard2()
    {
//        return "ok";
        return Redirect::to('/home');
    }

    public function updateown($id, Request $request)
    {

        $supplier = Supplier::find($id);
//        return $supplier;

        if (empty($supplier)) {
            Flash::error('Supplier not found');
//            return redirect(route('suppliers.index'));
            return Redirect::back();
        }

        $supplier = $this->supplierRepository->update($request->all(), $id);

        Flash::success('Supplier updated successfully.');

        return Redirect::back();
    }




    //    Supplier

    public function getSelectOption($getByData,$dataId){
        $data_name = "Division";
        if($getByData=="districts"){
            $datas = District::where('division_id',$dataId)->get();
            $data_name = "District";
        }elseif($getByData=="upazilla"){
            $datas = Upazilla::where('district_id',$dataId)->get();
            $data_name = "Upazilla";
        }elseif($getByData=="unions"){
            $datas = Union::where('upazilla_id',$dataId)->get();
            $data_name = "Union";
        }else{
            return "not";
        }

        return view('supplier_views.extra.select_option',compact('datas','data_name'));
    }

    public function supplierOrders()
    {
        $divisions = Divisions::all();
//        return $divisions;

        $statusId = 0; 

        $userId = Auth::user()->id;
        $suppliers = Supplier::whereNull('deleted_at')->where('user_id',$userId)->get();
        // return $suppliers;
        if (empty($suppliers)) {
            Flash::error('Suppliers not found');
            //return redirect(route('suppliers.index'));
            return Redirect::back();
        }
        $suppliers_id = [];
        foreach ($suppliers as $key => $suppliers) {
            $suppliers_id[$key] = $suppliers->id;
        }
        // return $suppliers_id;
        $service_types = Service_type::all();
        $orders = Order::whereIn('supllier_id',$suppliers_id)
                ->with('orderstatus','service_type','supplier','division','district','upazilla','union')
                ->orderBy('updated_at', 'DESC')
                ->paginate(15);
                //->get();

        // return $orders;

        $order_statuses = Orderstatus::all();

        return view('supplier_views.orders',compact('supplier','service_types','orders','order_statuses','statusId','divisions'));
    }
    public function supplierOrdersByStatus($statusId)
    {

        // $statusId = 0;
        $divisions = Divisions::all();


        $userId = Auth::user()->id;
        $suppliers = Supplier::whereNull('deleted_at')->where('user_id',$userId)->get();
        // return $suppliers;
        if (empty($suppliers)) {
            Flash::error('Suppliers not found');
            //return redirect(route('suppliers.index'));
            return Redirect::back();
        }
        $suppliers_id = [];
        foreach ($suppliers as $key => $suppliers) {
            $suppliers_id[$key] = $suppliers->id;
        }
        // return $suppliers_id;
        $service_types = Service_type::all();
        $orders = Order::whereIn('supllier_id',$suppliers_id)
                ->where('orderstatus_id',$statusId)
                ->with('orderstatus','service_type','supplier','division','district','upazilla','union')
                ->orderBy('updated_at', 'DESC')
                ->paginate(15);
                //->get();

        // return $orders;

        $order_statuses = Orderstatus::all();

        return view('supplier_views.orders',compact('supplier','service_types','orders','order_statuses','statusId','divisions'));
    }

    public function orderSummery()
    {
        $statusId = 0; 
        $userId = Auth::user()->id;
        $suppliers = Supplier::where('user_id',$userId)->get();
        if (empty($suppliers)) {
            Flash::error('Suppliers not found');
            //return redirect(route('suppliers.index'));
            return Redirect::back();
        }
        $suppliers_id = [];
        foreach ($suppliers as $key => $suppliers) {
            $suppliers_id[$key] = $suppliers->id;
        }
        $service_types = Service_type::all();
        $orders = Order::whereIn('supllier_id',$suppliers_id)
                ->with('orderstatus','service_type','supplier','division','district','upazilla','union')
                ->orderBy('updated_at', 'DESC')
                ->get();

        //  return $orders[0]->service_type->service_name;

        $order_statuses = Orderstatus::all();

        return view('supplier_views.order_summery',compact('supplier','service_types','orders','statusId','order_statuses'));
    }
    public function orderSummeryByStatus($statusId)
    {
        // $statusId = 0; 
        $userId = Auth::user()->id;
        $suppliers = Supplier::where('user_id',$userId)->get();
        if (empty($suppliers)) {
            Flash::error('Suppliers not found');
            //return redirect(route('suppliers.index'));
            return Redirect::back();
        }
        $suppliers_id = [];
        foreach ($suppliers as $key => $suppliers) {
            $suppliers_id[$key] = $suppliers->id;
        }
        $service_types = Service_type::all();
        $orders = Order::whereIn('supllier_id',$suppliers_id)
                ->where('orderstatus_id',$statusId)
                ->with('orderstatus','service_type','supplier','division','district','upazilla','union')
                ->orderBy('updated_at', 'DESC')
                ->get();

        //  return $orders[0]->service_type->service_name;

        $order_statuses = Orderstatus::all();

        return view('supplier_views.order_summery',compact('supplier','service_types','orders','statusId','order_statuses'));
    }

    public function update_status($orderId, Request $request)
    {

//        return $request;
        $order = Order::find($orderId);
//        return $order;

        if (empty($order)) {
            Flash::error('Order not found');
            return Redirect::back();
        }

        $order->orderstatus_id = $request->orderstatus_id;
        if(isset($request->order_amount)){
            $order->amount = $request->order_amount;
        }
        if(isset($request->order_remarks)){
            $order->remarks = $request->order_remarks;
        }

        if(isset($request->division)){
            $order->division_id = $request->division;
        }
        if(isset($request->district)){
            $order->district_id = $request->district;
        }
        if(isset($request->upazilla)){
            $order->upazilla_id = $request->upazilla;
        }
        if(isset($request->uninion)){
            $order->union_id = $request->uninion;
        }

        $order->save();

//        return $order;


        Flash::success('Order updated successfully.');

        return Redirect::back();
    }


}
