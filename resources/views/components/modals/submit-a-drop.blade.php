<x-splade-modal name="submit-a-drop" max-width="lg" class="bg-neutral-900 flex flex-col gap-4">

    <div class="flex flex-col">

        <h1 class="text-xl text-white">SUBMIT A DROP</h1>

        <p class="text-neutral-300">

            Feel free to submit a drop I might've missed. Please provide a correct link as well as a timestamp if needed.

        </p>

    </div>

    <x-splade-form action="{{ route('submit-drop') }}"
                   class="flex flex-col gap-4"
    >

        <x-splade-input name="url" label="Source URL" />

        <x-splade-input name="timestamp" label="Timestamp" placeholder="e.g. 01:09" />

        <x-splade-submit />

    </x-splade-form>

</x-splade-modal>
