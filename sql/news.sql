-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Eki 2021, 22:32:12
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `news`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `name` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `duty`, `name`, `password`) VALUES
(1, 'admin', 'Teknasyon', '963852741'),
(2, 'modarator', 'Basri', '789654258'),
(3, 'editor', 'Hasan', '159753852');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Yazılım'),
(2, 'Magazin'),
(3, 'Finans'),
(4, 'Oyun');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(155) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `is_anonim` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `user_name`, `comment`, `is_anonim`) VALUES
(1, 12, 1, 'basri', 'DDOS çok kötü bir olay daha önce başıma gelmişti', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `name` varchar(155) NOT NULL,
  `image` varchar(155) NOT NULL,
  `text` text NOT NULL,
  `category_id` tinyint(1) NOT NULL,
  `comment_id` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `name`, `image`, `text`, `category_id`, `comment_id`, `is_active`) VALUES
(1, 'Fintech girişimi Maslak Teknoloji AŞ, Teknasyon’dan yatırım aldı', 'sds.png', 'Teknasyon, kurucuları arasında Mikro Ödeme kurucularından Alper Akcan’ın da bulunduğu ve açık bankacılık alanında faaliyet gösteren fintech girişimi Maslak Teknoloji AŞ’ye yatırım yaptı ve hem Türkiye hem de uluslararası pazarlarda büyümesine stratejik destek olmak amacıyla Rockads global büyüme programına dâhil etti.\r\n\r\nMaslak Teknoloji AŞ; Türk girişimciler Alper Akcan, Tolga Ulutaş ve Emre Hayretci tarafından açık bankacılık alanında faaliyet göstermek üzere yaklaşık bir yıl kadar önce kuruldu. Fintech sektöründe çalışmalarını yürüten Maslak Teknoloji’nin hedefi, hem bireyler hem de kurumlar için ürettiği servislerle Türkiye’de pazar lideri olmaktan öte özellikle BaaS ve dijital bankacılık alanlarında Avrupa’da söz sahibi olmak.\r\n\r\nTeknasyon, Maslak Teknoloji’ye sunduğu finansal desteğin yanında Rockads global büyüme programı dahilinde Türkiye ve yurt dışı pazarlarda tanıtılacak ürünlerde kullanıcı kazanımı, pazarlama, müşteri hizmetleri gibi alanlarda da destek olacak. Hâlihazırda 100’den fazla girişimin bulunduğu Rockads global büyüme programının 60 kişilik tecrübeli ekibi; programa dâhil olan girişimlere sürdürülebilir bir büyüme performansı sağlamaları ve pozisyonlarını sağlamlaştırmaları için sektör öngörüleri, rakip analizleri, hedef pazarların tespiti, kreatif hazırlığı, monetizasyon, müşteri yaşam ömrü ve kârlılıkların artırılması gibi alanlarda danışmanlık veriyor.', 3, 0, 1),
(2, 'Panteon, yeni oyunu için Teknasyon kurucu ortaklarından 10 milyon dolarlık fon sağladı', 'pang.png', 'Mobil oyun geliştiricisi Panteon ile uygulama geliştiricisi ve yayıncısı Teknasyon\'un Rocket Games’i kurduğunu geçtiğimiz yılın Temmuz ayında sizlere aktarmıştık. Bugün edindiğimiz bilgilere göre Panteon, 4X türündeki yeni mobil strateji oyununu finanse etme sürecinde 10 milyon dolarlık fon sağladı.\r\n\r\nPanteon\'un bizimle paylaştığı bilgilere göre söz konusu 10 milyon dolarlık fon Teknasyon’un kurucu ortakları Mustafa Vardalı, Burak Sağlık ve Mustafa Sevinç’ten tarafından sağlandı. Toplanan 10 milyon dolarlık fonla ekibini genişletip geliştireceği strateji oyunu için yeni bir ekip kuracak olan Panteon, eş zamanlı olarak ayrı bir ekiple Hyper Casual oyunlar geliştirmeye de devam edecek.\r\n\r\n2020\'de 3 kat büyüme ile 50 milyondan fazla indirilmeye ulaştı\r\nGeçtiğimiz yıl 3 kat büyüyen Panteon\'un oyunlarının toplamda 50 milyondan fazla indirildiğini de ekleyelim. Geliştirecekleri yeni oyun ve sağladıkları fon hakkında konuşan Panteon Kurucu Ortağı Ufuk Şahin, 4X strateji türünde geliştirecekleri yeni oyun için çok heyecanlı olduklarını paylaştı.', 3, 0, 1),
(3, 'Köpek sahipleri için kutu abonelik girişimi WufWuf, Teknasyon\'dan 275 bin euro yatırım aldı', 'vufvuf.jpg', 'Türk girişimciler Umut İlhan ve Caner Bayraktar tarafından 2018 yılında Londra\'da kurulan, Türkiye\'de de HavHav markası ile hizmet veren WufWuf, Teknasyon\'dan 275 bin euro ara yatırım aldığını açıkladı. Girişim, geçtiğimiz ağustos ayında da yine Teknasyon\'dan yatırım almıştı. \r\n\r\n2020 yılının ikinci yarısında gelirlerini 4 katına çıkaran WufWuf, Birleşik Krallık\'ta hizmet vermeye başladıktan sonra 2020 yılında 33 ülkeye açıldı. WufWuf\'un şu anda tüm Avrupa Birliği ülkelerinde, İsviçre, Japonya ve İsrail\'de aboneleri var. Bu ülkelere 60 binin üzerinde köpek ürünü satılıyor.\r\n\r\nHedef: Avrupa\'da genişlemek ve Amerika\'ya açılmak\r\nWufWuf CEO\'su Umut İlhan Türkiye için pet sektöründe büyük fırsatlar olduğunu; maliyetlerinin Çin ile rekabet edebildiğini, üstelik Avrupa\'yla serbest ticaret anlaşması sayesinde vergisiz ticaret yapabildiklerini söyledi. WufWuf\'un tek bir üründen on binlerce alım yaptığını, ilk zamanlarda ürünlerini Çin\'de ürettirdiklerini; sonrasında ise Türkiye\'deki tekstil üreticilerine gidip denemelere başladıklarını beliriyor. İlhan, çok iyi sonuçlar alınca üretimi tamamen Türkiye\'ye kaydırdıklarının da altını çiziyor.\r\n\r\nAmerika’ya açılmak istediklerini de vurgulayan İlhan, Almanya\'da lokalize olmak için girişimlere başladıklarını ve yakında WufWuf GMBH\'nin kurulmuş olacağını belirtiyor. Yatırım firmaları ile görüşmelerinin devam ettiğini; bu yıl içerisinde 1,5 milyon euro daha yatırım alıp Avrupa\'da genişlemek ve ilerleyen yıllarda Amerika\'ya açılmak istediklerini söylüyor.', 3, 0, 1),
(4, 'Sona Yaklaşıyoruz: Netflix, La Casa de Papel\'in Son 5 Bölümünün Fragmanını Yayınladı [Video]', 'fd.jpg', 'Dünyada büyük ses getiren dizilerden olan İspanyol yapımı La Casa de Papel, son 5 bölümünün fragmanıyla karşımızda. 3 Aralık\'ta yayınlanacak olan bölümlerden hayranların beklentisi büyük.\r\nÇevrim içi dizi veya film izlemek istediğimizde başvurduğumuz ilk yerlerden olan Netflix, 2017’de karşımıza çıkardığı La Casa de Papel dizisiyle devasa bir topluluğu platformuna çekmişti. İlk bölümden güncel olarak yayınlanan son bölüme kadar diziyi soluksuz izleyen hayranlar, dizinin son bölümlerinde ne sunulacağına dair merak içerisindeydi.\r\n\r\nŞimdiyse Netflix, YouTube kanalı üzerinden dizinin son 5 bölümünün fragmanını paylaştı. Oldukça aksiyon dolu sahnelerin kısa kısa gösterildiği fragmana baktığımızda bol aksiyonun yanında duygusal sahnelerin de büyük yer tutacağını tahmin edebiliyoruz.\r\nDizinin hayranlarının bir kısmı, duygusal sahnelerin dizide gereksiz oranda fazla yer tuttuğunu söylüyor ve bunun son 5 bölümde telafi edilmesini istiyor. Bir diğer grup ise duygusal sahnelerin belirli boşlukları doldurduğunu, bu sebeple de dizinin kritik bir unsuru olduğunu savunuyor. ', 2, 0, 1),
(5, 'Sorun Sizde Değil Beyninizde: Bilime Göre İlk Aşkımızı Neden Unutamıyoruz?', 'love.jpg', 'Kelebekleri midenizde ilk defa uçuşturan birini unutmak bir hayli zordur. Aradan ne kadar zaman geçerse geçsin ilk defa aşık olduğunuz, ilk defa kendinizi ait hissettiğiniz o ilk kişinin yeri hep farklı olacaktır. İlk bakışta her ne kadar tamamen duygusal bir olay gibi gözükse de tüm bu olanların vücudunuzda salgılanan hormonlarla ilgisi bulunuyor.\r\nKaç yaşına gelirsek gelelim, ilk aşık olduğumuz kişinin bizde hissettirdiği şeyleri hep güzel bir gülümsemeyle anımsarız. Artık kendi yolumuzu çizip yeni başlangıçlara adım atsak da ilk aşkımızın yeri hep farklıdır. \r\n\r\nBazı insanlar ilk aşkından sonra yeni bir adım atmakta epey zorluk çeker. Özellikle daha 19, hatta 20’li yaşlarınızın başındaysanız anlam veremediğiniz bir şekilde ilk aşkınıza dair hissettikleriniz dönüp dolaşıp ayağınıza takılır hep. Sadece duygusal veya psikolojik bir şey gibi gözükse de aslında bilimin ilk aşkınızı neden unutamadığınıza dair sağlam bir cevabı bulunuyor. \r\nAşık olmayı sadece beğendiğiniz birine karşı ilgi duymak kadar basit bir şey sanıyorsanız yanıldığınızı peşin peşin söyleyelim. Aşık olunca vücudumuzda bazı şeyler oluyor ve bunları kontrol etmemiz ne yazık ki mümkün değil. \r\n\r\nAşık olmaya başladığınız andan itibaren beyniniz, vasopressin, adrenalin ve dopamin gibi sinirsel alıcıları uyaran bir dizi hormon salgılamaya başlar. Hani midemizde kelebekler uçuşuyor deriz ya, bu kelebeklerin kozalarından çıkıp uçmasına sebep olan şeyler bu hormonlar aslında. \r\n\r\nBu hormonlar salgılandığı andan itibaren kendinizi mutlu, coşkulu ve güvende hissetmeye başlıyorsunuz. Hatta hissettiğiniz güven seviyesi o kadar yukarı seviyelere doğru çıkıyor ki kendinizi bir anda sürekli aşık olduğunuz kişiye sarıldığınızı hayal ederken buluyorsunuz. ', 2, 0, 1),
(6, 'Ece Ronay\'a Attığı Mesajlar İfşa Olan Mehmet Ali Erbil: Bundan Sonra Sosyal Medyadan Yürümeyeceğim', 'rny.jpg', 'Mehmet Ali Erbil, taciz iddialarına karıştığı Ece Ronay meselesi ile ilgili konuştu. Kamuoyundan özür dileyen Erbil, \"Bundan sonra sosyal medyada yürümeyeceğim.\" ifadelerini kullandı. Yargıya taşınan meselenin nasıl son bulacağı ise henüz bilinmiyor...\r\nGeçtiğimiz günlerin en çok konuşulan olaylarından bir tanesi, internet fenomeni Ece Ronay ile Mehmet Ali Erbil arasındaki taciz meselesiydi. Ronay\'ın iddialarına göre Mehmet Ali Erbil, kendisine sınırları aşan mesajlar göndermişti. Erbil ise bu iddiayı reddederek topu asistanına atmıştı. Mesele o kadar çok büyüdü ki yargıya bile taşındı.\r\n\r\nYargı süreci sonunda neler yaşanacağını şimdiden bilmek zor olsa da Mehmet Ali Erbil\'in yaptığı son açıklamalar, ünlü komedyenin bu mesele için pişman olduğunu gözler önüne seriyor. Bir program öncesinde gazetecilerin sorularını yanıtlayan komedyen, \"Daha fazla ince eleyip sık dokurum artık. Eleyip sık dokumadığımın farkına vardım. Bir tek yanlışım o. Özür diliyorum kamuoyundan yani...\" ifadelerini kullanarak, pişman olduğunun sinyallerini verdi.', 2, 0, 1),
(7, 'Son Ekran Kartı Bükücü New World\'ün Karakterleri ve Özellikleri', 'nw.jpg', 'Yakın zamanda çıkışını gerçekleştiren New World teknik sıkıntılar yaşasa da, piyasayı kasıp kavurmaya devam ediyor. Düzenli olarak oyuncu artışı yaşayan ve muhtemelen yaşadıkları en büyük problemi de bu yüzden yaşayan New World, her geçen gün de oyuncularını arttırmaya devam edecekmiş gibi duruyor.\r\nYapımcı ekip, açtıkları yeni sunucularla ve bu sunuculara yapılan düzenli bakımlarla işleri kontrol altında tutmaya çalışsa da sorunların henüz tam olarak çözüldüğünü söyleyemeyiz. Farklı bir yazımızda New World’ün isteminin nasıl işlediğinden bahsetmiştik. Bu sefer ise karakterlerin ve bu karakterlerin özelliklerinden bahsedeceğiz.\r\nÖncelikle değinmemiz gereken konu oyun MMORPG sınıfında yer alan bir oyun olduğu için kimsenin açtığı karakter kimseninkinden üstün değil. Bu yüzden karakterlerimizin güçleri tamamen seviyemize ve bu seviyemizi yükseltirken kazandığımız puanları nasıl harcadığımıza göre değişiyor. Oyunda maksimum seviye şu an için 60 ve muhtemelen belli bir süre de bu şekilde kalacak. 60. seviyeye ulaşmak çok zor olmasa da aynı zamanda çok kolay olduğu da söylenemez. Oyunu ne kadar yoğunlukta oynadığınıza göre 1 haftada da 60 olabilirsiniz 1 ayda da.\r\n\r\n60. seviyeye ulaşana kadar her seviye atladığımızda kullanabileceğimiz 3 puan kazanıyoruz. Bu kazandığımız puanları Strength (STR), Dexterity (DEX), Intelligence (INT), Focus (FOC) ve Constitution (CON) özellikleri arasında oynamak istediğimiz silaha ve oynanış tarzımıza göre dağıtıyoruz. Her özelliğin farklı bir silaha etkisi mevcut, bu yüzden puanlarımızı yoğunlaşmak istediğimiz silaha yönelik bir şekilde dağıtmamız daha mantıklı olacaktır. Puanlarımızı dağıtırken aynı zamanda bir özelliğe puan harcarken o özellik belli bir seviyeye ulaştığında threshold (eşik) bonuslarını da aktif bir şekilde kullanma şansınız olacak. Genel olarak bu özellikler ne işe yarıyor? Diye soracak olursanız da, şu şekilde açıklayalım:', 4, 0, 1),
(8, 'PUBG 2\'den İlk Haberler Gelmeye Başladı: İşte Çıkış Tarihi', 'pbg.jpg', 'Dünya genelinde milyonların oynadığı PUBG\'ye dair ortaya yeni bir iddia atıldı. Yeni sızan bilgilere göre PUBG 2, 2022 yılında oyun severlerle buluşacak.\r\nPlayerUnknown’s Battlegrounds ya da daha yaygın bilinen ismiyle PUBG, piyasaya sürüldüğü ilk günden itibaren geniş kitlelerin oyunu bağrına basmasıyla oyun dünyasında kendisine sağlam bir yer edinmiş durumda. PUBG, e-spor mecrasında da en çok kazanç getiren ve maçları en çok izlenen oyunların da başında geliyor. \r\n\r\nPUBG hakkında daha önce de oldukça tutarlı sızıntılar yapan PlayerIGN’in yaptığı yeni sızıntıya göre, önümüzdeki sene içerisinde sevilen oyunun devamı gelecek gibi gözüküyor. Devam oyununun mobil versiyonunu değil de bilgisayar versiyonunu kapsaması bekleniyor. ', 4, 0, 1),
(9, 'Konami, eFootball 2022\'nin Göz Kanatan Grafiklerinin Ne Zaman Düzeltileceğini Açıkladı', 'hy.jpg', 'eFootball 2022\'nin güldürürken düşündüren (!) grafikleri, oyunun çıktığı ilk günden beri doğal olarak hepimizin gündeminde. Oyunun geliştirici firması Konami\'den, eFootball\'a ilişkin yeni bir açıklama geldi.\r\nİyi bir oyun olduğu için değil de oyun mecrasında alay konusu olduğu için çıktığı ilk günden beri gündemden düşmek bilmeyen eFootball 2022, hiçbirimizin bir anlam veremediği grafikleri sayesinde Steam’de yılın en kötü oyunu olarak seçilmişti. 1 yılı aşkın bir süredir çıkmasını bekleyen hayranlarını hüsrana uğratan eFootball 2022’nin yapımcısı olan Konami, geçtiğimiz günlerde Twitter üzerinden oyunun göz kanatan grafikleri sebebiyle oyunculardan özür dileyerek en kısa sürede oyunda iyileştirme yapacaklarını belirtmişti. \r\nJaponya merkezli video oyun ve eğlence şirketi, oyuncularının genelinin rahatsız edici olarak nitelendirdiği dünyaca ünlü oyun serisi PES’in yeni isimle gelen oyun eFootball 2022’deki yüz efektleri için bir kez daha özür dileyerek, bu hatayı 28 Ekim’de yapacağı bir güncelleme ile telafi edeceğini duyurdu. \r\n\r\nKonami’nin video oyun geliştirici ekibi tarafından yapılmış olan açıklamada güncellemeye dair detaylar verilmemiş olsa da, şirketin güncelleme ile eFootball 2022’ye yeni içerik ve özellikler eklemeyeceği belirtiliyor. Bir diğer taraftan Konami yetkilileri, 28 Ekim’de yapılacak olan söz konusu güncellemeyi takiben kasım ayı içerisinde yeni içeriklerin de olacağı bir başka güncellemenin aktive edileceğini aktardı. ', 4, 0, 1),
(10, 'Google, Kullanıcılara ‘Dünyayı Ne Kadar Kirlettiklerini’ Tablo Halinde Açık Açık Gösterecek', 'ggl.jpg', 'Google, bugün gerçekleştirdiği Cloud Next etkinliğinde bulut hizmetine getirdiği birçok yenilikten ve geliştirmeden bahsetmişti. Bu geliştirmelerden biri de kullanıcıların bulut hizmeti kullanımlarının ne kadar karbon emisyonuna sebep olduğunu gösteren detaylı raporlar olarak karşımıza çıkıyor. İşte özelliğin detayları.\r\nGoogle, bugün gerçekleştirdiği Cloud Next adlı etkinliğinde yeni iş birliklerini, halihazırda sunduğu hizmetlerinde yaptığı geliştirmeleri ve platforma genel olarak gelen yenilikleri duyurdu. Bu bağlamda yapay zekâ ve makine öğrenimi konusunda çalışan kişilerin işlerini tek bir yerden görmelerini sağlayacak olan söz konusu geliştirmeler, ilerleyen zamanlarda tam halleriyle platforma eklenmiş olacak.\r\n\r\nPlatform üzerinde yapılan işleri daha kolay ve verimli kılmaya yönelik getirdiği yeniliklerin yanında Google, doğa dostu politikalar izlediğini gösteren bir hamle daha yaparak kullanıcılarının ne kadar karbon emisyonuna sebep olduğuna dair verileri görmelerini sağlayacak bir özellik de getirdi.', 1, 0, 1),
(11, 'Aslında Bir Programlama Dili Olmayan HTML Nedir? Ücretsiz HTML Öğrenebileceğiniz Online Kurslar', 'htm.jpg', 'Pek çok kullanıcı tarafından bir programlama dili olarak bilinen ancak aslında bir metin işaretleme dili olarak kabul edilen HTML, tam olarak nedir merak edenler ve birçok yerde kullanabileceği bu yardımcı dili öğrenmek isteyenler için HTML’i anlattık ve ücretsiz kurslardan bazılarını listeledik.\r\nBir yazılımcı olmasanız bile HTML nedir, mutlaka duymuşsunuzdur. Pek çok son kullanıcı, HTML’i bir programlama dili olarak bilir. Ancak HTML bir programlama dili değildir. Temel olarak onun için bir metin işaretleme dili diyebiliriz. Yani bu dili kullanarak sıfırdan bir yazılım üretmezsiniz. Fakat o yazılımda okunur hale gelecek görsel ve metinleri bu dili kullanarak başarılı bir şekilde yazabilirsiniz.\r\n\r\nHTML dili kullanarak yazılan tabanlar genel olarak internet sitelerine eklenen öğelerin okunabilir olması için yazılır. Hatta bir blog sahibiyseniz bile HTML kodu yazabilir ya da blogunuza eklemek istediğiniz bir öğenin hazır HTML kodunu kullanabilirsiniz. Gelin önce HTML nedir, ne işe yarar sorularını yanıtlayalım. Daha sonra ise bu yardımcı dili ücretsiz olarak öğrenebileceğiniz kursları görelim.', 1, 0, 1),
(12, 'Microsoft, Tarihin En Büyük DDoS Saldırısını Atlattı: İşte Şirketin Paylaştığı Tüm Detaylar', 'dds.jpg', 'Microsoft, Azure sisteminin tarihin en büyük DDoS saldırısını püskürttüğünü duyurdu. Şirket tarafından yapılan açıklamalara göre Avrupalı bir müşteriyi hedef alan saldırı, 70 bin bot ile gerçekleştirildi. Bu botlar, saniyede 2,4 TB\'lik paketlerle saldırmış olsalar da Azure, saldırıyı püskürtmeyi başardı.\r\nABD merkezli teknoloji devi Microsoft, bulut tabanlı sistemi Azure\'un tarihin en büyük DDoS saldırısını püskürtmeyi başardığını açıkladı. Azure Networking\'in üst düzey yöneticisi Amir Dahan tarafından yapılan açıklamalarda, üç dalga halinde gelen ve en yükseği saniyede 2,4 TB olan saldırıların püskürtülmesi sırasında, Azure sistemlerinde hiçbir sorun yaşanmadığını belirtildi. Saldırının diğer dalgalarının ise 0,55 Tbps ve 1,7 Tbps kapasitelerde olduğu açıklandı.\r\n\r\nMicrosoft tarafından yapılan açıklamalara göre tarihin en büyük DDoS saldırısı, başta Malezya, Tayvan, Vietnam, Çin ve Japonya gibi ülkeler ile ABD merkezliydi. Bu ülkelerdeki yaklaşık 70 bin bot aynı anda saldırıya başlayarak sistemleri çökertmeye çalışmış olsa da Azure\'un sahip olduğu güvenlik sistemleri, bu saldırının başarısız olmasına yol açtı.', 1, 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `userName` varchar(155) NOT NULL,
  `userPass` varchar(155) NOT NULL,
  `is_delete` tinyint(2) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `userName`, `userPass`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'basri', '123', 0, '2021-10-13', NULL),
(2, 'hasan', '321', 0, '2021-10-13', NULL),
(3, 'teknasyon', '231', 0, '2021-10-13', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users_flow`
--

CREATE TABLE `users_flow` (
  `id` int(10) NOT NULL,
  `liked_post` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users_flow`
--

INSERT INTO `users_flow` (`id`, `liked_post`, `user_id`, `category_id`) VALUES
(1, 12, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_ip`
--

CREATE TABLE `user_ip` (
  `id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `ip_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `view_ip`
--

CREATE TABLE `view_ip` (
  `id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `ip_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `view_ip`
--

INSERT INTO `view_ip` (`id`, `post_id`, `user_id`, `ip_name`) VALUES
(1, 12, 1, '::1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users_flow`
--
ALTER TABLE `users_flow`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_ip`
--
ALTER TABLE `user_ip`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `view_ip`
--
ALTER TABLE `view_ip`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users_flow`
--
ALTER TABLE `users_flow`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `user_ip`
--
ALTER TABLE `user_ip`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `view_ip`
--
ALTER TABLE `view_ip`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
