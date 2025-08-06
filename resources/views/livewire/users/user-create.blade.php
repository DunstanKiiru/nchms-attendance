<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create Employee') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Register a new employee') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div>
        <a
            href="{{ route('employees.index') }}"
            class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
            Back
        </a>

        <div class="w-150">
            <form wire:submit="submit" class="mt-6 space-y-6">
                {{-- Select User --}}
                <flux:select wire:model="user_id" label="User">
                    <option value="">{{ __('Select User') }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </flux:select>

                {{-- Department --}}
                <flux:input wire:model="department" label="Department" placeholder="Department" />

                {{-- RFID Tag --}}
                <flux:input wire:model="rfid_tag" label="RFID Tag" placeholder="e.g. ABC123RFID" />

                {{-- Biometric Code --}}
                <flux:input wire:model="biometric_code" label="Biometric Code" placeholder="e.g. BIO4567" />

                {{-- Fingerprint ID --}}
                <flux:input wire:model="fingerprint_id" label="Fingerprint ID" placeholder="e.g. FPRINT89" />

                {{-- Photo Upload --}}
                <flux:file-upload wire:model="photo" label="Employee Photo" />

                {{-- Submit Button --}}
                <flux:button type="submit" variant="primary">Submit</flux:button>
            </form>
        </div>
    </div>
</div>
