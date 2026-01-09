<?php

namespace App\Filament\Resources\Fretes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FreteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('origem'),
                TextEntry::make('destino'),
                TextEntry::make('codigo_rastreio'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('remetente.nome')
                    ->numeric(),
                TextEntry::make('destinatario.nome')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->label('Data de Criação')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Data de Últ. Atualização')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
