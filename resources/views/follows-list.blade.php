<h3 class="mb-3"><b>Abonnements</b></h3>

<ul class="list-unstyled">

    @forelse (auth()->user()->follows as $user)

    <li>

        <a href="{{ route('profil', $user) }}">
            <img src="{{ asset("images/$user->imageprofil") }}" alt="" height="80" class="rounded-circle">

            <p class="text-dark">{{ $user->pseudo }}</p>
        </a>

    </li>

    @empty
    <p>Aucun abonnement</p>

    @endforelse

</ul>