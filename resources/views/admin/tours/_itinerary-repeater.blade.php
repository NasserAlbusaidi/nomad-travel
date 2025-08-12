<!-- Itinerary Repeater Field -->
<div x-data="itineraryManager('{{ old('itinerary', json_encode($tour->itinerary ?? [])) }}')">
    <label class="block text-sm font-bold text-ocean-blue tracking-wide">Itinerary</label>
    <p class="text-xs text-gray-500 mt-1">Add, remove, and reorder itinerary items. All fields are optional.</p>


    <!-- Hidden Textarea: This will be submitted to the backend -->
    <input type="hidden" name="itinerary" x-bind:value="JSON.stringify(items)">

    <!-- Itinerary Items Container -->
    <div class="space-y-4 mt-4">
        <template x-for="(item, index) in items" :key="index">
            <div class="p-4 border rounded-lg shadow-sm bg-gray-50/50 relative">
                <!-- Remove Item Button -->
                <button type="button" @click="removeItem(index)"
                        class="absolute top-2 right-2 text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <!-- Time Input -->
                    <div class="md:col-span-1">
                        <label class="block text-xs font-medium text-gray-600">Time</label>
                        <input type="time" x-model="item.time"
                               class="mt-1 block w-full form-input">
                    </div>

                    <!-- Title Input -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-600">Title</label>
                        <input type="text" x-model="item.title" placeholder="e.g., Arrival at Destination"
                               class="mt-1 block w-full form-input">
                    </div>

                    <!-- Description Input -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-600">Description</label>
                        <input type="text" x-model="item.description" placeholder="e.g., Meet at the main entrance"
                               class="mt-1 block w-full form-input">
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- Add Item Button -->
    <div class="mt-4">
        <button type="button" @click="addItem"
                class="px-4 py-2 bg-gray-200 text-charcoal font-semibold text-sm rounded-md hover:bg-gray-300 transition-colors">
            + Add Itinerary Item
        </button>
    </div>
</div>

{{-- This script is now self-contained within the partial --}}
<script>
    function itineraryManager(jsonString) {
        let initialItems = [];
        try {
            const parsed = JSON.parse(jsonString || '[]');
            initialItems = Array.isArray(parsed) ? parsed : [];
        } catch (e) {
            console.error('Could not parse itinerary JSON:', e);
            initialItems = [];
        }

        const formattedItems = initialItems.map(item => {
            if (item.time && (item.time.includes('AM') || item.time.includes('PM'))) {
                const d = new Date(`1970-01-01 ${item.time}`);
                if (!isNaN(d)) {
                    const hours = d.getHours().toString().padStart(2, '0');
                    const minutes = d.getMinutes().toString().padStart(2, '0');
                    item.time = `${hours}:${minutes}`;
                }
            }
            return item;
        });

        return {
            items: formattedItems,
            addItem() {
                this.items.push({
                    time: '',
                    title: '',
                    description: ''
                });
            },
            removeItem(index) {
                this.items.splice(index, 1);
            }
        }
    }
</script>
