<?php

return [

    /*
      |--------------------------------------------------------------------------
      | Validation Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines contain the default error messages used by
      | the validator class. Some of these rules have multiple versions such
      | as the size rules. Feel free to tweak each of these messages here.
      |
     */
    'source_id_required' => 'الرجاء تحديد مصدر الحدث',
    'applicant_subscription_required' => 'الرجاء كتابة رقم الاشتراك',
    'description_required' => 'الرجاء كتابة وصف الحدث',
    'accepted' => 'يجب قبول الحقل :attribute',
    'active_url' => 'الحقل :attribute لا يُمثّل رابطًا صحيحًا',
    'after' => 'يجب على الحقل :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => 'الحقل :attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي الحقل :attribute سوى على حروف',
    'alpha_dash' => 'يجب أن لا يحتوي الحقل :attribute على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array' => 'يجب أن يكون الحقل :attribute ًمصفوفة',
    'before' => 'يجب على الحقل :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => 'الحقل :attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between' => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
        'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean' => 'يجب أن تكون قيمة الحقل :attribute إما true أو false ',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date' => 'الحقل :attribute ليس تاريخًا صحيحًا',
    'date_format' => 'لا يتوافق الحقل :attribute مع الشكل :format.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits' => 'يجب أن يحتوي الحقل :attribute على :digits رقمًا/أرقام',
    'digits_between' => 'يجب أن يحتوي الحقل :attribute بين :min و :max رقمًا/أرقام ',
    'dimensions' => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'exists' => 'الحقل :attribute غير موجود',
    'file' => 'الـ :attribute يجب أن يكون من ملفا.',
    'filled' => 'الحقل :attribute إجباري',
    'image' => 'يجب أن يكون الحقل :attribute صورةً',
    'in' => 'الحقل :attribute لاغٍ',
    'in_array' => 'الحقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون الحقل :attribute عددًا صحيحًا',
    'ip' => 'يجب أن يكون الحقل :attribute عنوان IP ذا بُنية صحيحة',
    'ipv4' => 'يجب أن يكون الحقل :attribute عنوان IPv4 ذا بنية صحيحة.',
    'ipv6' => 'يجب أن يكون الحقل :attribute عنوان IPv6 ذا بنية صحيحة.',
    'json' => 'يجب أن يكون الحقل :attribute نصا من نوع JSON.',
    'max' => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute مساوية أو أصغر لـ :max.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string' => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array' => 'يجب أن لا يحتوي الحقل :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes' => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
    'min' => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute مساوية أو أكبر لـ :min.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'string' => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا',
        'array' => 'يجب أن يحتوي الحقل :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'gt' => [
        'numeric' => 'الحقل :attribute يجب ان يكون أكبر من :value',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'not_in' => 'الحقل :attribute لاغٍ',
    'numeric' => 'يجب على الحقل :attribute أن يكون رقمًا',
    'present' => 'يجب تقديم الحقل :attribute',
    'regex' => 'صيغة الحقل :attribute .غير صحيحة',
    'required' => 'الحقل :attribute مطلوب.',
    'required_if' => 'الحقل :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless' => 'الحقل :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => 'الحقل :attribute إذا توفّر :values.',
    'required_with_all' => 'الحقل :attribute إذا توفّر :values.',
    'required_without' => 'الحقل :attribute إذا لم يتوفّر :values.',
    'required_without_all' => 'الحقل :attribute إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق الحقل :attribute مع :other',
    'size' => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute مساوية لـ :size',
        'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'string' => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالظبط',
        'array' => 'يجب أن يحتوي الحقل :attribute على :size عنصرٍ/عناصر بالظبط',
    ],
    'string' => 'يجب أن يكون الحقل :attribute نصآ.',
    'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique' => 'قيمة الحقل :attribute مُستخدمة من قبل',
    'uploaded' => 'فشل في تحميل الـ :attribute',
    'url' => 'صيغة الرابط :attribute غير صحيحة',

    // custom
    'medicine_not_found' => 'الدواء غير موجود' ,
    'location_not_found' => 'المكان غير موجود' ,
    'no_auth' => 'ليس لك الصلاحية',
    'old_password_wrong' => 'كلمة المرور القديمة خاطئة' ,
    'num_of_units_validation' => 'عدد الوحدات يجب ان يكون اكبر من او يساوي 1',
    'effective_materail_validation' => 'الرجاء ملئ حقول المادة الفعالة بالشكل الصحيح' ,
    'effective_materail_value_validation' => 'الرجاء ملئ حقول قيمة المادة الفعالة كارقام فقط' ,
    'effective_materail_duplicate' => 'الرجاء عدم تكرار اختيار المادة الفعالة',
    /*
      |--------------------------------------------------------------------------
      | Custom Validation Language Lines
      |--------------------------------------------------------------------------
      |
      | Here you may specify custom validation messages for attributes using the
      | convention "attribute.rule" to name the lines. This makes it quick to
      | specify a specific custom language line for a given attribute rule.
      |
     */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    /*
      |--------------------------------------------------------------------------
      | Custom Validation Attributes
      |--------------------------------------------------------------------------
      |
      | The following language lines are used to swap attribute place-holders
      | with something more reader friendly such as E-Mail Address instead
      | of "email". This simply helps us make messages a little cleaner.
      |
     */
    'attributes' => [
        'name' => 'الاسم',
        'username' => 'اسم المُستخدم',
        'email' => 'البريد الالكتروني',
        'first_name' => 'الاسم',
        'last_name' => 'اسم العائلة',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'city' => 'المدينة',
        'country' => 'الدولة',
        'address' => 'العنوان',
        'phone1' => 'الهاتف',
        'owner_name' => 'اسم المالك',
        'customer_name' => 'اسم الزبون',
        'project_date' => 'تاريخ العقد',
        'location' => 'الموقع',
        'project_num' => 'رقم المشروع',
        'order_date' => 'تاريخ الطلبية',
        'order_type' => 'نوع الطلبية',
        'hour' => 'ساعة',
        'minute' => 'دقيقة',
        'second' => 'ثانية',
        'title' => 'اللقب',
        'content' => 'المُحتوى',
        'description' => 'الوصف',
        'excerpt' => 'المُلخص',
        'date' => 'التاريخ',
        'time' => 'الوقت',
        'available' => 'مُتاح',
        'size' => 'الحجم',
        'mobile' => 'الجوال',


        'phone' => 'الجوال',
        'role' => 'الصلاحية',
        'social_type' => 'نوع التسجيل',
        'social_unique_id' => 'رقم السوشال ميديا',
        'category_id' => 'الصنف' ,
        'medicine_type' => 'نوع الدواء',
        'company_id' => 'الشركة المنتجة',
        'country_id' => 'الدولة' ,
        'city_id' => 'المدينة' ,
        'age' => 'العمر',
        'weight' => 'الوزن' ,
        'length' => 'الطول',
        'smoking' => 'التدخين',
        'job' => 'الوظيفة',
        'description_partner' => 'مواصفات شريك الحياة',
        'description_my_self' => 'تحدث عن نفسك',
        'tribal' => 'نوع القبيلة',
        'Plurality' => 'التعدد',
        'nationality_id' => 'الجنسية',
        'social_status_id' => 'الحالة الاجتماعية',
        'marry_type_id' => 'نوع الزواج',
        'physique_id' => 'بنية الجسم',
        'religious_id' => 'التدين',
        'prayer_id' => 'الصلاة',
        'beard_id' => 'اللحية',
        'education_id' => 'التعليم',
        'financial_status_id' => 'الوضع المالي',
        'work_id' => 'مجال العمل',
        'health_status_id' => 'الحالة الصحية',
        'skin_color_id' => 'لون البشرة',
        'monthly_income_id' => 'الدخل الشهري',
        'hijab_id' => 'الحجاب' ,
        'kids_number' => 'عدد الاطفال',
        'duration' =>'المدة',
        'new_password' => 'كلمة المرور الجديدة',
        'old_password' => 'كلمة المرور القديمة',
        'confirmation_new_password' => 'تأكيد كلمة المرور',

        'name_ar' => 'الاسم بالعربي',
        'name_en' => 'الاسم بالانجليزي',
        'type_id' => 'النوع',
        'name.ar' =>'الاسم بالعربي',
        'name.en' =>'الاسم بالانجليزي',

        'form_id' => 'النموذج',
        'note' => 'الملاحظة',


        'is_applicant_another_person' => 'مقدم الطلب شخص أخر',
        'user_type_id' => 'نوع المستخدم',
        'gender' => 'الجنس',
        'id_type_id' => 'نوع الهوية',
        'government_id' => 'الجهة الحكومية',

        'payment_method_id' => 'طريقة الدفع',
        'account_number' => 'رقم الحساب',
        'order_id' => 'رقم الطلب',

        'category_ids' => 'التصنيفات',
        'brand_id' => 'الماركة',
        'sku' => 'رمز المخزون',
        'price' => 'السعر',
        'purchase_price' => 'سعر الشراء',
        'min_quantity' => 'الحد الادنى من الكمية',
        'quantity' => 'الكمية',
        'owner_room_id' => 'صاحب الغرفة',
        'auction_id' => 'المزاد',
        'service_time' => 'مدة الخدمة',
    ],
];
