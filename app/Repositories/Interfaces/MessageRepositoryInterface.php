<?php
/**
 * Created by PhpStorm.
 * User: rasez
 * Date: 5/22/22
 * Time: 3:50 PM
 */
namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface MessageRepositoryInterface{
    public function store(Request $request);
    public function report(Request $request);
}
