<?php

namespace App\Interface\Vaccination;

use App\Models\Vaccination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface VaccinationRepositoryInterface
{
    public function index();

    public function store($request);

    public function update(Request $request , Vaccination $vaccination);

    public function destroy(string $id);
}
