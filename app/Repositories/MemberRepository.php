<?php

namespace App\Repositories;

use App\Models\MemberLevel;

class MemberRepository
{
    public function getAll()
    {
        return MemberLevel::orderBy('created_at', 'asc')->get();
    }

    public function getName($name)
    {
        return MemberLevel::where('name', 'like', '%' . $name . '%')->get();
    }

    public function update(array $data, $id)
    {
        $member = MemberLevel::find($id);

        if (!$member) {
            return null;
        }

        $member->update($data);

        return $member;
    }
}
