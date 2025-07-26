@extends('admin.main_layout')

@section('head')

@endsection

@section('breadcrumbs')
<nav class="text-white text-sm" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex space-x-2">
        <li class="flex items-center">
            <a href="{{ route('admin.reports') }}" class="text-white">Report</a>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="text-white">
    <div class="bg-[#1c2541] p-3 rounded-md">
        <h2 class="text-lg font-semibold mb-3">Book Report</h2>
        <div class="overflow-auto">
            <table class="min-w-full border text-sm">
                <thead class="text-xs uppercase">
                    <tr class="border-b-1">
                        <th class="p-4">User</th>
                        <th class="p-4">Book</th>
                        <th class="p-4">Borrowed At</th>
                        <th class="p-4">Returned At</th>
                    </tr>
                </thead>
                <tbody class="text-xs text-center">
                    @forelse ($reports as $report)
                        <tr class="border-b-1">
                            <td class="p-4">{{ $report->user->name }}</td>
                            <td class="p-4">{{ $report->book->title }}</td>
                            <td class="p-4">{{ $report->borrow_date }}</td>
                            <td class="p-4">
                                {{ $report->return_date ? $report->return_date : 'Not yet returned' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-3">No borrow records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection