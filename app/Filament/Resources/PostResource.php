<?php


namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('posts')
                    ->disk('public'), // Ensure it's stored in the public disk
                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->disabled(!auth()->user()?->isAdmin()), // Disable for non-admins
                // Hidden field for user_id, pre-filled with authenticated user's ID
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()) // Automatically sets the user_id to the authenticated user's ID
                    ->required(),  // Ensure it is required if you want it to be mandatory
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->query(fn() => auth()->user()?->isAdmin()
                ? Post::query()
                : Post::where('user_id', auth()->id()))
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\IconColumn::make('is_active')->label('Published')->boolean(),
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->url(fn($record) => $record->image ? asset('storage/' . $record->image) : ''),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Creator')
                    ->sortable()
                    ->searchable(),
            ])
            ->actions([Tables\Actions\EditAction::make()])
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}

