<div x-data="{ openModal: false }">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Rules</h2>
            <button data-prevent-double wire:click="create" @click="openModal = true"
                class="rounded bg-blue-600 px-4 py-2 text-white">
                Add Rule
            </button>
        </div>

        <div class="overflow-x-auto rounded bg-white shadow">
            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Rule Name</th>
                        <th class="p-3 text-left">Rule Value</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rules as $rule)
                        <tr class="border-t">
                            <td class="p-3">{{ $rule->rule_name }}</td>
                            <td class="p-3">{{ $rule->rule_value }}</td>
                            <td class="space-x-2 p-3">
                                <button data-prevent-double wire:click="edit({{ $rule->id }})" @click="openModal = true"
                                    class="text-blue-600">Edit</button>

                                <button data-prevent-double
                                    @click="$dispatch('confirm', { id: {{ $rule->id }}, message: 'Delete this rule?' })"
                                    class="text-red-600">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- MODAL --}}
        <div x-cloak x-show="openModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">

            <div class="w-full max-w-md rounded-lg bg-white p-6">

                <h3 class="mb-4 text-lg font-semibold">
                    {{ $editingId ? 'Edit Rule' : 'Add Rule' }}
                </h3>

                <div class="mb-3">
                    <label class="text-sm">Rule Name</label>
                    <input type="text" wire:model="rule_name" class="w-full rounded border p-2">
                </div>

                <div class="mb-3">
                    <label class="text-sm">Roles (comma separated)</label>
                    <input type="text" wire:model="rule_value" class="w-full rounded border p-2">
                </div>

                <div class="flex justify-end gap-2">
                    <button @click="openModal=false" class="rounded border px-4 py-2">Cancel</button>

                    <button data-prevent-double wire:click="save" @click="openModal=false"
                        class="rounded bg-blue-600 px-4 py-2 text-white">
                        Save
                    </button>
                </div>
            </div>
        </div>

</div>
