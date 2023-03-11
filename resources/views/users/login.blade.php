<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto my-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Connection</h2>
        </header>
    
        <form method="POST" action="/users/login">
            @csrf 
             <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">E-mail</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value={{old('email')}} >

                @error('email') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror 
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Mot de passe</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value={{old('password')}} >

                @error('password') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror 
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate"
                >
                    Se connecter
                </button>
            </div>
        </form>

        <p class="text-center">Vous n'avez pas de compte? <a href="/register" class="text-gold hover:text-chocolate">Inscription</a></p>
    </div>
</x-layout>