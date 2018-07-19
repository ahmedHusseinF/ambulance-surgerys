<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
class Patient_Controller extends Controller
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
        return view('Patient.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {/*
        $this->validate($request,[
            'name' => 'required',
            'ID' => 'required',
            'Age' => 'required',
            'group1' => 'required'

        ]);
*/
        return 123;
    }

    public function validateCredentials(Request $request)
    {
        $this->validate($request,[
            'Name' => 'required',
            'ID' => 'required',
            'Age' => 'required',
            'group1' => 'required'
        ]);

            //creating Patient:
            $patient = new Patient;
            $patient->Name = $request->input('Name');
            $patient->NationalID = $request->input('ID');
            $patient->Age = $request->input('Age');
            $patient->PhoneNumber = $request->input('Phone_number');
            $patient->MobileNumber = $request->input('Mobile_number');
            $patient->InsuranceNumber = $request->input('Insurance_number');
            $patient->Gender = $request->input('group1');
            $patient->Comments = $request->input('Comment');
            $patient->save();
            
            return redirect('NewReservation/create?patientname='.$request->input('Name').'&patientID='.$request->input('ID'));
    }

    public function getPatientID(Request $request)
    {
            return view('Patient.findPatient');
    }

    public function findPatient(Request $request)
    {

        $requiredPatients = Patient::where('NationalID',$request->input('PatientNationalId'))->get();
            //creating Patient:
        $requiredPatient = $requiredPatients->first();

            return view('Patient.updatePatient')->with('patientName',$requiredPatient->Name)->with('patientID',$requiredPatient->NationalID)->with('PatientAge',$requiredPatient->Age)
            ->with('PatientPhone',$requiredPatient->PhoneNumber)->with('PatientMobile',$requiredPatient->MobileNumber)->with('PatientInsurance',$requiredPatient->InsuranceNumber)->with('Gender',$requiredPatient->Gender)
            ->with('PatientComment',$requiredPatient->Comments);
            //return redirect('NewReservation/create?patientname='.$request->input('Name').'&patientID='.$request->input('ID'));
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
            'Name' => 'required',
            'ID' => 'required',
            'Age' => 'required',
            'group1' => 'required'
        ]);

            //creating Patient:
            $patient = Patient::where('NationalID',$request->input('ID_Hidden'));
            $patient ->update(['Name'=>$request->input('Name')]);
            $patient ->update(['Age'=>$request->input('Age')]);
            $patient ->update(['PhoneNumber'=>$request->input('Phone_number')]);
            $patient ->update(['MobileNumber'=>$request->input('Mobile_number')]);
            $patient ->update(['InsuranceNumber'=>$request->input('Insurance_number')]);
            $patient ->update(['Gender'=>$request->input('group1')]);
            $patient ->update(['Comments'=>$request->input('Comment')]);
       return 'update success';
    }

    public function saveUpdates(Request $request)
    {
        //
        $this->validate($request,[
            'Name' => 'required',
            'ID' => 'required',
            'Age' => 'required',
            'group1' => 'required'
        ]);

            //creating Patient:
            $patient = Patient::where('NationalID',1234);
            $patient ->update(['Name'=>$request->input('Name')]);
            $patient ->update(['Age'=>$request->input('Age')]);
            $patient ->update(['PhoneNumber'=>$request->input('Phone_number')]);
            $patient ->update(['MobileNumber'=>$request->input('Mobile_number')]);
            $patient ->update(['InsuranceNumber'=>$request->input('Insurance_number')]);
            $patient ->update(['Gender'=>$request->input('group1')]);
            $patient ->update(['Comments'=>$request->input('Comment')]);
            
          //  return redirect('NewReservation/create?patientname='.$request->input('Name').'&patientID='.$request->input('ID_Hidden'));
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
