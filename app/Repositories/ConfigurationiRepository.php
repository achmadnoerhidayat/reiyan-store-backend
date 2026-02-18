<?php

namespace App\Repositories;

use App\Models\Configuration;

class ConfigurationiRepository
{
    public function get()
    {
        return Configuration::first();
    }

    public function findId($id)
    {
        return Configuration::find($id);
    }

    public function store(array $data)
    {
        return Configuration::create($data);
    }

    public function update(array $data, $id)
    {
        $config = Configuration::find($id);
        if (!$config) {
            return null;
        }
	$config->update($data);
        return $config;
    }

    public function delete($id)
    {
        $config = Configuration::find($id);
        if (!$config) {
            return null;
        }
        $config->delete();
        return $config;
    }
}
