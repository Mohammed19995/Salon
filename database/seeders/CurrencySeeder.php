<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = '[
{"id":"1","name_ar":"US Dollar","name_en":"US Dollar","symbol_ar":"$","symbol_en":"$","code":"USD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"2","name_ar":"Canadian Dollar","name_en":"Canadian Dollar","symbol_ar":"$","symbol_en":"CA$","code":"CAD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"3","name_ar":"Euro","name_en":"Euro","symbol_ar":"€","symbol_en":"€","code":"EUR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"4","name_ar":"United Arab Emirates Dirham","name_en":"United Arab Emirates Dirham","symbol_ar":"د.إ.‏","symbol_en":"AED","code":"AED","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"5","name_ar":"Afghan Afghani","name_en":"Afghan Afghani","symbol_ar":"؋","symbol_en":"Af","code":"AFN","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"6","name_ar":"Albanian Lek","name_en":"Albanian Lek","symbol_ar":"Lek","symbol_en":"ALL","code":"ALL","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"7","name_ar":"Armenian Dram","name_en":"Armenian Dram","symbol_ar":"դր.","symbol_en":"AMD","code":"AMD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"8","name_ar":"Argentine Peso","name_en":"Argentine Peso","symbol_ar":"$","symbol_en":"AR$","code":"ARS","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"9","name_ar":"Australian Dollar","name_en":"Australian Dollar","symbol_ar":"$","symbol_en":"AU$","code":"AUD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"10","name_ar":"Azerbaijani Manat","name_en":"Azerbaijani Manat","symbol_ar":"ман.","symbol_en":"man.","code":"AZN","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"11","name_ar":"Bosnia-Herzegovina Convertible Mark","name_en":"Bosnia-Herzegovina Convertible Mark","symbol_ar":"KM","symbol_en":"KM","code":"BAM","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"12","name_ar":"Bangladeshi Taka","name_en":"Bangladeshi Taka","symbol_ar":"৳","symbol_en":"Tk","code":"BDT","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"13","name_ar":"Bulgarian Lev","name_en":"Bulgarian Lev","symbol_ar":"лв.","symbol_en":"BGN","code":"BGN","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"14","name_ar":"Bahraini Dinar","name_en":"Bahraini Dinar","symbol_ar":"د.ب.‏","symbol_en":"BD","code":"BHD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"15","name_ar":"Burundian Franc","name_en":"Burundian Franc","symbol_ar":"FBu","symbol_en":"FBu","code":"BIF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"16","name_ar":"Brunei Dollar","name_en":"Brunei Dollar","symbol_ar":"$","symbol_en":"BN$","code":"BND","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"17","name_ar":"Bolivian Boliviano","name_en":"Bolivian Boliviano","symbol_ar":"Bs","symbol_en":"Bs","code":"BOB","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"18","name_ar":"Brazilian Real","name_en":"Brazilian Real","symbol_ar":"R$","symbol_en":"R$","code":"BRL","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"19","name_ar":"Botswanan Pula","name_en":"Botswanan Pula","symbol_ar":"P","symbol_en":"BWP","code":"BWP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"20","name_ar":"Belarusian Ruble","name_en":"Belarusian Ruble","symbol_ar":"руб.","symbol_en":"Br","code":"BYN","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"21","name_ar":"Belize Dollar","name_en":"Belize Dollar","symbol_ar":"$","symbol_en":"BZ$","code":"BZD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"22","name_ar":"Congolese Franc","name_en":"Congolese Franc","symbol_ar":"FrCD","symbol_en":"CDF","code":"CDF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"23","name_ar":"Swiss Franc","name_en":"Swiss Franc","symbol_ar":"CHF","symbol_en":"CHF","code":"CHF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"24","name_ar":"Chilean Peso","name_en":"Chilean Peso","symbol_ar":"$","symbol_en":"CL$","code":"CLP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"25","name_ar":"Chinese Yuan","name_en":"Chinese Yuan","symbol_ar":"CN¥","symbol_en":"CN¥","code":"CNY","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"26","name_ar":"Colombian Peso","name_en":"Colombian Peso","symbol_ar":"$","symbol_en":"CO$","code":"COP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"27","name_ar":"Costa Rican Colón","name_en":"Costa Rican Colón","symbol_ar":"₡","symbol_en":"₡","code":"CRC","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"28","name_ar":"Cape Verdean Escudo","name_en":"Cape Verdean Escudo","symbol_ar":"CV$","symbol_en":"CV$","code":"CVE","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"29","name_ar":"Czech Republic Koruna","name_en":"Czech Republic Koruna","symbol_ar":"Kč","symbol_en":"Kč","code":"CZK","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"30","name_ar":"Djiboutian Franc","name_en":"Djiboutian Franc","symbol_ar":"Fdj","symbol_en":"Fdj","code":"DJF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"31","name_ar":"Danish Krone","name_en":"Danish Krone","symbol_ar":"kr","symbol_en":"Dkr","code":"DKK","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"32","name_ar":"Dominican Peso","name_en":"Dominican Peso","symbol_ar":"RD$","symbol_en":"RD$","code":"DOP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"33","name_ar":"Algerian Dinar","name_en":"Algerian Dinar","symbol_ar":"د.ج.‏","symbol_en":"DA","code":"DZD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"34","name_ar":"Estonian Kroon","name_en":"Estonian Kroon","symbol_ar":"kr","symbol_en":"Ekr","code":"EEK","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"35","name_ar":"Egyptian Pound","name_en":"Egyptian Pound","symbol_ar":"ج.م.‏","symbol_en":"EGP","code":"EGP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"36","name_ar":"Eritrean Nakfa","name_en":"Eritrean Nakfa","symbol_ar":"Nfk","symbol_en":"Nfk","code":"ERN","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"37","name_ar":"Ethiopian Birr","name_en":"Ethiopian Birr","symbol_ar":"Br","symbol_en":"Br","code":"ETB","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"38","name_ar":"British Pound Sterling","name_en":"British Pound Sterling","symbol_ar":"£","symbol_en":"£","code":"GBP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"39","name_ar":"Georgian Lari","name_en":"Georgian Lari","symbol_ar":"GEL","symbol_en":"GEL","code":"GEL","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"40","name_ar":"Ghanaian Cedi","name_en":"Ghanaian Cedi","symbol_ar":"GH₵","symbol_en":"GH₵","code":"GHS","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"41","name_ar":"Guinean Franc","name_en":"Guinean Franc","symbol_ar":"FG","symbol_en":"FG","code":"GNF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"42","name_ar":"Guatemalan Quetzal","name_en":"Guatemalan Quetzal","symbol_ar":"Q","symbol_en":"GTQ","code":"GTQ","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"43","name_ar":"Hong Kong Dollar","name_en":"Hong Kong Dollar","symbol_ar":"$","symbol_en":"HK$","code":"HKD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"44","name_ar":"Honduran Lempira","name_en":"Honduran Lempira","symbol_ar":"L","symbol_en":"HNL","code":"HNL","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"45","name_ar":"Croatian Kuna","name_en":"Croatian Kuna","symbol_ar":"kn","symbol_en":"kn","code":"HRK","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"46","name_ar":"Hungarian Forint","name_en":"Hungarian Forint","symbol_ar":"Ft","symbol_en":"Ft","code":"HUF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"47","name_ar":"Indonesian Rupiah","name_en":"Indonesian Rupiah","symbol_ar":"Rp","symbol_en":"Rp","code":"IDR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"48","name_ar":"Israeli New Sheqel","name_en":"Israeli New Sheqel","symbol_ar":"₪","symbol_en":"₪","code":"ILS","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"49","name_ar":"Indian Rupee","name_en":"Indian Rupee","symbol_ar":"টকা","symbol_en":"Rs","code":"INR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"50","name_ar":"Iraqi Dinar","name_en":"Iraqi Dinar","symbol_ar":"د.ع.‏","symbol_en":"IQD","code":"IQD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"51","name_ar":"Iranian Rial","name_en":"Iranian Rial","symbol_ar":"﷼","symbol_en":"IRR","code":"IRR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"52","name_ar":"Icelandic Króna","name_en":"Icelandic Króna","symbol_ar":"kr","symbol_en":"Ikr","code":"ISK","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"53","name_ar":"Jamaican Dollar","name_en":"Jamaican Dollar","symbol_ar":"$","symbol_en":"J$","code":"JMD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"54","name_ar":"Jordanian Dinar","name_en":"Jordanian Dinar","symbol_ar":"د.أ.‏","symbol_en":"JD","code":"JOD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"55","name_ar":"Japanese Yen","name_en":"Japanese Yen","symbol_ar":"￥","symbol_en":"¥","code":"JPY","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"56","name_ar":"Kenyan Shilling","name_en":"Kenyan Shilling","symbol_ar":"Ksh","symbol_en":"Ksh","code":"KES","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"57","name_ar":"Cambodian Riel","name_en":"Cambodian Riel","symbol_ar":"៛","symbol_en":"KHR","code":"KHR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"58","name_ar":"Comorian Franc","name_en":"Comorian Franc","symbol_ar":"FC","symbol_en":"CF","code":"KMF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"59","name_ar":"South Korean Won","name_en":"South Korean Won","symbol_ar":"₩","symbol_en":"₩","code":"KRW","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"60","name_ar":"Kuwaiti Dinar","name_en":"Kuwaiti Dinar","symbol_ar":"د.ك.‏","symbol_en":"KD","code":"KWD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"61","name_ar":"Kazakhstani Tenge","name_en":"Kazakhstani Tenge","symbol_ar":"тңг.","symbol_en":"KZT","code":"KZT","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"62","name_ar":"Lebanese Pound","name_en":"Lebanese Pound","symbol_ar":"ل.ل.‏","symbol_en":"LB£","code":"LBP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"63","name_ar":"Sri Lankan Rupee","name_en":"Sri Lankan Rupee","symbol_ar":"SL Re","symbol_en":"SLRs","code":"LKR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"64","name_ar":"Lithuanian Litas","name_en":"Lithuanian Litas","symbol_ar":"Lt","symbol_en":"Lt","code":"LTL","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"65","name_ar":"Latvian Lats","name_en":"Latvian Lats","symbol_ar":"Ls","symbol_en":"Ls","code":"LVL","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"66","name_ar":"Libyan Dinar","name_en":"Libyan Dinar","symbol_ar":"د.ل.‏","symbol_en":"LD","code":"LYD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"67","name_ar":"Moroccan Dirham","name_en":"Moroccan Dirham","symbol_ar":"د.م.‏","symbol_en":"MAD","code":"MAD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"68","name_ar":"Moldovan Leu","name_en":"Moldovan Leu","symbol_ar":"MDL","symbol_en":"MDL","code":"MDL","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"69","name_ar":"Malagasy Ariary","name_en":"Malagasy Ariary","symbol_ar":"MGA","symbol_en":"MGA","code":"MGA","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"70","name_ar":"Macedonian Denar","name_en":"Macedonian Denar","symbol_ar":"MKD","symbol_en":"MKD","code":"MKD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"71","name_ar":"Myanma Kyat","name_en":"Myanma Kyat","symbol_ar":"K","symbol_en":"MMK","code":"MMK","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"72","name_ar":"Macanese Pataca","name_en":"Macanese Pataca","symbol_ar":"MOP$","symbol_en":"MOP$","code":"MOP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"73","name_ar":"Mauritian Rupee","name_en":"Mauritian Rupee","symbol_ar":"MURs","symbol_en":"MURs","code":"MUR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"74","name_ar":"Mexican Peso","name_en":"Mexican Peso","symbol_ar":"$","symbol_en":"MX$","code":"MXN","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"75","name_ar":"Malaysian Ringgit","name_en":"Malaysian Ringgit","symbol_ar":"RM","symbol_en":"RM","code":"MYR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"76","name_ar":"Mozambican Metical","name_en":"Mozambican Metical","symbol_ar":"MTn","symbol_en":"MTn","code":"MZN","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"77","name_ar":"Namibian Dollar","name_en":"Namibian Dollar","symbol_ar":"N$","symbol_en":"N$","code":"NAD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"78","name_ar":"Nigerian Naira","name_en":"Nigerian Naira","symbol_ar":"₦","symbol_en":"₦","code":"NGN","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"79","name_ar":"Nicaraguan Córdoba","name_en":"Nicaraguan Córdoba","symbol_ar":"C$","symbol_en":"C$","code":"NIO","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"80","name_ar":"Norwegian Krone","name_en":"Norwegian Krone","symbol_ar":"kr","symbol_en":"Nkr","code":"NOK","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"81","name_ar":"Nepalese Rupee","name_en":"Nepalese Rupee","symbol_ar":"नेरू","symbol_en":"NPRs","code":"NPR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"82","name_ar":"New Zealand Dollar","name_en":"New Zealand Dollar","symbol_ar":"$","symbol_en":"NZ$","code":"NZD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"83","name_ar":"Omani Rial","name_en":"Omani Rial","symbol_ar":"ر.ع.‏","symbol_en":"OMR","code":"OMR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"84","name_ar":"Panamanian Balboa","name_en":"Panamanian Balboa","symbol_ar":"B\/.","symbol_en":"B\/.","code":"PAB","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"85","name_ar":"Peruvian Nuevo Sol","name_en":"Peruvian Nuevo Sol","symbol_ar":"S\/.","symbol_en":"S\/.","code":"PEN","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"86","name_ar":"Philippine Peso","name_en":"Philippine Peso","symbol_ar":"₱","symbol_en":"₱","code":"PHP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"87","name_ar":"Pakistani Rupee","name_en":"Pakistani Rupee","symbol_ar":"₨","symbol_en":"PKRs","code":"PKR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"88","name_ar":"Polish Zloty","name_en":"Polish Zloty","symbol_ar":"zł","symbol_en":"zł","code":"PLN","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"89","name_ar":"Paraguayan Guarani","name_en":"Paraguayan Guarani","symbol_ar":"₲","symbol_en":"₲","code":"PYG","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"90","name_ar":"Qatari Rial","name_en":"Qatari Rial","symbol_ar":"ر.ق.‏","symbol_en":"QR","code":"QAR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"91","name_ar":"Romanian Leu","name_en":"Romanian Leu","symbol_ar":"RON","symbol_en":"RON","code":"RON","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"92","name_ar":"Serbian Dinar","name_en":"Serbian Dinar","symbol_ar":"дин.","symbol_en":"din.","code":"RSD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"93","name_ar":"Russian Ruble","name_en":"Russian Ruble","symbol_ar":"₽.","symbol_en":"RUB","code":"RUB","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"94","name_ar":"Rwandan Franc","name_en":"Rwandan Franc","symbol_ar":"FR","symbol_en":"RWF","code":"RWF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"95","name_ar":"Saudi Riyal","name_en":"Saudi Riyal","symbol_ar":"ر.س.‏","symbol_en":"SR","code":"SAR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"96","name_ar":"Sudanese Pound","name_en":"Sudanese Pound","symbol_ar":"SDG","symbol_en":"SDG","code":"SDG","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"97","name_ar":"Swedish Krona","name_en":"Swedish Krona","symbol_ar":"kr","symbol_en":"Skr","code":"SEK","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"98","name_ar":"Singapore Dollar","name_en":"Singapore Dollar","symbol_ar":"$","symbol_en":"S$","code":"SGD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"99","name_ar":"Somali Shilling","name_en":"Somali Shilling","symbol_ar":"Ssh","symbol_en":"Ssh","code":"SOS","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"100","name_ar":"Syrian Pound","name_en":"Syrian Pound","symbol_ar":"ل.س.‏","symbol_en":"SY£","code":"SYP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"101","name_ar":"Thai Baht","name_en":"Thai Baht","symbol_ar":"฿","symbol_en":"฿","code":"THB","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"102","name_ar":"Tunisian Dinar","name_en":"Tunisian Dinar","symbol_ar":"د.ت.‏","symbol_en":"DT","code":"TND","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"103","name_ar":"Tongan Paʻanga","name_en":"Tongan Paʻanga","symbol_ar":"T$","symbol_en":"T$","code":"TOP","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"104","name_ar":"Turkish Lira","name_en":"Turkish Lira","symbol_ar":"TL","symbol_en":"TL","code":"TRY","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"105","name_ar":"Trinidad and Tobago Dollar","name_en":"Trinidad and Tobago Dollar","symbol_ar":"$","symbol_en":"TT$","code":"TTD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"106","name_ar":"New Taiwan Dollar","name_en":"New Taiwan Dollar","symbol_ar":"NT$","symbol_en":"NT$","code":"TWD","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"107","name_ar":"Tanzanian Shilling","name_en":"Tanzanian Shilling","symbol_ar":"TSh","symbol_en":"TSh","code":"TZS","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"108","name_ar":"Ukrainian Hryvnia","name_en":"Ukrainian Hryvnia","symbol_ar":"₴","symbol_en":"₴","code":"UAH","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"109","name_ar":"Ugandan Shilling","name_en":"Ugandan Shilling","symbol_ar":"USh","symbol_en":"USh","code":"UGX","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"110","name_ar":"Uruguayan Peso","name_en":"Uruguayan Peso","symbol_ar":"$","symbol_en":"$U","code":"UYU","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"111","name_ar":"Uzbekistan Som","name_en":"Uzbekistan Som","symbol_ar":"UZS","symbol_en":"UZS","code":"UZS","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"112","name_ar":"Venezuelan Bolívar","name_en":"Venezuelan Bolívar","symbol_ar":"Bs.F.","symbol_en":"Bs.F.","code":"VEF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"113","name_ar":"Vietnamese Dong","name_en":"Vietnamese Dong","symbol_ar":"₫","symbol_en":"₫","code":"VND","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"114","name_ar":"CFA Franc BEAC","name_en":"CFA Franc BEAC","symbol_ar":"FCFA","symbol_en":"FCFA","code":"XAF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"115","name_ar":"CFA Franc BCEAO","name_en":"CFA Franc BCEAO","symbol_ar":"CFA","symbol_en":"CFA","code":"XOF","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"116","name_ar":"Yemeni Rial","name_en":"Yemeni Rial","symbol_ar":"ر.ي.‏","symbol_en":"YR","code":"YER","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"117","name_ar":"South African Rand","name_en":"South African Rand","symbol_ar":"R","symbol_en":"R","code":"ZAR","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"118","name_ar":"Zambian Kwacha","name_en":"Zambian Kwacha","symbol_ar":"ZK","symbol_en":"ZK","code":"ZMK","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null},
{"id":"119","name_ar":"Zimbabwean Dollar","name_en":"Zimbabwean Dollar","symbol_ar":"ZWL$","symbol_en":"ZWL$","code":"ZWL","status":"1","created_at":"2020-02-16 13:55:24","updated_at":null}
]';

        $currencies = json_decode($currencies , true);
        foreach ($currencies as $currency) {
            Currency::create([
                'name'          => ['ar' => $currency['name_ar'] , 'en' => $currency['name_en']],
                'symbol'        => ['ar' => $currency['symbol_ar'] , 'en' => $currency['symbol_en']],
                'code'          => $currency['code'],
                'status'        => 1
            ]);
        }
    }
}
