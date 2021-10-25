<h3 class="mb-3 text-center"><b>Abonnements</b></h3>
<div class="container horizontal-scrollable text-center">
    <ul class="list-unstyled d-flex justify-content-center">

        <div class="scrollmenu">
            @forelse (auth()->user()->follows as $user)
            <a href="{{ route('profil', $user) }}">
                <img src="{{ asset("images/$user->imageprofil") }}" alt="image de profil" height="80" class="rounded-circle">
                <p class="text-white">{{ $user->pseudo }}</p>
            </a>
            @empty
            <p>Aucun abonnement</p>
            @endforelse
        </div>
    </ul>
</div>