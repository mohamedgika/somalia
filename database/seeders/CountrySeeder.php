<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('countries')->delete();
        $countries = [
            ['code' => 'AF' ,'name' => "Afghanistan",'phonecode' => 93,'currency'=>''],
            ['code' => 'AL' ,'name' => "Albania",'phonecode' => 355,'currency'=>''],
            ['code' => 'DZ' ,'name' => "Algeria",'phonecode' => 213,'currency'=>''],
            ['code' => 'AS' ,'name' => "American Samoa",'phonecode' => 1684,'currency'=>''],
            ['code' => 'AD' ,'name' => "Andorra",'phonecode' => 376,'currency'=>''],
            ['code' => 'AO' ,'name' => "Angola",'phonecode' => 244,'currency'=>''],
            ['code' => 'AI' ,'name' => "Anguilla",'phonecode' => 1264,'currency'=>''],
            ['code' => 'AQ' ,'name' => "Antarctica",'phonecode' => 0,'currency'=>''],
            ['code' => 'AG' ,'name' => "Antigua And Barbuda",'phonecode' => 1268,'currency'=>''],
            ['code' => 'AR','name' => "Argentina",'phonecode' => 54,'currency'=>''],
            ['code' => 'AM','name' => "Armenia",'phonecode' => 374,'currency'=>''],
            ['code' => 'AW','name' => "Aruba",'phonecode' => 297,'currency'=>''],
            ['code' => 'AU','name' => "Australia",'phonecode' => 61,'currency'=>''],
            ['code' => 'AT','name' => "Austria",'phonecode' => 43,'currency'=>''],
            ['code' => 'AZ','name' => "Azerbaijan",'phonecode' => 994,'currency'=>''],
            ['code' => 'BS','name' => "Bahamas The",'phonecode' => 1242,'currency'=>''],
            ['code' => 'BH','name' => "Bahrain",'phonecode' => 973,'currency'=>''],
            ['code' => 'BD','name' => "Bangladesh",'phonecode' => 880,'currency'=>''],
            ['code' => 'BB','name' => "Barbados",'phonecode' => 1246,'currency'=>''],
            ['code' => 'BY','name' => "Belarus",'phonecode' => 375,'currency'=>''],
            ['code' => 'BE','name' => "Belgium",'phonecode' => 32,'currency'=>''],
            ['code' => 'BZ','name' => "Belize",'phonecode' => 501,'currency'=>''],
            ['code' => 'BJ','name' => "Benin",'phonecode' => 229,'currency'=>''],
            ['code' => 'BM','name' => "Bermuda",'phonecode' => 1441,'currency'=>''],
            ['code' => 'BT','name' => "Bhutan",'phonecode' => 975,'currency'=>''],
            ['code' => 'BO','name' => "Bolivia",'phonecode' => 591,'currency'=>''],
            ['code' => 'BA','name' => "Bosnia and Herzegovina",'phonecode' => 387,'currency'=>''],
            ['code' => 'BW','name' => "Botswana",'phonecode' => 267,'currency'=>''],
            ['code' => 'BV','name' => "Bouvet Island",'phonecode' => 0,'currency'=>''],
            ['code' => 'BR','name' => "Brazil",'phonecode' => 55,'currency'=>''],
            ['code' => 'IO','name' => "British Indian Ocean Territory",'phonecode' => 246,'currency'=>''],
            ['code' => 'BN','name' => "Brunei",'phonecode' => 673,'currency'=>''],
            ['code' => 'BG','name' => "Bulgaria",'phonecode' => 359,'currency'=>''],
            ['code' => 'BF','name' => "Burkina Faso",'phonecode' => 226,'currency'=>''],
            ['code' => 'BI','name' => "Burundi",'phonecode' => 257,'currency'=>''],
            ['code' => 'KH','name' => "Cambodia",'phonecode' => 855,'currency'=>''],
            ['code' => 'CM','name' => "Cameroon",'phonecode' => 237,'currency'=>''],
            ['code' => 'CA','name' => "Canada",'phonecode' => 1,'currency'=>''],
            ['code' => 'CV','name' => "Cape Verde",'phonecode' => 238,'currency'=>''],
            ['code' => 'KY','name' => "Cayman Islands",'phonecode' => 1345,'currency'=>''],
            ['code' => 'CF','name' => "Central African Republic",'phonecode' => 236,'currency'=>''],
            ['code' => 'TD','name' => "Chad",'phonecode' => 235,'currency'=>''],
            ['code' => 'CL','name' => "Chile",'phonecode' => 56,'currency'=>''],
            ['code' => 'CN','name' => "China",'phonecode' => 86,'currency'=>''],
            ['code' => 'CX','name' => "Christmas Island",'phonecode' => 61,'currency'=>''],
            ['code' => 'CC','name' => "Cocos (Keeling] Islands",'phonecode' => 672,'currency'=>''],
            ['code' => 'CO','name' => "Colombia",'phonecode' => 57,'currency'=>''],
            ['code' => 'KM','name' => "Comoros",'phonecode' => 269,'currency'=>''],
            ['code' => 'CG','name' => "Congo",'phonecode' => 242,'currency'=>''],
            ['code' => 'CD','name' => "Congo The Democratic Republic Of The",'phonecode' => 242,'currency'=>''],
            ['code' => 'CK','name' => "Cook Islands",'phonecode' => 682,'currency'=>''],
            ['code' => 'CR','name' => "Costa Rica",'phonecode' => 506,'currency'=>''],
            ['code' => 'CI','name' => "Cote D Ivoire (Ivory Coast]",'phonecode' => 225,'currency'=>''],
            ['code' => 'HR','name' => "Croatia (Hrvatska]",'phonecode' => 385,'currency'=>''],
            ['code' => 'CU','name' => "Cuba",'phonecode' => 53,'currency'=>''],
            ['code' => 'CY','name' => "Cyprus",'phonecode' => 357,'currency'=>''],
            ['code' => 'CZ','name' => "Czech Republic",'phonecode' => 420,'currency'=>''],
            ['code' => 'DK','name' => "Denmark",'phonecode' => 45,'currency'=>''],
            ['code' => 'DJ','name' => "Djibouti",'phonecode' => 253,'currency'=>''],
            ['code' => 'DM','name' => "Dominica",'phonecode' => 1767,'currency'=>''],
            ['code' => 'DO','name' => "Dominican Republic",'phonecode' => 1809,'currency'=>''],
            ['code' => 'TP','name' => "East Timor",'phonecode' => 670,'currency'=>''],
            ['code' => 'EC','name' => "Ecuador",'phonecode' => 593,'currency'=>''],
            ['code' => 'EG', 'name' => "Egypt", 'phonecode' => 20, 'currency' => "Egyptian Pound"],
            ['code' => 'SV','name' => "El Salvador",'phonecode' => 503,'currency'=>''],
            ['code' => 'GQ','name' => "Equatorial Guinea",'phonecode' => 240,'currency'=>''],
            ['code' => 'ER','name' => "Eritrea",'phonecode' => 291,'currency'=>''],
            ['code' => 'EE','name' => "Estonia",'phonecode' => 372,'currency'=>''],
            ['code' => 'ET','name' => "Ethiopia",'phonecode' => 251,'currency'=>''],
            ['code' => 'XA','name' => "External Territories of Australia",'phonecode' => 61,'currency'=>''],
            ['code' => 'FK','name' => "Falkland Islands",'phonecode' => 500,'currency'=>''],
            ['code' => 'FO','name' => "Faroe Islands",'phonecode' => 298,'currency'=>''],
            ['code' => 'FJ','name' => "Fiji Islands",'phonecode' => 679,'currency'=>''],
            ['code' => 'FI','name' => "Finland",'phonecode' => 358,'currency'=>''],
            ['code' => 'FR','name' => "France",'phonecode' => 33,'currency'=>''],
            ['code' => 'GF','name' => "French Guiana",'phonecode' => 594,'currency'=>''],
            ['code' => 'PF','name' => "French Polynesia",'phonecode' => 689,'currency'=>''],
            ['code' => 'TF','name' => "French Southern Territories",'phonecode' => 0,'currency'=>''],
            ['code' => 'GA','name' => "Gabon",'phonecode' => 241,'currency'=>''],
            ['code' => 'GM','name' => "Gambia The",'phonecode' => 220,'currency'=>''],
            ['code' => 'GE','name' => "Georgia",'phonecode' => 995,'currency'=>''],
            ['code' => 'DE','name' => "Germany",'phonecode' => 49,'currency'=>''],
            ['code' => 'GH','name' => "Ghana",'phonecode' => 233,'currency'=>''],
            ['code' => 'GI','name' => "Gibraltar",'phonecode' => 350,'currency'=>''],
            ['code' => 'GR','name' => "Greece",'phonecode' => 30,'currency'=>''],
            ['code' => 'GL','name' => "Greenland",'phonecode' => 299,'currency'=>''],
            ['code' => 'GD','name' => "Grenada",'phonecode' => 1473,'currency'=>''],
            ['code' => 'GP','name' => "Guadeloupe",'phonecode' => 590,'currency'=>''],
            ['code' => 'GU','name' => "Guam",'phonecode' => 1671,'currency'=>''],
            ['code' => 'GT','name' => "Guatemala",'phonecode' => 502,'currency'=>''],
            ['code' => 'XU','name' => "Guernsey and Alderney",'phonecode' => 44,'currency'=>''],
            ['code' => 'GN','name' => "Guinea",'phonecode' => 224,'currency'=>''],
            ['code' => 'GW','name' => "Guinea-Bissau",'phonecode' => 245,'currency'=>''],
            ['code' => 'GY','name' => "Guyana",'phonecode' => 592,'currency'=>''],
            ['code' => 'HT','name' => "Haiti",'phonecode' => 509,'currency'=>''],
            ['code' => 'HM','name' => "Heard and McDonald Islands",'phonecode' => 0,'currency'=>''],
            ['code' => 'HN','name' => "Honduras",'phonecode' => 504,'currency'=>''],
            ['code' => 'HK','name' => "Hong Kong S.A.R.",'phonecode' => 852,'currency'=>''],
            ['code' => 'HU','name' => "Hungary",'phonecode' => 36,'currency'=>''],
            ['code' => 'IS','name' => "Iceland",'phonecode' => 354,'currency'=>''],
            ['code' => 'IN','name' => "India",'phonecode' => 91,'currency'=>''],
            ['code' => 'ID','name' => "Indonesia",'phonecode' => 62,'currency'=>''],
            ['code' => 'IR','name' => "Iran",'phonecode' => 98,'currency'=>''],
            ['code' => 'IQ','name' => "Iraq",'phonecode' => 964,'currency'=>''],
            ['code' => 'IE','name' => "Ireland",'phonecode' => 353,'currency'=>''],
            ['code' => 'IL','name' => "Israel",'phonecode' => 972,'currency'=>''],
            ['code' => 'IT','name' => "Italy",'phonecode' => 39,'currency'=>''],
            ['code' => 'JM','name' => "Jamaica",'phonecode' => 1876,'currency'=>''],
            ['code' => 'JP','name' => "Japan",'phonecode' => 81,'currency'=>''],
            ['code' => 'XJ','name' => "Jersey",'phonecode' => 44,'currency'=>''],
            ['code' => 'JO','name' => "Jordan",'phonecode' => 962,'currency'=>"Jordanian Dinar"],
            ['code' => 'KZ','name' => "Kazakhstan",'phonecode' => 7,'currency'=>''],
            ['code' => 'KE','name' => "Kenya",'phonecode' => 254,'currency'=>''],
            ['code' => 'KI','name' => "Kiribati",'phonecode' => 686,'currency'=>''],
            ['code' => 'KP','name' => "Korea North",'phonecode' => 850,'currency'=>''],
            ['code' => 'KR','name' => "Korea South",'phonecode' => 82,'currency'=>''],
            ['code' => 'KW','name' => "Kuwait",'phonecode' => 965,'currency'=>''],
            ['code' => 'KG','name' => "Kyrgyzstan",'phonecode' => 996,'currency'=>''],
            ['code' => 'LA','name' => "Laos",'phonecode' => 856,'currency'=>''],
            ['code' => 'LV','name' => "Latvia",'phonecode' => 371,'currency'=>''],
            ['code' => 'LB','name' => "Lebanon",'phonecode' => 961,'currency'=>''],
            ['code' => 'LS','name' => "Lesotho",'phonecode' => 266,'currency'=>''],
            ['code' => 'LR','name' => "Liberia",'phonecode' => 231,'currency'=>''],
            ['code' => 'LY','name' => "Libya",'phonecode' => 218,'currency'=>''],
            ['code' => 'LI','name' => "Liechtenstein",'phonecode' => 423,'currency'=>''],
            ['code' => 'LT','name' => "Lithuania",'phonecode' => 370,'currency'=>''],
            ['code' => 'LU','name' => "Luxembourg",'phonecode' => 352,'currency'=>''],
            ['code' => 'MO','name' => "Macau S.A.R.",'phonecode' => 853,'currency'=>''],
            ['code' => 'MK','name' => "Macedonia",'phonecode' => 389,'currency'=>''],
            ['code' => 'MG','name' => "Madagascar",'phonecode' => 261,'currency'=>''],
            ['code' => 'MW','name' => "Malawi",'phonecode' => 265,'currency'=>''],
            ['code' => 'MY','name' => "Malaysia",'phonecode' => 60,'currency'=>''],
            ['code' => 'MV','name' => "Maldives",'phonecode' => 960,'currency'=>''],
            ['code' => 'ML','name' => "Mali",'phonecode' => 223,'currency'=>''],
            ['code' => 'MT','name' => "Malta",'phonecode' => 356,'currency'=>''],
            ['code' => 'XM','name' => "Man (Isle of]",'phonecode' => 44,'currency'=>''],
            ['code' => 'MH','name' => "Marshall Islands",'phonecode' => 692,'currency'=>''],
            ['code' => 'MQ','name' => "Martinique",'phonecode' => 596,'currency'=>''],
            ['code' => 'MR','name' => "Mauritania",'phonecode' => 222,'currency'=>''],
            ['code' => 'MU','name' => "Mauritius",'phonecode' => 230,'currency'=>''],
            ['code' => 'YT','name' => "Mayotte",'phonecode' => 269,'currency'=>''],
            ['code' => 'MX','name' => "Mexico",'phonecode' => 52,'currency'=>''],
            ['code' => 'FM','name' => "Micronesia",'phonecode' => 691,'currency'=>''],
            ['code' => 'MD','name' => "Moldova",'phonecode' => 373,'currency'=>''],
            ['code' => 'MC','name' => "Monaco",'phonecode' => 377,'currency'=>''],
            ['code' => 'MN','name' => "Mongolia",'phonecode' => 976,'currency'=>''],
            ['code' => 'MS','name' => "Montserrat",'phonecode' => 1664,'currency'=>''],
            ['code' => 'MA','name' => "Morocco",'phonecode' => 212,'currency'=>''],
            ['code' => 'MZ','name' => "Mozambique",'phonecode' => 258,'currency'=>''],
            ['code' => 'MM','name' => "Myanmar",'phonecode' => 95,'currency'=>''],
            ['code' => 'NA','name' => "Namibia",'phonecode' => 264,'currency'=>''],
            ['code' => 'NR','name' => "Nauru",'phonecode' => 674,'currency'=>''],
            ['code' => 'NP','name' => "Nepal",'phonecode' => 977,'currency'=>''],
            ['code' => 'AN','name' => "Netherlands Antilles",'phonecode' => 599,'currency'=>''],
            ['code' => 'NL','name' => "Netherlands The",'phonecode' => 31,'currency'=>''],
            ['code' => 'NC','name' => "New Caledonia",'phonecode' => 687,'currency'=>''],
            ['code' => 'NZ','name' => "New Zealand",'phonecode' => 64,'currency'=>''],
            ['code' => 'NI','name' => "Nicaragua",'phonecode' => 505,'currency'=>''],
            ['code' => 'NE','name' => "Niger",'phonecode' => 227,'currency'=>''],
            ['code' => 'NG','name' => "Nigeria",'phonecode' => 234,'currency'=>''],
            ['code' => 'NU','name' => "Niue",'phonecode' => 683,'currency'=>''],
            ['code' => 'NF','name' => "Norfolk Island",'phonecode' => 672,'currency'=>''],
            ['code' => 'MP','name' => "Northern Mariana Islands",'phonecode' => 1670,'currency'=>''],
            ['code' => 'NO','name' => "Norway",'phonecode' => 47,'currency'=>''],
            ['code' => 'OM','name' => "Oman",'phonecode' => 968,'currency'=>''],
            ['code' => 'PK','name' => "Pakistan",'phonecode' => 92,'currency'=>''],
            ['code' => 'PW','name' => "Palau",'phonecode' => 680,'currency'=>''],
            ['code' => 'PS','name' => "Palestinian Territory Occupied",'phonecode' => 970,'currency'=>''],
            ['code' => 'PA','name' => "Panama",'phonecode' => 507,'currency'=>''],
            ['code' => 'PG','name' => "Papua new Guinea",'phonecode' => 675,'currency'=>''],
            ['code' => 'PY','name' => "Paraguay",'phonecode' => 595,'currency'=>''],
            ['code' => 'PE','name' => "Peru",'phonecode' => 51,'currency'=>''],
            ['code' => 'PH','name' => "Philippines",'phonecode' => 63,'currency'=>''],
            ['code' => 'PN','name' => "Pitcairn Island",'phonecode' => 0,'currency'=>''],
            ['code' => 'PL','name' => "Poland",'phonecode' => 48,'currency'=>''],
            ['code' => 'PT','name' => "Portugal",'phonecode' => 351,'currency'=>''],
            ['code' => 'PR','name' => "Puerto Rico",'phonecode' => 1787,'currency'=>''],
            ['code' => 'QA','name' => "Qatar",'phonecode' => 974,'currency'=>''],
            ['code' => 'RE','name' => "Reunion",'phonecode' => 262,'currency'=>''],
            ['code' => 'RO','name' => "Romania",'phonecode' => 40,'currency'=>''],
            ['code' => 'RU','name' => "Russia",'phonecode' => 70,'currency'=>''],
            ['code' => 'RW','name' => "Rwanda",'phonecode' => 250,'currency'=>''],
            ['code' => 'SH','name' => "Saint Helena",'phonecode' => 290,'currency'=>''],
            ['code' => 'KN','name' => "Saint Kitts And Nevis",'phonecode' => 1869,'currency'=>''],
            ['code' => 'LC','name' => "Saint Lucia",'phonecode' => 1758,'currency'=>''],
            ['code' => 'PM','name' => "Saint Pierre and Miquelon",'phonecode' => 508,'currency'=>''],
            ['code' => 'VC','name' => "Saint Vincent And The Grenadines",'phonecode' => 1784,'currency'=>''],
            ['code' => 'WS','name' => "Samoa",'phonecode' => 684,'currency'=>''],
            ['code' => 'SM','name' => "San Marino",'phonecode' => 378,'currency'=>''],
            ['code' => 'ST','name' => "Sao Tome and Principe",'phonecode' => 239,'currency'=>''],
            ['code' => 'SA','name' => "Saudi Arabia",'phonecode' => 966,'currency'=>''],
            ['code' => 'SN','name' => "Senegal",'phonecode' => 221,'currency'=>''],
            ['code' => 'RS','name' => "Serbia",'phonecode' => 381,'currency'=>''],
            ['code' => 'SC','name' => "Seychelles",'phonecode' => 248,'currency'=>''],
            ['code' => 'SL','name' => "Sierra Leone",'phonecode' => 232,'currency'=>''],
            ['code' => 'SG','name' => "Singapore",'phonecode' => 65,'currency'=>''],
            ['code' => 'SK','name' => "Slovakia",'phonecode' => 421,'currency'=>''],
            ['code' => 'SI','name' => "Slovenia",'phonecode' => 386,'currency'=>''],
            ['code' => 'XG','name' => "Smaller Territories of the UK",'phonecode' => 44,'currency'=>''],
            ['code' => 'SB','name' => "Solomon Islands",'phonecode' => 677,'currency'=>''],
            ['code' => 'SO', 'name' => "Somalia", 'phonecode' => 252, 'currency' => "Somali Shilling"],
            ['code' => 'ZA','name' => "South Africa",'phonecode' => 27,'currency'=>''],
            ['code' => 'GS','name' => "South Georgia",'phonecode' => 0,'currency'=>''],
            ['code' => 'SS','name' => "South Sudan",'phonecode' => 211,'currency'=>''],
            ['code' => 'ES','name' => "Spain",'phonecode' => 34,'currency'=>''],
            ['code' => 'LK','name' => "Sri Lanka",'phonecode' => 94,'currency'=>''],
            ['code' => 'SD','name' => "Sudan",'phonecode' => 249,'currency'=>''],
            ['code' => 'SR','name' => "Suriname",'phonecode' => 597,'currency'=>''],
            ['code' => 'SJ','name' => "Svalbard And Jan Mayen Islands",'phonecode' => 47,'currency'=>''],
            ['code' => 'SZ','name' => "Swaziland",'phonecode' => 268,'currency'=>''],
            ['code' => 'SE','name' => "Sweden",'phonecode' => 46,'currency'=>''],
            ['code' => 'CH','name' => "Switzerland",'phonecode' => 41,'currency'=>''],
            ['code' => 'SY','name' => "Syria",'phonecode' => 963,'currency'=>''],
            ['code' => 'TW','name' => "Taiwan",'phonecode' => 886,'currency'=>''],
            ['code' => 'TJ','name' => "Tajikistan",'phonecode' => 992,'currency'=>''],
            ['code' => 'TZ','name' => "Tanzania",'phonecode' => 255,'currency'=>''],
            ['code' => 'TH','name' => "Thailand",'phonecode' => 66,'currency'=>''],
            ['code' => 'TG','name' => "Togo",'phonecode' => 228,'currency'=>''],
            ['code' => 'TK','name' => "Tokelau",'phonecode' => 690,'currency'=>''],
            ['code' => 'TO','name' => "Tonga",'phonecode' => 676,'currency'=>''],
            ['code' => 'TT','name' => "Trinidad And Tobago",'phonecode' => 1868,'currency'=>''],
            ['code' => 'TN','name' => "Tunisia",'phonecode' => 216,'currency'=>''],
            ['code' => 'TR','name' => "Turkey",'phonecode' => 90,'currency'=>''],
            ['code' => 'TM','name' => "Turkmenistan",'phonecode' => 7370,'currency'=>''],
            ['code' => 'TC','name' => "Turks And Caicos Islands",'phonecode' => 1649,'currency'=>''],
            ['code' => 'TV','name' => "Tuvalu",'phonecode' => 688,'currency'=>''],
            ['code' => 'UG','name' => "Uganda",'phonecode' => 256,'currency'=>''],
            ['code' => 'UA','name' => "Ukraine",'phonecode' => 380,'currency'=>''],
            ['code' => 'AE','name' => "United Arab Emirates",'phonecode' => 971,'currency'=>''],
            ['code' => 'GB','name' => "United Kingdom",'phonecode' => 44,'currency'=>''],
            ['code' => 'US','name' => "United States",'phonecode' => 1,'currency'=>"US Dollar"],
            ['code' => 'UM','name' => "United States Minor Outlying Islands",'phonecode' => 1,'currency'=>''],
            ['code' => 'UY','name' => "Uruguay",'phonecode' => 598,'currency'=>''],
            ['code' => 'UZ','name' => "Uzbekistan",'phonecode' => 998,'currency'=>''],
            ['code' => 'VU','name' => "Vanuatu",'phonecode' => 678,'currency'=>''],
            ['code' => 'VA','name' => "Vatican City State (Holy See]",'phonecode' => 39,'currency'=>''],
            ['code' => 'VE','name' => "Venezuela",'phonecode' => 58,'currency'=>''],
            ['code' => 'VN','name' => "Vietnam",'phonecode' => 84,'currency'=>''],
            ['code' => 'VG','name' => "Virgin Islands (British]",'phonecode' => 1284,'currency'=>''],
            ['code' => 'VI','name' => "Virgin Islands (US]",'phonecode' => 1340,'currency'=>''],
            ['code' => 'WF','name' => "Wallis And Futuna Islands",'phonecode' => 681,'currency'=>''],
            ['code' => 'EH','name' => "Western Sahara",'phonecode' => 212,'currency'=>''],
            ['code' => 'YE','name' => "Yemen",'phonecode' => 967,'currency'=>''],
            ['code' => 'YU','name' => "Yugoslavia",'phonecode' => 38,'currency'=>''],
            ['code' => 'ZM','name' => "Zambia",'phonecode' => 260,'currency'=>''],
            ['code' => 'ZW','name' => "Zimbabwe",'phonecode' => 263,'currency'=>''],
            ];

            foreach ($countries as $country) {
                Country::create($country);
            }

        // Country::where('id',64)->create()->addMedia(public_path('country/cairo.jpg'))->toMediaCollection('country', 'country');
        // Country::where('id',69)->create()->addMedia(public_path('country/somalia.jpg'))->toMediaCollection('country', 'country');
    }
}
