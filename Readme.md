<h1>Bitirme Projesi</h1>
<h3>Haber Web Uygulaması Teknasyon için hazırlanmıştır</h3>
<p>
    [!image]
    Uygulamanın dizin yapısı bu şekildedir, 'Views' klasöründe frond-end için hazırlanan dosyalar bulunur, bu dosyalar dinamik hale getirmek için 'Http/Controller' klasörüne koyulan .basri.php dosyaları üstlenir. API yapısı oldukça basit :) uygulama içerisinde kullanılan haberler api(ara katman) yazılımıyla globele sunulur.
</p>


<h4>Views/Home.php</h4>
<p>
    Home.basri.php ile etkileşime girer veritabanındaki bütün post ve kategori bilgilerini çekip Home.php de gösterir
</p>

<h4>Views/Shuffle.php</h4>
<p>
    Shuffle.basri.php ile etkileşime girer, keşfet mantığı; Post.php'de olan herhangi bir haberi beğenmenizle başlayan küçük bir algoritmadır. örn; bir oyun kategori olan bir haberin detay kısmına girdiniz ve o postu beğendiniz, Shuffle.basri.php bir SQL komutu başlatır (INNER JOIN) sona size o kategoriyle alakalı max 10 post gösterir
</p>

<h4>Views/Login.php</h4>
<p>
    Login.basri.php ile etkileşime girer, basit bir login işlemi sunar, sitemde kayıt olma ekranı yoktur bu yüzden var olan hesaplar şunlardır;<br>
    
     
</p>
<span>
    isim : <b>basri</b> şifre : <b>123</b>
</span>
<br>
<span>
    isim : <b>hasan</b> şifre : <b>321</b>
</span>
<br>
<span>
    isim : <b>teknasyon şifre : <b>231</b>
</span>

<h4>Views/Post.php</h4>
<p>
    Post.basri.php ile etkileşime girer, Get ile gelen isteğe göre haberin detayını gösterir, içeriinde yorum(isteğe göre anonim) yapma, postu beğenme veya beğenmeme (bu keşfet sayfasını oluşurur).  
</p>

<h4>Admin/Admin.php</h4>
<p>
    Admin.basri.php ile etkileşime girer, içerisinde admin, modarator ve editör'e göre bir işlem ekranı sunar, bu ekranda kullanıcıların silme isteğini, haber ekleme, haber, yorum gösterme gibi ekranlar sunar
</p>

<h4>Admin/IManageAdmin.basri.php</h4>
<p>
    Admin anasayfası için gereklilikleri bize sunar
</p>

<h4>Admin/Login.php</h4>
<p>
    Login.basri.php ile etkileşime geçer, basit bir işlemi vardır, veritabanındaki isme göre admin mi? editör mü? modarator mü? durumuna göre bir session başlatır ve bu duruma göre ekran açar. Yönetici için bir kayıt ol ekranı yoktur o yüzden var olan hesaplar şunlardır;

</p>

<span>
    isim : <b>teknasyon şifre : <b>963852741</b>
</span>
<span>
    isim : <b>Basri</b> şifre : <b>789654258</b>
</span>
<br>
<span>
    isim : <b>Hasan - editör (!hatalı)</b> şifre : <b>159753852</b>
</span>
<br>

<span>
    veritabanı bilgilerine ulaşmak için sql dosyasında bulunan .sql tablolarını 'news' veritabanı altına ekleyiniz 
</span>
<br>
<h4>Yapılışı (Windows işletim sistemi için)</h4>
<span>
    bu repodaki sql dosyasında bulunan .sql dosyalarını "news" veritabanına(yoksa oluştur) "içe aktar" diyerek aktarabilir ve kullanabilirsiniz
</span>




