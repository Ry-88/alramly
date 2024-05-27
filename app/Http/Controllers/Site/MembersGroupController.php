<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembersGroupController extends Controller
{
    public function membersGroup()
    {
        return view('site.membersGroup.members');
    }

    public function foundingMembers()
    {
        return view('site.membersGroup.foundingMembers');
    }

    public function generalAssociationMembers()
    {
        return view('site.membersGroup.generalAssociationMembers');
    }
}
