<x-layout title="Editar Séries '{!!$serie->nome!!}'">
    <x-series.form :action="route('series.update', $serie->id)" :nome="$serie->nome" :update="true"/>
</x-layout>