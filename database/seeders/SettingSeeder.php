<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            'smtpHost' => 'smtp.mailgun.org',
            'smtpPort' => 587,
            'smtpUsername' => 'username',
            'smtpPassword' => 'password',
            'smtpEncryption' => 'tls',
            'smtpEmail' => 'test@eterna.net',
            'footerText' => 'Yönetim panelinden bu yazıyı düzenleyebilirsiniz.',
            'headerLogo' => '1698709647.png',
            'footerLogo' => '1698709647.png'
        ]);
    }
}
