<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メモ作成
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('memo.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 shadow rounded">
            @csrf
            <div>
                <x-input-label for="title" :value="'タイトル'" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="content" :value="'内容'" />
                <textarea id="content" name="content" class="mt-1 block w-full rounded border-gray-300 p-2" rows="5"></textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="image" :value="'画像'" />
                <input id="image" name="image" type="file" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <x-primary-button>
                保存
            </x-primary-button>
        </form>
    </div>
</x-app-layout>