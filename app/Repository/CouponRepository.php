<?php
namespace App\Repository;

use Auth;
use App\Coupon;
use Carbon\Carbon;
use App\UserProgram;
use App\Repository\Interfaces\CouponRepositoryInterface;

class CouponRepository implements CouponRepositoryInterface
{
    private $coupon, $userProgram;
    public function __construct(Coupon $coupon, UserProgram $userProgram)
    {
        $this->coupon = $coupon;
        $this->userProgram = $userProgram;
    }

    public function store($data)
    {
        $data['start_date'] = Carbon::parse($data['start_date'])->format('Y-m-d');
        $data['end_date'] = Carbon::parse($data['end_date'])->format('Y-m-d');
        return $this->coupon->create($data);
    }

    public function all($filters = [])
    {
        if (count($filters)) {
            return $this->coupon->where($filters)->orderBy('id', 'DESC')->get();
        }

        return $this->coupon->orderBy('id', 'DESC')->get();
    }

    public function findorfail($id)
    {
        return $this->coupon->findorfail($id);
    }

    public function update($data, $id)
    {
        $data['start_date'] = Carbon::parse($data['start_date'])->format('Y-m-d');
        $data['end_date'] = Carbon::parse($data['end_date'])->format('Y-m-d');
        return $this->coupon->find($id)->update($data);
    }

    public function applyCode($data)
    {
        $code = $this->coupon->where('code', $data['code'])->first();
        $userProgram = $this->userProgram->where([ 'coupon_id' => $code->id, 'user_id' => Auth::user()->id ])->count();
        if ($userProgram > 0) {
            return -1;    
        }
        if ($code->is_valid) {
            return $code;
        }
        return false;
    }
}