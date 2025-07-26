@extends('user.main_layout')

@section('head')

@endsection

@section('breadcrumbs')
<nav class="text-white text-sm" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex space-x-2">
        <li class="flex items-center">
            <a href="{{ route('users.history') }}" class="text-white">History</a>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="text-white bg-[#1c2541] p-5 rounded">

    <div class="border border-b-0 text-sm text-left">

        <table class="table-auto min-w-full text-sm text-left text-white">
            <thead class="text-xs uppercase">
                <tr class="border-b-1">
                    <th class="p-4">Book Code</th>
                    <th class="p-4">Title</th>
                    <th class="p-4">Genre</th>
                </tr>
            </thead>
            <tbody class="text-xs">
               @forelse ( $history as $borrow)
                <tr class="border-b-1">
                    <td class="p-4">{{ $borrow->book->book_code}}</td>
                    <td class="p-4">
                        <div class="flex flex-col space-y-1">
                            <div class="font-bold">
                                {{ $borrow->book->title}}
                            </div>
                            <div>
                                {{ $borrow->book->author}}
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        {{ $borrow->book->genre}}
                    </td>
                </tr>
                @empty
                <tr class="text-center border-b-1">
                    <td colspan="3" class="p-4">No data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

@section('scripts')

@endsection