var items = 0;
let change_event_adder = () => {
  var dropdowns = document.querySelectorAll(".change1");
  dropdowns.forEach((dropdown) => {
    dropdown.addEventListener("change", () => {
      change1(dropdown);
    });
  });
};
function addItem1() {
  items++;
  var html = "<tr>";
  html += "<td>";
  html +=
    "<select class='change1' id='" + items + "' name='type_" + items + "'>";
  html += "<option value='E/D' selected>E/D</option>";
  html += "<option value='Tab'>Tab</option>";
  html += "<option value='Syrup'>Syrup</option>";
  html += "<option value='Cap'>Cap</option>";
  html += "<option value='Sachet'>Sachet</option>";
  html += "<option value='Inj'>Inj</option>";
  html += "</select>";
  html += "</td>";
  html += "<td>";
  html +=
    "<input type='text' class='live-fetch-2' style='width:20rem;' name='med_name_" +
    items +
    "'>";
  html += " <div class='dropdown-container' ></div></td>";
  html += "<td>";
  html += "<select name='morning_" + items + "'>";
  html += "<option value='0'>0</option>";
  html += "<option value='1 थेंब'>1 थेंब</option>";
  html += "<option value='2 थेंब'>2 थेंब</option>";
  html += "<option value='3 थेंब '>3 थेंब </option>";
  html += "<option value='4 थेंब'>4 थेंब</option>";
  html += "<option value='5 थेंब'>5 थेंब </option>";
  html += "<option value='6 थेंब'>6 थेंब</option>";
  html += "<option value='7 थेंब'>7 थेंब </option>";
  html += "<option value='8 थेंब'>8 थेंब</option>";
  html += "<option value='9 थेंब'>9 थेंब </option>";
  html += "<option value='10 थेंब'>10 थेंब</option>";
  html += "</select>";
  html += "</td>";
  html += "<td>";
  html += "<select name='afternoon_" + items + "'>";
  html += "<option value='0'>0</option>";
  html += "<option value='1 थेंब'>1 थेंब</option>";
  html += "<option value='2 थेंब'>2 थेंब</option>";
  html += "<option value='3 थेंब '>3 थेंब </option>";
  html += "<option value='4 थेंब'>4 थेंब</option>";
  html += "<option value='5 थेंब'>5 थेंब </option>";
  html += "<option value='6 थेंब'>6 थेंब</option>";
  html += "<option value='7 थेंब'>7 थेंब </option>";
  html += "<option value='8 थेंब'>8 थेंब</option>";
  html += "<option value='9 थेंब'>9 थेंब </option>";
  html += "<option value='10 थेंब'>10 थेंब</option>";
  html += "</select>";
  html += "</td>";
  html += "<td>";
  html += "<select name='night_" + items + "'>";
  html += "<option value='0'>0</option>";
  html += "<option value='1 थेंब'>1 थेंब</option>";
  html += "<option value='2 थेंब'>2 थेंब</option>";
  html += "<option value='3 थेंब '>3 थेंब </option>";
  html += "<option value='4 थेंब'>4 थेंब</option>";
  html += "<option value='5 थेंब'>5 थेंब </option>";
  html += "<option value='6 थेंब'>6 थेंब</option>";
  html += "<option value='7 थेंब'>7 थेंब </option>";
  html += "<option value='8 थेंब'>8 थेंब</option>";
  html += "<option value='9 थेंब'>9 थेंब </option>";
  html += "<option value='10 थेंब'>10 थेंब</option>";
  html += "</select>";
  html += "</td>";
  html += "<td>";
  html += "<select name='eat_" + items + "'>";
  html += "<option value='3 times'>3 times</option>";
  html += "<option value='4 times'>4 times</option>";
  html += "<option value='5 times'>5 times</option>";
  html += "<option value='6 times'>6 times</option>";
  html += "<option value='8 times'>8 times</option>";
  html += "<option value='9 times'>9 times</option>";
  html += "<option value=' एक आठवडा'> एक आठवडा</option>";
  html += "<option value='दोन आठवडे'>दोन आठवडे</option>";
  html += "<option value=' तीन आठवडे एक महिना'> तीन आठवडे एक महिना</option>";
  html += "</select>";
  html += "</td>";
  html += "<td><input type='text' name='days_" + items + "'></td>";
  html += "<td><input type='number' name='quantity_" + items + "'></td>";
  html +=
    "<td><button class='btn btn-primary' type='button' onclick='deleteRow1(this);'>Delete</button></td>";
  html += "</tr>";
  var row = document.getElementById("tbody").insertRow();
  row.innerHTML = html;
  change_event_adder();
  liveFetchElements2();
}

function change1(btn) {
  var e = btn.value;
  //console.log(e);
  var id = btn.id;
  //console.log(id);
  var content = btn.parentElement.parentElement;
  //console.log(content);

  var html = "<tr>";
  html += "<td>";
  html += "<select class='change1' id='" + id + "' name='type_" + id + "'>";
  if (e === "E/D") {
    //console.log('want to change to E/D');

    html += "<option value='E/D' selected>E/D</option>";
    html += "<option value='Tab'>Tab</option>";
    html += "<option value='Syrup'>Syrup</option>";
    html += "<option value='Cap'>Cap</option>";
    html += "<option value='Sachet'>Sachet</option>";
    html += "<option value='Inj'>Inj</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html +=
      "<input type='text' class='live-fetch-2' style='width:20rem;' name='med_name_" +
      id +
      "'>";
    html += "<div class='dropdown-container' ></div></td>";
    html += "<td>";
    html += "<select name='morning_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='1 थेंब'>1 थेंब</option>";
    html += "<option value='2 थेंब'>2 थेंब</option>";
    html += "<option value='3 थेंब '>3 थेंब </option>";
    html += "<option value='4 थेंब'>4 थेंब</option>";
    html += "<option value='5 थेंब'>5 थेंब </option>";
    html += "<option value='6 थेंब'>6 थेंब</option>";
    html += "<option value='7 थेंब'>7 थेंब </option>";
    html += "<option value='8 थेंब'>8 थेंब</option>";
    html += "<option value='9 थेंब'>9 थेंब </option>";
    html += "<option value='10 थेंब'>10 थेंब</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='afternoon_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='1 थेंब'>1 थेंब</option>";
    html += "<option value='2 थेंब'>2 थेंब</option>";
    html += "<option value='3 थेंब '>3 थेंब </option>";
    html += "<option value='4 थेंब'>4 थेंब</option>";
    html += "<option value='5 थेंब'>5 थेंब </option>";
    html += "<option value='6 थेंब'>6 थेंब</option>";
    html += "<option value='7 थेंब'>7 थेंब </option>";
    html += "<option value='8 थेंब'>8 थेंब</option>";
    html += "<option value='9 थेंब'>9 थेंब </option>";
    html += "<option value='10 थेंब'>10 थेंब</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='night_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='1 थेंब'>1 थेंब</option>";
    html += "<option value='2 थेंब'>2 थेंब</option>";
    html += "<option value='3 थेंब '>3 थेंब </option>";
    html += "<option value='4 थेंब'>4 थेंब</option>";
    html += "<option value='5 थेंब'>5 थेंब </option>";
    html += "<option value='6 थेंब'>6 थेंब</option>";
    html += "<option value='7 थेंब'>7 थेंब </option>";
    html += "<option value='8 थेंब'>8 थेंब</option>";
    html += "<option value='9 थेंब'>9 थेंब </option>";
    html += "<option value='10 थेंब'>10 थेंब</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='eat_" + id + "'>";
    html += "<option value='3 times'>3 times</option>";
    html += "<option value='4 times'>4 times</option>";
    html += "<option value='5 times'>5 times</option>";
    html += "<option value='6 times'>6 times</option>";
    html += "<option value='8 times'>8 times</option>";
    html += "<option value='9 times'>9 times</option>";
    html += "<option value=' एक आठवडा'> एक आठवडा</option>";
    html += "<option value='दोन आठवडे'>दोन आठवडे</option>";
    html += "<option value=' तीन आठवडे एक महिना'> तीन आठवडे एक महिना</option>";
    html += "</select>";
    html += "</td>";

    html += "<td><input type='text' name='days_" + id + "'></td>";
    html += "<td><input type='text' name='quantity_" + id + "'></td>";
  } else if (e === "Syrup") {
    //console.log('want to change to syrup');
    html += "<option value='E/D'>E/D</option>";
    html += "<option value='Tab'>Tab</option>";
    html += "<option value='Syrup' selected>Syrup</option>";
    html += "<option value='Cap'>Cap</option>";
    html += "<option value='Sachet'>Sachet</option>";
    html += "<option value='Inj'>Inj</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html +=
      "<input type='text' class='live-fetch-2' style='width:20rem;' name='med_name_" +
      id +
      "'>";
    html += "<div class='dropdown-container' ></div></td>";
    html += "<td>";
    html += "<select name='morning_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='5 ml'>5 ml</option>";
    html += "<option value='10 ml'>10 ml</option>";
    html += "<option value='15 ml'>15 ml</option>";
    html += "<option value='20 ml'>20 ml</option>";
    html += "<option value='25 ml'>25 ml</option>";
    html += "<option value='30 ml'>30 ml</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='afternoon_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='5 ml'>5 ml</option>";
    html += "<option value='10 ml'>10 ml</option>";
    html += "<option value='15 ml'>15 ml</option>";
    html += "<option value='20 ml'>20 ml</option>";
    html += "<option value='25 ml'>25 ml</option>";
    html += "<option value='30 ml'>30 ml</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='night_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='5 ml'>5 ml</option>";
    html += "<option value='10 ml'>10 ml</option>";
    html += "<option value='15 ml'>15 ml</option>";
    html += "<option value='20 ml'>20 ml</option>";
    html += "<option value='25 ml'>25 ml</option>";
    html += "<option value='30 ml'>30 ml</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='eat_" + id + "'>";
    html += "<option value='जेवणा नंतर'>जेवणा नंतर</option>";
    html += "<option value='जेवणा आगोदर'>जेवणा आगोदर</option>";
    html += "<option value='जिभे खाली'>जिभे खाली</option>";
    html += "<option value='रेक्टल मध्ये'>रेक्टल मध्येे</option>";
    html += "<option value='आठवड्यातून एकदा'>आठवड्यातून एकदा</option>";
    html += "</select>";
    html += "</td>";

    html += "<td><input type='text' name='days_" + id + "'></td>";
    html += "<td><input type='text' name='quantity_" + id + "'></td>";
  } else if (e === "Cap") {
    //console.log('want to change to cap');
    html += "<option value='E/D'>E/D</option>";
    html += "<option value='Tab'>Tab</option>";
    html += "<option value='Syrup'>Syrup</option>";
    html += "<option value='Cap' selected>Cap</option>";
    html += "<option value='Sachet'>Sachet</option>";
    html += "<option value='Inj'>Inj</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html +=
      "<input type='text' class='live-fetch-2' style='width:20rem;' name='med_name_" +
      id +
      "'>";
    html += "<div class='dropdown-container' ></div></td>";
    html += "<td>";
    html += "<select name='morning_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='0.5'>0.5</option>";
    html += "<option value='1'>1</option>";
    html += "<option value='2'>2</option>";
    html += "<option value='3'>3</option>";
    html += "<option value='4'>4</option>";
    html += "<option value='5'>5</option>";
    html += "<option value='6'>6</option>";
    html += "<option value='7'>7</option>";
    html += "<option value='8'>8</option>";
    html += "<option value='9'>9</option>";
    html += "<option value='10'>10</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='afternoon_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='0.5'>0.5</option>";
    html += "<option value='1'>1</option>";
    html += "<option value='2'>2</option>";
    html += "<option value='3'>3</option>";
    html += "<option value='4'>4</option>";
    html += "<option value='5'>5</option>";
    html += "<option value='6'>6</option>";
    html += "<option value='7'>7</option>";
    html += "<option value='8'>8</option>";
    html += "<option value='9'>9</option>";
    html += "<option value='10'>10</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='night_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='0.5'>0.5</option>";
    html += "<option value='1'>1</option>";
    html += "<option value='2'>2</option>";
    html += "<option value='3'>3</option>";
    html += "<option value='4'>4</option>";
    html += "<option value='5'>5</option>";
    html += "<option value='6'>6</option>";
    html += "<option value='7'>7</option>";
    html += "<option value='8'>8</option>";
    html += "<option value='9'>9</option>";
    html += "<option value='10'>10</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='eat_" + id + "'>";
    html += "<option value='जेवणा नंतर'>जेवणा नंतर</option>";
    html += "<option value='जेवणा आगोदर'>जेवणा आगोदर</option>";
    html += "<option value='जिभे खाली'>जिभे खाली</option>";
    html += "<option value='रेक्टल मध्ये'>रेक्टल मध्येे</option>";
    html += "<option value='आठवड्यातून एकदा'>आठवड्यातून एकदा</option>";
    html += "</select>";
    html += "</td>";

    html += "<td><input type='text' name='days_" + id + "'></td>";
    html += "<td><input type='text' name='quantity_" + id + "' onclick='calcQyt(this);'></td>";
  } else if (e === "Tab") {
    //console.log('want to change to tab');
    html += "<option value='E/D'>E/D</option>";
    html += "<option value='Tab' selected>Tab</option>";
    html += "<option value='Syrup'>Syrup</option>";
    html += "<option value='Cap'>Cap</option>";
    html += "<option value='Sachet'>Sachet</option>";
    html += "<option value='Inj'>Inj</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html +=
      "<input type='text' class='live-fetch-2' style='width:20rem;' name='med_name_" +
      id +
      "'>";
    html += "<div class='dropdown-container' ></div></td>";
    html += "<td>";
    html += "<select name='morning_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='0.5'>0.5</option>";
    html += "<option value='1'>1</option>";
    html += "<option value='2'>2</option>";
    html += "<option value='3'>3</option>";
    html += "<option value='4'>4</option>";
    html += "<option value='5'>5</option>";
    html += "<option value='6'>6</option>";
    html += "<option value='7'>7</option>";
    html += "<option value='8'>8</option>";
    html += "<option value='9'>9</option>";
    html += "<option value='10'>10</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='afternoon_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='0.5'>0.5</option>";
    html += "<option value='1'>1</option>";
    html += "<option value='2'>2</option>";
    html += "<option value='3'>3</option>";
    html += "<option value='4'>4</option>";
    html += "<option value='5'>5</option>";
    html += "<option value='6'>6</option>";
    html += "<option value='7'>7</option>";
    html += "<option value='8'>8</option>";
    html += "<option value='9'>9</option>";
    html += "<option value='10'>10</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='night_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='0.5'>0.5</option>";
    html += "<option value='1'>1</option>";
    html += "<option value='2'>2</option>";
    html += "<option value='3'>3</option>";
    html += "<option value='4'>4</option>";
    html += "<option value='5'>5</option>";
    html += "<option value='6'>6</option>";
    html += "<option value='7'>7</option>";
    html += "<option value='8'>8</option>";
    html += "<option value='9'>9</option>";
    html += "<option value='10'>10</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='eat_" + id + "'>";
    html += "<option value='जेवणा नंतर'>जेवणा नंतर</option>";
    html += "<option value='जेवणा आगोदर'>जेवणा आगोदर</option>";
    html += "<option value='जिभे खाली'>जिभे खाली</option>";
    html += "<option value='रेक्टल मध्ये'>रेक्टल मध्येे</option>";
    html += "<option value='आठवड्यातून एकदा'>आठवड्यातून एकदा</option>";
    html += "</select>";
    html += "</td>";

    html += "<td><input type='text' name='days_" + id + "'></td>";
    html += "<td><input type='text' name='quantity_" + id + "'  onclick='calcQyt(this);'></td>";
  } else if (e === "Sachet") {
    //console.log('want to change to tab');
    html += "<option value='E/D'>E/D</option>";
    html += "<option value='Tab'>Tab</option>";
    html += "<option value='Syrup'>Syrup</option>";
    html += "<option value='Cap'>Cap</option>";
    html += "<option value='Sachet' selected>Sachet</option>";
    html += "<option value='Inj'>Inj</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html +=
      "<input type='text' class='live-fetch-2' style='width:20rem;' name='med_name_" +
      id +
      "'>";
    html += "<div class='dropdown-container' ></div></td>";
    html += "<td>";
    html += "<select name='morning_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='0.5'>0.5</option>";
    html += "<option value='1'>1</option>";
    html += "<option value='2'>2</option>";
    html += "<option value='3'>3</option>";
    html += "<option value='4'>4</option>";
    html += "<option value='5'>5</option>";
    html += "<option value='6'>6</option>";
    html += "<option value='7'>7</option>";
    html += "<option value='8'>8</option>";
    html += "<option value='9'>9</option>";
    html += "<option value='10'>10</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='afternoon_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='0.5'>0.5</option>";
    html += "<option value='1'>1</option>";
    html += "<option value='2'>2</option>";
    html += "<option value='3'>3</option>";
    html += "<option value='4'>4</option>";
    html += "<option value='5'>5</option>";
    html += "<option value='6'>6</option>";
    html += "<option value='7'>7</option>";
    html += "<option value='8'>8</option>";
    html += "<option value='9'>9</option>";
    html += "<option value='10'>10</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='night_" + id + "'>";
    html += "<option value='0'>0</option>";
    html += "<option value='0.5'>0.5</option>";
    html += "<option value='1'>1</option>";
    html += "<option value='2'>2</option>";
    html += "<option value='3'>3</option>";
    html += "<option value='4'>4</option>";
    html += "<option value='5'>5</option>";
    html += "<option value='6'>6</option>";
    html += "<option value='7'>7</option>";
    html += "<option value='8'>8</option>";
    html += "<option value='9'>9</option>";
    html += "<option value='10'>10</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html += "<select name='eat_" + id + "'>";
    html += "<option value='जेवणा नंतर'>जेवणा नंतर</option>";
    html += "<option value='जेवणा आगोदर'>जेवणा आगोदर</option>";
    html += "<option value='जिभे खाली'>जिभे खाली</option>";
    html += "<option value='रेक्टल मध्ये'>रेक्टल मध्येे</option>";
    html += "<option value='आठवड्यातून एकदा'>आठवड्यातून एकदा</option>";
    html += "</select>";
    html += "</td>";

    html += "<td><input type='text' name='days_" + id + "'></td>";
    html += "<td><input type='text' name='quantity_" + id + "'  onclick='calcQyt(this);'></td>";
  } else if (e === "Inj") {
    //console.log('want to change to tab');
    html += "<option value='E/D'>E/D</option>";
    html += "<option value='Tab'>Tab</option>";
    html += "<option value='Syrup'>Syrup</option>";
    html += "<option value='Cap'>Cap</option>";
    html += "<option value='Sachet' >Sachet</option>";
    html += "<option value='Inj' selected>Inj</option>";
    html += "</select>";
    html += "</td>";
    html += "<td>";
    html +=
      "<input type='text' class='live-fetch-2' style='width:20rem;' name='med_name_" +
      id +
      "'>";
    html += "<div class='dropdown-container' ></div></td>";
    html += "<td>";
    html += "<input type='text' name='morning_" + id + "'>";
    html += "</td>";
    html += "<td>";
    html += "<input type='text' name='afternoon_" + id + "'>";
    html += "</td>";
    html += "<td>";
    html += "<input type='text' name='night_" + id + "'>";
    html += "</td>";
    html += "<td>";
    html += "<select name='eat_" + id + "'>";
    html += "<option value='IM'>IM</option>";
    html += "<option value='IV'>IV</option>";
    html += "<option value='S/C'>S/C</option>";
    html += "<option value='Intracath'>Intracath</option>";
    html += "<option value='Center Line'>Center Line</option>";
    html += "</select>";
    html += "</td>";

    html += "<td><input type='text' name='days_" + id + "'></td>";
    html += "<td><input type='text' name='quantity_" + id + "'></td>";
  }
  html +=
    "<td><button class='btn btn-primary' type='button' onclick='deleteRow1(this);'>Delete</button></td>";
  html += "</tr>";
  //console.log(html);
  //console.log(content);
  content.innerHTML = html;
  change_event_adder();

  liveFetchElements2();
}

function deleteRow1(button) {
  var delete_name = button.parentElement.parentElement.children[1].children[0];
  delete_name.value = "";
  delete_name.parentElement.parentElement.style.display = "none";
}

function calcQyt(btn){
  var days = parseFloat(btn.parentElement.previousElementSibling.children[0].value);
  var night = parseFloat(btn.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.children[0].value);
  var after = parseFloat(btn.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.children[0].value);
  var mor = parseFloat(btn.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.children[0].value);
  var qty = (mor + after + night )*days;
  btn.value = qty;

  
}
