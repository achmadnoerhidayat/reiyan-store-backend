<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Provider extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'code', 'driver', 'is_active', 'payload'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'payload' => 'array',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['payload', 'name', 'driver'])
            ->logOnlyDirty()
            ->useLogName('administrator');
    }

    // Buat fungsi untuk sensor string
    private function maskString($string)
    {
        if (!$string) return null;
        try {
            $decrypted = decrypt($string);
            // Ambil 4 karakter awal, sisanya bintang
            return substr($decrypted, 0, 4) . '**********';
        } catch (\Exception $e) {
            return '********';
        }
    }

    // Accessor untuk mendapatkan payload yang sudah disensor
    public function getMaskedPayloadAttribute()
    {
        return [
            'type' => $this->payload['type'] ?? '',
            'url' => $this->payload['url'] ?? '',
            'username' => $this->maskString($this->payload['username'] ?? null),
            'api_key' => $this->maskString($this->payload['api_key'] ?? null),
        ];
    }
}
