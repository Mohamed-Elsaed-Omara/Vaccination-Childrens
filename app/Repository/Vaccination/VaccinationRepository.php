<?php

namespace App\Repository\Vaccination;

use App\Interface\Vaccination\VaccinationRepositoryInterface;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class VaccinationRepository implements VaccinationRepositoryInterface
{
    public function index()
    {
        return Vaccination::orderBy('ageInmonths','Asc')->get();
    }

    public function store($request){

        $request->validate([
            'name' => 'required',
            'ageInmonths' => 'required|numeric'
        ],[
            'name.required' => 'هذا الحقل مطلوب (الاسم).',
            'ageInmonths.required' => 'هذا الحقل مطلوب (العمر).',
        ]);

        
        Vaccination::create([
            'name' => $request->name,
            'description' => $request->description,
            'ageInmonths' => $request->ageInmonths,
        ]);

        
    }

    public function update(Request $request, Vaccination $Vaccination){
        
        $request->validate([
            'name' => 'required',
            'ageInmonths' => 'required|numeric'
        ],[
            'name.required' => 'هذا الحقل مطلوب (الاسم).',
            'ageInmonths.required' => 'هذا الحقل مطلوب (العمر).',
        ]);

        $Vaccination->update($request->all());
    }

    public function destroy(string $id){

        try{
            
            Vaccination::findOrFail($id)->delete();
        
            return back()->with('success','تم حذف التطعيم');

        }catch(\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }
}
