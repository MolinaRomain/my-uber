# TP - MyUBER

> Membres : Romain MOLINA & Dimitri ROMANO

# 1. Installation :
   - composer : `composer install`

# 2. Database :
   - `php artisan migrate:fresh`
   - `php artisan db:seed`

# 3 Requêtes : 
## API Client : 

### Ajouter des produits au panier :

Permet d'ajouter des articles au panier
Passer les arguments client_id et product_id en raw --> json

```
POST api/client/product
App\Http\Controllers\API\ClientController@addProduct
```

### Saisir adresse + numéro de tel

Rentre un nouvel utilisateur dans la base de données
Rentrer le client_id via raw --> json pour consulter valider la commande coté client

``` 
POST api/client/profile
App\Http\Controllers\API\ClientController@addProfile
```
### Valider la commande:

Permet de valider une commande grace au client_id, le rentrer dans raw --> json

``` 
GET|HEAD api/clients/order
App\Http\Controllers\API\ClientController@validateCart 
```

### Consulter l'état de sa commande

Rentrer le client_id via raw --> json pour consulter l'état de la commande

```
GET|HEAD  api/client
App\Http\Controllers\API\ClientController@statusOrder
```

## API Restaurant :

### Voir les commandes passées par les clients

Permet de voir les paniers validé par les client en "waiting"

```
GET|HEAD api/seller
App\Http\Controllers\API\SellerController@showOrders
```

### Traiter une commande (restaurant)

Permet de traiter une commande en attente, rentrer l'id et validation (accept/ready/refuse) via raw --> json

```
POST api/seller
App\Http\Controllers\API\SellerController@processOrder
```

## API Livreur :

### Voir les commandes à livrer

Permet de voir les commandes qui sont prête du côté restaurant

```
GET|HEAD api/shipper/order
App\Http\Controllers\API\ShipperController@showOrders
```


### Traiter une commande (livreur)

Permet de traiter une livraison en attente, rentrer l'id et validation (accept/shipped/refuse) via raw --> json

```
POST api/shipper
App\Http\Controllers\API\ShipperController@processOrder
```
 