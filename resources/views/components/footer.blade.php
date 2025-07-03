<footer class="bg-[#176b98] py-10 px-4 text-[#FEBE35]">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Quick Links -->
        <div>
            <h4 class="font-bold border-b-2 border-[#FEBE35] inline-block mb-4">{{ __('messages.quick links') }}</h4>
            <ul class="space-y-2 text-gray-100">
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.home') }}</a></li>
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.Courses') }}</a></li>
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.certificates') }}</a></li>
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.services') }}</a></li>
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.specialists') }}</a></li>
            </ul>
        </div>

        <!-- Support & Contact -->
        <div>
            <h4 class="font-bold border-b-2 border-[#FEBE35] inline-block mb-4">{{ __('messages.SupportContact') }}</h4>
            <ul class="space-y-2 text-gray-100">
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.who are we') }}</a></li>
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.contact') }}</a></li>
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.Copyrigth') }}</a></li>
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.Terms') }}</a></li>
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.privacy') }}</a></li>
                <li><a href="#" class="hover:text-[#FEBE35]">{{ __('messages.help') }}</a></li>
            </ul>
        </div>

        <!-- Social & App Info -->
        <div class="text-center md:text-left">
            <div class="mb-4">
                <img src="{{ asset('images/footer.png') }}" alt="Oxford Logo"
                    class="w-24 mx-auto md:mx-0 mb-2 rounded-full">
                <p class="font-semibold text-gray-100">{{ __('messages.Follow us') }}</p>
                <div class="flex justify-center md:justify-start gap-4 mt-2 text-xl">
                    <a href="#"><i class="text-[#F04A22] fab fa-facebook-square"></i></a>
                    <a href="#"><i class="text-[#FEBE35] fab fa-instagram"></i></a>
                    <a href="#"><i class="text-[#F04A22] fab fa-youtube"></i></a>
                    <a href="#"><i class="text-[#FEBE35] fab fa-linkedin"></i></a>
                </div>
            </div>

            <p class="text-sm text-gray-100 mb-2">{{ __('messages.learn anythime') }}</p>
            <div class="flex justify-center md:justify-start gap-4 mb-4">
                <a href="#"><img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/512px-Google_Play_Store_badge_EN.svg.png"
                        alt="Google Play" class="w-32"></a>
                <a href="#"><img
                        src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg"
                        alt="App Store" class="w-28"></a>
            </div>

            <p class="text-sm text-gray-100">{{ __('messages.All rigths') }}</p>
        </div>
    </div>
</footer>
