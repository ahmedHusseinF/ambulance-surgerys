<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SurgeryReservation;
class SurgeryReservation_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $operationsNames = DB::table('operations_types')->get();
        //return view('Patient.NewReservation')->with('Operation_Names',$operationsNames);
        
        return view('Patient.NewReservation',['Operation_Names'=>$operationsNames]);

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

        $this->validate($request,[
            'OperationType' => 'required',
            'EntryDate' => 'required',
            'ExitDate' => 'required',
            'OperationDate' => 'required',
            'InsuranceType'=>'required',

        ]);

            //creating Patient:
            $newReservation = new SurgeryReservation;
            $newReservation->Ticket_ID  = 'RES#'; // Hospital ID-RES#-ReservationID--> it's guaranteed to be unique
            $newReservation->patientID = $request->var('Patient_ID') ;
            $newReservation->Operation = $request->input('OperationType');
            $newReservation->Check_In_Date = $request->input('EntryDate');
            $newReservation->Check_Out_Date =$request->input('ExitDate');
            $newReservation->Surgery_Date = $request->input('OperationDate');
            $newReservation->Insurance_Type = $request->input('InsuranceType');
            $newReservation->Operation_Room_Entry_Time = $request->input('SurgeryEntry_Time');

            if($request->input('PatientAttended'))
            {
                $newReservation->Patient_Attended_The_Operation = true;
            }
            else{
                $newReservation->Patient_Attended_The_Operation = false;
            }
            $newReservation->Operation_Room_Exit_Time = $request->input('SurgeryExit_Time');
            $newReservation->Operation_Cost = $request->input('Cost');
            $newReservation->Operation_Cost_Paid_Amount = $request->input('Paid');
            $newReservation->Operation_Room_Remaining_Amount = $request->input('Remaining');
            $newReservation->Hospitalid = $request->input('Hospital ID');
            $newReservation->createdBy = $request->input('Created By');
            $newReservation->updatedBy = $request->input('Updated By');
            $newReservation->save();
            
            return redirect('Patient/create');

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
