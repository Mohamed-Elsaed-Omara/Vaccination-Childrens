<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interface\Vaccination\VaccinationRepositoryInterface;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{

    private $vaccin;

    public function __construct(VaccinationRepositoryInterface $vaccin)
    {
        $this->vaccin = $vaccin;
    }

    public function index()
    {
        $vaccinations = $this->vaccin->index();

        return view('Dashboard.vaccination.index',compact('vaccinations'));
    }

    public function store(Request $request)
    {
        $this->vaccin->store($request);

        return back()->with('success','تم حفظ التطعيم بنجاح');
    }

    public function update(Request $request ,Vaccination $Vaccination){

        $this->vaccin->update($request, $Vaccination);

        return back()->with('success','تم تعديل التطعيم بنجاح');
    }

    public function destroy(string $id){

        return $this->vaccin->destroy($id);

    }
}
