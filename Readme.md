<h1>Bitirme Projesi</h1>
<h3>Haber Web Uygulaması Teknasyon için hazırlanmıştır</h3>
<p>
    [!image]
    Uygulamanın dizin yapısı bu şekildedir, 'Views' klasöründe frond-end için hazırlanan dosyalar bulunur, bu dosyalar dinamik hale getirmek için 'Http/Controller' klasörüne koyulan .basri.php dosyaları üstlenir. API yapısı oldukça basit :) uygulama içerisinde kullanılan haberler api(ara katman) yazılımıyla globele sunulur.
</p>

<h4>Home.php</h4>
<p>
    Home.basri.php ile etkileşime girer veritabanındaki bütün post ve kategori bilgilerini çekip Home.php de gösterir
</p>

<h4>Shuffle.php</h4>
<p>
    Shuffle.basri.php ile etkileşime girer, keşfet mantığı; Post.php'de olan herhangi bir haberi beğenmenizle başlayan küçük bir algoritmadır. örn; bir oyun kategori olan bir haberin detay kısmına girdiniz ve o postu beğendiniz, Shuffle.basri.php bir SQL komutu başlatır (INNER JOIN) sona size o kategoriyle alakalı max 10 post gösterir
</p>

<h4>Login.php</h4>
<p>
    Login.basri.php ile etkileşime girer, basit bir login işlemi sunar, sitemde kaıt olma ekranı yoktur bu yüzden var olan hesaplar şunlardır;<br>
    
     
</p>
<span>
    isim : basri şifre : 123
</span>
<span>
    isim : hasan şifre : 321
</span>
<span>
    isim : teknasyon şifre : 231
</span>
