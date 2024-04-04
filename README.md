# LARAVEL-ONE-TO-MANY

# TRACCIA

I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
- creare la migration per la tabella types
- creare il model Type
- creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
- aggiungere ai model Type e Project i metodi per definire la relazione one to many
- visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
- permettere all'utente di associare una tipologia nella pagina di creazione e modifica di un progetto
- gestire il salvataggio dell'associazione progetto-tipologia con opportune regole di validazione

### Bonus 1:
creare il seeder per il model Type.

### Bonus 2:
aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.


## Init project

Per il frontend:

```
npm install
npm run dev
```

Per il backend:

```
composer install
php artisan serve
php artisan key:generate
```

Poi copia il file `.env.example` in `.env` e configura la connessione al DB

## DB migration

```
php artisan migrate
```

## DB seed


```
php artisan db:seed
```