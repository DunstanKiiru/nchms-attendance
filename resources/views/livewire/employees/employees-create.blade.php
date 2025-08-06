<form wire:submit.prevent="submit" class="mt-6 space-y-6" enctype="multipart/form-data">
    @csrf

    <!-- Select User -->
    <div>
        <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
        <select wire:model="user_id" class="form-control w-full border-gray-300 rounded-md shadow-sm">
            <option value="">Select User</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
        </select>
        @error('user_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <!-- Department -->
    <flux:input wire:model="department" label="Department" placeholder="e.g. HR, IT" />

    <!-- RFID, Biometric, Fingerprint -->
    <flux:input wire:model="rfid_tag" label="RFID Tag" placeholder="RFID Tag" />
    <flux:input wire:model="biometric_code" label="Biometric Code" placeholder="Biometric Code" />
    <flux:input wire:model="fingerprint_id" label="Fingerprint ID" placeholder="Fingerprint ID" />

    <!-- 📁 Photo Upload Field -->
    <div class="mt-4">
        <label for="photo" class="block text-sm font-medium text-gray-700">Upload Photo</label>
        <div class="mt-1 flex items-center">
            <label
                class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 cursor-pointer"
            >
                <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 16l4-4a3 3 0 014 0l3 3a3 3 0 004 0l3-3M4 6h16" />
                </svg>
                <span>Select JPG or PNG</span>
                <input wire:model="photo" type="file" accept="image/jpeg,image/png" class="hidden">
            </label>
        </div>
        @error('photo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        @if ($photo)
            <div class="mt-3">
                <p class="text-sm text-gray-600">Preview:</p>
                <img src="{{ $photo->temporaryUrl() }}" alt="Photo Preview" class="h-24 mt-2 rounded shadow">
            </div>
        @endif
    </div>

    <!-- Submit Button -->
    <flux:button type="submit" variant="primary">Create Employee</flux:button>
</form>
