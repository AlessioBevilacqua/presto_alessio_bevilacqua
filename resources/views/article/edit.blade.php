<x-layout>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-4 pt-5">
                    {{ __('ui.edit_article') }}
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-md-6 ">
                <livewire:edit-article-form :article="$article" />
            </div>
        </div>
    </div>
</x-layout>
