<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">
    @auth
    <a href="{{ route('series.create') }}" class="btn btn-light mb-4">Adicionar</a>
    @endauth

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    @foreach ($series as $serie)
    <div class="col mb-4">
        <div class="card h-100 bg-light text-black">
            <img src="{{ asset('storage/' . $serie->cover) }}" class="card-img-top img-fluid" style="object-fit: cover; height: 200px;" alt="{{ $serie->nome }}">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h5 class="card-title text-center">{{ $serie->nome }}</h5>
                @auth
                <a href="{{ route('seasons.index', $serie->id) }}" class="btn btn-dark">Ver Temporadas</a>
                @endauth
                <span class="d-flex justify-content-center mt-2"> <!-- Adicionando a classe justify-content-center -->
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-outline-dark btn-sm me-2"> <!-- Adicionando a classe me-2 para espaçamento -->
                        Editar 
                    </a>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm">
                            Excluir 
                        </button>
                    </form>
                </span>
            </div>
        </div>
    </div>
    @endforeach
</div>


        </li>
    </ul>
</x-layout>
