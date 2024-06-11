<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\CreateChild;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParentAndChildRequest;
use App\Models\Child;
use App\Models\Dose;
use App\Models\Parrent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function index(){
        $childrens = Child::all();
        return view('Dashboard.childrens.index',compact('childrens'));
    }

    public function create()
    {
        return view('Dashboard.childrens.addchild');
    }

    public function store(StoreParentAndChildRequest $request)
    {
        $validated = $request->validated();

        $currentParent = Parrent::firstOrCreate(['national_id' => $request->national_id], [
            'name' => $request->name,
            'password' => '',
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);
        
        $newChild = Child::firstOrCreate([
            'name' => $request->child_name,
            'parent_id' => $currentParent->id
        ], [
            'length' => $request->length,
            'weight' => $request->weight,
            'gender' => $request->gender,
            'dateOfbirth' => date('Y-m-d', strtotime($request->dateOfbirth)),
        ]);

        event(new CreateChild($newChild));

        return back()->with('success','تم اضافة الطفل بنجاح');
    }

    public function show($id){

        $doses = Dose::with('vaccine')->where('child_id',$id)->oldest('doses_date')->get();
        
        return view('Dashboard.childrens.doses',compact('doses'));
    }

    public function checkDose(Request $request)
    {
        $doses = Dose::whereIn('id', $request->doses_id)->get();
        foreach ($doses as $dose) {
            $dose->status = 1; 
            $dose->save(); 
        }

        return back()->with('success','تم تسجيل الجرعة بنجاح');
        
    }
}
