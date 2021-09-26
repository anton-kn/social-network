// $(function(){
//     $('#button').click(function(){
//         $('html, body').animate({scrollTop: $(document).height() - $(window).height()}, 200);
//         return false;
//     });
// });
//
// $(document).ready(function(){
//     $("#hide").click(function(){
//         $("p").hide();
//     });
//     $("#show").click(function(){
//         $("p").show();
//     });
// });
//
// $(document).ready(function(){
//     $("#button").click(function(){
//         $.ajax({
//             url: '/test/hello',
//             success: function(data){
//                 alert( "Прибыли данные: " + data );
//                 // $("p").append(data);
//                 var ajax = data;
//             }
//         });
//         // $("#div1").load("demo_test.txt");
//     });
// });

/* Функция для загрузки данных Ajax */
async function createRequest(url){ // await работает только с async
    let response = await fetch(url);
    // json файл о пользователях
    let commits = await response.json();
    return commits; // возвращает Promise
}

/* При нажатии на кнопку делаем запрос на сервер */
button.onclick = function ()

{
    let promise = createRequest('/test/hello');
    promise.then(
        data => {
            console.log(data);
        }
    )
}




