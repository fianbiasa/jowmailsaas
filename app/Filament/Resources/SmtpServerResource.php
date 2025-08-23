<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmtpServerResource\Pages;
use App\Filament\Resources\SmtpServerResource\RelationManagers;
use App\Models\SmtpServer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SmtpServerResource extends Resource
{
    protected static ?string $model = SmtpServer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('hostname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ip_address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ssh_username')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('ssh_private_key')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('config_path')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
                Forms\Components\DateTimePicker::make('last_connection'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hostname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ip_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ssh_username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('config_path')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('last_connection')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSmtpServers::route('/'),
            'create' => Pages\CreateSmtpServer::route('/create'),
            'edit' => Pages\EditSmtpServer::route('/{record}/edit'),
        ];
    }
}
