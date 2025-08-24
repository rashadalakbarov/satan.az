<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ana Kategoriler
        $mainCategories  = [            
            [
                'title' => 'Uşaq aləmi',
                'image' => 'usaq_alemi.png',
            ],
            [
                'title' => 'Şəxsi əşyalar',
                'image' => 'ozel_esyalar.png',
            ],
            [
                'title' => 'Ev və bağ üçün',
                'image' => 'ev_bag_ucun.png',
            ],
            [
                'title' => 'Elektronika',
                'image' => 'elektronika.png',
            ],
            [
                'title' => 'Hobbi və asudə',
                'image' => 'hobby.png',
            ],
            [
                'title' => 'Nəqliyyat',
                'image' => 'avtomobil.png',
            ],
            [
                'title' => 'Daşınmaz əmlak',
                'image' => 'dasinmaz_emlak.png',
            ],
            [
                'title' => 'İş elanları',
                'image' => 'is_elanlari.png',
            ],
            [
                'title' => 'Heyvanlar',
                'image' => 'heyvanlar.png',
            ],
            [
                'title' => 'Xidmətlər və biznes',
                'image' => 'services_business.png',
            ],
        ];

        $insertedMain = [];

        foreach ($mainCategories as $mainCategory) {
            $record = Category::create([
                'image' => $mainCategory['image'],
                'title' => $mainCategory['title'],
                'seflink' => Str::slug($mainCategory['title']),
                'parent_id' => null,
            ]);

            // Kategori adı => ID eşlemesi
            $insertedMain[$mainCategory['title']] = $record->id;
        }

        // Alt Kategoriler
        $subCategories  = [   
            // Uşaq aləmi         
            [
                'title' => 'Avtomobil oturacaqları',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Oyuncaqlar',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Uşaq arabaları',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Uşaq avtomobilləri',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Çarpayılar və beşiklər',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Uşaq daşıyıcıları',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Uşaq geyimi',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Uşaq mebeli',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Uşaq qidası və bəslənməsi',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Sürüşkənlər və meydançalar',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Manejlər',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
             [
                'title' => 'Məktəblilər üçün',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Yürütəclər',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
             [
                'title' => 'Hamam və gigiyena',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Uşaq tekstili',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
             [
                'title' => 'Qidalanma oturacaqları',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'title' => 'Digər',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],

            // Şəxsi əşyalar
            [
                'title' => 'Geyim və ayaqqabılar',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],
            [
                'title' => 'Saat və zinət əşyaları',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],
            [
                'title' => 'Aksesuarlar',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],
            [
                'title' => 'Sağlamlıq və gözəllik',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],
            [
                'title' => 'itmiş əşyalar',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],
            [
                'title' => 'Elektron siqaretlər və tütün qızdırıcıları',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],

            // Ev və bağ üçün
            [
                'title' => 'Təmir və tikinti',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Mebellər',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Məişət texnikası',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Qab-qacaq və mətbəx ləvazimatları',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Ərzaq',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Bitkilər',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Xalçalar və aksesuarlar',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Ev tekstili',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Ev və bağ üçün işıqlandırma',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Dekor və interyer',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Bağ və bostan',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'title' => 'Ev təsərrüfatı malları',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],

            // Elektronika
            [
                'title' => 'Audio və video',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Kompyuter aksesuarları',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Oyunlar, pultlar və proqramlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Masaüstü kompyuterlər',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Komponentlər və monitorlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Planşet və elektron kitablar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Noutbuklar və netbuklar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Ofis avadanlığı və istehlak materialları',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Telefonlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Nömrələr və SİM-kartlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Fototexnika',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Smart saat və qolbaqlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Televizorlar və aksesuarlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'title' => 'Şəbəkə və server avadanlığı',
                'parent_id' => $insertedMain['Elektronika'],
            ],

            // Hobbi və asudə
            [
                'title' => 'Biletlər və səyahətlər',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'title' => 'Velosipedlər',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'title' => 'Kolleksiyalar',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'title' => 'Musiqi alətləri',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'title' => 'İdman və asudə',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'title' => 'Kitab və jurnallar',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'title' => 'Kempinq, ovçuluq və bağçılıq',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'title' => 'Tanışlıq',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
 
            // Nəqliyyat
            [
                'title' => 'Avtomobillər',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'title' => 'Ehtiyyat hissələri və aksesuarlar',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'title' => 'Su nəqliyyatı',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'title' => 'Motosikletlər və mopedlər',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'title' => 'Tikinti texnikası',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'title' => 'Aqrotexnika',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'title' => 'Avtobuslar',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'title' => 'Yük maşınları və qoşqular',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'title' => 'Qeydiyyat nişanları',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],

            // Daşınmaz əmlak
            [
                'title' => 'Mənzillər',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],
            [
                'title' => 'Həyət evləri, bağ evləri',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],
            [
                'title' => 'Torpaq',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],
            [
                'title' => 'Qarajlar',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],
            [
                'title' => 'Xaricdə əmlak',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],
            [
                'title' => 'Obyektlər və ofislər',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],

            // İş elanları
            [
                'title' => 'Vakansiyalar',
                'parent_id' => $insertedMain['İş elanları'],
            ],
            [
                'title' => 'İş axtarıram',
                'parent_id' => $insertedMain['İş elanları'],
            ],

            // Heyvanlar
            [
                'title' => 'İtlər',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'title' => 'Pişiklər',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'title' => 'Quşlar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'title' => 'Akvariumlar və balıqlar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'title' => 'K/T heyvanları',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'title' => 'Heyvanlar üçün məhsullar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'title' => 'Dovşanlar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'title' => 'Atlar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'title' => 'Gəmiricilər',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'title' => 'Digər heyvanlar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],

            // Xidmətlər və biznes
            [
                'title' => 'Avadanlığın icarəsi',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Avadanlıqların quraşdırılması',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Biznes üçün avadanlıq',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Avtoservis və diaqnostika',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Dayələr, baxıcılar',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Foto və video çəkiliş xidmətləri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Gözəllik, sağlamlıq',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Hüquq xidmətləri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'İT, internet, reklam',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Logistika',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Mebel yığılması və təmiri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Musiqi, əyləncə və tədbirlər',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Mühasibat xidmətləri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Nəqliyyat vasitələrinin icarəsi',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Qidalanma, keytering',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Reklam, dizayn və poliqrafiya',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Siğorta qiymətləri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Təhlükəsizlik sistemləri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Təlim, hazırlıq kursları',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Təmir və tikinti',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Təmizlik',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Tərcümə',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Texnika təmiri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Tibbi xidmətlər',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'title' => 'Digər',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
        ];

        foreach ($subCategories as $sub) {
            Category::create([
                'title' => $sub['title'],
                'seflink' => Str::slug($sub['title']),
                'parent_id' => $sub['parent_id'],
            ]);
        }
    }
}
