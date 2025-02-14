<div>
    <form>
        <div class="mt-2">
            <input 
                type="text" 
                class="p-4 w-full rounded-md bg-gray-700"
                wire:model.live.debounce="searchText"
                placeholder="{{ $placeholder }}"
                wire.offline.attr="disabled"  
            >
            <!-- wire.offline.attr.remove -->

            <!-- <button class="text-white font-medium rounded-md p-4 disabled:bg-indigo-400 bg-indigo-600"
                wire:click.prevent="clear()"
                {{ empty($searchText) ? 'disabled' : '' }}
            >
                Clear
            </button> -->
        </div>
    </form>

    @if (!empty($searchText))
        <!-- wire:transition has in/out modifiers to specify that the transition only happpens 
         when entering in a field or exiting the field. Other modifiers: opacity, scale.
            -->
        <div wire:transition.duration.1000ms>
            <livewire:search-results :results="$results">
        </div>
    @endif
    
</div>
