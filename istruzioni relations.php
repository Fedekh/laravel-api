Scaffolding with auth:

1. Creare il progetto: composer create-project laravel/laravel:^9.2 nome-progetto
2. composer require laravel/breeze --dev
3. php artisan breeze:install (Autenticazione: Controllers, Views, Routes)
    - domande nel terminale, da sceglire: blade; no; no.
4. composer require pacificdev/laravel_9_preset
5. php artisan preset:ui bootstrap --auth (installa bootstrap, sass e sostituisce le views in modalità nella quale lavoriamo)
6. npm i
7. php artisan serve
   npm run dev 
8. Creare il database e settare i dati nel file .env
9. php artisan migrate
_________________________________________

CREARE DASHBOARD DELL'ADMIN
10. Creare controller Admin/DashboardController
11. Nel web.php impostare la rotta per la dashboard sotto la protezione del middleware
12. Nel app/Providers/RouteServiceProvider impostare HOME = '/admin' 
13. Creare il layout admin.blade.php 
14. Creare la view admin/dashboard.blade.php
15. Creare la funzione index nel controller per restituire la view admin.dashboard

___________________________________________

CREARE LE MIGRATION, SEEDER E CRUD DEL PRIMO MODEL

___________________________________________

CLONARE IL PROGETTO NELLA NUOVA REPO

- Clone della repository tramite VSCode
- Cambiare il nome della cartella a quello della repo corrente
- Scollegare remote origin
- Creare una nuova repo su github
- Seguo le istruzioni da github per collegare la nuova repo tramite il terminale
- Installo le dipendenza: composer install; npm i
- Creo il file .env.
    Per collegare allo stesso DB del vecchio progetto possiamo prendere la key dal .env del vecchio progetto
    Altrimenti posso creare un nuovo DB, far partire migratio e seeder. In questo caso dobbiamo generare una key nuova php artisan key:generate
- Faccio partire i server: php artisan serve & npm run dev
- Controllo che tutte le CURD funzionano
___________________________________________

PER LE RELAZIONI ONE TO MANY

https://laravel.com/docs/9.x/eloquent#generating-model-classes

- Creare la migration della nuova tabella (Categories)
- Create la migration per la FK (Nella tabella dipendente: Posts) 
    -> nel UP:aggiungo la colonna e aggiungo foreign  
    -> nel DOWN: toldo foreign, tolgo la colonna
- Creare Model della nuova tabella (Category)
- Opzionale: Creare seeder per la nuova tabella (CategorySeeder)
- Collegare i model: 
    -> Nel model della tabella principale hasMany
    -> Nel model della tabella secondaria belongsTo
- Aggiungiamo nelle CRUD i collegamenti alla nuova tabella
    -> nel index e show: visualizziamo il valore ($post->category?->name)
    -> nel create, edit: preleviamo tutte le category e li passiamo alla view -> tramite foreach generiamo le otions del select
    -> nel store, update: nel Request aggiungiamo le regole di validazione per il nuovo dato (category_id)

___________________________________________________