<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LampiranResource\Pages;
use App\Filament\Resources\LampiranResource\RelationManagers;
use App\Models\Lampiran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LampiranResource extends Resource
{
    protected static ?string $model = Lampiran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lampiran')
                    ->required()
                    ->label('Nama Lampiran'),

                Forms\Components\TextInput::make('ukuran')
                    ->required()
                    ->label('Ukuran (KB)')
                    ->numeric(),

                Forms\Components\Select::make('tipe_lampiran')
                    ->required()
                    ->label('Tipe Lampiran')
                    ->options([
                        'gambar' => 'Gambar',
                        'dokumen' => 'Dokumen',
                        'lainnya' => 'Lainnya',
                    ]),

                Forms\Components\Toggle::make('status')
                    ->label('Status'),

                Forms\Components\FileUpload::make('path_gambar')
                    ->label('Path Gambar')
                    ->nullable(),

                Forms\Components\FileUpload::make('file_lampiran')
                    ->label('File Lampiran')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lampiran')
                    ->label('Nama Lampiran')
                    ->sortable(),

                Tables\Columns\TextColumn::make('ukuran')
                    ->label('Ukuran (KB)')
                    ->sortable(),

                Tables\Columns\TextColumn::make('tipe_lampiran')
                    ->label('Tipe Lampiran')
                    ->sortable(),

                Tables\Columns\BooleanColumn::make('status')
                    ->label('Status'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                // You can add filters here if needed
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
            // Define any relationships here if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLampirans::route('/'),
            'create' => Pages\CreateLampiran::route('/create'),
            'edit' => Pages\EditLampiran::route('/{record}/edit'),
        ];
    }
}
