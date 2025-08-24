<?php

namespace App\Traits;

trait UsernameRules
{
    public function usernameRules(): array
    {
        return [
            'required',
            'string',
            'min:3',
            'max:15',
        ];
    }

    public function usernameMessages(): array
    {
        return [
            'username.required' => 'İstifadəçi adı sahəsi boş buraxılmamalıdır.',
            'username.min' => 'İstifadəçi adı ən azı :min simvol olmalıdır.',
            'username.max' => 'İstifadəçi adı ən çox :max simvol ola bilər.',
        ];
    }
}
