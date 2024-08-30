<?php

namespace App\Models;

use App\Mail\MessageCreatedMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class FormEntry extends Model
{
    const ID = 'id';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    const FIRST_NAME = 'firstName';

    const LAST_NAME = 'lastName';

    const EMAIL = 'email';

    const TEL = 'tel';

    const MESSAGE = 'message';

    protected $guarded = [];

    protected static function booted()
    {
        static::created(function ($item) {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new MessageCreatedMail($item));
        });
    }
}
