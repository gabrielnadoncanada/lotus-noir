<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    const ID = 'id';

    const METAABLE_ID = 'metaable_id';

    const METAABLE_TYPE = 'metaable_type';

    const TITLE = 'title';

    const TEXT = 'text';

    const INDEXABLE = 'indexable';

    const IMAGE = 'image';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'indexable' => 'boolean',
    ];

    public function metaable()
    {
        return $this->morphTo();
    }
}
