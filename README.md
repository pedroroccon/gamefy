# Gamefy
Gamefy is a simple application built in Laravel that can fetch the games stored in IGDB database via API. It was created to learn more about HTTP client, Tailwind CSS, Livewire and Alpine.js.

## Setting the API key for IGDB
You'll need an API key to test the application. You can create your own API key at the IGPD website: https://api.igdb.com/

After getting the API key, simple add it to the IGDB_KEY parameter in **.env** file.

```
IGDB_API_ENDPOINT=https://api-v3.igdb.com/games
IGDB_KEY=****
```
## Ready?
So that's it! You're ready to go!

## Testing
If you want to test the application, use the following command:

```
php artisan test
```