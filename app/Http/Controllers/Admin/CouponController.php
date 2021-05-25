<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Coupon\AddRequest;
use App\Repository\Interfaces\CouponRepositoryInterface;

class CouponController extends Controller
{
    private $coupon;

    public function __construct(CouponRepositoryInterface $coupon)
    {
        $this->coupon = $coupon;
    }

    public function index()
    {
        return view('admin.coupon.index', [ 'coupons' => $this->coupon->all() ]);
    }

    public function create()
    {
        return view('admin.coupon.add');
    }

    public function store(AddRequest $request)
    {
        
        if ($this->coupon->store($request->validated())) {
            return redirect()->route('coupon.index')->with('success', 'Coupon created successfully.');
        }

        return redirect()->route('coupon.index')->with('error', 'Something went wrong happen.');
    }

    public function edit($id)
    {
        return view('admin.coupon.edit', [ 'coupon' => $this->coupon->findorfail($id) ]);
    }

    public function update(AddRequest $request, $id)
    {
        if ($this->coupon->update($request->validated(), $id)) {
            return redirect()->route('coupon.index')->with('success', 'Coupon updated successfully.');
        }

        return redirect()->route('coupon.index')->with('error', 'Something went wrong happen.');
    }

    public function destroy($id)
    {
        if ($this->coupon->destroy($id)) {
            return redirect()->route('coupon.index')->with('success', 'Coupon deleted successfully.');
        }

        return redirect()->route('coupon.index')->with('error', 'Something went wrong happen.');
    }
}
