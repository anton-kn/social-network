<!DOCTYPE html>
<html lang="ru">
<head>
    <title>{{ $title }}</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <meta content="text/html; charset=utf-8">
</head>
   <body>
     <div class = "content w-full h-screen bg-gray-200">
         <div class = "header pl-5 py-5 w-full h-1/6 bg-yellow-50 text-2xl font-mono">
             <header>
                <p class = "font-mono">Социальная сеть</p>
             </header>
         </div>
         <div class = "w-full h-4/6  text-1xl font-mono">
            <div class = "py-5 grid grid-cols-1 gap-1 place-items-center h-48">
                <form method = "post" action="/login">
                    @csrf
                    <input class = "m-2 p-3" type="text" placeholder="Введите email" name="email" value=""></br>
                    <input class = "m-2 p-3" type="password" placeholder="Введите пароль" name="password" value=""></br>
                    <button class = "m-2 p-3 bg-yellow-200" name="submit">Login</button>
                </form>
            </div>
         </div>
         <div class = "footer p-5 w-full h-1/6 bg-yellow-50 text-1xl font-mono text-center">
             <footer>
                 <p class = "m-0">Автор</p></br>
                 <p class = "m-0"><a href="#">example@mail.com</a></p>
             </footer>
         </div>
     </div>
   </body>
</html>
