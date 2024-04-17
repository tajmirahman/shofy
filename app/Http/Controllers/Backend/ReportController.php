<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //All Report
    public function AllReport()
    {
        return view('backend.report.all_report');
    }

    //Search By Date
    public function SearchByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $order = Order::where('order_date', $formatDate)->latest()->get();

        return view('backend.report.search_by_date',compact('order'));
    }

    //Search By Month
    public function SearchByMonth(Request $request)
    {
        $month = $request->month;
        $year = $request->year_name;

        $order = Order::where('order_month', $month)->where('order_year', $year)->latest()->get();

        return view('backend.report.search_by_month',compact('order','month'));
    }

    //Search By Year
    public function SearchByYear(Request $request)
    {
        $year = $request->year;

        $order = Order::where('order_year', $year)->latest()->get();

        return view('backend.report.search_by_year',compact('order','year'));
    }

    //UserReport
    public function UserReport()
    {
        $users = User::where('role','user')->latest()->get();
        return view('backend.report.user_report',compact('users'));
    }

     //Search By User
     public function SearchByUser(Request $request)
     {
         $user = $request->user;
 
         $order = Order::where('user_id', $user)->latest()->get();
 
         return view('backend.report.search_by_user',compact('order'));
     }


}
