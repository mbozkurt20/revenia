<?php

namespace Database\Seeders;

use App\Models\InvitationCode;
use Illuminate\Database\Seeder;
use App\Models\Invitation; // Modeli kullanmayı unutma

class InvitationCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            InvitationCode::create([
                'code' => $this->randomAlphanumericCode(6),
            ]);
        }
    }

    private function randomAlphanumericCode($length = 6): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $code;
    }
}
