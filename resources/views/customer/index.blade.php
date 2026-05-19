<x-app>


    <x-slot:title>
        {{ $title }}
    </x-slot>

    <ul class="list-group">
        @foreach ($customers as $customer)
            <li class="list-group-item">
                {{ $loop->iteration }}.
                {{ $customer->name }}--{{ $customer->email }}--{{ $customer->phone }}--{{ $customer->address }}--{{ $customer->join_date }}
            </li>
        @endforeach


    </ul>

</x-app>
