@extends('layouts.admin')

@section('content')
    <!-- Cabeçalho da Página -->
    <div class="content-header">
        <h2 class="content-title">Destinatários</h2>
        <div class="flex space-x-3 mt-4 md:mt-0">
            @can('index-recipient')
            <a href="{{ route('recipients.index') }}" 
                class="flex items-center px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-gray-700 hover:bg-gray-50 transition-all shadow-xs hover:shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Lista Completa
            </a>
            @endcan
        </div>
    </div><br>

    <x-alert />

    <!-- Formulário de Cadastro -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <form action="{{ route('recipients.store') }}" method="POST">
            @csrf

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Dados Básicos -->
                <div class="md:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Informações Básicas
                    </h3>
                </div>

                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome*</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="Nome do destinatário" required>
                </div>

                <div class="space-y-2">
                    <label for="cnpj" class="block text-sm font-medium text-gray-700">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj') }}"
                           class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="00.000.000/0000-00">
                </div>

                <!-- Endereço -->
                <div class="md:col-span-2 mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Endereço
                    </h3>
                </div>

                <div class="space-y-2">
                    <label for="cep" class="block text-sm font-medium text-gray-700">CEP*</label>
                    <div class="relative">
                        <input type="text" name="cep" id="cep" value="{{ old('cep') }}"
                               class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="00000-000" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="uf" class="block text-sm font-medium text-gray-700">UF*</label>
                    <input type="text" name="uf" id="uf" value="{{ old('uf') }}"
                           class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="UF" required maxlength="2">
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label for="public_place" class="block text-sm font-medium text-gray-700">Logradouro*</label>
                    <input type="text" name="public_place" id="public_place" value="{{ old('public_place') }}"
                           class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="Rua, Avenida, etc." required>
                </div>

                <div class="space-y-2">
                    <label for="number" class="block text-sm font-medium text-gray-700">Número*</label>
                    <input type="text" name="number" id="number" value="{{ old('number') }}"
                           class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="Número" required>
                </div>

                <div class="space-y-2">
                    <label for="complement" class="block text-sm font-medium text-gray-700">Complemento</label>
                    <input type="text" name="complement" id="complement" value="{{ old('complement') }}"
                           class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="Complemento">
                </div>

                <div class="space-y-2">
                    <label for="neighborhood" class="block text-sm font-medium text-gray-700">Bairro*</label>
                    <input type="text" name="neighborhood" id="neighborhood" value="{{ old('neighborhood') }}"
                           class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="Bairro" required>
                </div>

                <div class="space-y-2">
                    <label for="city" class="block text-sm font-medium text-gray-700">Cidade*</label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}"
                           class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="Cidade" required>
                </div>
            </div>

            <!-- Rodapé do Formulário -->
            <div class="px-6 py-4 border-t border-blue-200 bg-gray-50 flex justify-between">
                <div class="text-sm text-gray-500">
                    Campos marcados com * são obrigatórios
                </div>
                <button type="submit" 
                        class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors cursor-pointer">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
@endsection