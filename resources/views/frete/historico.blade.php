<x-layout>
    <div class="text-center p-4 sm:p-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-t-lg">
        <h1 class="text-2xl sm:text-3xl font-bold">
            Histórico de encomendas
        </h1>
        <p class="mt-3 sm:mt-4 text-base sm:text-lg">
            Cliente: {{ $cliente->nome }}
        </p>
    </div>

    <div class="max-w-full mt-8 mx-auto bg-white rounded-lg shadow-sm">
        <div class="text-center p-4 sm:p-6">
            <h1 class="text-xl sm:text-2xl font-semibold text-gray-800">
                Itens enviados
            </h1>
        </div>

        <div class="block sm:hidden divide-y divide-gray-200">
            @foreach ($cliente->enviados as $frete)
                <div class="px-4 py-3">
                    <a href="{{ route('frete.rastreamento', ['codigo_rastreio' => $frete->codigo_rastreio]) }}" target="_blank" class="underline font-semibold text-blue-600 text-sm">
                        {{ $frete->codigo_rastreio }}
                    </a>
                    <p class="text-xs text-gray-600 mt-1">
                        {{ $frete->origem }} → {{ $frete->destino }}
                    </p>
                    <div class="mt-2">
                        <span class="px-2 py-1 rounded-full text-xs {{ $frete->status->pegarCorEtiqueta() }}">
                            {{ $frete->status }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <table class="hidden sm:table w-full text-sm text-left">
            <thead>
                <tr class="border-b">
                    <th class="px-6 py-4 font-semibold text-gray-900">
                        Código de rastreamento
                    </th>
                    <th class="px-6 py-4 font-semibold text-gray-900">
                        Origem
                    </th>
                    <th class="px-6 py-4 font-semibold text-gray-900">
                        Destino
                    </th>
                    <th class="px-6 py-4 font-semibold text-gray-900">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente->enviados as $frete )
                    <tr class="hover:bg-gray-50 transition-colors border-b">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('frete.rastreamento', ['codigo_rastreio' => $frete->codigo_rastreio]) }}" target="_blank" class="underline">
                            {{ $frete->codigo_rastreio }}
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $frete->origem }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $frete->destino }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 rounded-full {{ $frete->status->pegarCorEtiqueta() }}">
                            {{ $frete->status}}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="max-w-full mt-8 mx-auto bg-white rounded-lg shadow-sm">
        <div class="text-center p-4 sm:p-6">
            <h1 class="text-xl sm:text-2xl font-semibold text-gray-800">
                Itens Recebidos
            </h1>
        </div>

        <div class="block sm:hidden divide-y divide-gray-200">
            @foreach ($cliente->recebidos as $frete)
                <div class="px-4 py-3">
                    <a href="{{ route('frete.rastreamento', ['codigo_rastreio' => $frete->codigo_rastreio]) }}" class="underline font-semibold text-blue-600 text-sm">
                        {{ $frete->codigo_rastreio }}
                    </a>
                    <p class="text-xs text-gray-600 mt-1">
                        {{ $frete->origem }} → {{ $frete->destino }}
                    </p>
                    <div class="mt-2">
                        <span class="px-2 py-1 rounded-full text-xs {{ $frete->status->pegarCorEtiqueta() }}">
                            {{ $frete->status }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <table class="hidden sm:table w-full text-sm text-left">
            <thead>
                <tr class="border-b">
                    <th class="px-6 py-4 font-semibold text-gray-900">
                        Código de rastreamento
                    </th>
                    <th class="px-6 py-4 font-semibold text-gray-900">
                        Origem
                    </th>
                    <th class="px-6 py-4 font-semibold text-gray-900">
                        Destino
                    </th>
                    <th class="px-6 py-4 font-semibold text-gray-900">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente->recebidos as $frete )
                    <tr class="hover:bg-gray-50 transition-colors border-b">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('frete.rastreamento', ['codigo_rastreio' => $frete->codigo_rastreio]) }}" class="underline">
                            {{ $frete->codigo_rastreio }}
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $frete->origem }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $frete->destino }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 rounded-full {{ $frete->status->pegarCorEtiqueta() }}">
                            {{ $frete->status}}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>