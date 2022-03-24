<?php

namespace App\Http\Controllers\reports;

use App\DanhMuc\dmdanhhieutd;
use App\DSDonVi;
use App\Model\manage\ktcaccap\DangKyTd;
use App\Model\manage\ktcaccap\DangKyTd_KhenThuong;
use App\Model\manage\ktcaccap\LapHoSoTd_KhenThuong;
use App\Model\manage\qldoituong\qldoituong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BaoCaoDonViController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ThongTin()
    {
        if (Session::has('admin')) {
            $m_canhan = qldoituong::where('phanloai','CANHAN')->wherenotnull('madt')->get();
            $m_tapthe = qldoituong::where('phanloai','TAPTHE')->wherenotnull('madonvi')->get();
            $m_phongtrao = DangKyTd::all();
            return view('reports.DonVi.index')
                ->with('m_canhan', $m_canhan)
                ->with('m_tapthe', $m_tapthe)
                ->with('m_phongtrao', $m_phongtrao)
                ->with('furl', '/BaoCaoDonVi')
                ->with('pageTitle', 'Báo cáo tại đơn vị');

        } else
            return view('errors.notlogin');
    }

    public function CaNhan(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = qldoituong::where('madt',$inputs['madt'])->first();
            $m_donvi = DSDonVi::where('madonvi',$model->madonvi)->first();
            $m_khenthuong = LapHoSoTd_KhenThuong::where('madt',$inputs['madt'])->get();
            $m_danhhieu = dmdanhhieutd::all();
            $m_phongtrao = DangKyTd::all();
            foreach ($m_khenthuong as $khenthuong) {
                $phongtrao = $m_phongtrao->where('kihieudhtd', $khenthuong->kihieudhtd)->first();
                $khenthuong->noidung = $phongtrao->noidung ?? '';
                $khenthuong->tungay = $phongtrao->tungay ?? '';
                $khenthuong->denngay = $phongtrao->denngay ?? '';
            }
            return view('reports.DonVi.CaNhan')
                ->with('inputs', $inputs)
                ->with('model', $model)
                ->with('m_khenthuong', $m_khenthuong)
                ->with('m_donvi', $m_donvi)
                ->with('a_danhhieu', array_column($m_danhhieu->toArray(), 'tendanhhieutd','madanhhieutd'))
                ->with('pageTitle', 'Báo cáo theo cá nhân');

        } else
            return view('errors.notlogin');
    }

    public function TapThe(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = qldoituong::where('madonvi',$inputs['madonvi'])->first();
            $m_donvi = DSDonVi::where('madonvi',$model->madonvi)->first();
            $m_khenthuong = LapHoSoTd_KhenThuong::where('madonvi',$inputs['madonvi'])->where('phanloai','TAPTHE')->get();
            $m_danhhieu = dmdanhhieutd::all();
            $m_phongtrao = DangKyTd::all();
            foreach ($m_khenthuong as $khenthuong) {
                $phongtrao = $m_phongtrao->where('kihieudhtd', $khenthuong->kihieudhtd)->first();
                $khenthuong->noidung = $phongtrao->noidung ?? '';
                $khenthuong->tungay = $phongtrao->tungay ?? '';
                $khenthuong->denngay = $phongtrao->denngay ?? '';
            }
            return view('reports.DonVi.TapThe')
                ->with('inputs', $inputs)
                ->with('model', $model)
                ->with('m_khenthuong', $m_khenthuong)
                ->with('m_donvi', $m_donvi)
                ->with('a_danhhieu', array_column($m_danhhieu->toArray(), 'tendanhhieutd','madanhhieutd'))
                ->with('pageTitle', 'Báo cáo theo tập thể');

        } else
            return view('errors.notlogin');
    }

    public function PhongTrao(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DangKyTd::where('kihieudhtd',$inputs['kihieudhtd'])->first();
            $m_donvi = DSDonVi::where('madonvi',$model->madonvi)->first();
            $m_tapthe = LapHoSoTd_KhenThuong::where('kihieudhtd',$inputs['kihieudhtd'])->where('phanloai','TAPTHE')->get();
            $m_canhan = LapHoSoTd_KhenThuong::where('kihieudhtd',$inputs['kihieudhtd'])->where('phanloai','CANHAN')->get();
            $m_danhhieu = dmdanhhieutd::all();

            return view('reports.DonVi.PhongTrao')
                ->with('inputs', $inputs)
                ->with('model', $model)
                ->with('m_tapthe', $m_tapthe)
                ->with('m_canhan', $m_canhan)
                ->with('m_donvi', $m_donvi)
                ->with('a_danhhieu', array_column($m_danhhieu->toArray(), 'tendanhhieutd','madanhhieutd'))
                ->with('a_donvi', array_column(DSDonVi::all()->toArray(), 'tendonvi','madonvi'))
                ->with('pageTitle', 'Báo cáo theo phong trào');

        } else
            return view('errors.notlogin');
    }

    public function baocao(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            return view('reports.07.01N-BNV-TĐKT.baocao')
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Báo cáo tổng hợp mẫu 07.01');

        } else
            return view('errors.notlogin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
