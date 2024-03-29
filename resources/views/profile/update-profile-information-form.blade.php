<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Mobile number -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="mobile_number" value="{{ __('Mobile Number') }}" />
            <x-input id="mobile_number" type="text" class="mt-1 block w-full" wire:model="state.mobile_number" required autocomplete="mobile_number" />
            <x-input-error for="mobile_number" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Address') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model="state.address" required autocomplete="address" />
            <x-input-error for="address" class="mt-2" />
        </div>

        @can('freelancer')
        <!-- Bio -->
        <div class="col-span-6 sm:col-span-4">
            <label for="bio" class="block text-sm font-medium text-gray-700">{{ __('Bio') }}</label>
            <textarea id="bio" name="bio" class="mt-1 block w-full form-input rounded-md shadow-sm" wire:model="state.bio" required autocomplete="bio"></textarea>
            <x-input-error for="bio" class="mt-2" />
        </div>

        <!-- Hourly Rate -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="hourly_rate" value="{{ __('Hourly Rate') }}" />
            <x-input id="hourly_rate" type="text" class="mt-1 block w-full" wire:model="state.hourly_rate" required autocomplete="hourly_rate" />
            <x-input-error for="hourly_rate" class="mt-2" />
        </div>

        <!-- Tags -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="tags" value="{{ __('Tags') }}" />
            <x-input id="tags" type="text" class="mt-1 block w-full" wire:model="state.tags" required autocomplete="tags" />
            <x-input-error for="tags" class="mt-2" />
        </div>
        @endcan
        @can('employer')
         <!-- Company Name -->
         <div class="col-span-6 sm:col-span-4">
            <x-label for="company_name" value="{{ __('Company Name') }}" />
            <x-input id="company_name" type="text" class="mt-1 block w-full" wire:model="state.company_name" required autocomplete="company_name" />
            <x-input-error for="company_namey" class="mt-2" />
        </div>
        <!-- Company Bio -->
        <div class="col-span-6 sm:col-span-4">
            <label for="company_bio" class="block text-sm font-medium text-gray-700">{{ __('Company Bio') }}</label>
            <textarea id="company_bio" name="company_bio" class="mt-1 block w-full form-input rounded-md shadow-sm" wire:model="state.company_bio" required autocomplete="company_bio"></textarea>
            <x-input-error for="company_bio" class="mt-2" />
        </div>
        @endcan
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
