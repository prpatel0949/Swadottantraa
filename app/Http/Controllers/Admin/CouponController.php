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
        $data = $request->validated();
        do {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $code = '';
            for ($i = 0; $i < 4; $i++) {
                $code .= $characters[rand(0, $charactersLength - 1)];
            }
            $user_code = $this->coupon->all([ 'code' => $code ]);
        } while(empty($user_code));

        $data['code'] = $code;
        if ($this->coupon->store($data)) {
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
}
