var solution;

function proccesing(msg)
{
    // получаем Parabola: 173.33957320526 , Three_eighths: 173.33333333333 , Trapezium: 173.33351851852

    var answer = new Array();
    var splitString = msg.split(",");

    // получаем Parabola: 173.33957320526
   for(var i = 0 ; i<splitString.length ; i++)
    {
        var tempStr = splitString[i].split(":");
        answer[i] = {"method":tempStr[0] , "answer": tempStr[1] , "delta": tempStr[2]};
    }
   

   var text = "";
for (var i=0 ; i<answer.length ; i++)
{
    text +=answer[i]['method'] + " : " + answer[i]['answer'] + " +- " + answer[i]['delta'] + "</br>";
}
$("#answer").html(text);

    return answer;

}


function sendData()
{
    solution = $("#answer").html("<p>Wait...</p>");

    var func = $('#function').val();
    var a = $('#a').val();
    var b = $('#b').val();
    var accuracy = $('#accuracy').val();
    // var n = $('#n').val();

    var str = "function="+func+"&"+"a="+a+"&b="+b+"&accuracy="+accuracy/*+"&n="+n*/;

    //str = "func="+func;
    $.ajax(
        {
            type:   "GET",
            url:    "main.php",
            data:   
                {
                    function : func,
                    a : a,
                    b : b,
                    accuracy : accuracy
                }
            ,
            success:  function(msg)
            {
                solution = proccesing(msg);   
            }
        }
    );

}