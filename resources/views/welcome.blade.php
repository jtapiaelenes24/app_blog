<x-app-layout>
    @include('mimenu')

    <section class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="mt-16">
            <div>
                @livewire('show-post')
            </div>
        </div>
    </section>

    <footer class="mt-10 mb-3 p-2 bg-white">
        <div class="md:flex justify-center sm:items-center sm:justify-between max-w-6xl mx-auto">
            <div class="text-center text-sm text-gray-500 sm:text-left">
                <div class="md:flex items-center gap-4 mb-2 md:mb-0">
                    <p>©Copyright 2025 - Jordi Tapia</p>
                    <p>Desarrollador Web</p>
                </div>
            </div>

            <div class="ml-4 text-center text-lg text-gray-500 sm:text-right space-x-5">
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-instagram"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
            </div>

        </div>
    </footer>

</x-app-layout>
