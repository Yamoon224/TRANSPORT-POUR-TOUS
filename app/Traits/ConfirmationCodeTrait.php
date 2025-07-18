<?php


    namespace App\Traits;

    trait ConfirmationCodeTrait
    {
        public function generateConfirmationCode()
        {
            return mt_rand(100000, 999999); // Générez un code de confirmation à six chiffres (vous pouvez ajuster selon vos besoins).
        }
    }