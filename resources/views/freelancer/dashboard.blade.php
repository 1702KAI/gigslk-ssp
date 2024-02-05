<x-app-layout>
    <x-slot name="header">
        <div class="bg-white min-h-screen">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
                Welcome, {{ auth()->user()->name }} 
            </h2>
            <div class="flex flex-row pt-2 px-1 pb-4">
                <div class="w-full">
                    <div class="flex flex-row">
                        <x-user-details-card />
                        <div class="bg-no-repeat bg-green-200 border border-green-300 rounded-xl w-5/12 ml-4 p-6 h-40" style="background-image: url(https://previews.dropbox.com/p/thumb/AAuwpqWfUgs9aC5lRoM_f-yi7OPV4txbpW1makBEj5l21sDbEGYsrC9sb6bwUFXTSsekeka5xb7_IHCdyM4p9XCUaoUjpaTSlKK99S_k4L5PIspjqKkiWoaUYiAeQIdnaUvZJlgAGVUEJoy-1PA9i6Jj0GHQTrF_h9MVEnCyPQ-kg4_p7kZ8Yk0TMTL7XDx4jGJFkz75geOdOklKT3GqY9U9JtxxvRRyo1Un8hOObbWQBS1eYE-MowAI5rNqHCE_e-44yXKY6AKJocLPXz_U4xp87K4mVGehFKC6dgk_i5Ur7gspuD7gRBDvd0sanJ9Ybr_6s2hZhrpad-2WFwWqSNkh/p.png?fv_content=true&size_mode=5); background-position: 100% 40%;">
                            <p class="text-2xl text-green-900">Active Gigs <br><strong>13</strong></p>
                        </div>
                        <div class="bg-no-repeat bg-green-200 border border-green-300 rounded-xl w-5/12 ml-4 p-6  h-40" style="background-image: url(https://previews.dropbox.com/p/thumb/AAuwpqWfUgs9aC5lRoM_f-yi7OPV4txbpW1makBEj5l21sDbEGYsrC9sb6bwUFXTSsekeka5xb7_IHCdyM4p9XCUaoUjpaTSlKK99S_k4L5PIspjqKkiWoaUYiAeQIdnaUvZJlgAGVUEJoy-1PA9i6Jj0GHQTrF_h9MVEnCyPQ-kg4_p7kZ8Yk0TMTL7XDx4jGJFkz75geOdOklKT3GqY9U9JtxxvRRyo1Un8hOObbWQBS1eYE-MowAI5rNqHCE_e-44yXKY6AKJocLPXz_U4xp87K4mVGehFKC6dgk_i5Ur7gspuD7gRBDvd0sanJ9Ybr_6s2hZhrpad-2WFwWqSNkh/p.png?fv_content=true&size_mode=5); background-position: 100% 40%;">
                            <p class="text-2xl text-green-900">Active Bids <br><strong>23</strong></p>
                        </div>
                        <div class="bg-no-repeat bg-green-200 border border-green-300 rounded-xl w-5/12 ml-4 p-6  h-40" style="background-image: url(https://previews.dropbox.com/p/thumb/AAuwpqWfUgs9aC5lRoM_f-yi7OPV4txbpW1makBEj5l21sDbEGYsrC9sb6bwUFXTSsekeka5xb7_IHCdyM4p9XCUaoUjpaTSlKK99S_k4L5PIspjqKkiWoaUYiAeQIdnaUvZJlgAGVUEJoy-1PA9i6Jj0GHQTrF_h9MVEnCyPQ-kg4_p7kZ8Yk0TMTL7XDx4jGJFkz75geOdOklKT3GqY9U9JtxxvRRyo1Un8hOObbWQBS1eYE-MowAI5rNqHCE_e-44yXKY6AKJocLPXz_U4xp87K4mVGehFKC6dgk_i5Ur7gspuD7gRBDvd0sanJ9Ybr_6s2hZhrpad-2WFwWqSNkh/p.png?fv_content=true&size_mode=5); background-position: 100% 40%;">
                            <p class="text-2xl text-green-900">Valuation <br><strong>$4000</strong></p>
                        </div>
                    </div>
                    <div class="mt-8 w-full">
                            <p class="text-2xl text-green-900 ">Projects Overview</p>
                            <br>
                            <x-dashboard-project-completed />
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <!-- Your additional content goes here -->
    </div>
</x-app-layout>
