<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Proposer;
use App\Models\District;
use App\Models\RevenueCircle;
use App\Models\RevenueVillage;
use App\Models\GramPanchayat;
use App\User;

use DataTables;
use DB;

class AdminController extends Controller
{

    public function dashboard()
    {
        $countGaon = Proposer::select('proposer_category_id')->where('proposer_category_id', 3)->count();
        $countOrganization = Proposer::select('proposer_category_id')->where('proposer_category_id', 2)->count();
        $countSociety = Proposer::select('proposer_category_id')->where('proposer_category_id', 1)->count();

        $countDistrict = District::select('id')->count();
        $countCircle = RevenueCircle::select('id')->count();
        $countVillage = RevenueVillage::select('id')->count();

        $countFoundationDay = Proposal::where('proposals.proposed_status', 2)->count();
        $countVillageName = Proposal::where('proposals.proposed_status', 1)->count();

        $proposeNameDistrictCount = DB::table('proposals')->distinct('district_id')->where('proposals.proposed_status', 1)->count('district_id');
        $proposeFoundationDayDistrictCount = DB::table('proposals')->distinct('district_id')->where('proposals.proposed_status', 2)->count('district_id');

        $proposeNameRevenueVillCount = DB::table('proposals')->distinct('revenue_village_id')->where('proposals.proposed_status', 1)->count('revenue_village_id');
        $proposeFoundationDayRevenueVillCount = DB::table('proposals')->distinct('revenue_village_id')->where('proposals.proposed_status', 2)->count('revenue_village_id');

        $proposeNameRevenueCirCount = DB::table('proposals')->distinct('revenue_circle_id')->where('proposals.proposed_status', 1)->count('revenue_circle_id');
        $proposeFoundationDayRevenueCirCount = DB::table('proposals')->distinct('revenue_circle_id')->where('proposals.proposed_status', 2)->count('revenue_circle_id');
        
        $proposal = Proposal::select('id')->count();

        return view('admin.adminDashboard', compact(
            'proposal',
            'countGaon',
            'countOrganization',
            'countSociety',
            'countDistrict',
            'countFoundationDay',
            'countVillageName',
            'countCircle',
            'countVillage',
            'proposeNameDistrictCount',
            'proposeFoundationDayDistrictCount',
            'proposeNameRevenueVillCount',
            'proposeFoundationDayRevenueVillCount',
            'proposeNameRevenueCirCount',
            'proposeFoundationDayRevenueCirCount'
            
        ));
    }

    // public function getData()
    // {
    //     $users = User::get();
    //     return datatables()->of($users)
    //         ->make(true);
    // }

    public function adminSubmittedRequest()
    {
        $proposalReq = DB::table('proposals')
            ->join('districts', 'proposals.district_id', '=', 'districts.id')
            ->select(
                'districts.district_name',

                DB::raw('COUNT(proposals.id) as no_of_request'),

                // DB::raw(
                //     'COUNT(proposals.proposed_status) as dayRequest',
                //     // 'SELECT (proposals.proposed_status)',
                //     'WHERE (proposals.proposed_status = 2)'
                // ),

            )
            ->groupBy('proposals.district_id')
            ->get();
        // foreach($proposalReq as $val){
        //     if($val->status==1){

        //     }
        // }
        // return Datatable::of($proposalReq)->make(true);
        return Datatables::of($proposalReq)->make(true);
    }

    // public function adminViewSubmittedRequest()
    // {
    //     return view('admin.adminDashboard');
    // }
}
