<?php

namespace App\Filament\Blocks\Fields;

use Filament\Forms\Components\RichEditor as BaseRichEditor;

class RichEditor
{
    public static function make(string $name = 'text'): BaseRichEditor
    {
        return BaseRichEditor::make($name)
            ->toolbarButtons([
                'bold',
                'italic',
                'link',
                'redo',
                'undo',
            ])
            ->default('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.</p>');
    }
}
