<x-layout>
    <div class="max-w-full mt-8 mx-auto bg-white rounded-lg shadow-sm">
        <div class="text-center p-4 sm:p-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-t-lg">
            <h1 class="text-2xl sm:text-3xl font-bold">
                Rastreamento Encomenda
            </h1>
            <p class="mt-3 sm:mt-4 text-base sm:text-lg">
                Código de Rastreamento: <span class="font-semibold">{{ $frete->codigo_rastreio }}</span>
            </p>
            <p class="mt-2">
                Status:
                <span class="px-3 py-1 rounded-full {{ $frete->status->pegarCorEtiqueta() }}">
                    {{ $frete->status }}
                </span>
            </p>
            <p class="mt-2 text-sm sm:text-base">
                Destino: <span class="font-semibold">{{ $frete->destino }}</span>
            </p>
        </div>

        <div class="block sm:hidden divide-y divide-gray-200">
            @foreach ($frete->etapas as $etapa)
                <div class="px-4 py-3">
                    <p class="text-sm font-medium text-gray-900">{{ $etapa->descricao }}</p>
                    <p class="text-xs text-gray-500 mt-1">
                        {{ $etapa->created_at ? $etapa->created_at->format('d/m/Y H:i:s') : '-' }}
                    </p>
                </div>
            @endforeach
        </div>

        <table class="hidden sm:table w-full text-sm text-left">
            <thead>
                <tr class="border-b">
                    <th class="px-6 py-4 font-semibold text-gray-900">
                        Descrição
                    </th>
                    <th class="px-6 py-4 font-semibold text-gray-900">
                        Data
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($frete->etapas as $etapa)
                    <tr class="hover:bg-gray-50 transition-colors border-b">
                        <td class="px-6 py-4">
                            {{ $etapa->descricao }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $etapa->created_at ? $etapa->created_at->format('d/m/Y H:i:s') : '-' }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-layout>