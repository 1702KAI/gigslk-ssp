<!-- user-profile.blade.php -->

<div class="bg-no-repeat border border-green-300 rounded-xl py-3 w-10/12">
    <div class="photo-wrapper p-2">
        <!-- Use the user's profile image URL -->
        <img class="h-32 rounded-xl mx-auto" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}">
    </div>
    <div class="p-2">
        <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ auth()->user()->name }}</h3>
        <div class="text-center text-gray-400 text-xs font-semibold">
            <p>{{ auth()->user()->job_title }}</p>
        </div>
        <table class="text-xs my-3">
            <tbody>
                <tr>
                    <td class="px-2 py-2 text-gray-500 font-semibold">Location</td>
                    <td class="px-2 py-2">{{ auth()->user()->address }}</td>
                </tr>
                <tr>
                    <td class="px-2 py-2 text-gray-500 font-semibold">Phone</td>
                    <td class="px-2 py-2">{{ auth()->user()->mobile_number }}</td>
                </tr>
                <tr>
                    <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                    <td class="px-2 py-2">{{ auth()->user()->email }}</td>
                </tr>
                <tr>
                    <td class="px-2 py-2 text-gray-500 font-semibold">Company</td>
                    <td class="px-2 py-2">{{ auth()->user()->company_name }}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center my-3">
            <button class="bg-white text-white px-4 py-2 border rounded-md hover:bg-green-500">
            <a class="text-xs text-black hover:text-black font-medium" href="{{ route('profile.show') }}">Edit Profile</a>
            </button>
        </div>
    </div>
</div>
