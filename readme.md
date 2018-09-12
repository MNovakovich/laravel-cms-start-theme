<h4>Laravel CMS</h4>

## pokretanje aplikacije:
   1) kreiranje baze
   2) konfiguristati .env fajl
   3) uraditi migraciju:
       ## php artisan migrate
   4) u fajlu database/seeds/AdminsSeeder, uneti podatke za registraciju admina
   
   5) uraditi database seed
      ## php artisan db:seed
   
   Ako zeliti da popunite ostale tabele sa nasumicnim podacima kako biste testirali aplikaciju, 
   u fajlu  <h5> database/seeds/DatabaseSeeder</h4>  otkomentarisite  funkcije, a zatim uradite:
  ## php artisan migrate:refresh 
  ## php artisan db:seed
    
