# Gamefy
Gamefy is a simple application built in Laravel that can fetch the games stored in IGDB database via API. It was created to learn more about HTTP client, Tailwind CSS, Livewire and Alpine.js.

## Setting the API key for IGDB
To create your own API key, you should follow the steps:

1. Sign Up with Twitch for a free account
2. Ensure you have Two Factor Authentication [enabled](https://www.twitch.tv/settings/security)
3. [Register](https://dev.twitch.tv/console/apps/create) your application
4. [Manage](https://dev.twitch.tv/console/apps) your newly created application
5. Generate a Client Secret by pressing [New Secret]
6. Take note of the Client ID and Client Secret

With your ClientID and ClientSecret, you can use [Insomnia](https://insomnia.rest/download/) to make a POST request to the access token endpoint: https://id.twitch.tv/oauth2/token

```
POST https://id.twitch.tv/oauth2/token?
    client_id=YOUR_CLIENT_ID
    &client_secret=YOUR_CLIENT_SECRET
    &grant_type=client_credentials
```

You should receive your access token in the request.
After getting the Access Token, simple add it to the IGDB parameters in **.env** file.

```
IGDB_API_ENDPOINT=https://api.igdb.com/v4/games
IGDB_CLIENT_ID=YOUR_CLIENT_ID
IGDB_TOKEN=YOUR_ACCESS_TOKEN
```
## Ready?
So that's it! You're ready to go!

## Testing
If you want to test the application, use the following command:

```
php artisan test
```