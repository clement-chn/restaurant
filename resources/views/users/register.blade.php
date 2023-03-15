<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto my-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Inscription</h2>
        </header>
    
        <form method="POST" action="/users">
            @csrf 
             <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">E-mail</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" >

                @error('email') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror 
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Mot de passe</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="{{old('password')}}" >

                @error('password') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror 
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">Confirmer mot de passe</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" >

                @error('password_confirmation') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror 
            </div>

            <div class="mb-6">
                <label for="number" class="inline-block text-lg mb-2">Nombre de personnes par défaut</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="number" value="{{old('number')}}" min="1">

                @error('number') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="text" class="inline-block text-lg mb-2">Des allergies?</label>
                <input type="text" placeholder="ex: lactose, arachides..." class="border border-gray-200 rounded p-2 w-full" name="allergies" value="{{old('allergies')}}" >
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate"
                >
                    S'inscrire
                </button>
            </div>
        </form>

        <p class="text-center">Vous avez déjà un compte? <a href="/login" class="text-gold hover:text-chocolate">Se connecter</a></p>
    </div>
</x-layout>