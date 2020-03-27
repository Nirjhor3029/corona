<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Orderstatus;
use App\Models\Service_type;
use App\Models\Supplier;
use App\Repositories\OrderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $service_types = Service_type::all();
        $suppliers = Supplier::whereNull('deleted_at')->get();
        $order_statuses = Orderstatus::all();

        $orders = Order::with('orderstatus')
            ->with('service_type','service_type','supplier')
            ->orderBy('updated_at', 'DESC')
            ->get();
//        return $orders[0]->supplier->name;

        return view('orders.index',compact('service_types','suppliers','order_statuses'))
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        $service_types = Service_type::all();
        $suppliers = Supplier::whereNull('deleted_at')->get();
        $order_statuses = Orderstatus::all();
        
        

        return view('orders.create',compact('service_types','suppliers','order_statuses'));
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();

        $order = $this->orderRepository->create($input);

        Flash::success('Order saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $service_types = Service_type::all();
        $suppliers = Supplier::whereNull('deleted_at')->get();
        $order_statuses = Orderstatus::all();

        $order = Order::where('id',$id)
            ->with('service_type','orderstatus','supplier')
            ->first();

//        return $order;

        if (empty($order)) {
            Flash::error('Order not found');
            return redirect(route('orders.index'));
        }

        return view('orders.edit',compact('service_types','suppliers','order_statuses'))->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param int $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');
            return redirect(route('orders.index'));
        }

        //return $request->supllier_id;
//        return $order->supllier_id;

        if($order->supllier_id != $request->supllier_id ){
            $order_satus = Orderstatus::where('status_name','pending')->first();
//            $request->orderstatus_id = $order_satus->id;
            $request->merge(['orderstatus_id' =>$order_satus->id]);

//            return $request;
//            return $order_satus->id;
        }
//        return $order->supllier_id;

        $order = $this->orderRepository->update($request->all(), $id);
        Flash::success('Order updated successfully.');
        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }
}
