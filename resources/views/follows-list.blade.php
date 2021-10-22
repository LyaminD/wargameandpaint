<h3 class="mb-3 text-center"><b>Abonnements</b></h3>
<div class="container horizontal-scrollable text-center">
    <ul class="list-unstyled d-flex justify-content-center">
        @forelse (auth()->user()->follows as $user)
        <li class=" flex-column mx-2">
            <a href="{{ route('profil', $user) }}">
                <img src="{{ asset("images/$user->imageprofil") }}" alt="image de profil" height="80" class="rounded-circle">
                <p class="text-dark">{{ $user->pseudo }}</p>
            </a>
        </li>
        @empty
        <p>Aucun abonnement</p>
        @endforelse
    </ul>
</div>