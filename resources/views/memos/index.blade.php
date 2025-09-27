<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メモ一覧
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('memo.create') }}" class="px-4 py-2 bg-indigo-500 text-white rounded mb-4 inline-block">新規作成</a>

        <div class="grid gap-4">
            @foreach($memos as $memo)
                <div class="p-4 bg-white shadow rounded">
                    <h3 class="font-bold">{{ $memo->title }}</h3>
                    <p>{{ $memo->content }}</p>
                    @if($memo->image)
                        <img src="{{ Storage::disk('s3')->url($memo->image) }}" class="mt-2 w-full h-48 object-cover rounded" />
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>