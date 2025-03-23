<?php
/*
 * Copyright (c) 2025.
 * Author : AlexistDev
 * Email : alexistdev@gmail.com
 * Github: https://github.com/alexistdev
 */

namespace App\Http\Services\AUTH;

use Illuminate\Http\Request;

interface RegisterService
{
    public function save(Request $request):string;

}
