<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Province\ProvinceRepositoryInterface;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Repositories\Ward\WardRepositoryInterface;


class LocationController extends Controller
{
    protected $provinceRepo;
    protected $districtRepo;
    protected $wardRepo;

    public function __construct(
        ProvinceRepositoryInterface $provinceRepo,
        DistrictRepositoryInterface $districtRepo,
        WardRepositoryInterface $wardRepo,
    )
    {
        $this->provinceRepo = $provinceRepo;
        $this->districtRepo = $districtRepo;
        $this->wardRepo = $wardRepo;
    }

    public function getDistrict(int $provinceId) {
        // echo 44444;die();
        $districts = $this->districtRepo->getDistrictByProvinceId($provinceId);
        // dd($districts);
        $html = '<option value="">--Chọn Quận / Huyện--</option>';
        foreach($districts as $district) {
            $html .= '<option value="'. $district->code .'">' . $district->name . '</option>';
        }
        $response = [
            'html' => $html
        ];
        return response()->json($response);
    }

    public function getWard(int $districtId) {
        $wards = $this->wardRepo->getWardByDistrictId($districtId);
        $html = '<option value="">--Chọn Phường / Xã--</option>';
        foreach($wards as $ward) {
            $html .= '<option value="'. $ward->code .'">' . $ward->name . '</option>';
        }
        $response = [
            'html' => $html
        ];
        return response()->json($response);
    }

}