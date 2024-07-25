<?php

namespace App\Http\Controllers;

use App\Models\InventoryLog;
use Illuminate\Http\Request;

class InventoryLogController extends Controller
{
        
    public function get() 
    {
        return InventoryLog::with(['product'])->get();
    }
}
