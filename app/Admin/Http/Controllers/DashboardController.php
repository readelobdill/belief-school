<?php
namespace App\Admin\Http\Controllers;


class DashboardController extends Controller {

public function getIndex() {

    return view('admin.dashboard.main');
}

}