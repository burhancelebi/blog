Veritabanı dosyanın içindedir.

" composer require burhancelebi/blog " komutunu çalıştır.

Paket composer'dan eklendiğinde yapılacaklar.

- config/app.php dosyasında provider dizisine "Celebi\Commands\BlogServiceProvider::class," eklenmeli.
- config/app.php dosyasında aliases dizisine 'Blogs' => Celebi\Commands\Facades\Routes::class, eklenmeli.
- " php artisan config:cache " komutunu çalıştırınız.
- " php artisan blog:builder " komutunu çalıştırınız.
- bu işlemlerden sonra admin panelde , içerik yönetiminin altında blog crud işlemleri için gerek formlar ve liste 
    gelecektir. Aynı zamanda kullanıcı arayüzünde de makaleler adlı link gelecektir.

- Bir view dosyası oluşturmak için gereken komut : php artisan make:view viewname

- http://package.test/login sayfasından Email : burhan.celebi.2112@gmail.com , Şifre : burhan21 
bilgileri ile giriş yapınız.

- Admin paneli linki : http://package.test/bpanel


- Kullanıcı yetkileri policy ile yapıldı .
- Admin herşeyi yapabilir .
- Moderatör Ekleme ve güncelleme yapabilir.
- Editör sadece güncelleme yapabilir.