<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageTitle ?? 'Beérkezett Üzenetek' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="text-2xl font-bold mb-6">Beérkezett Üzenetek Listája</h2>

                    @if($messages->isEmpty())
                        <p class="text-gray-500">Még nem érkezett üzenet.</p>
                    @else
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Küldő Neve
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Email
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Tárgy
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Üzenet (részlet)
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Küldés ideje
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $message->name }}
                                            </td>
                                            <td class="py-4 px-6">
                                                {{ $message->email }}
                                            </td>
                                            <td class="py-4 px-6">
                                                {{ $message->subject }}
                                            </td>
                                            <td class="py-4 px-6 max-w-xs truncate"> {{-- Csak az első pár szó --}}
                                                {{ Str::limit($message->message, 50) }}
                                            </td>
                                            <td class="py-4 px-6 whitespace-nowrap">
                                                {{-- Dátum formázása olvashatóbbra --}}
                                                {{ $message->created_at->format('Y-m-d H:i') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
