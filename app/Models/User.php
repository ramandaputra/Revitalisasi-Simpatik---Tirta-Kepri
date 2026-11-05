<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nik',
        'nama',
        'password',
        'lvl',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false;

    /**
     * Verify password supporting bcrypt, argon2, legacy MD5, and plain-text fallback safely.
     */
    public function verifyPassword(string $password): bool
    {
        // 1. Try standard Laravel Hash::check (bcrypt / argon2)
        try {
            if (Hash::check($password, $this->password)) {
                if (Hash::needsRehash($this->password)) {
                    $this->password = Hash::make($password);
                    $this->save();
                }
                return true;
            }
        } catch (\Throwable $e) {
            // Hash::check throws RuntimeException if hashedValue does not use the expected bcrypt/argon format
        }

        // 2. Legacy MD5 hash (32 hexadecimal characters)
        if (strlen($this->password) === 32 && ctype_xdigit($this->password)) {
            if (hash_equals($this->password, md5($password))) {
                // Auto-upgrade hash to full bcrypt
                $this->password = Hash::make($password);
                $this->save();
                return true;
            }
            return false;
        }

        // 3. Plain text legacy fallback
        if (hash_equals($this->password, $password)) {
            // Auto-upgrade hash to full bcrypt
            $this->password = Hash::make($password);
            $this->save();
            return true;
        }

        return false;
    }

    /**
     * Check if user has admin privileges
     */
    public function isAdmin(): bool
    {
        return $this->lvl === '1' || $this->lvl === 1;
    }
}

