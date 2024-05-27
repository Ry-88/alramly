<?php

namespace App\Exports;

use App\Models\Membership;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MembershipExports implements FromCollection, WithHeadings
{
    private $membership_type;

    public function __construct($membership_type)
    {
        $this->membership_type = $membership_type;
    }

    public function headings(): array
    {
        return [
            'الرقم التعريفي',
            'الاسم',
            'رقم الجوال',
            'رقم الهوية',
            'تاريخ الميلاد',
            'نوع العضوية',
            'الوظيفة',
            'المدينة',
            'تاريخ الموافقة'
        ];
    }
    public function collection()
    {
        $memberships = Membership::where('membership_type', $this->membership_type)->where('status', 'تمت الموافقه')->get();

        return $memberships->map(function ($member) {
            return [
                $member->id,
                $member->getTranslation('full_name', 'ar'),
                $member->phone,
                $member->id_number,
                $member->birth_date,
                $member->membership_type,
                $member->job,
                $member->city,
                $member->approved_at
            ];
        });

        // return [
        //     $member->id,
        //     $member->getTranslation('full_name', 'ar'),
        //     $member->phone,
        //     $member->id_number,
        //     $member->birth_date,
        //     $member->membership_type,
        //     $member->job,
        //     $member->city,
        //     $member->approved_at
        // ];
    }
}
