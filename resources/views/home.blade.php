<x-layout>
    <main>
        <img class="min-h-screen object-cover" src="{{asset('/photos/plats/tartare_saumon_coriandre_2.jpeg')}}" alt="Tartare de saumon à la coriandre">
        <div class="min-h-screen w-full flex flex-col justify-around absolute top-24">
                <h2 class="sm:max-w-2xl md:text-6xl self-center text-white text-4xl text-center drop-shadow-2xl z-10">Une cuisine traditionnelle aux saveurs authentiques de la Savoie</h2>
                <button class="text-white text-lg bg-gold p-4 w-48 self-center z-10"><a href="#">Réserver</a></button>
        </div>
        <section class="sm:flex min-h-screen">
            <div>
                <p class="md:text-xl md:max-w-2xl text-lg text-center px-12">Le 3ème restaurant du célèbre chef Arnaud Michant a récemment ouvert ses portes à Chambéry pour vous proposer une expérience <span class="underline decoration-4 decoration-gold">gastronomique</span> à travers une cuisine <span class="underline decoration-4 decoration-gold">sans artifice.</span></p>

                <img class="sm:p-6 p-12" src="{{asset('/photos/personnel/cuisiniers_2.jpeg')}}" alt="l'équipe du restaurant">
            </div>
            {{-- <img class="sm:w-10 p-12" src="/photos/personnel/chef_2.jpg" alt="chef Arnaud Michant"> --}}
        </section>
    </main>
</x-layout>