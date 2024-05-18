<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Proposal;
use App\Models\ProposerCategory;
use App\Models\RevenueCircle;
use App\Models\RevenueVillage;
use App\Models\District;
use App\Models\Block;
use App\Models\GramPanchayat;
use App\Models\Proposer;
use App\Models\ProposalDocument;
use Auth;
use Carbon\Carbon;
use DB;
use DataTables;

use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function ajaxGetRevenueVillages(Request $request)
    {
        $revenue_circle_id  = $request->id;
        return RevenueVillage::where('revenue_circle_id', $revenue_circle_id)->get();
    }

    public function ajaxGetBlocks(Request $request)
    {
        $district_id  = $request->id;
        $gp_id  = $request->gp_id;

        //return  Block::where('district_id', $district_id)->get();
        return [
            RevenueCircle::where([
                'district_id' => $district_id
            ])->get(),
            Block::join('gram_panchayats', 'blocks.id', '=', 'gram_panchayats.block_id')->where('gram_panchayats.id', $gp_id)->select('blocks.id', 'block_name')->get()
        ];
    }

    public function ajaxGetCategoryLabel(Request $request)
    {
        $categoryId  = $request->id;
        //return  Block::where('district_id', $district_id)->get();
        return ProposerCategory::select('category_label')->where('id', $categoryId)->get();
    }

    public function ajaxGetGp(Request $request)
    {
        $gram_panchayat_id  = $request->id;
        return GramPanchayat::where('id', $gram_panchayat_id)->get();
    }

    public function ajaxGetVillages(Request $request)
    {
        $revenue_village_id = $request->id;
        // return Proposal::where('revenue_village_id', $revenue_village_id)->get();
        return 1;
    }

    public function sendProposal(Request $request)
    {
        // $request->validate([
        // ]);
        $validator = Validator::make($request->all(), [
            'district_id' => 'required',
            'revenue_circle_id' => 'required',
            'revenue_village_id' => 'required',
            'block_id' => 'required',
            'gram_panchayat_id' => 'required',
            'type_id' => 'required',
            'proposed_name' => 'required_if:type_id,1',
            // 'establish_date' => 'required_if:type_id,2',
            'day' => 'required_if:type_id,2',
            'month' => 'required_if:type_id,2',
            'description' => 'required',
            'proposal_document.*' => 'required|mimes:jpeg,jpg,pdf|max:2048',
            'proposer_category_id' => 'required',
            'proposer_name' => 'required',
            'identity_number' =>  'required_if:cat_id,3',
            'identity_document' =>  'required_if:cat_id,3|mimes:jpeg,jpg,pdf|max:2048',
        ], [
            'district_id.required' => 'Enter district name.',
            'revenue_circle_id.required' => 'Enter revenue circle name',
            'revenue_village_id.required' => 'Enter revenue village name',
            'block_id.required' => 'Enter block name',
            'gram_panchayat_id.required' => 'Enter gram panchayat name',
            'proposed_name.required_if' => 'Enter New Proposed Village Name',
            // 'establish_date.required_if' => 'Enter Proposed Village Foundation Date',
            'day.required_if' => 'Enter Proposed Village Foundation Day',
            'month.required_if' => 'Enter Proposed Village Foundation Month',
            'description.required' => 'Enter your reason',
            'proposal_document.*.required' => 'Enter resolution documents',
            'proposal_document.*.max' => 'Max size limit 2MB and File type jpg,jpeg,pdf',
            'proposer_category_id.required' => 'Enter your category',
            'proposer_name.required' => 'Enter name',
            'identity_number.required_if:cat_id,3' =>  'Enter Id number',
            'identity_document.required_if:cat_id,3' =>  'Enter identity documents and Max size limit 2MB and File type jpg,jpeg,pdf',
            'identity_document.*.max' =>  'Max size limit 2MB and File type jpg,jpeg,pdf',
        ])->validate();

        DB::beginTransaction();
        try {
            $type_id = $request->type_id;
            $proposal = new Proposal;
            $proposal->revenue_village_id  = $request->revenue_village_id;
            $proposal->district_id   = $request->district_id;
            $proposal->revenue_circle_id   = $request->revenue_circle_id;
            $proposal->block_id   = $request->block_id;
            $proposal->gram_panchayat_id   = $request->gram_panchayat_id;
            $proposal->proposed_name   = $request->proposed_name;
            if ($request->year != "") {
                $proposal->establish_date  = Carbon::parse($request->year . '-' . $request->month . '-' . $request->day)->format('Y-m-d');
                $proposal->year  = $request->year;
            }
            $proposal->day  = $request->day;
            $proposal->month  = $request->month;


            $proposal->description = $request->description;
            $proposal->proposed_status = $request->proposed_status;

            if ($proposal->save()) {


                Proposal::where('id', $proposal->id)->update([
                    'receipt_no' => 'AGAG/PNRD/0' . $proposal->id
                ]);
                $proposer = new Proposer();

                $proposer->proposal_id  = $proposal->id;
                $proposer->proposer_category_id  = $request->proposer_category_id;
                $proposer->proposer_name  = $request->proposer_name;
                $proposer->identity_number  = $request->identity_number;
                if ($proposer->save()) {


                    $file  = $request->identity_document;
                    if ($file != null) {
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $path = (storage_path());
                        $main_path = $path . '/uploads/proposers';
                        $uploaded_file_name = $main_path . '/' . $file_name;
                        $main_path_db = '/uploads/close_complaint/' . $file_name;
                        $file = $file->move($main_path, $file_name);
                    } else {
                        $main_path_db = null;
                    }
                    $proposer->identity_document  = $main_path_db;
                    $document_image = $request->proposal_document;

                    for ($i = 0; $i < count($document_image); $i++) {
                        $partextension[$i] = $document_image[$i]->getClientOriginalExtension();
                        $partfilename[$i] = $i . time() . '.' . $partextension[$i];
                        $path = (storage_path());
                        ProposalDocument::insert([
                            'proposal_id' => $proposal->id,
                            'proposal_document' => $document_image[$i]->move($path . 'documents/', $partfilename[$i]),
                        ]);
                    }
                }

                $proposal_id = $proposal->id;
            }
            DB::commit();
            // }
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
            DB::rollBack();
        }
        return redirect('/acknowledge/' . $type_id . '/' . $proposal_id);
    }

    public function viewAcknowledgement($type_id, $proposal_id)
    {
        return view('user.village_name_change', compact('type_id', 'proposal_id'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $district = District::join('blocks', 'districts.id', '=', 'blocks.district_id')
            ->join('gram_panchayats', 'blocks.id', '=', 'gram_panchayats.block_id')
            ->where('gram_panchayats.id', Auth::user()->gram_panchayat_id)->select('districts.id', 'district_name')->get();
        $proposerCategory = ProposerCategory::get();
        $revenueCircle = RevenueCircle::get();
        $districts = District::get();

        return view('user.form', compact('proposerCategory', 'revenueCircle', 'districts', 'id', 'district'));
    }
    public function downloaddocument($id)
    {
        $purposes  = DB::table('proposals')
            ->join('proposers', 'proposers.proposal_id', '=', 'proposals.id')
            ->leftJoin('revenue_villages', 'revenue_villages.id', 'proposals.revenue_village_id')
            ->leftJoin('revenue_circles', 'revenue_circles.id', 'proposals.revenue_circle_id')
            ->leftJoin('districts', 'districts.id', 'proposals.district_id')
            ->leftJoin('blocks', 'blocks.id', 'proposals.block_id')
            ->leftJoin('gram_panchayats', 'gram_panchayats.id', 'proposals.gram_panchayat_id')

            ->leftJoin('proposer_categories', 'proposer_categories.id', '=', 'proposers.proposer_category_id')
            ->where('proposals.id', $id)
            ->groupBy('proposals.id')
            ->get();

        return view('user.acknowledgement', compact('purposes', 'id'));
    }

    public function acknowledgementPrint()
    {
        $purposes  = DB::table('proposals')
            ->join('proposers', 'proposers.proposal_id', '=', 'proposals.id')
            ->leftJoin('proposal_documents', 'proposal_documents.proposal_id', '=', 'proposals.id')
            ->where('proposals.id', $id)
            ->groupBy('proposals.id')
            ->get();
        return view('user.acknowledgement', compact('purposes'));
    }

    public function dashboard()
    {
        return view('user.homeOptions');
    }

    public function submittedRequest()
    {

        $proposalReq = DB::table('proposals')
            ->join('revenue_villages', 'proposals.revenue_village_id', '=', 'revenue_villages.id')
            ->select(
                'proposals.id',
                'proposals.receipt_no',
                'proposals.created_at',
                'revenue_villages.village_name',
                'proposals.establish_date',
                'proposals.proposed_name',
                'proposals.day',
                'proposals.month',
                'proposals.year'
            )
            ->where('proposals.block_id', GramPanchayat::where('id', Auth::user()->gram_panchayat_id)->value('block_id'))
            ->get();

        // return Datatable::of($proposalReq)->make(true);
        return Datatables::of($proposalReq)->make(true);
    }

    public function viewSubmittedRequest()
    {
        return view('user.viewSubmittedRequest');
    }

    public function ackHistory($id)
    {
        $reqHistory  = DB::table('proposals')

            ->join('revenue_circles', 'proposals.revenue_circle_id', '=', 'revenue_circles.id')
            ->join('districts', 'proposals.district_id', '=', 'districts.id')
            ->join('blocks', 'proposals.block_id', '=', 'blocks.id')

            // ->join('proposals', 'proposals.district_id', '=', 'districts.id')
            ->join('proposers', 'proposals.id', '=', 'proposers.proposal_id')
            ->join('proposer_categories', 'proposers.proposer_category_id', '=', 'proposer_categories.id')
            ->leftJoin('revenue_villages', 'proposals.revenue_village_id', '=', 'revenue_villages.id')
            ->leftJoin('gram_panchayats', 'proposals.gram_panchayat_id', '=', 'gram_panchayats.id')

            ->select(
                'proposals.receipt_no',
                'revenue_circles.circle_name',
                'revenue_villages.village_name',
                'gram_panchayats.gp_name',
                'proposals.proposed_name',
                'proposals.description',
                'proposers.proposer_category_id',
                'proposers.proposer_name',
                'proposers.identity_number',
                'districts.district_name',
                'proposer_categories.category_name',
                'blocks.block_name',
                'proposals.proposed_status',
                'proposals.establish_date',
                'proposals.day',
                'proposals.month',
                'proposals.year'
            )
            ->where('proposals.id', $id)
            ->get();

        return view('user.ackTable', compact('reqHistory'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        //
    }
}
