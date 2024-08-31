<?php

namespace App\Providers;

use App\Filament\Tables\Actions\SoftDeleteAction as TableSoftDeleteAction;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Field;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction as TableDeleteAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\EditAction as TableEditAction;
use Filament\Tables\Actions\ForceDeleteAction as TableForceDeleteAction;
use Filament\Tables\Actions\ReplicateAction as TableReplicateAction;
use Filament\Tables\Actions\RestoreAction as TableRestoreAction;
use Filament\Tables\Actions\ViewAction as TableViewAction;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->configureTable();
        $this->configureColumns();
        $this->configureForm();

        FilamentAsset::register([
            Css::make('filament-navigation-styles', __DIR__ . '/../../resources/dist/filament-menu.css'),
            Css::make('filament-title-with-slug-styles', __DIR__ . '/../../resources/dist/filament-title-with-slug.css'),
            Js::make('tinymce', 'https://cdn.jsdelivr.net/npm/tinymce@5.10.7/tinymce.min.js'),
            Js::make('filament-menu', resource_path('dist/filament-menu.js')),
        ]);
    }

    protected function configureTable(): void
    {
        Table::configureUsing(
            fn (Table $table) => $table
                ->filtersTriggerAction(
                    fn (Action $action) => $action
                        ->button()
                        ->label('Filtres'),
                )->filtersFormWidth('2xl')
                ->paginationPageOptions([5, 10, 25, 50])
        );

        //        TableEditAction::configureUsing(function (TableEditAction $action) {
        //            $action->tooltip($action->getLabel());
        //            $action->label('');
        //        }, isImportant: true);
        //
        //        DetachAction::configureUsing(function (DetachAction $action) {
        //            $action->tooltip($action->getLabel());
        //            $action->label('');
        //        }, isImportant: true);
        //
        //        TableDeleteAction::configureUsing(function (TableDeleteAction $action) {
        //            $action->tooltip($action->getLabel());
        //            $action->label('');
        //        }, isImportant: true);
        //
        //        TableViewAction::configureUsing(function (TableViewAction $action) {
        //            $action->tooltip($action->getLabel());
        //            $action->label('');
        //        }, isImportant: true);
        //
        //        TableReplicateAction::configureUsing(function (TableReplicateAction $action) {
        //            $action->tooltip($action->getLabel());
        //            $action->label('');
        //        }, isImportant: true);

        TableReplicateAction::configureUsing(function (TableReplicateAction $action) {
            $action->beforeReplicaSaved(function (Model $replica): void {
                if ($replica->slug === null || $replica->title === null) {
                    return;
                }
                $uniqueId = substr(md5(uniqid(rand(), true)), 0, 8);
                $replica['slug'] .= '-' . $uniqueId;
                $replica['title'] .= '-' . $uniqueId;
            });
        });
    }

    protected function configureColumns(): void
    {
        Column::configureUsing(function (Column $column): void {
            $column
                ->toggleable()
                ->sortable();
        });

        TextColumn::configureUsing(function (TextColumn $column): void {
            $column->searchable();
        });
    }

    protected function configureForm(): void
    {
        Forms\Components\DatePicker::configureUsing(function ($component) {
            $component->default(now());
        });
        Forms\Components\TextInput::configureUsing(function ($component) {
            $component->maxLength(255);
        });
        Forms\Components\Textarea::configureUsing(function ($component) {
            $component->maxLength(65000);
        });

        Forms\Components\Repeater::configureUsing(function ($component) {
            $component
                ->collapseAllAction(fn ($action) => $action->icon('heroicon-o-arrows-pointing-in'))
                ->expandAllAction(fn ($action) => $action->icon('heroicon-o-arrows-pointing-out'));
        });

        Forms\Components\RichEditor::configureUsing(function ($component) {
            $component
                ->toolbarButtons([
                    'blockquote',
                    'bold',
                    'bulletList',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ]);

        });
        Forms\Components\Builder::configureUsing(function ($component) {
            $component
                ->blockNumbers(false);
        });

        Forms\Components\Repeater::configureUsing(function ($component) {
            $component
                ->reorderable()
                ->cloneable();
        });

        Forms\Components\ToggleButtons::configureUsing(function ($component) {
            $component
                ->inline();
        });

        Field::configureUsing(function (Field $field): void {
            $field->label(function () use ($field): string {
                $fieldName = $field->getName();

                return __("filament.fields.$fieldName");
            });
        });

        Column::configureUsing(function (Column $column): void {
            $column->label(function () use ($column): string {
                $fieldName = $column->getName();

                return __("filament.fields.$fieldName");
            });
        });

        TableEditAction::configureUsing(function (TableEditAction $action) {
            $action->hiddenLabel();
            $action->tooltip('Modifier');
        }, isImportant: true);



        TableForceDeleteAction::configureUsing(function (TableForceDeleteAction $action) {
            $action->hiddenLabel();
            $action->tooltip('Supprimer');
        }, isImportant: true);

        TableRestoreAction::configureUsing(function (TableRestoreAction $action) {
            $action->hiddenLabel();
            $action->tooltip('Restaurer');
        }, isImportant: true);

        TableDeleteAction::configureUsing(function (TableDeleteAction $action) {
            $action->hiddenLabel();
            $action->tooltip('Archiver');
        }, isImportant: true);

        TableViewAction::configureUsing(function (TableViewAction $action) {
            $action->hiddenLabel();
            $action->tooltip('Voir');
        }, isImportant: true);

        TableReplicateAction::configureUsing(function (TableReplicateAction $action) {
            $action->hiddenLabel();
            $action->tooltip('Dupliquer');
        }, isImportant: true);
        //        Forms\Components\FileUpload::configureUsing(function ($component) {
        //            $component
        //                ->optimize('webp');
        //        });
    }

    protected function configureFilamentShield(): void
    {
        FilamentShield::configurePermissionIdentifierUsing(
            function ($resource) {
                $resource = Str::of($resource)
                    ->afterLast('Resources\\')
                    ->before('Resource')
                    ->replace('\\', '::');
                if ($resource->contains('::')) {

                    return str($resource)->beforeLast('::') . '::' . str($resource)->afterLast('::')->lcfirst();
                }

                return str($resource)->lcfirst();
            }
        );
    }

    protected function registerRenderHook(): void
    {
        Filament::registerRenderHook(
            'panels::body.start',
            fn (): View => view('components.staging-banner'),
        );
    }
}
