# FAQ
FAQ è un sistema di gestione di domande e risposte suddivise per categorie e catalogate tramite TAG
## INSTALLARE
1. Inserire la cartella FAQ dentro la cartella di root (www UniServerZ)
2. Creare un'utenza in phpmyadmin e modificare le variabili globali in php/DBManager.php

```php
    //CREDENZIALI DATABASE, MODIFICARE QUANDO INSTALLATE SU UNA NUOVA MACCHINA
    $servername = //SOMETHING
    $username= //SOMETHING
    $password= //SOMETHING
    $dbname= //SOMETHING
```
## BUG FIX
* Aggiornamento della sicurezza
* Incremento della velocità su macchina locale
* Miglioramento della ricerca (ricerca anche di una parte centrale del titolo)
## TODO list
1. Db -> FATTO
2. Struttura sito -> FATTO
3. Login -> FATTO
4. Dal + Gestione database -> FATTO
5. Admin control -> FATTO
6. Divisione in categorie -> FATTO
7. Riempimento db -> FATTO
8. Ricerca -> FATTO
9. Url Rewrite -> FATTO (ci ho provato)