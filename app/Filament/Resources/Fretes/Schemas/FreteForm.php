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
                TextInput::make('origem')
                    ->required(),
                TextInput::make('destino')
                    ->required(),
                TextInput::make('codigo_rastreio')
                    ->required(),
                Select::make('status')
                    ->options(FreteStatus::class)
                    ->required(),
                TextInput::make('remetente_id')
                    ->label('Remetente')
                    ->required()
                    ->numeric(),
                TextInput::make('destinatario_id')
                    ->label('Destinatário')
                    ->required()
                    ->numeric(),
            ]);
    }
}
