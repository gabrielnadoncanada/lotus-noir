<x-form id="contact" class="form mb-[100px]" wire:submit.prevent="submit">
    <div class="grid gap-x-6 md:grid-cols-2 md:gap-y-5">
        <x-form.field>
            <x-form.input
                wire:model="firstName"
                name="firstName"
                type="text"
                required
                placeholder="John" />
            <x-form.error for="firstName"></x-form.error>
        </x-form.field>
        <x-form.field>
            <x-form.input
                wire:model="lastName"
                name="lastName"
                type="text"
                required
                placeholder="Doe" />
            <x-form.error for="lastName"></x-form.error>
        </x-form.field>
    </div>
    <div class="grid gap-x-6 md:grid-cols-2 md:gap-y-5">
        <x-form.field>
            <x-form.input
                wire:model="email"
                name="email"
                type="email"
                required
                placeholder="votre.email@exemple.com" />
            <x-form.error for="email"></x-form.error>
        </x-form.field>
        <x-form.field>
            <div class="">
                <x-form.input
                    wire:model="phone"
                    name="phone"
                    type="tel"
                    placeholder="+450 (123)-456"
                    required
                />
                <x-form.error for="phone"></x-form.error>
            </div>
        </x-form.field>
    </div>
    <x-form.field>
        <x-form.textarea
            wire:model="message"
            name="message"
            rows="8"
            cols="80"
            type="text"
            placeholder="Tapez votre message ici"
            required
        />
        <x-form.error for="message"></x-form.error>
    </x-form.field>
    <div class="grid items-center gap-x-6 gap-y-5 lg:grid-cols-12">
        <div class="md:col-span-6 lg:col-span-6">
            <div>
                <x-button theme="primary" :has_arrow="true">Envoyer le message</x-button>

            </div>
        </div>

    </div>
    @if($success)
        <div class="md:col-span-6 lg:col-span-6 alert alert-success mt-4" role="alert">
            Votre message a bien été envoyé.<br />
            Nous avons reçu vos informations et nous vous répondrons dans les plus
            brefs délais.
        </div>
    @endif
</x-form>





