<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SurgeryRoom;
class SurgeryRoom_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allRooms = SurgeryRoom::all();
       // return $allRooms;
        return view('HospitalAdmin.allRooms')->with('allRooms',$allRooms);
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

       return view('HospitalAdmin.SurgeryRoom',['Operation_Names'=>$operationsNames]);     
    }


    public function updateRoom()
    {
       // return view('HospitalAdmin.dummy');
             // return view('HospitalAdmin.SurgeryRoom');
             $operationsNames = DB::table('operations_types')->get();
             //return view('Patient.NewReservation')->with('Operation_Names',$operationsNames);
             
             return view('HospitalAdmin.SurgeryRoomUpdate')->with('Operation_Names',$operationsNames);
        
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
            'RoomID' => 'required',
            'OperationType' => 'required',
        ]);

            //creating Patient:
            $surgeryRoom = new SurgeryRoom;
            $surgeryRoom->RoomId = $request->input('RoomID');
            $surgeryRoom->Operation = $request->input('OperationType');
            
            if( $request->input('validity_status') == true)
            {$surgeryRoom->Validity_Status =1;}
            else {$surgeryRoom->Validity_Status =0;}
        
            if( $request->input('availability_status') == true)
            {$surgeryRoom->Availability_Status =1;}
            else {$surgeryRoom->Availability_Status =0;}
        
            $surgeryRoom->Validity_Status_Comment = $request->input('validity_comment');
            $surgeryRoom->Availability_Status_Comment = $request->input('availability_comment');
            $surgeryRoom->Hospitalid = 1;

            $surgeryRoom->save();
            
            //return redirect('NewReservation/create?patientname='.$request->input('Name').'&patientID='.$request->input('ID'));
  
       return 'success';
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
        $operationsNames = DB::table('operations_types')->get();
        return view('HospitalAdmin.SurgeryRoomUpdate',['Operation_Names'=>$operationsNames]);
    }
    
    public function findRoomFromView(Request $request)
    {
        //

      // $roomToUpdate = DB::table('surgery_rooms')->where('RoomId', '=',$request->input('searchRoom') )->get();
      $roomData =  SurgeryRoom::where('RoomId',$_GET['roomid'])->get();      
      //return $roomData->first();
      $operationsNames = DB::table('operations_types')->get();

      $Validity_Status = false;
      if($roomData->first()->Validity_Status == 1){
      
        $Validity_Status = true;
      }

      $Availability_Status = false;
      if($roomData->first()->Availability_Status == 1){
      
        $Availability_Status = true;
      }
      return view('HospitalAdmin.updateRoom')->with('RoomData',$roomData->first())->with('Operation_Names',$operationsNames)->with('Availability_Status',$Availability_Status)->with('Validity_Status',$Validity_Status)->with('RoomID',$_GET['roomid']);
    }

    public function findRoom(Request $request)
    {
        //

      // $roomToUpdate = DB::table('surgery_rooms')->where('RoomId', '=',$request->input('searchRoom') )->get();
      $roomData =  SurgeryRoom::where('RoomId',$request->input('searchRoom'))->get();      
      //return $roomData->first();
      $operationsNames = DB::table('operations_types')->get();

      $Validity_Status = false;
      if($roomData->first()->Validity_Status == 1){
      
        $Validity_Status = true;
      }

      $Availability_Status = false;
      if($roomData->first()->Availability_Status == 1){
      
        $Availability_Status = true;
      }
      return view('HospitalAdmin.updateRoom')->with('RoomData',$roomData->first())->with('Operation_Names',$operationsNames)->with('Availability_Status',$Availability_Status)->with('Validity_Status',$Validity_Status)->with('RoomID',$request->input('searchRoom'));
    }

    public function editRoom(Request $request)
    {
        //
        $this->validate($request,[
            'OperationType' => 'required',
        ]);

            //creating Patient:
            $surgeryRoom = SurgeryRoom::where('RoomId',$request->input('Room_ID_Hidden'));
            $surgeryRoom ->update(['Operation'=>$request->input('OperationType')]);

            if( $request->input('validity_status') == true)
            {$surgeryRoom ->update(['Validity_Status' =>1]);}
            else {$surgeryRoom ->update(['Validity_Status' =>0]);}
        
            if( $request->input('availability_status') == true)
            {$surgeryRoom ->update(['Availability_Status' =>1]);}
            else {$surgeryRoom ->update(['Availability_Status' =>0]);}
        
            $surgeryRoom ->update(['Validity_Status_Comment'=>$request->input('validity_comment')]);
            $surgeryRoom ->update(['Availability_Status_Comment'=>$request->input('availability_comment')]);

       return redirect('SurgeryRooms');
    
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
