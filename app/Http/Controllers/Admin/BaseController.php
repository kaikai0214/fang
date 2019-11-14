<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $page = 0;
    public function __construct()
    {
        $this->page = env("PAGESIZE");
    }

}
