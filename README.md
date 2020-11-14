# Website MTsN 4 Aceh Besar

Sistem Informasi berbasis website pada MTsN 4 Aceh Besar

### Update

```
    $ composer update
```

### Test All Data (untuk faker)

```
    $ php spark db:seed AllSeeder
```

### Akun

```
(Lihat Pada File AkunSeeder)

```

### Setup

Lakukan ini jika pertama kali clone repo

1. Install [composer](https://getcomposer.org/)
2. Clone repo
3. Install dependencies

```

    $ composer install

```

4. Buat file .env di terminal wsl -> `$ bash`

```

    $ cp env .env

```

### How to run

```

    $ php spark serve

```

### Add Table

```

    $ php spark migrate:create [nama tabel]

```

### Drop Table

```

    $ php spark migrate:rollback

```

```

```
