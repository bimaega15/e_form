<x-backend-layout>
    @section('title','Profile Page')
    <!-- BEGIN: Top Bar -->
    @section('breadcrumbs')
    {{ Breadcrumbs::render('myProfile') }}
    @endsection
    <!-- END: Top Bar -->

    <h2 class="intro-y text-lg font-medium mt-10">
        Data My Profile
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2 btn-edit" data-url="{{ route('myProfile.edit',$profile->id) }}" data-id="{{ $profile->id }}">
                Edit Data
            </button>
        </div>
    </div>

    <div id="output"></div>


    @push('custom_js')
    <script class="url_data_profile" data-url="{{ route('myProfile.index') }}"></script>
    <script src="{{ asset('js/myProfile/index.js') }}"></script>
    @endpush
</x-backend-layout>