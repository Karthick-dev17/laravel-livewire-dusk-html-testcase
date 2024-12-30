<div>
    {{-- Be like water. --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-md flex flex-wrap bg-slate-300 p-4">
        <div class="w-1/2 p-2">
            <label>Html code:</label>
            <textarea name="" id="" wire:model="htmlcode" class="w-full h-64 p-2 border border-gray-300 rounded"></textarea>
            @error('htmlcode')
            <p class="text-red-400">{{$message}}</p>
            @enderror
        </div>
        <div class="w-1/2 p-2">
            <label>Test case:</label>
            <textarea name="" id="" wire:model="htmltestcase" class="w-full h-64     p-2 border border-gray-300 rounded"></textarea>
            @error('htmltestcase')
            <p class="text-red-400">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full mt-4">
            <button wire:click="checkFunctionality" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
        </div>
    </div>
</div>