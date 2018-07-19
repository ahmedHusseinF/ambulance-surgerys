<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservationQueue;
use App\Patient;
use DB;
class SurgeryQueue_Controller extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allRequests = DB::table('reservation_queues as q')
        ->select('q.ReservationUniqueKey','q.created_at','q.operation_type','p.Name','H.HospitalName','p.NationalID')
        ->join('hospitals as H','q.createdAt_hospital','=','H.id')
        ->join('patients as p','p.NationalID','q.patientID')
        ->get();


        return view('Patient.allRequests')->with('allRequests',$allRequests);
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
        $this->validate($request,[
            'OperationType' => 'required',
            'InsuranceType' => 'required',
            'Cost' => 'required|numeric|min:0',
            'Paid' => 'required|numeric|min:0|max:{$Cost}'
        ]);
        //
        try{
        $newRequest = new ReservationQueue;
        $newRequest->operation_type = $request->input('OperationType');
        $newRequest->Insurance_Type = $request->input('InsuranceType');
        $newRequest->Operation_Cost = $request->input('Cost');
        $newRequest->Operation_Cost_Paid_Amount = $request->input('Paid');
        $newRequest->isDistributed = false;
        $newRequest->createdAt_hospital = 1;
        $newRequest->patientID = $_GET['patientid'] ;
    
         $newRequest->save();
        }
        catch(\Exception $e)
        {
            if( Patient::where('NationalID',$newRequest->patientID)->exists()==false) return 'لا يوجد مريض مسجل برقم قومى'.$_GET['patientid'] ;
        }
         $insertedID = $newRequest->id;


         $newRequest->ReservationUniqueKey ='HOS'.$newRequest->createdAt_hospital.'RES'.$insertedID ;
        $newRequest->update();
        return redirect('./NewRequest');
    }

    public function updateRequest(Request $request)
    {
        //
        $request = ReservationQueue::where('ReservationUniqueKey','=',$_GET['roomid'])
                                    ->get();

        $patientData = DB::table('patients')->where('NationalID','=',$request->first()->patientID)
                                    ->get();           

        $operationsNames = DB::table('operations_types')->get();


         return view('Patient.updateReservationRequest')
                ->with('request',$request->first())
                ->with('patient',$patientData->first())
                ->with('Operation_Names',$operationsNames);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request,[
            'OperationType' => 'required',
            'InsuranceType' => 'required',
            'Cost' => 'required|numeric|min:0',
            'Paid' => 'required|numeric|min:0|max:{$Cost}'
        ]);

        $Request= ReservationQueue::where('ReservationUniqueKey',$_GET['key'])->get()->first();
                                    

        $Request->update(['operation_type'=>$request->input('OperationType')]);
        $Request->update(['Insurance_Type'=>$request->input('InsuranceType')]);
        $Request->update(['Operation_Cost'=>$request->input('Cost')]);
        $Request->update(['Operation_Cost_Paid_Amount'=>$request->input('Paid')]);
        $Request->update(['patientID'=>$request->input('nationalID')]);
                                     
        return redirect('./NewRequest');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
        ReservationQueue::where('ReservationUniqueKey',$_GET['key'])
                        ->delete();

        return redirect('./NewRequest');
    }//
}
