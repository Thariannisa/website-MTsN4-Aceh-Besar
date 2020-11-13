# WebProfil

WebProfil merupakan projek dari mtsn 4 banda aceh

### Update (lakukan sintaks ini sekarang ya)

```
    $ composer update
```

### Test All Data (untuk faker)

```
    $ php spark db:seed AllSeeder
```

### Akun

```
email    : admin@gmail.com
password : admin1234
```

### Setup

Lakukan ini jika pertama kali mau clone repo

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
