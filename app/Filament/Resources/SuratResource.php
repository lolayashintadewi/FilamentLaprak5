<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratResource\Pages;
use App\Filament\Resources\SuratResource\RelationManagers;
use App\Models\Surat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratResource extends Resource
{
    protected static ?string $model = Surat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_surat')
                    ->required()
                    ->label('Nomor Surat'),

                Forms\Components\TextInput::make('kode_surat')
                    ->required()
                    ->label('Kode Surat')
                    ->numeric(),

                Forms\Components\Select::make('jenis_surat')
                    ->required()
                    ->label('Jenis Surat')
                    ->options([
                        'resmi' => 'Resmi',
                        'pribadi' => 'Pribadi',
                        'undangan' => 'Undangan',
                    ]),

                Forms\Components\Toggle::make('status')
                    ->label('Status'),

                Forms\Components\FileUpload::make('lampiran')
                    ->label('Lampiran')
                    ->nullable(),

                Forms\Components\FileUpload::make('file_surat')
                    ->label('File Surat')
                    ->nullable(),

                Forms\Components\DatePicker::make('tanggal_dikirim')
                    ->required()
                    ->label('Tanggal Dikirim'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kode_surat')
                    ->label('Kode Surat')
                    ->sortable(),

                Tables\Columns\TextColumn::make('jenis_surat')
                    ->label('Jenis Surat')
                    ->sortable(),

                Tables\Columns\BooleanColumn::make('status')
                    ->label('Status'),

                Tables\Columns\TextColumn::make('tanggal_dikirim')
                    ->label('Tanggal Dikirim')
                    ->date()
                    ->sortable(),

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
            'index' => Pages\ListSurats::route('/'),
            'create' => Pages\CreateSurat::route('/create'),
            'edit' => Pages\EditSurat::route('/{record}/edit'),
        ];
    }
}
