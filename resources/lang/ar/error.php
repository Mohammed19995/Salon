<?php

return [
    'image_is_used' => 'عذرا , لا يمكنك حذف الصورة لانها مستخدمة',
    'parent_category_cant_same_category' => 'عذرا , لا يمكن ان يكون الاب هوا نفس الصنف',
    'expire_verified' => 'عذرا , انتهى الوقت المسموح لك بالتفعيل , تم ارسال رمز أخر لك',
    'account_already_verified' => 'الحساب مؤكد بالفعل',
    'wrong_code' => 'خطأ في رمز التفعيل',
    'account_not_active_please_contact_admin' => 'تم ايقاف حسابك , الرجاء التواصل مع الادارة لتفعيله',
    'is_saudi_already_found' => 'عذرا , الجنسية ( :nationality ) محددة انها ك جنسية سعودية',
    'cant_delete_form_element' => 'لا يمكن الحذف لانه يوجد عنصر يعتمد عليه',
    'cant_delete_because_have_services' => 'لا يمكن حذف النموذج ( :name ), لانه يوجد خدمات تابعة له',

    'your_account_is_not_active' => 'عذرا , حسابك غير مفعل الرجاء التواصل مع الادارة لتفعيله',
    'your_account_is_not_confirmed' => 'عذرا , حسابك غير مؤكد الرجاء التواصل مع الادارة لتأكيده',

    'is_send_order_already_found' => 'عذرا , الحالة ( :order_status ) محددة انها ك حالة افتراضية عند ارسال الطلب',
    'is_finish_order_already_found' => 'عذرا , الحالة ( :order_status ) محددة انها ك حالة عند اكتمال الطلب',

    // api
    'wrong_password' => 'كلمة المرور خاطئة',
    'id_type_not_available_for_nationality' => 'عذرا , نوع الهوية المختار غير متاح للجنسية المختارة',
    'account_is_already_verified' => 'حسابك مؤكد بالفعل',
    'please_verify_account' => 'الرجاء تفعيل الحساب أولا',
    'nationality_not_found' => 'الجنسية غير موجودة',
    'service_not_found' => 'الخدمة غير موجودة',
    'no_auth' => 'ليس لديك صلاحية',
    'can_send_note_in_this_status' => 'عذرا , حالة الطلب الحالية لا تسمح لك بارسال رد',
    'admin_stop_send_reply' => 'قامت الادارة بايقاف إرسال رد',
    'send_reset_link_error' => 'خطأ , لم يتم إرسال رابط إعادة تعيين كلمة المرور',
    'your_already_completed_register' => 'انتا بالفعل أكملت بيانات التسجيل',
    'please_complete_register' => 'الرجاء إكمال التسجيل أولا',

    'cant_create_order_because_you_have_order_not_completed' => 'لا يمكنك إرسال الطلب , لانه يوجد لديك طلب غير مكتمل',
    'too_many_login_attempts' => 'وصلت الحد الاقصى لعدد المرات المسموح فيها , الرجاء المحاولة مرة أخرة بعد :minute دقائق',
    'login_failed' => 'خطأ في الايميل او كلمة المرور',

    'unauthenticated' => 'الرجاء تسجيل الدخول أولا',
    'must_gt_min_quantity' => 'الكمية يجب ان تكون أكبر من :min_quantity',
    'quantity_has_available_is' => 'الكمية المتوفرة حاليا هي :quantity',
    'empty_cart' => 'عذرا , سلة المشتريات فارغة',
    'order_is_already_approved' => 'عذرا , تم الموافقة على الطلب مسبقا',
    'order_is_already_rejected' => 'عذرا , تم رفض الطلب مسبقا',
    'select_excel_file' => 'الرجاء اختيار ملف اكسل',


    'price_not_in_auction_prices' => 'السعر ليس ضمن الاسعار المتاحة لهذا المزاد',
    'auction_is_pending' => 'لا يمكنك إضافة سعر , لان المزاد لم يبدأ بعد',
    'auction_is_closed' => 'لا يمكنك إضافة سعر , لان المزاد تم إغلاقه',
    'auction_no_accepted_now' => 'لا يمكنك إضافة سعر , لانه لم يتم قبول المزاد من الادارة',
    'auction_is_rejected' => 'لا يمكنك إضافة سعر , لانه تم رفض المزاد من الادارة',
    'auction_cant_to_open_if_data_not_full' => '<span style="color: blue">المزاد :name</span> : خطأ في تحويل حالة المزاد الي مفتوج لان البيانات غير كاملة',
    'auction_cant_to_open_if_status_no_accept' => '<span style="color: blue">المزاد :name</span> : خطأ في تحويل حالة المزاد الي مفتوج لان المزاد غير مقبول حتى الان',
    'auction_cant_to_reject_auction_opened' => '<span style="color: blue">المزاد :name</span> : خطأ في تحويل حالة المزاد الي مرفوض لان المزاد مفتوح بالفعل',
    'auction_cant_to_reject_auction_closed' => '<span style="color: blue">المزاد :name</span> : خطأ في تحويل حالة المزاد الي مرفوض لان المزاد مغلق بالفعل',

    'auction_cant_to_accept_auction_opened' => '<span style="color: blue">المزاد :name</span> : خطأ في تحويل حالة المزاد الي مقبول لان المزاد مفتوح بالفعل',
    'auction_cant_to_accept_auction_closed' => '<span style="color: blue">المزاد :name</span> : خطأ في تحويل حالة المزاد الي مقبول لان المزاد مغلق بالفعل',


    'error_in_this_auctions' => 'خطأ في المزادات التالية : ',

    'file_not_image' => 'الملف ليس صورة',
    'initial_price_cant_updated_because_auction_is_opened' => 'عذرا لا يمكن تعديل السعر المبدئي لان المزاد يحتوي على مستخدمين قامو بتقديم عروض أسعار',
    'already_rated' => 'قمت بالتقييم مسبقا',
    'you_not_subscription_in_auction' => 'لا يمكنك التقييم لانك غير مشترك في المزاد',

    'cant_accept_order' => 'لا يمكنك قبول الطلب',
    'cant_reject_order' => 'لا يمكنك رفض الطلب',
    'cant_open_auction' => 'لا يمكنك فتح المزاد',
    'cant_close_auction' => 'لا يمكنك إغلاق المزاد',

    'cant_add_price_for_your_auction' => 'لا يمكنك إضافة سعر لمزادك',
    'another_user_update_this_row' => 'عذرا ,تم تحديث البيانات من مكان أخر',


    'error_in_execute_option' => 'خطأ في تنفيذ الاجراء',
    'cant_delete_because_have_salons' => '<span style="color: blue">المستخدم :name</span> : لا يمكن الحذف لانه يملك صالونات',
    'cant_delete_because_have_orders' => '<span style="color: blue">المستخدم :name</span> : لا يمكن الحذف لانه يملك دفعات',
    'cant_delete_because_have_prices' => '<span style="color: blue">المزاد :name</span> : لا يمكن الحذف لانه يملك مستخدمين قامو بتقديم عروض أسعار',
    'cant_delete_because_have_bank_transfer' => '<span style="color: blue">البنك :name</span> : لا يمكن الحذف لانه يملك حوالات بنكية',
    'cant_delete_because_have_users' => '<span style="color: blue">المدينة :name</span> : لا يمكن الحذف لانه يملك مستخدمين',
    'cant_delete_because_have_auctions' => '<span style="color: blue">المدينة :name</span> : لا يمكن الحذف لانه يملك مزادات',

];
