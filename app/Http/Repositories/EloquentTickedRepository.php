<?php 
namespace App\Http\Repositories;

use App\Model\Ticked;

class EloquentTickedRepository implements TickedRepository {

    public function all()
    {
        return Ticked::all();
    }

    public function find($id)
    {
        return Ticked::find($id);
    }

    public function create($input)
    {
        return Ticked::create($input);
    }

}