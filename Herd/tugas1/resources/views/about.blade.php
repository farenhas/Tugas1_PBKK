<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl"> Ini adalah halaman About!</h3>
    <p>Nama: {{ $name }}</p>
    <p>Program Studi: {{ $major }}</p>
    <p>NRP: {{ $major_id }}</p>
</x-layout>