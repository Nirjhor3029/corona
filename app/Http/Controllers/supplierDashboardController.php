<?php

namespace App\Http\Controllers;

use App\DataTables\SupplierDataTable;
use App\Models\Order;
use App\Models\Orderstatus;
use App\Models\Service_type;
use App\Models\Supplier;
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

    public function showDashboard()
    {
        $userId = Auth::user()->id;
        $supplier = Supplier::where('user_id',$userId)->first();
//         return $supplier;

//        $users = User::all();
        $service_types = Service_type::all();

        $orders = Order::where('supllier_id',$supplier->id)->get();
//        return $orders;

        return view('supplier_views.dashboard',compact('supplier','service_types','orders'));
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


        public function supplierOrders()
        {
                $userId = Auth::user()->id;
                $supplier = Supplier::where('user_id',$userId)->first();
                $service_types = Service_type::all();
                $orders = Order::where('supllier_id',$supplier->id)->get();

        //        return $orders;

                $order_status = Orderstatus::all();

                return view('supplier_views.orders',compact('supplier','service_types','orders','order_status'));
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
        $order->save();

//        return $order;


        Flash::success('Order updated successfully.');

        return Redirect::back();
    }


}
