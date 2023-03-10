<x-layout>
    <main>
        <img class="min-h-screen object-cover" src="{{asset('/photos/plats/tartare_saumon_coriandre_2.jpeg')}}" alt="Tartare de saumon à la coriandre">
        <div class="sm:top-24 min-h-screen w-full flex flex-col justify-around absolute top-24" id="citation">
                <h2 class="sm:max-w-2xl md:text-6xl self-center text-white text-4xl text-center drop-shadow-2xl">Une cuisine traditionnelle aux saveurs authentiques de la Savoie</h2>
                <button class="text-white text-lg bg-gold p-4 w-48 self-center"><a href="#">Réserver</a></button>
        </div>
        <section class="mt-8">
            <div class="sm:flex sm:mx-[5%]">
                <div class="sm:w-1/2 p-8 w-full">
                    <img src="{{asset('/photos/personnel/cuisiniers_2.jpeg')}}" alt="l'équipe du restaurant">
                </div>
                <p class="sm:w-1/2 sm:mx-0 sm:mt-[5%] md:text-2xl lg:text-3xl text-center text-xl mx-7">Le 3ème restaurant du célèbre chef Arnaud Michant a récemment ouvert ses portes à Chambéry pour vous proposer une <span class="underline decoration-4 decoration-gold">expérience gastronomique</span> à travers une <span class="underline decoration-4 decoration-gold">cuisine sans artifice.</span></p>
            </div>
            <div class="sm:flex sm:mx-[5%]">
                <div class="sm:w-1/2">
                    <div class="p-8">
                        <img src="{{asset('/photos/plats/saumon_crozets_2.jpeg')}}" alt="saumon crozets">
                    </div>
                    <div class="p-8">
                        <img src="{{asset('/photos/plats/escargots_bourgogne.jpeg')}}" alt="escargots bourgogne">
                    </div>
                </div>
                <div class="sm:w-1/2">
                    <div class="p-8">
                        <img src="{{asset('/photos/plats/sots_ly_laisse.jpeg')}}" alt="sots l'y laisse">
                    </div>
                    <div class="p-8">
                        <img src="{{asset('/photos/plats/risotto.jpeg')}}" alt="risotto">
                    </div>
                </div>
            </div>
            <p class="sm:mx-[20%] md:text-2xl lg:text-3xl text-center text-xl mx-7">Des <span class="underline decoration-4 decoration-gold">produits locaux</span> pour un <span class="underline decoration-4 decoration-gold">goût unique</span>, vous êtes au bon endroit pour découvrir ou redécouvrir les saveurs de notre région.</p>
            <div class="flex flex-col mt-16 mb-8">
                <button class="hover:text-gold text-white text-lg bg-chocolate p-2 w-48 self-center mb-4"><a href="#">Voir la carte</a></button>
                <button class="hover:text-chocolate md:text-2xl lg:text-3xl text-white text-lg bg-gold p-4 w-48 self-center mb-2"><a href="#">Réserver</a></button>
            </div>
        </section>
    </main>
</x-layout>