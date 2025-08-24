<?php

namespace App\Traits;

trait PasswordRules
{
    public function passwordRules(): array
    {
        return [
            'required',
            'string',
            'min:8',
            'max:15',
            'regex:/[a-z]/',    // ən azı bir kiçik hərf
            'regex:/[A-Z]/',    // ən azı bir böyük hərf
            'regex:/[0-9]/',    // ən azı bir rəqəm
            'regex:/[@$!%*?&]/' // ən azı bir xüsusi simvol
        ];
    }

    public function passwordMessages(): array
    {
        return [
            'password.required' => 'Şifrə sahəsi boş buraxılmamalıdır.',
            'password.min' => 'Şifrə ən azı :min simvol olmalıdır.',
            'password.max' => 'Şifrə ən çox :max simvol ola bilər.',
            'password.regex' => 'Şifrə böyük hərf, kiçik hərf, rəqəm və xüsusi simvol içərməlidir.',
        ];
    }
}
