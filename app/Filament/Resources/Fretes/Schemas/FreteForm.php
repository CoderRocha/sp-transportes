<?php

namespace App\Filament\Resources\Fretes\Schemas;

use App\Enums\FreteStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FreteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('codigo_rastreio')
                    ->label('Código da Rastreio')
                    ->readonly()
                    ->hidden(fn ($record) => !$record || !$record->codigo_rastreio),
                TextInput::make('status')
                    ->readonly()
                    ->hidden(fn ($record) => !$record || !$record->status),
                TextInput::make('origem')
                    ->required(),
                TextInput::make('destino')
                    ->required(),
                Select::make('remetente_id')
                    ->label('Remetente')
                    ->relationship('remetente', 'nome')
                    ->required(),
                Select::make('destinatario_id')
                    ->label('Destinatário')
                    ->relationship('destinatario', 'nome')
                    ->required(),
            ]);
    }
}
