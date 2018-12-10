

function createTable()
{
    var table = document.createElement("table");
    table.setAttribute("border","1");
    var row = document.createElement("tr");
    var days = "Mån,Tis,Ons,Tor,Fre,Lör,Sön".split(",");
    for(i=0;i<days.length;i++)
    {
        var tr = document.createElement("th");
        tr.innerHTML = days[i];
        row.appendChild(tr);
    }
    table.appendChild(row);
    for(rad=0;rad<6;rad++)
    {
    var row = document.createElement("tr");
        for(col=0;col<7;col++)
        {
            var td=document.createElement("td");
            td.setAttribute("row",rad);
            td.setAttribute("col",col);
            td.setAttribute("id",rad+"_"+col);
            row.appendChild(td);
        }
        table.appendChild(row);
    }
    document.getElementById("kalender").appendChild(table);
    var d = new Date();
    populateCalendar(d.getFullYear(),d.getMonth());

}

function populateCalendar(year,month)
{
    var date = new Date();
    date.setFullYear(year);
    date.setMonth(month);
    date.setDate(1);
    var startdag = correctWeekDays(date.getDay());
    var startvecka = 0;
    var iterator = 1;
    var start_month = date.getMonth();

    while(startvecka < 6)
    {
        for(i=startdag;i<7;i++)
        {
            document.getElementById(startvecka+"_"+i).innerHTML=date.getDate();
            iterator++;
            date.setDate(iterator);

                if(date.getMonth()!= start_month)
                        return;
        }
        startdag=0;
        startvecka++;
    }

            
}


function changeVy(year)
{
    alert(year);
}

function createLists()
{
    var select = document.createElement("select");
    select.setAttribute("id","year");
    select.setAttribute("onchange","changeVy(this.value);");

        for(i=2010; i< 2050;i++)
        {
            var option = document.createElement("option");
            option.setAttribute("value",i);
            option.innerHTML=i;
            select.appendChild(option);
        }

        document.getElementById("years").appendChild(select);
}


function correctWeekDays(day)
{
    days=new Array();
    days[0] = 6;
    days[1] = 0;
    days[2] = 1;
    days[3] =2;
    days[4] = 3;
    days[5] = 4;
    days[6] = 5;

            return days[day];
}