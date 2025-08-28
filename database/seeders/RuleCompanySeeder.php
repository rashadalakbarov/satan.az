<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RuleCompany;

class RuleCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ana Kategoriler
        $mainCategories  = [            
            [
                'title' => 'Ümumi məlumat',
            ],
            [
                'title' => 'Elanın yerləşdirilməsi',
            ],
            [
                'title' => 'Şəxsi əlaqə məlumatları',
            ],
            [
                'title' => 'Elanda düzəlişlərin edilməsi',
            ],
            [
                'title' => 'Təkrar elanlar',
            ],
            [
                'title' => 'İki və daha çox istifadəçi hesabı olan istifadəçilər',
            ],
            [
                'title' => 'Yanlış kateqoriyada yerləşdirilən elanlar',
            ],
            [
                'title' => 'Başlıq',
            ],
            [
                'title' => 'Məbləğ, Mübadilə, Pulsuz',
            ],
            [
                'title' => 'Elanın təsviri (xarakteristikası)',
            ],
            [
                'title' => 'Şəkil',
            ],
            [
                'title' => 'Qara siyahı',
            ],
            [
                'title' => 'Mağazalar və Şirkətlər',
            ],
            [
                'title' => 'Texniki dəstək xidməti',
            ],
            [
                'title' => 'Qadağan olunmuş məhsul və xidmətlər',
            ],
        ];

        $insertedMain = [];

        foreach ($mainCategories as $mainCategory) {
            $record = RuleCompany::create([
                'title' => $mainCategory['title'],
                'parent_id' => null,
            ]);
        }

        // Alt Kategoriler
        $subCategories = [
            'Ümumi məlumat' => [
                'Satan.az saytında elanların yerləşdirilməsi İstifadəçi razılaşması ilə tənzimlənir.',
                'Qaydaların pozulması və ya istifadəçilərin elan üzrə çoxsaylı şikayətləri həmin elanların və eyni zamanda elan sahiblərinin şəxsi hesablarının bloklanması ilə nəticələnə bilər.',
                'Nəzərdə saxlayın ki, bütün elanlar onlara əlavə xidmətlərin (Premium, VIP və digər) tətbiq edilib-edilməməsindən asılı olmayaraq qaydalara uyğun olmalıdır. Qaydaların pozulması halında hətta ödənişi həyata keçirilmiş elanlar da blok oluna və ya silinə bilər.',
                'Saytda istifadəçilər üçün bərabər şəraitin təmin edilməsi məqsədilə hər kəs elan yerləşdirməzdən əvvəl Satan.az-ın qaydaları ilə tanış olmalıdır.',
            ],
            'Elanın yerləşdirilməsi' => [
                'İstifadəçinin saytda eyni anda yer alan elanlarının sayı Administrasiya tərəfindən təyin olunmuş olunmuş pulsuz limiti aşmamalıdır. Yerləşdirilmiş elanlar təkrarlanmamalı və saytın qaydalarına zidd olmamalıdır. Elanın aktivlik müddəti 30 gündür. Bu müddət başa çatdıqda elanın dərc olunması avtomatik olaraq dayandırılır və o, "Müddəti başa çatmış" bölməsinə düşür. Bu halda İstifadəçi ya bu elanı bərpa edə, ya da yenisini yerləşdirə bilər.',
                'İstifadəçinin 30 gün ərzində yerləşdirdiyi elanların sayı Administrasiya tərəfindən kateqoriya üzrə təyin olunmuş olunmuş pulsuz limiti aşmamalıdır. Kateqoriya üzrə elan limitini aşmış istifadəçilər öz elanlarını ödənişli xidmətlərdən istifadə etməklə, elanları yerləşdirmək istədiyi kateqoriyaya aid ödənişli elan paketi alamaqla, və ya ödənişsiz, bu kateqoriya üzrə növbəti yer boşaldığı halda yerləşdirə bilərlər',
                'İstifadəçi elan yerləşdirdiyi andan etibarən növbəti 30 gün ərzində elanı ödənişsiz bərpa edə bilər. Elanın yerləşdirildiyi andan 30 gün keçərsə, bu elanın ödənişsiz bərpası yalnız onun yerləşdiyi kateqoriya üzrə elan limiti aşılmadığı halda mümkündür. Əks təqdirdə İstifadəçi kateqoriya üzrə növbəti yerin boşalmasını gözləməli və ya elanı ödənişli xidmətlərdən istifadə etməklə bərpa etməlidir.',
                'Saytda olan elanda məhsul və ya xidmət haqqında məlumat və şəkilləri başqa məhsul və ya xidmətə aid olan məlumat və ya şəkillərə dəyişmək qadağandır.',
                'Elan yerləşdirərkən əmin olmalısınız ki, elan saytın qaydalarına tam olaraq uyğundur. Elan dərc edildikdən sonra belə administrasiya tərəfindən təkrar yoxlama zamanı qayda pozuntusu aşkar edilərsə, həmin elanlara düzəliş etmək və saytdan silmək hüququnu administrasiya özündə saxlayır.',
                'Saytda eyni zamanda iki və daha çox təkrar elan aşkar olunarsa, təkrar olan elanlar silinir.',
                'Hər hansı bir ödənişli xidmət elanı xidmətin tətbiq olunma müddətinə bərpa edir və elanın müddətini uzadır.',
            ],
            'Şəxsi əlaqə məlumatları' => [
                'Şəxsi əlaqə vasitələri düzgün qeyd olunmalıdır: ad, elektron poçt ünvanı, telefon nömrəsi.',
                'Elan yerləşdirərkən işlək olan elektron poçt ünvanından istifadə etməlisiniz. İşlək olmayan e-poçt ünvanından istifadə etdikdə siz elanlarınızın satatusu barədə sistematik məktubları almayacaqsınız. Bir istifadəçinin (hüquqi və ya fiziki şəxs kimi) yalnız bir istifadəçi hesabı ola bilər. Texniki analiz əsasında bir istifadəçiyə məxsus bir neçə hesab aşkarlandıqda sistem tərəfindən təkrar kimi nəzərə alınacaq və avtomatik ləğv ediləcək və ya bloklanacaq.
                İstifadəçilərə istifadəçi hesablarını (istifadəçi hesabına daxil olmaq üçün lazım olan məlumatları) icarəyə vermək/götürmək və ya özgəninkiləşdirmək qadağandır.
                Elanda hər hansı dəyişiklik etmək üçün “Düzəliş et” düyməsindən istifadə edin. Elanı anonim yerləşdirdiyiniz halda, elan dərc olunan zaman sizin elektron poçt ünvanınıza göndərilən PIN-kodu daxil edin. Əgər elektron poçt ünvanınızı səhv qeyd etmisinizsə, PIN-kod telefon nömrənizə göndərilə bilər (bu xidmət ödənişlidir – 1 AZN).',
                'Mütləq şəkildə işlək və özünüzə məxsus telefon nömrəsi göstərin – bu sizin sürətli və uğurlu əməliyyat aparma şansınızı yüksəldəcək.
                Telefon nömrəsi müvafiq sətirdə qeyd olunmalıdır. Telefon nömrəsinin elanın başlığında və ya məzmuna qeyd olunması qadağandır.
                Nəzərdə saxlayın ki, digər şəxsə narahatlıq yaratmamaq məqsədi ilə başqa bir şəxsin nömrəsini qeyd etmək qadağandır və bu sizin istifadəçi hesabınızın bərpa hüququ olmadan blok olunmasına səbəb olacaq.
                Elanda telefon nömrəsi səhv qeyd olunubsa, elan saytdan silinəcək.
                İstifadəçi yerləşdirdiyi elanın dəqiqliyinə, tamlığına, onun Azərbaycan Respublikasının qanunvericiliyinə uyğunluğuna, elanda yerləşdirilən məlumatların üçüncü şəxslərin hüquqlarını pozmamasına və onların iddialarından azad olmasına görə məsuliyyət daşıyır.',
            ],
            'Elanda düzəlişlərin edilməsi' => [
                'Elanda düzəliş etmək üçün aktiv elanı şəxsi kabinetdə açıb “Düzəliş et” düyməsini seçmək kifayətdir. Elanı anonim yerləşdirdiyiniz halda “Düzəliş et” düyməsini seçmək və elektron poçt ünvanınıza gələn PIN-kodu daxil etmək kifayətdir. Dərc olunmamış, müddəti başa çatmış və ödəniş gözləyən elanlarda düzəliş etmək mümkün deyil.',
                'Elanda düzəliş etməklə onu irəli çəkmiş olmursunuz. Bu funksiya yalnız elandakı şəkil, məzmun və qiymət dəyişiklərini həyata keçirir. Müvafiq pullu xidmətdən istifadə etməklə elanı irəli çəkə bilərsiniz.',
                'Elanlar üçün nəzərdə tutulmuş qaydalar “Düzəliş et” funksiyasına da aiddir.',
                'Düzəliş zamanı elanda məhsul və ya xidmət haqqında məlumat və şəkilləri başqa məhsul və ya xidmətə aid olan məlumat və ya şəkillərə dəyişmək qadağandır.',
                'Düzəliş edilmiş elan qaydalara uyğun deyilsə, silinir.',
            ],
            'Təkrar elanlar' => [
                'Tamamilə eyni məzmunlu və ya məna baxımından oxşar elanlar;
                Nümunə: Sizin “Apple iPhone 5S Black, 32 GB” başlıqlı elanınız saytda dərc olunmuşdur. Əgər bu elanın dərc olunduğu andan etibarən 30 gün ərzində saytda eyni rəngli və eyni yaddaşlı Apple iPhone 5S modelinin elanı yerləşdirilsə, yeni elan dərc olunmayacaq.',
                'Müddəti başa çatmadan silinib yeni elan kimi yerləşdirilmiş elanlar;
                Nümunə: Sizin “Tissot qol saatı” başlıqlı elanınız saytda dərc olunmuşdur. Əgər bu elan müddəti başa çatmadan silinsə və saytda markası, modeli, şəkilləri və qiyməti eyni olan hər hansı Tissot qol saatı elanı yerləşdirilirsə, yeni elan dərc olunmayacaq.',
                'Aktiv olan elanla tamamilə eyni məzmunlu və ya məna baxımından oxşar olan bərpa olunmuş elanlar;
                Nümunə: Sizin “Playstation 3 Slim, 500GB” başlıqlı elanınız saytda dərc olunmuşdur. Əgər bu elan aktiv olduğu halda onun təkrarı olan müddəti başa çatmış başqa bir və ya bir neçə elanınızı bərpa etsəniz, bərpa olunan elan saytdan silinəcək.',
                'Ümumi aktiv elan olduğu halda həmin elanın tərkib hissəsinə daxil olan məhsul və ya xidmətlərdən ibarət ayrı-ayrı yerləşdirilmiş elanlar və əksinə.
                Nümunə 1: Sizin “Evlərin və ofislərin təmiri” ümümi başlıqlı elanınız saytda dərc olunmuşdur. Bu elan aktiv olduğu halda, məsələn, sanitar qovşaq ustası və ya rəngsaz xidmətləri üçün saytda ayrı-ayrılıqda yerləşdirilən elanlar dərc olunmayacaq. Əgər bu tipli elanların ayrı-ayrılıqda dərc olunmasını istəyirsinizsə, saytda aktiv ümumi başlıqlı elanınız mövcud olmamalıdır.
                Nümunə 2: Sizin “Mobil nömrələr” ümümi başlıqlı elanınız saytda dərc olunmuşdur. Bu elan aktiv olduğu halda onun tərkib hissəsinə daxil olan mobil nömrələrin elanları ayrı-ayrılıqda yerləşdirilsə, bu elanlar saytda dərc olunmayacaq. Əgər bu tipli elanların ayrı-ayrılıqda dərc olunmasını istəyirsinizsə, saytda aktiv ümumi başlıqlı elanınız mövcud olmamalıdır.
                Təkrar elanların yerləşdirilməsi məhsulun satışını tezləşdirmir, əksinə, satıcılar üçün satış çətinləşir, alıcılar isə təkrarlanan elanlar arasından uyğun təklifi tapmaq üçün çox vaxt sərf etməli olur.
                Yeni əlaqə vasitələrindən və qeydiyyat hesablarından təkrar elanların yerləşdirilməsi cəhdləri həmin elanların silinməsi ilə və istifadəçinin bloklanması ilə nəticələnir.
                Əgər siz məhsulu satmısınızsa, yaxud təklifiniz artıq qüvvədə deyilsə, satışdan və ya təklif qüvvəsini itirdikdən dərhal sonra elanınızı elanlar siyahısından çıxarın (ləğv edin).
                Əgər sizin artıq dərc olunmuş və ya yoxlanış mərhələsində olan elanınız varsa, bu elanın təkrarlanmasına yol verməməlisiniz!',
            ],
            'İki və daha çox istifadəçi hesabı olan istifadəçilər' => [
                'Bir fiziki və ya hüquqi şəxs üzrə yalnız bir istifadəçi hesabının yaradılmasına və istifadəsinə icazə verilir. Siz “Mənim elanlarım” şəxsi istifadəçi hesabınıza telefon nömrəniz vasitəsilə daxil ola bilərsiniz.',
                'Texniki analiz zamanı bir istifadəçiyə aid olan digər istifadəçi hesabları aşkar olduqda bu hesablar sistem tərəfindən təkrar kimi qəbul edilərək avtomatik şəkildə dayandırılır və ya blok edilir.',
                'İstifadəçilərə istifadəçi hesablarını (istifadəçi hesabına daxil olmaq üçün lazım olan məlumatları) icarəyə vermək/götürmək və ya özgəninkiləşdirmək qadağandır.',
                'Əgər siz aktiv istifadəçi hesabınızdakı əlaqə məlumatlarını dəyişmək istəyirsinizsə, yeni istifadəçi hesabına ehtiyac yoxdur. Bunun üçün tap@Satan.az elektron poçt ünvanına texniki dəstək üçün müraciət etməyiniz kifayətdir. Müraciətiniz saytın qaydalarına uyğun olduğu təqdirdə dəyişiklilər təmin ediləcəkdir. Sayt rəhbərliyi dəyişikliklər etmək hüququnu özündə saxlayır.',
            ],
            'Yanlış kateqoriyada yerləşdirilən elanlar' => [
                'Elanın məhsulun tipinə, təyinatına, özəlliyinə, məqsədinə, elanın başlığındaki adına uyğun olmayan kateqoriyada yerləşdirilməsi və/və ya məzmununda saytın istifadəçilərində anlaşılmazlıq yarada biləcək digər məlumatların yerləşdirilməsi qadağandır.',
                'Elanla bağlı düzgün məlumatlar yerləşdirin. Elandakı bütün məlumatlar həqiqəti əks etdirməlidir. Elanınızın məzmununa maksimum ən uyğun kateqoriya, tip, görünüşü seçin – bu onun həm potensial müştərilər, həm də axtarış sistemləri tərəfindən tapılması şansını yüksəldir.',
                'Administrasiya yuxarıda sadalanan bəndlərə uyğun olaraq elan kateqoriyasını redaktə etmək hüququnu özündə saxlayır.',
                'Administrasiya redaktə üçün məlumatların çatışmadığı halda səhv kateqoriyaya görə elanı dərc etməmək hüququnu özündə saxlayır.',
                'İstifadəçi yuxarıda sadalanan qaydaların bəndlərini bilərəkdən təkrar pozduqda və ya pulsuz elan limitindən yayınmaq üçün qaydaları pozduqda administrasiya yanlış kateqoriyaya görə elanı silmək hüququnu özündə saxlayacaq.',
            ],
            'Başlıq' => [
                '',
            ],
            'Məbləğ, Mübadilə, Pulsuz' => [
                'Elanda Məbləğ parametrini təyin etmək bu parametrin nəzərdə tutulduğu kateqoriyalarda məcburidir. Əgər siz məhsulu razılaşdırılmış məbləğə satmaq istəyirsinizsə, istədiyiniz məbləği daxil edin, ancaq “Təsvir” hissəsində açıqlama verin. Elanda məhsulun real bazar qiymətinə uyğun olan qiymət qeyd olunmalıdır.
                Nümünə: Siz real bazar qiyməti 1800-2000 AZN olan, heç biri texniki, fiziki nasazlığı olmayan yeni bir məhsulun qiymətini real hesab olunmayan 200 AZN olaraq qeyd etsəniz, bu elan saytda dərc olunmayacaq.',
                'Nəzərdə saxlayın ki, məbləğin şərti olaraq göstərilməsi (məsələn, 1 AZN, 11 AZN və s.) qadağandır və sizin elanınızın silinməsi üçün əsas ola bilər. Məbləğ yalnız manatla göstərilməlidir. Elanın məzmununda məbləği başqa valyutada göstərə bilərsiniz, lakin qiymət sütununda konvertasiya edilmiş məbləğ AZN ilə göstərilməlidir.',
                'Nəzərə alın ki, əgər siz məhsulu pulsuz vermək istəyirsinizsə və kateqoriya məcburi qiymət tələb etmirsə “Qiymət” sahəsini boş qoyun və ya qiyməti 1 AZN olaraq göstərin. Məzmunda mütləq qeyd edin ki, məhsul pulsuz verilir. Əks halda bu, sizin elanınızın silinməsinə səbəb ola bilər.',
                'Əgər siz məhsulu mübadilə (barter) etməyə hazırsınızsa, bunu “Təsvir” hissəsində mübadilə şərtlərini əlavə etməklə göstərin (dəyişdirmək niyyətində olduğunuz məhsul və ya xidmət).',
            ],
            'Elanın təsviri (xarakteristikası)' => [
                'Potensial müştərilər daim açar sözlər vasitəsilə konkret məhsulu axtarırlar. Bu səbəbdən bir yerləşdirmədə ona aid qiymət və şəkillə birlikdə yalnız bir məhsulun (predmetin, obyektin) göstərilməsi çox vacibdir.',
                'Təsvir hissəsində müxtəlif kateqoriyalara və bölmələrə aid olan bir neçə məhsulun qeyd olunmasına yol verilmir. Məsələn, bir elanda eyni anda telefon və televizor, geyim və mebel, kompüter və fotoaparat, velosiped və it və s. yerləşdirilməməlidir.',
                'Təsvir tam şəkildə başlığa və təklif olunan məhsula/xidmətə uyğun olmalıdır. Bir elanda yalnız bir məhsul növünü və ya xidməti təsvir etməyə icazə verilir. Təsvirə əlavə edilən açar sözlər və etiketlər satılan məhsul və ya xidmətə aid olmalı və digər mal və xidmətlərin ehtiva etməməlidir. Məzmunun ilk 2-3 sətri elanınızın ən cəlbedici hissəsi olmalıdır, çünki ilk gözə çarpan başlıq və elanın mətninin ilk cümləsidir. Qrammatik cəhətdən düzgün və diqqətlə yazın, yazı səhvlərinə yol verməyin, fikirlərinizi dəqiq ifadə edin.',
                'Məhsulun bütün detalları, xüsusiyyətləri və xarakteristikaları təsvirdə göstərilməlidir. Təsvir əvəzinə məhsul haqqında müştərinin daha ətraflı tanış olması üçün yalnız keçid linki yerləşdirməyin. Heç də bütün istifadəçilərin məhsul haqqında daha ətraflı oxumaq üçün tanınmayan bir keçid linkinə daxil olmağa vaxtı və marağı olmur. Həmçinin, rəqib saytlara keçid linkləri də qadağandır.',
                'Dəqiq olmayan və ya yanlış məlumatın göstərilməsi, həmçinin, məhsulların qüsurlarının gizlədilməsi elanın silinməsinə səbəb ola bilər.',
                'Məzmun və məna baxımından təkrar olan elanların yerləşdirilməsi qadağandır. Transliterasiyaya – rus dilindəki sözlərin latın hərfləri ilə yazılmasına yol verilmir.',
                'Nəzərdə saxlayın: Təsvirdə telefon nömrəsinin, elektron poçt ünvanının, Skype, Instagram, Facebook və digər sosial şəbəkələrdəki hesabların linklərinin göstərilməsi qadağandır. Telefon nömrəsi və elektron poçt ünvanı üçün xüsusi sətir mövcuddur.',
                'Elanın məzmununda digər satıcı və alıcılara qarşı təhqiredici və ya tənqidi ifadələr işlətməyin. Məzmunu tənzimləmək mümkün olmadıqda, saytın formatına uyğun gəlmədiyi üçün silinəcək.',
                'Administrasiya qaydaların yuxarıda göstərilən bəndlərinə uyğun olaraq elanın təsvirini tam və ya qismən redaktə etmək hüququnu özündə saxlayır.',
                'Məzmunda qaydaların yuxarıda qeyd olunan bəndlərinə əsasən düzəlişlər etmək mümkün olmadıqda, administrasiya saytın formatına uyğun gəlməyən elanı dərc etməmək hüququnu özündə saxlayır.',
            ],
            'Şəkil' => [
                'Elanınıza mütləq şəkil əlavə edin (hər başlıq üzrə 40-a qədər şəklə icazə verilir). Optimal şəkil ölçüsü 800x600. Nəzərə çarpmayan şəkillərin yer aldığı analoji elanlardan fərqli olaraq məhsulun keyfiyyətli, dəqiq və real şəklini görən müştəri sizin təklifinizlə daha çox maraqlanacaq.',
                'Şəkillər keyfiyyətli olmalıdır.',
                'Şəkillərdə Satan.az loqotipi və ya hər hansı başqa bir loqotip olmamalıdır.',
                'Fotoda digər saytların və proqramların interfeysi göstərilməməlidir.',
                'Şəkillərdə reklam xarakterli məlumat olmamalıdır. Eləcə də, hər hansı əlaqə vasitəsinin (mobil nömrə, sayta keçid linki, Skype, ICQ, sosial şəbəkə ID-ləri, digər messencerlərin və oxşar şəbəkələrin ID-ləri, həmçinin, rəqib servislərin loqotiplərinin) göstərilməsi qadağandır.',
                'İlk fotoşəkil hamam və ya tualet olmamalıdır (yalnız "Əmlak" bölməsi üçün). Fasadın şəklini (əgər varsa) və ya otağın şəklini əsas fotoşəkilə yerləşdirməlisiniz.',
                'Elanda 2 və ya daha çox fotoşəkil varsa, birinci fotoşəkil təklif olunan məhsul və ya xidməti dəqiq əks etdirməlidir.',
                'Məhsulu/xidməti təsvir edən şəkil başlığa və elanın mətninə uyğun olmalıdır. Şəkildə yalnız təklif olunan obyekt nümayiş etdirilməlidir.',
                'Təsvir edilən obyektin aydın seçilmədiyi, keyfiyyətsiz şəklin əlavə edilməsinə yol verilmir.',
                'Elanda keyfiyyətsiz fotoşəkillərə yol verməmək üçün administrasiya saytın müəyyən məhsul kateqoriyalarında yalnız qüvvədə olan şablon fotoşəkillər siyahısından elana əlavə etmək üçün fotoşəkillər seçimi hüququnu özündə saxlayır. (Nömrələr və SIM kartlar, İş).',
                'İstifadəçinin elanıını dərc etmək və sayt qaydalarına uyğun olmayan fotoşəkillərə görə reklamı rədd etməmək üçün administrasiya şəkli şablonla əvəz etmək hüququnu özündə saxlayır.',
                'Administrasiya yuxarıda sadalanan qaydalara uyğun olmayan şəkilləri istifadəçinin fotoşəkilləri siyahısından silmək hüququnu özündə saxlayır.',
                'Şəkildə düzəlişlər etmək mümükün olmadıqda və yuxarıda sadalanan qaydaların bəndləri nəzərə alınmazsa, administrasiya saytın formatına uyğun gəlməyən elanı dərc etməmək hüququnu özündə saxlayacaq.',
            ],
            'Qara siyahı' => [
                'Operatora və ya moderatora qarşı hörmətsizlik etdikdə istifadəçinin əlaqə vasitələri blok olunacaq və o, Satan.az saytında elan yerləşdirə bilməyəcək.',
                'Saytın qaydalarını ilk dəfə pozduğu halda istifadəçiyə xəbərdarlıq edilir, bu hal təkrarlandıqda isə o, müvəqqəti qara siyahıya düşür. Müvəqqəti bloklamadan sonra qaydaların təkrar pozulması halında istifadəçi saytın daimi Qara Siyahısına əlavə edilir.',
                'Müvəqqəti Qara Siyahıda olduğunuz halda yeni hesablardan və ya əlaqə məlumatlarından reklam yerləşdirməyə çalışdığınız zaman yeni məlumatların bloklanmasına və elanların silinməsinə gətirib çıxarır. Həmçinin Müvəqqəti bloklama müddəti uzadılı və statusu daimi Qara Siyahıya qədər dəişdirilə bilər.',
                'Administrasiya istifadəçi tərəfindən qaydaların qəsdən pozulmasını aşkar edərsə və ya hər hansı qayda pozuntusu ilə bağlı sayt istifadəçilərindən təkrar şikayətlər alırsa, onu xəbərdarlıq etmədən bloklamaq hüququnu özündə saxlayır.',
                'Əlaqə vasitələrinin qara siyahıdan çıxarılması mümkün deyil.',
                'Üçüncü şəxslərin əlaqə vasitələri qeyd edildikdə və həmin səxslər şikayət etdikdə bu əlaqə vasitələri qara siyahıya düşür.',
            ],
            'Mağazalar və Şirkətlər' => [
                'Yuxarıda qeyd olunan qaydaların hər biri “Mağazalar və Şirkətlər” bölməsi üçün də keçərlidir.',
                'Mağazaların və şirkətlərin adından elan yerləşdirmək üçün ödənişli paketlərdən biri əldə olunmalıdır.
                Paket 30 gün müddətində aktivdir.',
                'Mağazaların və şirkətlərin adından elan yerləşdirən istifadəçilər öz səhifələrində yalnız qeydiyyatdan keçdikləri fəaliyyət sahəsinə uyğun elanlar yerləşdirə bilərlər.',
                'Mağazaların və şirkətlərin adından elan yerləşdirən istifadəçilərə digər ödəniş vasitələri ilə yanaşı öz balanslarından da ödəniş etmək imkanı yaradılır.',
                'Xəbərdarlığa baxmayaraq qaydalar yenidən pozularsa, elanlar ödənişli olsa belə saytdan silinəcək. Bu halda ödənilən pul geri qaytarılmır.',
                'Satan.az saytının administrasiyası saytın qaydalarının bilərəkdən pozulması halları zamanı müqaviləni ləğv etmək hüququnu özündə saxlayır. Bu halda ödənilən pul geri qaytarılmır.',
                'Mağazaların və şirkətlərin adından elan yerləşdirən istifadəçilər fəaliyyat sahələrinə aid olan elanları yalnız öz səhifələrində yerləşdirə bilərlər. Bu məqsədlə yeni istifadəçi hesablarının yaradılması və ya bu tip elanların anonim formada yerləşdirilməsi yolverilməzdir.',
                'Mağazanın/şirkətin paket çərçivəsində əldə etdiyi balans yalnız həmin mağazaya/şirkətə aid səhifədə istifadə olunmalıdır.',
            ],
            'Texniki dəstək xidməti' => [
                'Texniki dəstək xidmətinin telefonları bazar ertəsindən cümə gününədək, saat 09:00-dan 18:00-a qədər, şənbə günü isə saat 09:00-dan 13:00-a qədər işləyir.',
                'Texniki dəstək xidmətinə müraciət etdikdə mütləq elan nömrəsi qeyd olunmalıdır. Elanın nömrəsi elan yerləşdirilən zaman elektron poçt ünvanınıza göndərilir. Həmçinin şəxsi kabinetinizdə istədiyiniz elanın kartını açıb elan nömrəsinə baxa bilərsiniz.',
            ],
            'Qadağan olunmuş məhsul və xidmətlər' => [
                'Qadağan olunmuş məhsullar və xidmətlərin yer aldığı elanların yerləşdirilməsinə yol verilmir. Eyni zamanda, elanda (başlıq, mətn, video) və ya istifadəçi adında erotik, pornoqrafik, ədəbsiz, ekstremist və ya Satan.az saytının tələblərinə cavab verməyən digər məzmun və anlayışların istifadəsi yolverilməzdir.',
                'Elanı yalnız konkret məhsul və xidmətlər barəsində verin – ümumi reklam xarakterli və ya konkret təklif irəli sürməyən elanlar yolverilməzdir. Həmçinin, məhsulların hərrac yolu ilə satılması və hərracların reklam edilməsi qadağandır.',
                'Reklam xarakterli məlumatların, həmçinin aşağıdakı tip tanıtım reklamlarının yer aldığı elanlar qadağandır:
                - internet resursları (portallar, forumlar, tanışlıq saytları və s.);
                - biznes (mağazalar, şirkətlər) və məhsul çeşidlərinin, xidmətlərin və qiymətlərin sadalanması;
                - müəyyən bir məhsul və ya xidmət təqdim etməyən elanlar.',
                'Şübhəli gəlir əldə etmə üsulları, o cümlədən, internet üzərindən olan üsullar barədə elanların yerləşdirilməsi yolverilməzdir. Məsələn: Elektron pul kisəsinə 10 AZN yükləyin və daha çox qazanın.',
                'İcazəsiz və istifadə hüququ olmadan tanınmış brendlərin loqolarının və ticarət nişanlarının elanda və ya istifadəçi adında istifadə edilməsi qadağandır.',
            ],
        ];

        foreach ($subCategories as $parentTitle => $subs) {
            $parent = RuleCompany::where('title', $parentTitle)->first();

            if ($parent) {
                foreach ($subs as $subTitle) {
                    RuleCompany::create([
                        'title' => $subTitle,
                        'parent_id' => $parent->id,
                    ]);
                }
            }
        }
    }
}
