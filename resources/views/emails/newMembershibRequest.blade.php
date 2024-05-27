<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>طلب عضوية جديد</h3>
        <h4>مقدم الطلب : {{ $membership->getTranslations('full_name')['ar'] }}</h4>
        <h4> رقم الجوال : {{ $membership->phone }}</h4>
        <h4> البريد الالكتروني  : {{ $membership->email }}</h4>
        <h4> نوع العضوية : {{ $membership->membership_type }}</h4>
        <h4>  المدينة : {{ $membership->city }}</h4>
        <h4>  الوظيفة : {{ $membership->job }}</h4>
        <h4>  تاريخ الميلاد : {{ $membership->birth_date }}</h4>
    </div>
</body>
</html>