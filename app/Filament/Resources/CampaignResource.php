<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignResource\Pages;
use App\Filament\Resources\CampaignResource\RelationManagers;
use App\Models\Campaign;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('domain_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('email_list_id')
                    ->email()
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('from_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('from_email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('reply_to')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('draft'),
                Forms\Components\DateTimePicker::make('scheduled_at'),
                Forms\Components\TextInput::make('total_recipients')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('sent_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('opened_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('clicked_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('bounced_count')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('domain_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email_list_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\TextColumn::make('from_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('from_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reply_to')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('scheduled_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_recipients')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sent_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('opened_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clicked_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bounced_count')
                    ->numeric()
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
            'index' => Pages\ListCampaigns::route('/'),
            'create' => Pages\CreateCampaign::route('/create'),
            'edit' => Pages\EditCampaign::route('/{record}/edit'),
        ];
    }
}
