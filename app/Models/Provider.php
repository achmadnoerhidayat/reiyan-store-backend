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
            ->dontSubmitEmptyLogs()
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
        $data = [
            'url' => $this->payload['url'] ?? '',
            'username' => $this->maskString($this->payload['username'] ?? null),
            'api_key' => $this->maskString($this->payload['api_key'] ?? null),
        ];
        if (isset($this->payload['type']) && !empty($this->payload['type'] && $this->payload['type'] !== "")) {
            $data['type'] = $this->payload['type'];
        }
        if (isset($this->payload['url_js'])) {
            $data['url_js'] = $this->payload['url_js'];
        }
        return $data;
    }
}
