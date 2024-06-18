<x-filament-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
    class="-mt-3 filament-seo-slug-input-wrapper"
>
    <div
        x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('filament-title-with-slug-styles'))]"

        x-data="{
            context: '{{ $getContext() }}', // edit or create
            state: $wire.entangle('{{ $getStatePath() }}'), // current slug value
            statePersisted: '', // slug value received from db
            stateInitial: '', // slug value before modification
            editing: false,
            modified: false,
            initModification: function() {
                this.stateInitial = this.state;
                if(!this.statePersisted) {
                    this.statePersisted = this.state;
                }
                this.editing = true;
                setTimeout(() => $refs.slugInput.focus(), 75);
            },
            submitModification: function() {
                if(!this.stateInitial) {
                    this.state = '';
                }
                else {
                    this.state = this.stateInitial;
                }
                this.detectModification();
                this.editing = false;

           },
           cancelModification: function() {
                this.stateInitial = this.state;
                this.detectModification();
                this.editing = false;
           },
           resetModification: function() {
                this.stateInitial = this.statePersisted;
                this.detectModification();
           },
           detectModification: function() {
                this.modified = this.stateInitial !== this.statePersisted;
           },
        }"
        x-on:submit.document="modified = false"
    >
        <div
            {{ $attributes->merge($getExtraAttributes())->class(['flex mx-1 items-center justify-between group text-sm filament-forms-text-input-component']) }}
        >

            @if($getReadonly())
                <span class="flex">
                    <span class="mr-1">{{ $getLabelPrefix() }}</span>
                    <span class="text-gray-400">{{ $getFullBaseUrl() }}</span>
                    <span class="text-gray-400 font-semibold">{{ $getState() }}</span>
                </span>
                @if($getSlugInputUrlVisitLinkVisible())
                    <a
                        href="{{ $getRecordUrl() }}"
                        target="_blank"
                        class="
                            filament-link cursor-pointer text-sm text-primary-600 underline
                            inline-flex items-center justify-center space-x-1
                            hover:text-primary-500
                            dark:text-primary-500 dark:hover:text-primary-400
                        "
                    >
                        <span>{{ $getVisitLinkLabel() }}</span>
                        @svg('heroicon-o-arrow-top-right-on-square', 'h-4 w-4', ['stroke-width' => 2])
                    </a>
                @endif
            @else
                <span
                    class="@if(!$getState()) flex items-center gap-1 @endif"
                >
                    <span>{{ $getLabelPrefix() }}</span>
                    <span
                        x-text="!editing ? '{{ $getFullBaseUrl() }}' : '{{ $getBasePath() }}'"
                        class="text-gray-400"
                    ></span>
                    <a
                        href="#"
                        role="button"
                        title="{{ __('filament.fields.slug_input.permalink_action_edit') }}"
                        x-on:click.prevent="initModification()"
                        x-show="!editing"
                        class="
                            cursor-pointer
                            font-semibold text-gray-400
                            inline-flex items-center justify-center
                            hover:underline hover:text-primary-500
                            dark:hover:text-primary-400
                        "
                        :class="context !== 'create' && modified ? 'text-gray-600 bg-gray-100 dark:text-gray-400 dark:bg-gray-700 px-1 rounded-md' : ''"
                    >
                        <span class="mr-1">{{ $getState() }}</span>
                          @svg('heroicon-o-pencil-square', 'h-4 w-4 text-primary-600 dark:text-primary-500', ['stroke-width' => 2])
                        <span
                            class="sr-only">{{ __('filament.fields.slug_input.permalink_action_edit') }}</span>
                    </a>
                    @if($getSlugLabelPostfix())
                        <span
                            x-show="!editing"
                            class="ml-0.5 text-gray-400"
                        >{{ $getSlugLabelPostfix() }}</span>
                    @endif
                    <span x-show="!editing && context !== 'create' && modified"> [{{ __('filament.fields.slug_input.permalink_status_changed') }}]</span>
                </span>

                <div
                    class="flex-1 mx-2"
                    x-show="editing"
                    style="display: none;"
                >
                    <x-filament::input.wrapper>
                        <x-filament::input
                            type="text"
                            x-ref="slugInput"
                            x-model="stateInitial"
                            x-bind:disabled="!editing"
                            x-on:keydown.enter="submitModification()"
                            x-on:keydown.escape="cancelModification()"
                            id="{{ $getId() }}"
                        />
                    </x-filament::input.wrapper>

                    <input type="hidden" {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}" />
                </div>
                <div
                    x-show="editing"
                    class="flex space-x-2"
                    style="display: none;"
                >
                    <a
                        href="#"
                        role="button"
                        x-on:click.prevent="submitModification()"
                        class="
                            filament-button filament-button-size-md inline-flex items-center justify-center py-2.5 font-medium rounded-lg border __ition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-gray-800 bg-white border-gray-300 hover:bg-gray-50 focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 dark:text-gray-200 dark:focus:text-primary-400 dark:focus:border-primary-400 dark:focus:bg-gray-800 filament-page-button-action
                        "
                    >
                        {{ __('filament.fields.slug_input.permalink_action_ok') }}
                    </a>
                    <x-filament::link
                        x-show="context === 'edit' && modified"
                        x-on:click="resetModification()"
                        class="cursor-pointer ml-4"
                        icon="heroicon-o-arrow-path"
                        color="gray"
                        size="sm"
                        title="{{ __('filament.fields.slug_input.permalink_action_reset') }}"
                    >
                        <span
                            class="sr-only">{{ __('filament.fields.slug_input.permalink_action_reset') }}</span>
                    </x-filament::link>
                    <x-filament::link
                        x-on:click="cancelModification()"
                        class="cursor-pointer"
                        icon="heroicon-o-x-mark"
                        color="gray"
                        size="sm"
                        title="{{ __('filament.fields.slug_input.permalink_action_cancel') }}"
                    >
                        <span
                            class="sr-only">{{ __('filament.fields.slug_input.permalink_action_cancel') }}</span>
                    </x-filament::link>
                </div>
                <span
                    x-show="context === 'edit'"
                    class="flex items-center space-x-2"
                >
                    @if($getSlugInputUrlVisitLinkVisible())
                        <template x-if="!editing">
                            <a
                                href="{{ $getRecordUrl() }}"
                                target="_blank"
                                class="filament-link inline-flex items-center justify-center space-x-1 hover:underline focus:outline-none focus:underline text-sm text-primary-600 hover:text-primary-500 dark:text-primary-500 dark:hover:text-primary-400 cursor-pointer"
                            >
                                <span>{{ $getVisitLinkLabel() }}</span>
                                @svg('heroicon-o-arrow-top-right-on-square', 'h-4 w-4', ['stroke-width' => 2])
                            </a>
                        </template>
                    @endif
            </span>
            @endif
        </div>
    </div>
</x-filament-forms::field-wrapper>
