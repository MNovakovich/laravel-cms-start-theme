<h4>Laravel CMS</h4>

## pokretanje aplikacije:
   1) kreiranje baze
   2) konfiguristati .env fajl
   3) uraditi migraciju:
       <h5> php artisan migrate</h5>
   4) u fajlu database/seeds/AdminsSeeder, uneti podatke kako bismo registrovali admina:
      ( ako preskocite ovu stavku, automatski se mozete registrovati pomocu username: admin@gmail.com, password: 111111 )
   5) uraditi database seed
      <h5> php artisan db:seed <h5>
   
   Ako zeliti da popunite ostale tabele sa nasumicnim podacima kako biste testirali aplikaciju, 
   u fajlu  <h5> database/seeds/DatabaseSeeder</h4>  otkomentarisite  funkcije, a zatim uradite:
   <h5> php artisan migrate:refresh</h5> 
   <h5> php artisan db:seed </h5>
    
