

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
            td.setAttribute("name","cell");
            

            row.appendChild(td);
        }
        table.appendChild(row);
    }
    document.getElementById("kalender").appendChild(table);
    var d = new Date();
    populateCalendar(d.getFullYear(),d.getMonth());

}

function clear()
{
    var celler = document.getElementsByName("cell");
    for(i=0;i<celler.length;i++)
    {
        celler[i].innerHTML="";
        celler[i].removeAttribute("datum");
        celler[i].removeAttribute("onmousedown");
    }
}

function populateCalendar(year,month)
{
    clear();
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
            document.getElementById(startvecka+"_"+i).setAttribute("datum",date);
            document.getElementById(startvecka+"_"+i).setAttribute("onmousedown","displayDatum('"+date+"');");
            iterator++;
            date.setDate(iterator);

            displaySelected((startvecka)+"_"+(i+1),date);

            if(date.getMonth()!= start_month)
                return;
        }
        startdag=0;
        startvecka++;
    }

            
}

function changeVy(year)
{
    var monthlist = document.getElementById("selected_month");
    var m = monthlist.options[monthlist.selectedIndex].value;
    populateCalendar(year,m);
}

function changeVyMonth(month)
{
    var monthlist = document.getElementById("selected_year");
    var y= monthlist.options[monthlist.selectedIndex].value;
    populateCalendar(y,month);
}

function createLists()
{
    var selectedindex=0;
    d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth();
    //Årslsita
    var select = document.createElement("select");
    select.setAttribute("id","selected_year");
    select.setAttribute("onchange","changeVy(this.value);");
    select.setAttribute("class","lista");
    

        for(i=2010,a=0; i< 2050;a++,i++)
        {
    
            var option = document.createElement("option");
            option.setAttribute("value",i);
            option.innerHTML=i;
            if(i ==year )
                selectedindex = a;
            select.appendChild(option);
        }

        select.selectedIndex = selectedindex;

        document.getElementById("years").appendChild(select);

        //Månadslista

        select = document.createElement("select"); 
        select.setAttribute("id","selected_month");
        select.setAttribute("onchange","changeVyMonth(this.value);");
        select.setAttribute("class","lista");
        var m = "Januari,Februari,Mars,April,Maj,Juni,Juli,Augusti,September,Oktober,November,December".split(",");

        for(i=0; i< m.length;i++)
        {
    
            var option = document.createElement("option");
            option.setAttribute("value",i);
            option.innerHTML=m[i];
            if(i ==month )
                selectedindex = i;
            select.appendChild(option);
        }

        select.selectedIndex = selectedindex;

        document.getElementById("month").appendChild(select);


}


function correctWeekDays(day)
{
    days=new Array();
    days[0] = 6;
    days[1] = 0;
    days[2] = 1;
    days[3] = 2;
    days[4] = 3;
    days[5] = 4;
    days[6] = 5;

            return days[day];
}
/*
Displayar i kalendern att något fnns för aktuellt datum
*/

function displaySelected(id,datum)
{
   //alert(datum);
    d = new Date(datum);
    var year = d.getFullYear();
    var month = d.getMonth()+1;
    var date = d.getDate();
    var datum = year+"-"+month+"-"+date; //Kan hända att man får lov att ändra på datumformatet här, för att passa till MySQL

    var data = "date="+datum;

   // alert(datum);

    sendData(id,"getactivities.php",data,mark);
   // alert(datum);

}

function mark(id,response)
{
    var jsonObj = JSON.parse(response.responseText);
  //alert(jsonObj.activities.length);
    if(jsonObj.activities.length == 0)
    document.getElementById(id).setAttribute("class","ummarked");
    else
    document.getElementById(id).setAttribute("class","marked");

}


/* Ajaxanrop*/

function displayDatum(datum)
{
   //alert(datum);
    d = new Date(datum);
    var year = d.getFullYear();
    var month = d.getMonth()+1;
    var date = d.getDate();
    var datum = year+"-"+month+"-"+date; //Kan hända att man får lov att ändra på datumformatet här, för att passa till MySQL

    var data = "date="+datum;

    sendData("aktivitet","getactivities.php",data,displayActivity);
   // alert(datum);

}




/* Diverse callbacks - används av Ajax */

function displayActivity(id,response)
{
   
    var jsonObj = JSON.parse(response.responseText);

   var content="";

    for(i=0;i<jsonObj.activities.length;i++)

    {
        

                                 var postid = jsonObj.activities[i].activityID;

                                 var name = jsonObj.activities[i].name;

                                 var description = jsonObj.activities[i].description;
                                 var start = jsonObj.activities[i].starttime;
                                 var slut = jsonObj.activities[i].endtime;

                                
                                 content+="Namn: "+name+"\nbeskrivning: "+description+"\nStarttid: "+start+"\nSluttid: "+slut+"\n\n";
                                

    }
    
    document.getElementById(id).value = content;
}