$(document).ready(function () {
    var subText = "<table><td>";
    $("ul>li>a>div:nth-child(2)>span:nth-child(2)").each(function () {
        subText += "<tr>" + $(this).html() + "</tr>";
    });
    subText += "</table></td>";
    console.log(subText);

    // $("ul>li>a img").each(function () {
    //     subText +=$(this).attr(src);
    // });
});