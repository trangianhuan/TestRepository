<?php
namespace App\Http\Repositories;

interface TickedRepository{
  public function all();

  public function find($id);

  public function create($input);
}