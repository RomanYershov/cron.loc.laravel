<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
       <h1>{{$data['title']}}</h1>
       <p><a href="http://cron.loc/news/{{$data['id']}}">Для просмотра новости пройдите по ссылке</a></p>
       <p><a href="http://cron.loc/home/{{$data['user_id']}}">Отписаться от рассылки.</a></p>
</body>
</html>