<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            メモ一覧
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- 新規作成ボタン -->
        <a href="{{ route('memo.create') }}" class="px-4 py-2 bg-blue-600 text-white font-medium rounded shadow hover:bg-blue-700 mb-4 inline-block">
            新規作成
        </a>

        <!-- メモ一覧 -->
        <div class="grid gap-4">
            @foreach($memos as $memo)
                <div class="p-4 bg-white border border-gray-200 shadow-sm rounded">
                    <h3 class="font-semibold text-gray-800 mb-2">{{ $memo->title }}</h3>
                    <p class="text-gray-700">{{ $memo->content }}</p>
                    @if($memo->image)
                        <img src="{{ Storage::disk('s3')->url($memo->image) }}" class="mt-2 w-full h-48 object-cover rounded border border-gray-200" />
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>