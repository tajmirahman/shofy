<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    //All Order
    public function AllAdminOrder()
    {
        $order = Order::latest()->get();
        return view('backend.order.all_admin_order',compact('order'));
    }

    //Admin ConfirmOrder
    public function AdminConfirmOrder()
    {
        $confirmorder = Order::where('status','confirm')->get();
        return view('backend.order.admin_confirm_order',compact('confirmorder'));
    }

    //Admin ProcessingOrder
    public function AdminProcessingOrder()
    {
        $processingorder = Order::where('status','processing')->get();
        return view('backend.order.admin_processing_order',compact('processingorder'));
    }

    //Admin DeliverOrder
    public function AdminDeliverOrder()
    {
        $deliverorder = Order::where('status','deliver')->get();
        return view('backend.order.admin_deliver_order',compact('deliverorder'));
    }

    //Admin OrderDetails
    public function AdminOrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id',$order_id)->first();
        $orderitem = OrderItem::with('product')->where('order_id',$order_id)->get();


        return view('backend.order.admin_order_details',compact('order','orderitem'));
    }

    //Confirm Order
    public function ConfirmOrder($order_id)
    {
        Order::find($order_id)->update([

            'confirmed_date' => Carbon::now()->format('D, d F Y'),
            'status' => 'confirm'

        ]);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('admin.confirm.order')->with($notification);
    }

    //Processing Order
    public function ProcessingOrder($order_id)
    {
        Order::find($order_id)->update([

            'processing_date' => Carbon::now()->format('D, d F Y'),
            'status' => 'processing'

        ]);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('admin.processing.order')->with($notification);
    }

    //Deliver Order
    public function DeliverOrder($order_id)
    {

        $product = OrderItem::where('order_id', $order_id)->get();

        foreach ($product as $item) {
            
            Product::where('id', $item->product_id)
                ->update(['product_qty' => DB::raw('product_qty-' . $item->qty)]);
        }

        Order::find($order_id)->update([

            'delivered_date' => Carbon::now()->format('D, d F Y'),
            'status' => 'deliver'

        ]);

        $notification = array(
            'message' => 'Order Deliver Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.admin.order')->with($notification);
    }

    //UserOrderInvoice

    public function AdminOrderInvoice($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('backend.order.admin_order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);

        return $pdf->download('invoice.pdf');
    }

    //Admin ReturnOrder
    public function AdminReturnOrder()
    {
        $order = Order::where('return_reason','!=',Null)->latest()->get();
        return view('backend.order.admin_return_order',compact('order'));
    }

    public function AdminAccpetOrder($order_id)
    {
        Order::find($order_id)->update([

            'return_order' => 2,

        ]);

        $notification = array(

            'message' => 'Admin Accept Return Order Succssfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
        
    }

}
