<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メモ帳ホーム
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- メモ一覧 -->
            <a href="{{ route('memo.index') }}" class="p-6 bg-white shadow-sm rounded-lg hover:bg-gray-100">
                メモ一覧
            </a>

            <!-- 新規メモ作成 -->
            <a href="{{ route('memo.create') }}" class="p-6 bg-white shadow-sm rounded-lg hover:bg-gray-100">
                新規メモ作成
            </a>

            <!-- 設定など -->
            <a href="{{ route('profile.edit') }}" class="p-6 bg-white shadow-sm rounded-lg hover:bg-gray-100">
                設定
            </a>
        </div>
    </div>
</x-app-layout>